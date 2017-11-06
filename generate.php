<?php include_once('header.php'); ?>
	
	
	<!-- Functions
	================================================== -->
	<div id="section-generate">
		<div class="container">
			<div class="six columns">
				<h2>
					Generate<br />
					<span class="font-green">Problem Sets</span>
				</h2>
				
				<form id="generateParams" action="generate.php" method="post">
					<label for="numbSets">Number of Sets</label>
					<input type="text" name="numSets" value="8" />
					
					<label for="numMC">Number of Multiple Choice Problems (Math)</label>
					<input type="text" name="numMC" value="4" />
					
					<label for="numSC">Number of Sentence Completions Problems (Reading)</label>
					<input type="text" name="numSC" value="4" />
					
					<label for="numIS">Number of Improving Sentences Problems (Writing)</label>
					<input type="text" name="numIS" value="3" />
					
					<label for="numISE">Number of Identifying Sentence Errors Problems (Writing)</label>
					<input type="text" name="numISE" value="4" />
					
					<input type="submit" class="submit" name="submit" value="Submit" disabled="disabled" />
				</form>
			</div><!-- // .six -->
			
			<div class="ten columns">
				<?php
					if( isset( $_POST["submit"] ) ) {
						$numSets			= $_POST['numSets'];
						$numMC				= $_POST['numMC'];
						$numSC				= $_POST['numSC'];
						$numIS				= $_POST['numIS'];
						$numISE				= $_POST['numISE'];
						
						$emptyQuery = $db->prepare("
							UPDATE questions 
							SET zPeriod = '', zQuestionNumber = ''
						");
						$emptyQuery->execute();
						
						// submit the query and capture the result
						$results = $db->prepare("SELECT * FROM questions");
						$results->execute();
						$dbArray = $results->fetchAll(PDO::FETCH_ASSOC);
						
						$zPeriodCount 				= 1;
						$zQuestionNumberCount		= 1;
						
						$qStats = array();
						
						function shuffle_assoc($list) {
							
							if (!is_array($list)) return $list; 
							$keys = array_keys($list); 
							shuffle($keys); 
							$random = array(); 
							foreach ($keys as $key) { 
								$random[] = $list[$key]; 
							}
							
							return $random; 
						} 
												
						
						foreach ($dbArray as $row) {
											
							$qId				= $row['questionId'];
							$qYear 				= $row['questionYear'];
							$qSection			= $row['questionSection'];
							$qNumber			= $row['questionNumber'];
							$qType				= $row['questionProblemType'];
							$qSubtype			= $row['questionSubtype'];
							$qContent			= $row['questionContent'];
							$qAnswer			= $row['questionAnswer'];
							$qDifficulty		= $row['questionDifficulty'];
							$zPeriod			= $row['zPeriod'];
							$zQuestionNumber	= $row['zQuestionNumber'];
							
							if ( !array_key_exists($qSubtype, $qStats) ) {
								$qStats[$qSubtype] = array();
							} else {
							}
							
							array_push( $qStats[$qSubtype], $qId );
						}
						
						shuffle( $qStats['Multiple Choice']);
						shuffle( $qStats['Sentence Completion']);
						shuffle( $qStats['Improving Sentences']);
						shuffle( $qStats['Identifying Sentence Errors']);
						
						echo "<pre>";
						print_r($qStats);
						echo "</pre>";
						
						$breakMC = $numMC;
						$breakSC = $breakMC + $numSC;
						$breakIS = $breakSC + $numIS;
						$breakISE = $breakIS + $numISE;
						
						$countMC = 0;
						$countSC = 0;
						$countIS = 0;
						$countISE = 0;
						
						$updateSet = array();
						
						for ($zSetCount = 1; $zSetCount <= $numSets; $zSetCount++) {
							
							for ($zProblemCount = 1; $zProblemCount <= $breakISE; $zProblemCount++) {
								if ($zProblemCount <= $breakMC ) {
									echo "Ztree Treatment Set: $zSetCount Question Number: $zProblemCount <br />";
									$update = $qStats['Multiple Choice'][$countMC];
									echo "Question ID: $update (Multiple Choice)";
									$countMC++;
								} elseif ($zProblemCount <= $breakSC) {
									echo "Ztree Treatment Set: $zSetCount Question Number: $zProblemCount <br />";
									$update = $qStats['Sentence Completion'][$countSC];
									echo "Question ID: $update (Sentence Completion)";
									$countSC++;
								} elseif ($zProblemCount <= $breakIS) {
									echo "Ztree Treatment Set: $zSetCount Question Number: $zProblemCount <br />";
									$update = $qStats['Improving Sentences'][$countIS];
									echo "Question ID: $update (Improving Sentences)";
									$countIS++;
								} elseif ($zProblemCount <= $breakISE) {
									echo "Ztree Treatment Set: $zSetCount Question Number: $zProblemCount <br />";
									$update = $qStats['Identifying Sentence Errors'][$countISE];
									echo "Question ID: $update (Identifying Sentence Errors)";
									$countISE++;
								} else {
									echo "Error";
								}
								
								$updateQuery = $db->prepare("
									UPDATE questions 
									SET zPeriod = $zSetCount, zQuestionNumber = $zProblemCount
									WHERE questionId = $update
								");
								$updateQuery->execute();
								
								echo "<br />";
							}
							
							echo "<br /><br />";

						}
						
						

					} else {
						echo "Already generated.";
					}
				?>
			</div><!-- // .ten -->
			
			<br class="clear" />
		</div><!-- // .container -->
	</div><!-- // #section-generate -->

<?php include_once('footer.php'); ?>
