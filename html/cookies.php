<?php
	require(__DIR__ . "/config/config.php");
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>Cookie Policy | Yannick McCabe-Costa</title>
		<meta name="description" content="Mmmm... cookies. Not those sort, the ones that are files on your computer.">
		<meta property="og:title" content="Cookie Policy | Yannick McCabe-Costa" />
		<meta property="og:description" content="Mmmm... cookies. Not those sort, the ones that are files on your computer." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://mccabecosta.com/cookies" />
		<meta property="og:image" content="https://mccabecosta.com/assets/images/yan-profile.jpg" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5 mb-5">
			<h1 class="mb-10">Cookie Policy</h1>
			<small>Mmmm... cookie 🍪</small>
			<hr />
			<div class="row mt-8">
				<div class="col-md-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Cookie Identifier</th>
								<th>What it’s for</th>
								<th>Valid for</th>
								<th>Other notes</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><code>__cfduid</code></td>
								<td>This is a Cloudflare Cookie and is used to identify individual clients behind a shared IP address and apply security settings on a per-client basis.</td>
								<td>6 months</td>
								<td>Further information can be found on the <a href="https://support.cloudflare.com/hc/en-us/articles/200170156-What-does-the-Cloudflare-cfduid-cookie-do-">Cloudflare Website</a></td>
							</tr>
							<?php /*
							<tr>
								<td><code>_ga</code></td>
								<td>This is a Google Analytics cookie and is used to identify unique users.</td>
								<td>2 years</td>
								<td>Further information can be found on the <a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookies-user-id">Google Analytics Website</a></td>
							</tr>
							<tr>
								<td><code>_gid</code></td>
								<td>This is a Google Analytics cookie and is used to identify unique users.</td>
								<td>24 hours</td>
								<td>Further information can be found on the <a href="https://developers.google.com/analytics/devguides/collection/analyticsjs/cookies-user-id">Google Analytics Website</a></td>
							</tr>
							*/ ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>