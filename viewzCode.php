<?php include_once('header.php'); ?>

<?php
	
	// Get zPeriod variable from URL
	$zPeriodQuery = $_GET["zPeriod"];
		
	// find out how many records were retrieved
	$numRows = count($results); 
	
	$sql = "SELECT * FROM questions";
	
	if (isset($zPeriodQuery)) {
		$sql .= ' WHERE zPeriod=' . $zPeriodQuery . ' ORDER BY zQuestionNumber';
	} else {
		$sql .= ' ORDER BY zPeriod';
	}
	
	// submit the query and capture the result
	$results = $db->run($sql);
	
?>

	<!-- Functions
	================================================== -->
	<div id="section-zCode">
		<div class="container">
			
			<div class="sixteen columns">
				<h2>
					<span class='font-green'>Questions</span><br />
					<?php 
						if( isset($zPeriodQuery) ) {
							echo "Period #$zPeriodQuery";
						} else {
							echo "All Periods";
						}
					?>
					
				</h2>
				<br class="clear" />
			</div>
			
			
			<?php 			
				for ($i = 1; $i <= 8; $i++) {
					echo "<div class='four columns'><div class='box-zPeriod'><a href='viewzCode.php?zPeriod=$i' title='Period $i'><span class='label'>Period</span> <span class='number'>$i</span></a></div></div>";
				}
			?>
			
			<br class="clear" />
			
			<div class="sixteen columns">
				
				<?php
				
					foreach ($results as $row) { 
					
					// Set variables for filtering
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
					
				?>
				
				<div class="question">
					<div class="four columns alpha">
						<div class="box-ztreeInfo">
							<?php if( isset($zPeriod) ) { ?>
								<div class="info-ztreePeriod">
									<span class="label">Period</span>
									<span class="number"><?php echo $zPeriod ?></span>
									<span class="slash">/</span>
								</div><!-- // .info-ztreePeriod -->
								
								<div class="info-ztreeNumber">
									<span class="label">Question</span>
									<span class="number"><?php echo $zQuestionNumber ?></span>
								</div><!-- // .info-ztreeNumber -->
							<?php } else { ?>
								<div class="info-ztreePeriod">
									Not in the sets
								</div><!-- // .box-ztreePeriod -->
							<?php } ?>
						</div><!-- // .ztreeInfo -->
					</div><!-- // .four -->
					
					<div class="four columns">
						<div class="info-qYear">
							<span class="label">Year</span>
							<?php echo $qYear; ?><br />
						</div><!-- // .info-qYear -->
					</div><!-- // .four -->
					
					<div class="four columns">
						<div class="info-qSection">
							<span class="label">Section</span>
							<?php echo $qSection ?><br />
						</div><!-- // .info-qSection -->
					</div><!-- // .four -->
					
					<div class="four columns omega">
						<div class="info-qNumber">
							<span class="label">Number</span>
							<?php echo $qNumber ?><br />
						</div><!-- // .info-qNumber -->
					</div><!-- // .four -->
					
					<br class="clear" />
					
					<div class="eight columns alpha">
						<div class="wrap-textarea-left">
							<label>Question (<?php echo $qType . " - " . $qSubtype; ?>)</label><br />
							<textarea class="selectAll" rows="10" cols="40"><?php echo $zOutput->zQuestionCode($qContent, $qType, $qSubtype, $zQuestionNumber); ?></textarea>
						</div><!-- .wrap-textarea-left -->
					</div><!-- // .six -->
					
					<div class="eight columns omega">
						<div class="wrap-textarea-right">
							<label>Answer</label> (<?php echo $qAnswer; ?>)<br />
							<textarea class="selectAll" rows="10" cols="40"><?php echo $zOutput->zButtonCode($qAnswer, $zQuestionNumber); ?></textarea>
						</div><!-- .wrap-textarea-right -->
					</div><!-- // .six -->
					
					<br class="clear" />
				</div><!-- // div.questions-->
				
				<?php } ?>
				
			</div><!-- // .sixteen -->
			
		</div><!-- // .container -->
	</div><!-- // #section-zCode -->
	

<?php include_once('footer.php'); ?>