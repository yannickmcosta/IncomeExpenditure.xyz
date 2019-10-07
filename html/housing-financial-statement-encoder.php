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
			<h1 class="mb-10">Form Completed</h1>
			<small>Viewable ONLY by you. This data is stored on your device, not the servers.</small>
			<hr />
			<div class="row mt-8 mb-8">
				<div class="col-md-12">
				<p>Your filled form has been successfully encoded, and it has been stored in your browser with key <code><?php echo "formfill-the-standard-form-" . date("U"); ?></code>.</p>
				<p>You can also see your data represented below in JSON format, if you like, you can copy/paste this into your notes for safe-keeping, then paste it into our parser.</p>
				<br />
				<button class="btn btn-info" data-clipboard-target="#jsonData"><i class="fas fa-clipboard fa-fw"></i> Copy to clipboard</button>
				<br />
				<hr />
				<h3>Formatted JSON</h3>
<pre>
<?php echo json_encode($_POST, JSON_PRETTY_PRINT); ?>
</pre>
				<hr />
				<h3>Unformatted JSON</h3>
				<code id="jsonData">
					<?php echo json_encode($_POST); ?>
				</code>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
		<script>
			var	formFill	=	<?php echo json_encode($_POST); ?>;
			localStorage.setItem('<?php echo "formfill-the-standard-form-" . date("U"); ?>', JSON.stringify(formFill));
		</script>
		<script>
			new ClipboardJS('.btn');
		</script>
	</body>
</html>