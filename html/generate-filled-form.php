<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>Generate Filled Form | IncomeExpenditure.xyz</title>
		<meta property="og:title" content="Home | IncomeExpenditure.xyz" />
		<meta property="og:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them (from a council...) with no editable regions." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://incomeexpenditure.xyz" />
		<meta property="og:image" content="" />
		<style>
			pre {outline: 1px solid #ccc; padding: 5px; margin: 5px; }
			.string { color: green; }
			.number { color: darkorange; }
			.boolean { color: blue; }
			.null { color: magenta; }
			.key { color: red; }
		</style>
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5 mb-5">
			<h1 class="mb-10">Your filled forms</h1>
			<small>Viewable ONLY by you. This data is stored on your device, not the servers.</small>
			<hr />
			<div class="row mt-8 mb-8">
				<div class="col-md-12">
					<form action="generate-filled-form-print" method="post">
						<h4>Generate a filled form ready for print or PDF</h4>
						<textarea class="form-control" name="jsonData" id="jsonData"></textarea>
						<p>Above is your retrieved form data, you don't need to change anything above, so you can just press submit.</p>
						<button class="btn btn-success"><i class="fa fa-check"></i> Generate</button>
					</form>
					<hr />
					<h4>Raw JSON Form Data</h4>
					<code id="formdata"></code>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
		<script>
			$( document ).ready(function() {
				$ ( "#jsonData" ).html( localStorage.getItem( getQueryVariable( "formID" ) ) );
				$ ( "#formdata" ).html( localStorage.getItem( getQueryVariable( "formID" ) ) );
			});
			function getQueryVariable(variable) {
				var query = window.location.search.substring(1);
				var vars = query.split("&");
				for (var i=0;i<vars.length;i++) {
					var pair = vars[i].split("=");
					if(pair[0] == variable){return pair[1];}
				}
				return(false);
			}
		</script>
	</body>
</html>