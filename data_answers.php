<?php include_once('header.php'); ?>
	
	
	<!-- Functions
	================================================== -->
	<div id="section-functions">
		<div class="container">
			<div class="ten columns">
				<h2>DB Table: Questions</h2>
			</div><!-- // .ten -->
			
			<br class="clear" />
			
			<div class="sixteen columns">
				<table id="questions">
					<thead>
						<tr>
							<td>aId</td>
							<td>Year</td>
							<td>Section</td>
							<td>Number</td>
							<td>Problem Type</td>
							<td>Answer</td>
							<td>Difficulty</td>
						</tr>
					</thead>
					
					<tbody>
						<?php
							// submit the query and capture the result
							$results = $db->select("answers");
								
							// find out how many records were retrieved
							$numRows = count($results); 
	
							$totalDifficulty = 0;
							
							foreach ($results as $row) {
							
							$aId			= $row['answerId'];
							$aYear 			= $row['answerYear'];
							$aSection		= $row['answerSection'];
							$aNumber		= $row['answerNumber'];
							$aType			= $row['answerType'];
							$aAnswer		= $row['answerChoice'];
							$aDifficulty	= $row['answerDifficulty'];
						?>
						<tr>
							<td><?php echo $aId; ?></td>
							<td><?php echo $aYear; ?></td>
							<td><?php echo $aSection; ?></td>
							<td><?php echo $aNumber; ?></td>
							<td><?php echo $aType; ?></td>
							<td><?php echo $aAnswer; ?></td>
							<td><?php echo $aDifficulty; ?></td>
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
					<p class="box-stats">Average question difficulty = <strong><?php echo $averageDifficulty; ?></strong></p>
				</div><!-- // .eight -->
				
				<br class="clear" />
			</div><!-- // .sixteen -->
		</div><!-- // .container -->
	</div><!-- // #section-stats -->
	
	
<?php include_once('footer.php'); ?>
