<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
		<title>Home | IncomeExpenditure.xyz</title>
		<meta property="og:title" content="Home | IncomeExpenditure.xyz" />
		<meta property="og:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them (from a council...) with no editable regions." />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="https://incomeexpenditure.xyz" />
		<meta property="og:image" content="" />
		<meta name="twitter:card" content="summary" />
	    <meta name="twitter:title" content="Home | IncomeExpenditure.xyz" />
	    <meta name="twitter:description" content="A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them (from a council...) with no editable regions." />
	    <meta name="twitter:url" content="https://incomeexpenditure.xyz/" />
	    <meta name="twitter:site" content="@yannickmcosta" />
	</head>
	<body>
		<?php include_once(__DIR__ . "/includes/navigation.php"); ?>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md">
					<h1 class="display-4">IncomeExpenditure.xyz</h1>
					<p class="lead">A website made in minutes for filling out Income and Expenditure Financial Statements, born out of a requirement for a family member to fill in a form emailed to them (from a council...) with no editable regions.</p>
					<hr />
					<p>Welcome, this has been created by Yannick McCabe-Costa to assist people who have limited access to technology, or who have received an email similar to one a family member received from Cheshire Home Choice (Cheshire East Council) with a "form" that needs filling out. Of course, it's not an <strong>interactive form</strong>, HEAVEN FORBID. It's a f**king email table, with no editable regions, but <em>my god if you don't fill it out there will be hell to pay.</em></p>
					<p>So no need to go grab your pen and tip-ex and start scribbling all over your computer screen, this is 2019, and this lovely thing called i&nbsp;n&nbsp;t&nbsp;e&nbsp;r&nbsp;a&nbsp;c&nbsp;t&nbsp;i&nbsp;v&nbsp;e dynamic pages exist, don't they Cheshire East? Useless...</p>
					<p>Anyway, you are more than welcome to use this as much as you like, but it's provided without warranty, like any good piece of open source software.</p>
				</div>
			</div>
		</div>
		<div class="container">
			<hr />
			<div class="row">
				<div class="col-md">
					<h3>
						<a href="standard-form"><i class="far fa-edit fa-fw"></i> The Standard Form</a>
					</h3>
					<p>The first form made, based on one received from Cheshire Home Choice</p>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md">
					<h4><i class="fa fa-exclamation-triangle fa-fw text-danger"></i> An important note on data</h4>
					<p>This site has been designed to help people with filling in specific hosted forms; now, the forms that are hosted ask about a <strong>lot</strong> of personal data. To be clear from the beginning, <strong>absolutely no data is stored on the servers this site is hosted on.</strong> You can review the source code of this site for yourself, it's hosted on a public Github repo. Whilst the data is transmitted <em>to</em> the servers, <strong>none is stored,</strong> it's transmitted to the server to be parsed, encoded and then stored in a browser storage system called <code>localStorage</code>, <strong>on your device</strong>. Why? Because this site was made in a very short space of time, I'm a PHP Developer and I don't know JavaScript well enough for AJAX Manipulation to make any use of it. PHP is my language, and it lets me rapidly develop things.</p>
				</div>
			</div>
			<?php include_once(__DIR__ . "/includes/footer.php"); ?>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>
