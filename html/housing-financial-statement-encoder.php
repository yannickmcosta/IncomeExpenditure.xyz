<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
	</head>
	<body>
		<div class="container mt-5 mb-5">
			<div class="row mt-8">
				<div class="col-md-12">
<script>
	var	formFill	=	<?php echo json_encode($_POST); ?>;
	localStorage.setItem('<?php echo "formfill-the-standard-form-" . date("U"); ?>', JSON.stringify(formFill));
</script>
<pre>
<?php echo json_encode($_POST, JSON_PRETTY_PRINT); ?>
</pre>
				</div>
			</div>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>