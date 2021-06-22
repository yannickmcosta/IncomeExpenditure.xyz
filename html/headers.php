<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>Home | IncomeExpenditure.xyz</title>
		<meta property="og:title" content="Home | IncomeExpenditure.xyz" />
		<meta property="og:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them with no editable regions." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://incomeexpenditure.xyz" />
		<meta property="og:image" content="" />
		<meta name="twitter:card" content="summary" />
	    <meta name="twitter:title" content="Home | IncomeExpenditure.xyz" />
	    <meta name="twitter:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them with no editable regions." />
	    <meta name="twitter:url" content="https://incomeexpenditure.xyz/" />
	    <meta name="twitter:site" content="@yannickmcosta" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md">
<pre>
<?php echo json_encode($_SERVER,JSON_PRETTY_PRINT); ?>
</pre>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>
