<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-6 bg-white border-bottom box-shadow">
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="/">IncomeExpenditure.xyz</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<?php if ($_SERVER['REQUEST_URI'] == "/") { ?>
					<li class="nav-item active">
						<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
				<?php } ?>
				
				<?php if ($_SERVER['REQUEST_URI'] == "/standard-form") { ?>
					<li class="nav-item active">
						<a class="nav-link" href="/standard-form">The Standard Form <span class="sr-only">(current)</span></a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="/standard-form">The Standard Form</a>
					</li>
				<?php } ?>
				
				<?php if ($_SERVER['REQUEST_URI'] == "/filled-forms") { ?>
					<li class="nav-item active">
						<a class="nav-link" href="/filled-forms">Your Filled Forms <span class="sr-only">(current)</span></a>
					</li>
				<?php } else { ?>
					<li class="nav-item">
						<a class="nav-link" href="/filled-forms">Your Filled Forms</a>
					</li>
				<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="https://mccabecosta.com/incomeexpenditure-xys">Contact</a>
					</li>
				<?php /*
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				*/?>
			</ul>
		</div>
	</nav>
</div>