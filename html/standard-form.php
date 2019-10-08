<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>The Standard Form | IncomeExpenditure.xyz</title>
		<meta property="og:title" content="Home | IncomeExpenditure.xyz" />
		<meta property="og:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them with no editable regions." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://incomeexpenditure.xyz" />
		<meta property="og:image" content="" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5 mb-5">
			<h1 class="mb-10">The Standard Form</h1>
			<small>A dynamic, interactive, form, created because the councils haven't.</small>
			<hr />
			<div class="row mt-8 mb-8">
				<div class="col-md">
					<h3>Income and Expenditure Financial Statement Generator</h3>
					<p>Just a couple of questions before we begin.</p>
					<hr />
					<form action="housing-financial-statement" method="get" class="pb-2">
						<label for="priority_debts">How many priority debts (utilities, rent, mortgage, fines, etc) do you have?</label>
						<input type="number" alt="How many priority debts (utilities, rent, mortgage, fines, etc) do you have?" min="0" max="20" step="1" class="form-control mb-3" name="priority_debts" placeholder="E.g. 0" />
						<label for="credit_commitments">How many credit commitments (all other cards, catalogues, loans, etc.) do you have?</label>
						<input type="number" alt="How many credit commitments (all other cards, catalogues, loans, etc.) do you have? " min="0" max="20" step="1" class="form-control mb-3" name="credit_commitments" placeholder="E.g. 0" />
						<button type="submit" class="btn btn-success btn-lg"><i class="fa fa-edit fa-fw"></i> Begin</button>
					</form>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>