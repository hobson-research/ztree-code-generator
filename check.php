<?php include_once('header.php'); ?>

<?php
	// submit the query and capture the result
	$sql = 'SELECT * FROM questions JOIN answers WHERE CONCAT(questionYear, questionSection, questionNumber) = CONCAT(answerYear, answerSection, answerNumber);';
	$results = $db->run($sql);
	
	// find out how many records were retrieved
	$numRows = count($results);
?>


	<!-- Functions
	================================================== -->
	<div id="section-functions">
		<div class="container">
			
			<div class="ten columns">
				<h2><span class="font-green">Answer Check</span></h2>
				
				<p class="desc">To check for errors, two database tables ("<a href="data_questions.php" title="Questions Table">questions</a>", "<a href="data_answers.php" title="Questions Table">answers</a>") are compared based on question year, section, number, and question type. If both the answer and difficulty level match, the "check" cell (on the far right of each row) will display "Match". If not, it will display "Error".
				</p><!-- // p.desc -->
			</div><!-- // .twelve -->
			
			<div class="five offset-by-one columns">
				<h4>Downloads</h4>
				<a href="downloads/AnswersData_20120920.xlsx">AnswersData_20120920.xlsx</a>
			</div><!-- // . eight -->
			
			<br class="clear" />

			<div class="sixteen columns">
				
				<br class="clear" />
				
				<table id="questions" class="check">
					<thead>
						<tr>
							<td>Year</td>
							<td>Section</td>
							<td>Number</td>
							<td>Type</td>
							<td>Answer<br /><span class="lightblue">Question Data</span></td>
							<td>Difficulty Level<br /><span class="lightblue">Question Data</span></td>
							<td>Answer<br /><span class="lightblue">Answer Sheet</span></td>
							<td>Difficulty Level<br /><span class="lightblue">Answer Sheet</span></td>
							<td>Check</td>
						</tr>
					</thead>
					
					<tbody>
						<?php 
							foreach ($results as $row) { 
													
							// Set variables for filtering
							$qYear 			= $row['questionYear'];
							$qSection		= $row['questionSection'];
							$qNumber		= $row['questionNumber'];
							$qType			= $row['questionProblemType'];
							$qSubtype		= $row['questionSubtype'];
							$qContent		= $row['questionContent'];
							$qAnswer		= $row['questionAnswer'];
							$qDifficulty	= $row['questionDifficulty'];
							
							$aYear 			= $row['answerYear'];
							$aSection		= $row['answerSection'];
							$aNumber		= $row['answerNumber'];
							$aType			= $row['answerType'];
							$aAnswer		= $row['answerChoice'];
							$aDifficulty	= $row['answerDifficulty'];
						?>
						<tr>
							<td><?php echo $qYear; ?></td>
							<td><?php echo $qSection; ?></td>
							<td><?php echo $qNumber; ?></td>
							<td><?php echo $qType; ?></td>
							<td class="qAnswer"><?php echo $qAnswer; ?></td>
							<td class="qDifficulty"><?php echo $qDifficulty; ?></td>
							<td class="aAnswer"><?php echo $aAnswer; ?></td>
							<td class="aDifficulty"><?php echo $aDifficulty; ?></td>
							<td class="pending">Pending</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div><!-- // .sixteen -->
			
		</div><!-- // .container -->
	</div><!-- // #section-functions -->


	<div id="section-stats">
		<div class="container">
			<div class="sixteen columns">
				<h3>Error Check Summary/Statistics</h3>
					
				<div class="six columns alpha">
					<p class="box-stats">A total of <strong><?php echo $numRows; ?></strong> questions were compared between two tables.</p>
				</div><!-- // .six -->
				
				<div class="five columns">
					<div class="box-stats">
						<h4>Total number of matches</h4>
						<span id="totalMatch" class="number"></span>
					</div><!-- // .box-stats -->
				</div><!-- // .ten -->
				
				<div class="five columns omega">
					<div class="box-stats">
						<h4>Total number of errors</h4>
						<span id="totalError" class="number"></span>
					</div>
				</div><!-- // .ten -->
				
				
				<br class="clear" />
			</div><!-- // .sixteen -->
		</div><!-- // .container -->
	</div><!-- // #section-stats -->

<?php include_once('footer.php'); ?>