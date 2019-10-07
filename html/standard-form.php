<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>The Standard Form | IncomeExpenditure.xyz</title>
		<meta property="og:title" content="Home | IncomeExpenditure.xyz" />
		<meta property="og:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them (from a council...) with no editable regions." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://incomeexpenditure.xyz" />
		<meta property="og:image" content="" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5 mb-5">
			<h1 class="mb-10">The Standard Form</h1>
			<small>A dynamic, interactive, form, created because the councils can't be arsed.</small>
			<hr />
			<div class="row mt-8 mb-8">
				<div class="col-md">
					<h3>Income and Expenditure Financial Statement Generator</h3>
					<br />
					<div align="center">
						<a href="housing-financial-statement" class="btn btn-success btn-lg"><i class="fa fa-edit fa-fw"></i> Begin</a>
					</div>
				</div>
				<div class="col-md">
					<h3>Where is the data stored from this form when I'm done?</h3>
					<p>Once you submit the form, the data will be stored in your browser as a cookie. That way, this data is never stored on the server, and is stored on your device. If you clear your cookies, or have them disabled however, then this will not work.</p>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>