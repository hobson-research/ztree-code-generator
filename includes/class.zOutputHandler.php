<?php

class zOutputHandler extends zTree {
	
	public $pointCorrect 		= 4;
	public $pointWrong 			= -1;
	public $pointNotAnswered 	= 0;
	
	public function __construct() {
		// Construct
		echo $pointCorrect;
		echo "<br />" . $pointWrong;
	}
	
	
	public function removeLineBreaks($output) {
		$output = str_replace(array("\r\n", "\r"), "\n", $output);
		$lines = explode("n", $output);
		$new_lines = array();
		
		foreach ($lines as $i => $line) {
			if(!empty($line)) {
				$new_lines[] = trim($line);
			}
		}
		
		return implode($new_lines);
	}
	
	
	
	public function zQuestionDisplay($qContent, $qType, $qSubtype) {
		
		// filter $qContent
		$qContent = trim( preg_replace( '/\s+/', ' ', $qContent ) );
		$qContent = strip_tags($qContent);
		
		// If question subtype is "improving sentences", answer (A) contains part that should be underlined
		if ( (strtoLower($qType) == 'writing') && (strtolower($qSubtype) == 'improving sentences') ) {
				
			// (A), (B), (C), (D), (E)
			$answerRange = "/\([A-E]\)/";
			$qContentArray = preg_split($answerRange, $qContent);
			
			$qContentQuestion 			= $qContentArray[0];
			$qContentUnderlinePart 		= trim($qContentArray[1]);
			
			// Wrap with underline style
			$qContentReplace = "<span class='underline'>" . $qContentUnderlinePart . "</span>";
			$qContentDisplay = str_replace($qContentUnderlinePart, $qContentReplace, $qContentQuestion);
			
			$qOutput = $qContentDisplay . print_r($qContentArray);
			
			return $qOutput;
		} else {
			return $qContent;
		}
	}
	
	
	
	public function zQuestionCode( $qContent, $qType, $qSubtype, $zQuestionNumber, $qAudit = false ) {
		
		
		if ( (strtoLower($qType) == 'writing') && (strtoLower($qSubtype) == 'identifying sentence errors') ) {
			
			$qContent = trim($qContent);
			$qContent .= " (E) \ul No Error\ul0";
			
			// if question subtype is "identifying sentence errors", no need to add line breaks for answers
			$qOutput = $qContent;
		
		} else {
			
			// (A), (B), (C), (D), (E)
			$answerRange = "/\([A-E]\)/";
			$qContentArray = preg_split($answerRange, $qContent);
			
			// Question is contained in the first array index
			$qContentQuestion 			= $qContentArray[0];
			
			if (strtoLower($qSubtype !== "multiple choice")) {
				$qContentArray[0] = str_replace(array("\n", "\r", "bcc:"), "\line\n", $qContentQuestion); 
			}
			
			// // If question subtype is "improving sentences", answer (A) contains part that should be underlined
			if ( (strtoLower($qType) == 'writing') && (strtolower($qSubtype) == 'improving sentences') ) {
				$qContentUnderlinePart 		= trim($qContentArray[1]);
				$qContentQuestion = strip_tags($qContentQuestion);
			
				$qContentHTMLReplace = "\ul $qContentUnderlinePart\ul0 ";
				$qContentTextarea = str_replace($qContentUnderlinePart, $qContentHTMLReplace, $qContentQuestion);
				$qContentTextarea .= "\line";
			} else {
				$qContentTextarea = $qContentArray[0];
			}
			
			$qContentTextarea .= "\n\line(A)" . $qContentArray[1];
			$qContentTextarea .= "\line(B)" . $qContentArray[2];
			$qContentTextarea .= "\line(C)" . $qContentArray[3];
			$qContentTextarea .= "\line(D)" . $qContentArray[4];
			$qContentTextarea .= "\line(E)" . $qContentArray[5];
			
			$qOutput = trim($qContentTextarea);
			
		}
		
		$qRTF = "{\\rtf \ql \\fs30 \n";
		
		if ($zQuestionNumber == 1) {
			// Math multiple choices
			$qInstruction = "For this section, solve each problem and decide which is the best of the choices given.";
		} elseif ($zQuestionNumber == 5) {
			// Sentence completion
			$qInstruction = "Each sentence below has one or two blanks, each blank indicating that something has been omitted. Beneath the sentence are five words or sets of words labeled A through E. Choose the word or set of words that, when inserted in the sentence, best fits the meaning of the sentence as a whole.";
		} elseif ($zQuestionNumber == 9) {
			// Improving sentences
			$qInstruction = "The following sentences test correctness and effectiveness of expression. Part of each sentence or the entire sentence is underlined; beneath each sentence are five ways of phrasing the underlined material. Choice A repeats the original phrasing; the other four choices are different. If you think the original phrasing produces a better sentence than any of the alternatives, select choice A; if not, select one of the other choices.";
		} elseif ($zQuestionNumber == 12) {
			// Identify sentence errors
			$qInstruction = "The following sentences test your ability to recognize grammar and usage errors. Each sentence contains either a single error or no error at all. No sentence contains more than one error. The error, if there is one, is underlined and lettered. If the sentence contains an error, select the one underlined part that must be changed to make the sentence correct. If the sentence is correct, select choice E. In choosing answers, follow the requirements of standard written English.";
		} else {
			$qInstruction == '';
		}
		
		if ( ( $qInstruction != '' ) && ( $qAudit == false ) ) {
			$qRTF .= "{\colortbl;\\red0\green0\blue0;\\red255\green155\blue0;\\red10\green90\blue130;}\n";
			$qRTF .= "\cf2 Instructions for $qType - $qSubtype \n\line";
			$qRTF = $qRTF . "\cf3 $qInstruction \cf1 \n\line\line\line\n";
		}
		
		// Reset $qInstruction
		$qInstruction = '';
		$qRTF .= $qOutput;
		$qRTF .= "\n}";
		
		return $qRTF;
	}
	
	
	// Function for converting alphabet answer to numbers
	public function zButtonCode($answer, $zQuestionNumber) {
		
		if($zQuestionNumber == 15) {
			$zNextQuestionNumber = 0;
		} else {
			$zNextQuestionNumber = $zQuestionNumber + 1;
		}
		
		$zQuestionNumber = sprintf("%02s",   $zQuestionNumber);
		
		$answerVariable 	= "answer" . $zQuestionNumber;
		$answerNextVariable	= "answer" . sprintf("%02s", $zNextQuestionNumber); 
		$correctVariable 	= "correct" . $zQuestionNumber;
		
		$possibleAnswers = array( 'a', 'b', 'c', 'd', 'e' );
		$answerNumber = array_search( strtolower($answer), $possibleAnswers );
		
		$answerPoint = array(-1, -1, -1, -1, -1);
		// Variable variables
		$answerPoint[$answerNumber] = $this->pointCorrect;
		
		$output = "//DON'T CHANGE \n";
		// $output .= "getquestion = $zNextQuestionNumber; \n\n";
		$output .= "getquestion = 0; \n\n";
		// $output .= "getquestion = 0; \n\n";
		
		$output .= "//HAVE TO PUT THE RIGHT ANSWER AFTER ==  \n";
		$output .= "//(" . $this->pointCorrect . " = correct, " . $this->pointNotAnswered . " = not answered, " . $this->pointWrong . " = wrong)  \n";
		

		$output .= "if ( $answerVariable == 1 ) { $correctVariable = $answerPoint[0]; } \n";
		$output .= "elsif ( $answerVariable == 2 ) { $correctVariable = $answerPoint[1]; } \n";
		$output .= "elsif ( $answerVariable == 3 ) { $correctVariable = $answerPoint[2]; } \n";
		$output .= "elsif ( $answerVariable == 4 ) { $correctVariable = $answerPoint[3]; } \n";
		$output .= "elsif ( $answerVariable == 5 ) { $correctVariable = $answerPoint[4]; } \n";
		$output .= "else { $correctVariable = $this->pointNotAnswered; } \n\n";
		
		if($zQuestionNumber != 15) {
			// $output .= "//DON'T MOVE THIS AND DON'T CHANGE IT \n";
			// $output .= $answerNextVariable . " = 0;";
		}
		
		return $output;
	}
	
	// Function for converting alphabet answer to numbers
	public function zAuditQuestionCode($zQuestionNumber, $auditRank) {
		
		$auditRankQuery = $auditRank - 1;
		
		$output = "getquestion == $zQuestionNumber & auditselection > $auditRankQuery";
		
		return $output;
	}
}
	
?>