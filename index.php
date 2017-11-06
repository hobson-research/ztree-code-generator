<?php include_once('header.php'); ?>
	
	
	<!-- Functions
	================================================== -->
	<div id="section-functions">
		<div class="container">
			<div class="eight columns">
				<p class="desc">The questionnaires are from the "Official SAT Practice Test" provided by <a href="http://www.collegeboard.org/" title="Collegeboard">Collegeboard</a>. 
				</p><!-- // p.desc -->
			</div><!-- // .ten -->
			
			<div class="seven offset-by-one columns">
				<h4>Downloads</h4>
				<a href="downloads/Official_SAT_Practice_Test_2011-12.pdf">Official_SAT_Practice_Test_2011-12.pdf</a>
				<a href="downloads/Official_SAT_Practice_Test_2011-12_scoring.pdf">Official_SAT_Practice_Test_2011-12_scoring.pdf</a>
				<a href="downloads/Official_SAT_Practice_Test_2012-13.pdf">Official_SAT_Practice_Test_2012-13.pdf</a>
				<a href="downloads/Official_SAT_Practice_Test_2012-13_scoring.pdf">Official_SAT_Practice_Test_2012-13_scoring.pdf</a>
			</div><!-- // .five -->
			
			<br class="clear" />
			
			<div class="sixteen columns">
				<table id="questions">
					<thead>
						<tr>
							<td>Year</td>
							<td>Section</td>
							<td>Number</td>
							<td>Problem Type</td>
							<td>Subtype</td>
							<td>Question</td>
							<td>Answer</td>
							<td>Difficulty</td>
						</tr>
					</thead>
					
					<tbody>
						<?php
							// submit the query and capture the result
							$results = $db->prepare("SELECT * FROM questions");
							$results->execute();
							$dbArray = $results->fetchAll();
							
							// find out how many records were retrieved
							$numRows = $results->rowCount(); 
	
							$totalDifficulty = 0;
							$qStats = Array();
							
							foreach ($dbArray as $row) {
								
								$qYear 			= $row['questionYear'];
								$qSection		= $row['questionSection'];
								$qNumber		= $row['questionNumber'];
								$qType			= $row['questionProblemType'];
								$qSubtype		= $row['questionSubtype'];
								$qContent		= $row['questionContent'];
								$qAnswer		= $row['questionAnswer'];
								$qDifficulty	= $row['questionDifficulty'];
								
								// Individual subtypes count
								if ( !array_key_exists($qType, $qStats) ) {
									$qStats[$qType][Count] = 1;
									$qStats[$qType][Difficulty] = $qDifficulty;
								} else {
									$qStats[$qType][Count] += 1;
									$qStats[$qType][Difficulty] += $qDifficulty;
								}
								
								$qStats[$qType][AverageDifficulty] = $qStats[$qType][Difficulty] / $qStats[$qType][Count];
								
								
								if ( !array_key_exists($qSubtype, $qStats[$qType]) ) {
									$qStats[$qType][$qSubtype][Count] = 1;
									$qStats[$qType][$qSubtype][Difficulty] += $qDifficulty;
								} else {
									$qStats[$qType][$qSubtype][Count] += 1;
									$qStats[$qType][$qSubtype][Difficulty] += $qDifficulty;
								}
								
								$qStats[$qType][$qSubtype][AverageDifficulty] =	$qStats[$qType][$qSubtype][Difficulty] / $qStats[$qType][$qSubtype][Count];
							
						?>
						<tr>
							<td><?php echo $qYear; ?></td>
							<td><?php echo $qSection; ?></td>
							<td><?php echo $qNumber; ?></td>
							<td><?php echo $qType; ?></td>
							<td><?php echo $qSubtype; ?></td>
							<td class="question"><?php echo $qContent; ?></td>
							<td><?php echo $qAnswer; ?></td>
							<td><?php echo $qDifficulty; ?></td>
						</tr>
						<?php 
							$totalDifficulty += $qDifficulty;
							$averageDifficulty = $totalDifficulty / $numRows;
							}
						?>
					</tbody>
				</table>
				
				<br class="clear" />
				
			</div><!-- // .sixteen -->
			
		</div><!-- // .container -->
	</div><!-- // #section-functions -->
	
	<div id="section-stats">
		<div class="container">
			<div class="sixteen columns">
				<h3>Questions Summary/Statistics</h3>
					
				<div class="eight columns alpha">
					<p class="box-stats">There are a total of <strong><?php echo $numRows; ?></strong> questions.</p>
				</div><!-- // .eight -->
				
				<div class="eight columns omega">
					<p class="box-stats">Average question difficulty = <strong><?php echo sprintf("%01.2f", $averageDifficulty); ?></strong></p>
				</div><!-- // .eight -->
				
				<br class="clear" />
				
				<div class="sixteen columns alpha omega">
					<p class="box-stats" style="margin-top: 30px;">
						<?php 
						echo '<pre>';
						print_r($qStats); 
						echo '</pre>';
						?>
					</p>
				</div>
			</div><!-- // .sixteen -->
		</div><!-- // .container -->
	</div><!-- // #section-stats -->
	
	
<?php include_once('footer.php'); ?>
