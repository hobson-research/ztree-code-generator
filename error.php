<?php include_once('header.php'); ?>

	<!-- Functions
	================================================== -->
	<div id="section-zCode">
		<div class="container">
			
			<div class="sixteen columns">
				<h2>Sentence Errors Filter</h2>
				

<?php

	$zOutput = new zOutputHandler;
	
	$set = "

<p>&nbsp;</p>
<p>12.America's first roller coaster ride, which <strong>opened in</strong><br /> A<br /> 1884 at Coney Island, Brooklyn, <strong>and capable of</strong><br /> B<br /> a <strong>top speed</strong><br /> C<br /> of <strong>only</strong><br /> D<br /> six miles per hour.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>13.The inflation rate in that country is <strong>so high that</strong><br /> A<br /> <strong>even with</strong><br /> B<br /> adjusted wages, <strong>most workers</strong><br /> C<br /> <strong>can barely</strong><br /> D<br /> pay for food and shelter.</p>
<p>&nbsp;</p>
<p>14. <strong>Over the past</strong><br /> A<br /> two years, apparel manufacturers <strong>have</strong><br /> B<br /> worked to <strong>meeting</strong><br /> C<br /> the revised federal standards<br /> <strong>for the design</strong><br /> D<br /> of uniforms.</p>
<p>&nbsp;</p>
<p>15.Storing bread in the refrigerator delays <strong>drying</strong><br /> A<br /> and the <br /> growth of mold <strong>but increase</strong><br /> B<br /> the rate <strong>at which</strong><br /> C<br /> the <br /> bread <strong>loses flavor</strong><br /> D<br /> .</p>
<p>&nbsp;</p>
<p>16.According to last week's survey, most voters<br /> <strong>were disappointed by</strong><br /> A<br /> <strong>legislators'</strong><br /> B<br /> inability <strong>working</strong><br /> C<br /> <strong>together on</strong><br /> D<br /> key issues.</p>
<p>&nbsp;</p>
<p>17. <strong>When Marie Curie shared</strong><br /> A<br /> the 1903 Nobel Prize for <br /> Physics <strong>with two other</strong><br /> B<br /> scientists - her husband <br /> Pierre Curie and Henri Becquerel - she <strong>had been</strong><br /> C<br /> the first woman <strong>to win</strong><br /> D<br /> the prize.</p>
<p>&nbsp;</p>
<p>18.Every spring <strong>in rural Vermont</strong><br /> A<br /> the sound of sap<br /> <strong>dripping</strong><br /> B<br /> into galvanized metal buckets <strong>signal</strong><br /> C<br /> the <br /> beginning of the traditional season <strong>for gathering</strong><br /> D<br /> maple syrup.</p>
<p>&nbsp;</p>
<p>19.Those investors <strong>who</strong><br /> A<br /> <strong>sold</strong><br /> B<br /> stocks just before the <br /> stock market crashed in 1929 were <strong>either</strong><br /> C<br /> wise or<br /> <strong>exceptional</strong><br /> D<br /> lucky.</p>
<p>&nbsp;</p>
<p>20.Most of the sediment and nutrients of the <br /> Mississippi River <strong>no longer</strong><br /> A<br /> reach the coastal <br /> wetlands, a phenomenon that has <strong>adversely</strong><br /> B<br /> <strong>affected</strong><br /> C<br /> <strong>the region's</strong><br /> D<br /> ecological balance.</p>
<p>&nbsp;</p>
<p>21.Most major air pollutants cannot be seen, although<br /> large amounts <strong>of them</strong><br /> A<br /> <strong>concentrated in</strong><br /> B<br /> cities <br /> <strong>are visible</strong><br /> C<br /> <strong>as</strong><br /> D<br /> smog.</p>
<p>&nbsp;</p>
<p>22.The light emitted by high-intensity-discharge<br /> car headlights <strong>are</strong><br /> A<br /> very effective <strong>in activating</strong><br /> B<br /> the reflective paints of road markers, <strong>thereby</strong><br /> C<br /> making driving <strong>at night</strong><br /> D<br /> safer.</p>
<p>&nbsp;</p>
<p>23. <strong>During</strong><br /> A<br /> the nineteenth century, Greek mythology <br /> acquired renewed significance <strong>when both</strong><br /> B<br /> poets and <br /> painters <strong>turned to</strong><br /> C<br /> the ancient myths <strong>for</strong><br /> D<br /> subject matter.</p>
<p>&nbsp;</p>
<p>24.The museum <strong>is submitting</strong><br /> A<br /> proposals <strong>to several</strong><br /> B<br /> foundations <strong>in</strong><br /> C<br /> the hope <strong>to gain</strong><br /> D<br /> funds to build<br /> a tropical butterfly conservatory.</p>
<p>&nbsp;</p>
<p>25. <strong>In order</strong><br /> A<br /> for the audience to believe in and <br /> <strong>be engaged by</strong><br /> B<br /> a Shakespearean character, <br /> <strong>they have</strong><br /> C<br /> to come across as a real <strong>person</strong><br /> D<br /> on the stage.</p>
<p>&nbsp;</p>
<p>26. <strong>Most of</strong><br /> A<br /> the <strong>hypotheses that</strong><br /> B<br /> Kepler developed <br /> to explain physical forces were later rejected <strong>as</strong><br /> C<br /> <strong>inconsistent to</strong><br /> D<br /> Newtonian theory.</p>
<p>&nbsp;</p>
<p>27.Lynn Margulis's theory <strong>that</strong><br /> A<br /> evolution is a process <br /> <strong>involving</strong><br /> B<br /> interdependency rather than competition <br /> among organisms <strong>differs</strong><br /> C<br /> dramatically from<br /> <strong>most biologists</strong><br /> D<br />.</p>
<p>&nbsp;</p>
<p>28.The Empire State Building, the Sears Tower, the <br /> Canadian National Tower - each <strong>of these structures</strong><br /> A<br /> <strong>was</strong><br /> B<br /> the <strong>tallest</strong><br /> C<br /> in the world at the time <strong>they were</strong><br /> D<br /> built.</p>
<p>&nbsp;</p>
<p>29.The cost of <strong>safely disposing</strong><br /> A<br /> of the toxic chemicals<br /> <strong>is approximately</strong><br /> B<br /> <strong>five times what</strong><br /> C<br /> the company paid <br /> <strong>to purchase it</strong>.<br /> D<br /></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>12. The country found that its economy <strong>was growing</strong><br /> A<br /> , <strong>more stronger</strong><br /> B<br /> with <strong>an improved</strong><br /> C<br /> outlook and more <br /> opportunities <strong>for training</strong><br /> D<br /> and employment.</p>
<p>&nbsp;</p>
<p>13. The iris, the colored part of the eye, <strong>contains</strong><br /> A<br /> delicate <br /> patterns that <strong>are</strong><br /> B<br /> <strong>unique to</strong><br /> C<br /> each person, offering a <br /> powerful <strong>means of</strong><br /> D<br /> identification.</p>
<p>&nbsp;</p>
<p>14. The <strong>newly elected</strong><br /> A<br /> Prime Minister, <strong>to the dismay</strong><br /> B<br /> of opponents from other parties, <strong>have argued</strong><br /> C<br /> for <br /> <strong>the strict regulation of</strong><br /> D<br /> campaign financing.</p>
<p>&nbsp;</p>
<p>15. Studies <strong>have suggested</strong><br /> A<br /> that eating nuts- almonds in particular-might help to <strong>lower</strong><br /> B<br /> blood cholesterol <br /> levels in humans and <strong>reducing</strong><br /> C<br /> the risk of heart disease <br /> <strong>by protecting</strong><br /> D<br /> the blood vessels.</p>
<p>&nbsp;</p>
<p>16. <strong>In</strong><br /> A<br /> English literature James Boswell is the prime <br /> example of a biographer who, <strong>by ensuring</strong><br /> B<br /> the <br /> immortality <strong>of another</strong><br /> C<br /> author, has achieved <br /> immortality for <strong>himself</strong><br /> D<br />.</p>
<p>&nbsp;</p>
<p>17. Because the garden was <strong>untended</strong><br /> A<br /> , the windows <br /> <strong>had no</strong><br /> B<br /> shutters, and the lawn <strong>overrun</strong><br /> C<br /> by weeds, <br /> people <strong>passing by</strong><br /> D<br /> the old house assumed that <br /> it was unoccupied.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>18. Until recently, most people <strong>entering</strong><br /> A<br /> politics <strong>feel</strong><br /> B<br /> that <br /> loss of privacy was <strong>a fair price</strong><br /> C<br /> to pay <strong>for</strong><br /> D<br /> the chance <br /> to participate in policy making.</p>
<p>&nbsp;</p>
<p>19. <strong>Only by tapping</strong><br /> A<br /> their last reserves of energy <strong>were</strong><br /> B<br /> the <br /> team members able <strong>to salvage</strong><br /> C<br /> <strong>what was beginning</strong><br /> D<br /> to look like a lost cause.</p>
<p>&nbsp;</p>
<p>20. When Doris Lessing published The Golden Notebook<br /> in 1962, <strong>it</strong><br /> A<br /> <strong>instantly established</strong><br /> B<br /> herself <strong>as one</strong><br /> C<br /> of <br /> the <strong>most important</strong><br /> D<br /> literary voices of her generation.</p>
<p>&nbsp;</p>
<p>21. <strong>Not many</strong><br /> A<br /> authors <strong>have described</strong><br /> B<br /> the effects <br /> of environmental pollution <strong>as effective as</strong><br /> C<br /> Rachel Carson, whose work is still <strong>a model for</strong><br /> D<br /> nature writers.</p>
<p>&nbsp;</p>
<p>22. <strong>It was</strong><br /> A<br /> a Chinese American grower who finally <br /> succeeded <strong>with adapting</strong><br /> B<br /> the <strong>now familiar</strong><br /> C<br /> orange tree <strong>to</strong><br /> D<br /> the American climate.</p>
<p>&nbsp;</p>
<p>23. The survey indicated that workers in the United States <br /> <strong>hope</strong><br /> A<br /> that <strong>his or her</strong><br /> B<br /> wages will <strong>keep pace with</strong><br /> C<br /> the <strong>rising</strong><br /> D<br /> cost of living.</p>
<p>&nbsp;</p>
<p>24. In Angkor, Cambodia's ancient city, a <strong>clever</strong><br /> A<br /> designed reservoir, five miles long and one mile wide, <br /> <strong>supplied fish</strong><br /> B<br /> <strong>and</strong><br /> C<br /> helped farmers <strong>to produce</strong><br /> D<br /> three crops of rice annually.</p>
<p>&nbsp;</p>
<p>25. Last summer, when Mary's aunt and uncle <br /> <strong>flew from</strong><br /> A<br /> Turkey to visit their relatives <strong>and tour</strong><br /> B<br /> the United States, Mary invited Sandhya and <strong>I</strong><br /> C<br /> to <br /> her house <strong>to meet</strong><br /> D<br /> them.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>26. <strong>Ongoing</strong><br /> A<br /> research by several scientists <strong>suggest</strong><br /> B<br /> that <br /> regular periods of meditation <strong>reduce</strong><br /> C<br /> blood pressure <br /> and are <strong>likely to</strong><br /> D<br /> contribute to other improvements <br /> in health.</p>
<p>&nbsp;</p>
<p>27. Because the American Indian rodeo includes games <br /> and exhibitions developed <strong>as early as</strong><br /> A<br /> the seventeenth <br /> century, <strong>they predate</strong><br /> B<br /> <strong>by</strong><br /> C<br /> a few hundred years <br /> <strong>the form</strong><br /> D<br /> of rodeo now seen on television.</p>
<p>&nbsp;</p>
<p>28. Five years in <strong>the writing</strong>,<br /> A<br /> her new book is <br /> <strong>both a response</strong><br /> B<br /> to her critics' mistrust <strong>with</strong><br /> C<br /> her earlier findings and <strong>an elaboration</strong><br /> D<br /> of her <br /> original thesis.</p>
<p>&nbsp;</p>
<p>29. <strong>Despite</strong><br /> A<br /> its cultural importance, the Daily Gazette<br /> <strong>lost</strong><br /> B<br /> 70 percent of its subscribers since 1920 and, <br /> by 1955, <strong>was losing</strong><br /> C<br /> <strong>as much as</strong><br /> D<br /> $200,000 a year.</p>
";
	
	
	$answerRange = "/[0-9]{2}\./";
	
	function parseQNumber($input) {
		return "[QuestionBreak]" . "<div style='margin-top: 30px;'>&nbsp;</div>" . $input[0] . "<div></div>";
	}
	
	$count = 0;
	
	function filterAnswer($i) {
		switch ($i) {
			case 1:
				$alphabet = "(A)";
				break;
			case 2:
				$alphabet = "(B)";
				break;
			case 3:
				$alphabet = "(C)";
				break;
			case 4:
				$alphabet = "(D)";
				break;
		}
		
		return $alphabet;
	}
	
	$set = preg_replace_callback($answerRange, 'parseQNumber', $set);

	$setArray = preg_split("#\[QuestionBreak\]#", $set);
	
	foreach($setArray as $key=>$question) {
		
		$answerAlphabet = "#[A-D]<br />#";
		
		$question = preg_replace($answerAlphabet, '', $question);
		
		$question = strip_tags($question, "<strong><div>");
		$question = str_replace("<strong>", "[splitPoint] \ul <span class='underline'><strong>", $question);
		$question = str_replace("</strong>", "</strong></span>\ul0&nbsp;", $question);
		
		// $question = str_replace("<strong>", "[splitPoint] <span class='underline'><strong>", $question);
		// $question = str_replace("</strong>", "</strong></span>", $question);
		
		$qArray = preg_split("/\[splitPoint\]/", $question);
		
		$questionText = '';
		
		foreach($qArray as $i=>$part) {
			$questionText .= filterAnswer($i);
			$questionText .= $part;
		}
		
		$questionText = preg_replace('/\s\s+/', ' ', $questionText);
		$questionText = trim($questionText);
		$questionText = str_replace(' .', '.', $questionText);
		$questionText = trim($questionText);
		$questionText .= "\n\n";
		
		echo $questionText;
		
		// echo $question;
	}

?>


			</div><!-- // .sixteen -->
			
		</div><!-- // .container -->
	</div><!-- // #section-zCode -->
	

<?php include_once('footer.php'); ?>