<?php
	if (!isset($_GET['priority_debts']) || is_null($_GET['priority_debts']) || !is_numeric($_GET['priority_debts'])) {
		$priorityDebts			=	1;
	} else {
		$priorityDebts			=	filter_var($_GET['priority_debts'], FILTER_SANITIZE_NUMBER_INT);
	}
	
	if (!isset($_GET['credit_commitments']) || is_null($_GET['credit_commitments']) || !is_numeric($_GET['credit_commitments'])) {
		$creditCommitments			=	1;
	} else {
		$creditCommitments			=	filter_var($_GET['credit_commitments'], FILTER_SANITIZE_NUMBER_INT);
	}

	$incomeArray	=	[
		"Wages"									=>	"wages",
		"Other Earned Income/State Pension"		=>	"2nd_earnedincome_state_pension",
		"Child Benefit/Occupational Pensions"	=>	"child_benefit_state_pension",
		"Working Tax Credit/Att Allowance"		=>	"working_tax_credit_att_allowance",
		"Childrens Tax Credit/Carers Allowance"	=>	"childrens_tax_credit_carers_allowance",
		"DLA Mobility Rate"						=>	"dla_mobility_rate",
		"Incapacity Benefit/DLA Carer Rate"		=>	"incapacity_benefit_dla_carer_rate",
		"Council Tax Support"					=>	"council_tax_support",
		"Housing Benefit"						=>	"housing_benefit",
		"Other Income"							=>	"other_income",
	];

	$expenditureArray 	=	[
		"Rent / Mortgage"									=>	"rent_mortgage",
		"Secure Loan"										=>	"secure_loan",
		"Council Tax"										=>	"countil_tax",
		"House Insurances"									=>	"house_insurance",
		"Life Assurance"									=>	"life_assurance",
		"Water Rates"										=>	"water_rates",
		"Electricity"										=>	"electricity",
		"Gas"												=>	"gas",
		"Telephone"											=>	"telephone",
		"TV Licence"										=>	"tv_license",
		"Broadband / Internet / TV package"					=>	"broadband_internet_tvpackage",
		"Mobile phone"										=>	"mobile_phone",
		"Car Tax"											=>	"car_tax",
		"Car Insurance"										=>	"car_insurance",
		"Travel (Rail / Bus / Petrol)"						=>	"travel_rail_bus_petrol",
		"Other travel costs (eg. MOT, recovery)"			=>	"other_travel_costs",
		"Housekeeping (inc. food, cleaning, toiletries)"	=>	"housekeeping",
		"Clothing"											=>	"clothing",
		"School meals / childcare (Any clubs etc.)"			=>	"school_meals_childcare_clubs",
		"County Court Judgements / Fines"					=>	"ccj_fines",
		"Maintenance / Child Support"						=>	"maintenance_child_support",
		"Other expenditure"									=>	"other_expenditure",
		"Server Hosting:"									=>	"server_hosting_other"
		"Server Hosting: Hetzner"							=>	"server_hosting_hetzner",
		"Server Hosting: Linode"							=>	"server_hosting_linode",
		"Server Hosting: Digital Ocean"						=>	"server_hosting_digitalocean",
		"Server Hosting: OVH"								=>	"server_hosting_ovh",
		"Subscription Services"								=>	"subscription_services_other",
		"Subscription: Netflix"								=>	"subscription_netflix",
		"Subscription: Amazon Prime"						=>	"subscription_amazon_prime",
		"Subscription: Plex"								=>	"subscription_plex",
		"Subscription: Quickbooks"							=>	"subscription_quickbooks",
		"Subscription: GSuite"								=>	"subscription_gsuite",
		
		
	];
	
	sort($incomeArray);
	sort($expenditureArray);
	
	$savingsArray	=	[
		"Value of property owned"	=>	"value_of_property_owned",
		"Savings accounts"			=>	"savings_accounts",
		"ISA"						=>	"isa",
		"Bonds"						=>	"bonds",
	];
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include_once(__DIR__ . "/includes/head.php"); ?>
	</head>
	<body>
		<div class="container mt-5 mb-5">
			<form action="housing-financial-statement-encoder" method="post">
				<div class="row mt-8">
					<div class="col-md-12">
						<h4>Financial Statement</h4>
						<div class="table-responsive" id="personal-data-form">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td>
											Name
										</td>
										<td>
											<input type="text" class="form-control" alt="Your name" name="individual[name]" placeholder="Ms Jane Smith" required="required"/>
										</td>
									</tr>
									<tr>
										<td>
											Address
										</td>
										<td>
											<input type="text" class="form-control" alt="Your address" name="individual[address]" placeholder="123 ExWhyZed Lane, County Claire, London, M1 2AB" required="required"/>
										</td>
									</tr>
									<tr>
										<td>
											Reference No
										</td>
										<td>
											<input type="text" class="form-control" alt="Your reference number, should you have one" name="individual[reference]" placeholder="You may not need this"/>
										</td>
									</tr>
									<tr>
										<td>
											Telephone
										</td>
										<td>
											<input type="tel" class="form-control" alt="Your telephone number" name="individual[telephone]" placeholder="+44 1234 567 890"/>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<hr />
						<h4>Income</h4>
						<div class="table-responsive" id="income-form">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th></th>
										<th>Amount</th>
										<th>Monthly/Weekly</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($incomeArray as $key => $value) { ?>
									<tr>
										<td>
											<?php echo $key; ?>
											<input type="hidden" name="income[<?php echo $value; ?>][formatted_key]" value="<?php echo $key; ?>" />
										</td>
										<td>
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text">£</div>
												</div>
												<input class="form-control" alt="Income Category: <?php echo $key; ?>" id="income[<?php echo $value; ?>][amount]" type="number" min="0.00" step="0.01" name="income[<?php echo $value; ?>][amount]" required="required" placeholder="E.g. 0.00" />
											</div>
										</td>
										<td>
											<select class="form-control" alt="Income Category Recurrence: <?php echo $key; ?>" name="income[<?php echo $value; ?>][recurrence]">
												<option disabled="disabled" selected="selected" value="">Please Select...</option>
												<option value="monthly">Monthly</option>
												<option value="weekly">Weekly</option>
												<option value="" disabled="disabled">---</option>
												<option value="not_applicable">N/A</option>
											</select>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<hr />
						<h4>Expenditure (Outgoing Costs)</h4>
						<div class="table-responsive" id="expenditure-form">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th></th>
										<th>Amount</th>
										<th>Monthly/Weekly</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($expenditureArray as $key => $value) { ?>
									<tr>
										<td>
											<?php echo $key; ?>
											<input type="hidden" name="expenditure[<?php echo $value; ?>][formatted_key]" value="<?php echo $key; ?>" />
										</td>
										<td>
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text">£</div>
												</div>
												<input class="form-control" alt="Expenditure Category: <?php echo $key; ?>" id="expenditure[<?php echo $value; ?>][amount]" type="number" min="0.00" step="0.01" name="expenditure[<?php echo $value; ?>][amount]" required="required" placeholder="0.00" />
											</div>
										</td>
										<td>
											<select class="form-control" alt="Expenditure Category Recurrence: <?php echo $key; ?>" name="expenditure[<?php echo $value; ?>][recurrence]">
												<option disabled="disabled" selected="selected" value="">Please Select...</option>
												<option value="monthly">Monthly</option>
												<option value="weekly">Weekly</option>
													<option value="" disabled="disabled">---</option>
												<option value="not_applicable">N/A</option>
											</select>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<hr />
						<h4>Priority Debts (Utilities, rent, mortgage, fines, etc.)</h4>
						<div class="table-responsive" id="priority-debts-form">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Company to whom the debt is owed</th>
										<th>Amount owed</th>
										<th>Arrears</th>
										<th>Agreed payments to address the debt</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($priorityDebts == 0 || is_null($priorityDebts)) { ?>
									<tr>
										<td colspan="4" align="center">
											<h5>None owed</h5>
										</td>
									</tr>
									<?php } else { ?>
										<?php for ($i = 1; $i <= $priorityDebts; ++$i) { ?>
										<tr>
											<td>
												<input type="text" alt="Priority Debt <?php echo $i; ?>, Debtor" class="form-control" name="priority_debt[<?php echo $i; ?>][owed_to]" placeholder="E.g. ABC Bank Ltd" />
											</td>
											<td>
												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<div class="input-group-text">£</div>
													</div>
													<input type="number" alt="Priority Debt <?php echo $i; ?>, Amount Owed" min="0.00" step="0.01" class="form-control" name="priority_debt[<?php echo $i; ?>][amount_owed]" placeholder="0.00" />
												</div>
											</td>
											<td>
												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<div class="input-group-text">£</div>
													</div>
													<input type="number" alt="Priority Debt <?php echo $i; ?>, Arrears" min="0.00" step="0.01" class="form-control" name="priority_debt[<?php echo $i; ?>][arrears]" placeholder="0.00" />
												</div>
											</td>
											<td>
												<input type="text" alt="Priority Debt <?php echo $i; ?>, Agreed Payments" class="form-control" name="priority_debt[<?php echo $i; ?>][agreed_payments]" placeholder="This is a free text box" />
											</td>
										</tr>
										<?php } ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<hr />
						<h4>Credit Commitments (All other cards, catalogues, loans, etc.)</h4>
						<div class="table-responsive" id="credit-commitments-form">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Company to whom the debt is owed</th>
										<th>Amount owed</th>
										<th>Arrears</th>
										<th>Agreed payments to address the debt</th>
									</tr>
								</thead>
								<tbody>
									<?php if ($creditCommitments == 0 || is_null($creditCommitments)) { ?>
									<tr>
										<td colspan="4" align="center">
											<h5>None owed</h5>
										</td>
									</tr>
									<?php } else { ?>
										<?php for ($i = 1; $i <= $creditCommitments; ++$i) { ?>
										<tr>
											<td>
												<input type="text" alt="Credit Commitment <?php echo $i; ?>, Debtor" class="form-control" name="credit_commitments[<?php echo $i; ?>][owed_to]" placeholder="E.g. ABC Bank Ltd" />
											</td>
											<td>
												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<div class="input-group-text">£</div>
													</div>
													<input type="number" alt="Credit Commitment <?php echo $i; ?>, Amount Owed" min="0.00" step="0.01" class="form-control" name="credit_commitments[<?php echo $i; ?>][amount_owed]" placeholder="0.00" />
												</div>
											</td>
											<td>
												<div class="input-group mb-2">
													<div class="input-group-prepend">
														<div class="input-group-text">£</div>
													</div>
													<input type="number" alt="Credit Commitment <?php echo $i; ?>, Arrears" min="0.00" step="0.01" class="form-control" name="credit_commitments[<?php echo $i; ?>][arrears]" placeholder="0.00" />
												</div>
											</td>
											<td>
												<input type="text" alt="Credit Commitment <?php echo $i; ?>, Agreed Payments" class="form-control" name="credit_commitments[<?php echo $i; ?>][agreed_payments]" placeholder="This is a free text box" />
											</td>
										</tr>
										<?php } ?>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<hr />
						<h4>Savings</h4>
						<div class="table-responsive" id="savings-form">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th></th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($savingsArray as $key => $value) { ?>
									<tr>
										<td>
											<?php echo $key; ?>
											<input type="hidden" name="savings[<?php echo $value; ?>][formatted_key]" value="<?php echo $key; ?>" />
										</td>
										<td>
											<div class="input-group mb-2">
												<div class="input-group-prepend">
													<div class="input-group-text">£</div>
												</div>
												<input class="form-control" alt="Savings Category: <?php echo $key; ?>" id="savings[<?php echo $value; ?>][amount]" type="number" min="0.00" step="0.01" name="savings[<?php echo $value; ?>][amount]" required="required" placeholder="0.00" />
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<hr />
						<h4>Notes</h4>
						<p><small>You can include information here that is to be submitted/printed with the rest of this form.</small></p>
						<textarea class="form-control" alt="Additional Notes" maxlength="1024" name="notes"></textarea>
						<hr />
						<h3>Don't forget</h3>
						<p>Many councils require evidence of income and expenditure such as Electric Bill, Gas Bill, Debt Recovery letters, bank statements, etc.</p>
						<br />
						<button type="submit" class="btn btn-success">Submit and encode</button>
					</div>
				</div>
			</form>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>