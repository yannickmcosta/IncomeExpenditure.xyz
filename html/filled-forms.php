<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>Your Filled Forms | IncomeExpenditure.xyz</title>
		<meta property="og:title" content="Home | IncomeExpenditure.xyz" />
		<meta property="og:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them (from a council...) with no editable regions." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://incomeexpenditure.xyz" />
		<meta property="og:image" content="" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5 mb-5">
			<h1 class="mb-10">Your filled forms</h1>
			<small>Viewable ONLY by you. This data is stored on your device, not the servers.</small>
			<hr />
			<div class="row mt-8 mb-8">
				<div class="col-md-12">
					<p id="keys"></p>
					<hr />
					<button class="btn btn-danger" id="clearLocalStorageButton" data-toggle="modal" data-target="#clearLocalStorageModal">Clear LocalStorage</button>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
		<script>
			$( document ).ready(function() {
				if (localStorage.length > 0) {
					$( "#clearLocalStorageButton" ).show();
					for ( var i = 0, len = localStorage.length; i < len; ++i ) {
						$( "#keys" ).append( "<a href=\"generate-filled-form?formID=" + localStorage.key( i ) + "\"><i class=\"fa fa-eye\"></i> " + localStorage.key( i ) + "</a><br />" );
					}
				} else {
					$( "#clearLocalStorageButton" ).hide();
					$( "#keys" ).append( "There's no data currently stored in the browsers localStorage for this domain. Fill out a form then head back here.<br />" );
				}
			});
		</script>
		<script>
			function clearLocalStorage() {
				localStorage.clear()
				$( '#clearLocalStorageModal' ).modal( 'hide' );
				alert('LocalStorage has been cleared.');
				$( "#clearLocalStorageButton" ).hide();
				$( "#keys" ).html( "There's no data currently stored in the browsers localStorage for this domain. Fill out a form then head back here.<br />" );
			}
		</script>
	</body>
</html>