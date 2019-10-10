<?php $jsonObject	=	json_decode($_POST['jsonData']); ?>
<?php
	if (isset($_GET['hideNA']) && $_GET['hideNA'] == "yes") {
		$hideNA	=	TRUE;
	} else {
		$hideNA	=	FALSE;
	}
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
											<?php echo $jsonObject->individual->name; ?>
										</td>
									</tr>
									<tr>
										<td>
											Address
										</td>
										<td>
											<?php echo $jsonObject->individual->address; ?>
										</td>
									</tr>
									<tr>
										<td>
											Reference No
										</td>
										<td>
											<?php echo $jsonObject->individual->reference; ?>
										</td>
									</tr>
									<tr>
										<td>
											Telephone
										</td>
										<td>
											<?php echo $jsonObject->individual->telephone; ?>
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
									<?php $incomeTotalWeekly	=	0; ?>
									<?php $incomeTotalMonthly	=	0; ?>
									<?php foreach ($jsonObject->income as $incomeObject) { ?>
									<?php if ($incomeObject->recurrence == "not_applicable") { continue; } ?>
									<tr>
										<td>
											<?php echo $incomeObject->formatted_key; ?>
										</td>
										<td>
											£<?php echo number_format($incomeObject->amount, 2, ".", ","); ?>
										</td>
										<td>
											<?php echo ucfirst($incomeObject->recurrence); ?>
										</td>
									</tr>
									<?php
										if ($incomeObject->recurrence == "weekly") { $incomeTotalWeekly += $incomeObject->amount; }
										if ($incomeObject->recurrence == "monthly") { $incomeTotalMonthly += $incomeObject->amount; }
									?>
									<?php } ?>
								</tbody>
								<?php if ($incomeTotalWeekly > 0 || $incomeTotalMonthly > 0) { ?>
								<tfoot class="font-weight-bold">
									<tr>
										<td>
											Total weekly
										</td>
										<td colspan="2">
											£<?php echo number_format($incomeTotalWeekly, 2, ".", ","); ?>
										</td>
									</tr>
									<tr>
										<td>
											Total monthly
										</td>
										<td colspan="2">
											£<?php echo number_format($incomeTotalMonthly, 2, ".", ","); ?>
										</td>
									</tr>
									<tr>
										<td>
											Total Monthly (with weekly added @ 4.3 weeks per month)
										</td>
										<td colspan="2">
											<?php
												$incomeTotalWeeklyMultiplied	=	($incomeTotalWeekly * 4.3);
												$incomeTotal					=	$incomeTotalMonthly + $incomeTotalWeeklyMultiplied;
												echo "£" .  number_format($incomeTotal, 2, ".", ",");
											?>
										</td>
									</tr>
								</tfoot>
								<?php } ?>
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
									<?php $expenditureTotalWeekly	=	0; ?>
									<?php $expenditureTotalMonthly	=	0; ?>
									<?php foreach ($jsonObject->expenditure as $expenditureObject) { ?>
									<?php if ($expenditureObject->recurrence == "not_applicable") { continue; } ?>
									<tr>
										<td>
											<?php echo $expenditureObject->formatted_key; ?>
										</td>
										<td>
											£<?php echo number_format($expenditureObject->amount, 2, ".", ","); ?>
										</td>
										<td>
											<?php echo ucfirst($expenditureObject->recurrence); ?>
										</td>
									</tr>
									<?php
										if ($expenditureObject->recurrence == "weekly") { $expenditureTotalWeekly += $expenditureObject->amount; }
										if ($expenditureObject->recurrence == "monthly") { $expenditureTotalMonthly += $expenditureObject->amount; }
									?>
									<?php } ?>
								</tbody>
								<?php if ($expenditureTotalWeekly > 0 || $expenditureTotalMonthly > 0) { ?>
								<tfoot class="font-weight-bold">
									<tr>
										<td>
											Total weekly
										</td>
										<td colspan="2">
											£<?php echo number_format($expenditureTotalWeekly, 2, ".", ","); ?>
										</td>
									</tr>
									<tr>
										<td>
											Total monthly
										</td>
										<td colspan="2">
											£<?php echo number_format($expenditureTotalMonthly, 2, ".", ","); ?>
										</td>
									</tr>
									<tr>
										<td>
											Total Monthly (with weekly added @ 4.3 weeks per month)
										</td>
										<td colspan="2">
											<?php
												$expenditureTotalWeeklyMultiplied	=	($expenditureTotalWeekly * 4.3);
												$expenditureTotal					=	$expenditureTotalMonthly + $expenditureTotalWeeklyMultiplied;
												echo "£" .  number_format($expenditureTotal, 2, ".", ",");
											?>
										</td>
									</tr>
								</tfoot>
								<?php } ?>
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
									<?php $priorityDebtValue	=	0; ?>
									<?php $priorityDebtArrears	=	0; ?>
									<?php if (isset($jsonObject->priority_debt) && (count($jsonObject->priority_debt) > 0)) { ?>
										<?php foreach ($jsonObject->priority_debt as $priorityDebtObject) { ?>
										<tr>
											<td>
												<?php echo $priorityDebtObject->owed_to; ?>
											</td>
											<td>
												£<?php echo number_format($priorityDebtObject->amount_owed, 2, ".", ","); ?>
												<?php $priorityDebtValue	+=	$priorityDebtObject->amount_owed; ?>
											</td>
											<td>
												£<?php echo number_format($priorityDebtObject->arrears, 2, ".", ","); ?>
												<?php $priorityDebtArrears	+=	$priorityDebtObject->arrears; ?>
											</td>
											<td>
												<?php echo $priorityDebtObject->agreed_payments; ?>
											</td>
										</tr>
										<?php } ?>
									<?php } else { ?>
										<tr>
											<td colspan="4" align="center">
												<h5>None owed</h5>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<?php if ($priorityDebtValue > 0 || $priorityDebtArrears > 0) { ?>
								<tfoot class="font-weight-bold">
									<tr>
										<td>
											Totals
										</td>
										<td>
											£<?php echo number_format($priorityDebtValue, 2, ".", ","); ?>
										</td>
										<td>
											£<?php echo number_format($priorityDebtArrears, 2, ".", ","); ?>
										</td>
										<td>
										</td>
									</tr>
								</tfoot>
								<?php } ?>
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
									<?php $creditCommitmentsValue	=	0; ?>
									<?php $creditCommitmentsArrears	=	0; ?>
									<?php if (isset($jsonObject->credit_commitments) && (count($jsonObject->credit_commitments) > 0)) { ?>
										<?php foreach ($jsonObject->credit_commitments as $creditCommitmentObject) { ?>
										<tr>
											<td>
												<?php echo $creditCommitmentObject->owed_to; ?>
											</td>
											<td>
												£<?php echo number_format($creditCommitmentObject->amount_owed, 2, ".", ","); ?>
												<?php $creditCommitmentsValue	+=	$creditCommitmentObject->amount_owed; ?>
											</td>
											<td>
												£<?php echo number_format($creditCommitmentObject->arrears, 2, ".", ","); ?>
												<?php $creditCommitmentsArrears	+=	$creditCommitmentObject->arrears; ?>
											</td>
											<td>
												<?php echo $creditCommitmentObject->agreed_payments; ?>
											</td>
										</tr>
										<?php } ?>
									<?php } else { ?>
										<tr>
											<td colspan="4" align="center">
												<h5>None owed</h5>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<?php if ($creditCommitmentsValue > 0 || $creditCommitmentsArrears > 0) { ?>
								<tfoot class="font-weight-bold">
									<tr>
										<td>
											Totals
										</td>
										<td>
											£<?php echo number_format($creditCommitmentsValue, 2, ".", ","); ?>
										</td>
										<td>
											£<?php echo number_format($creditCommitmentsArrears, 2, ".", ","); ?>
										</td>
										<td>
										</td>
									</tr>
								</tfoot>
								<?php } ?>
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
									<?php $savingsTotal	=	0; ?>
									<?php foreach ($jsonObject->savings as $savingObject) { ?>
									<tr>
										<td>
											<?php echo $savingObject->formatted_key; ?>
										</td>
										<td>
											£<?php echo number_format($savingObject->amount, 2, ".", ","); ?>
										</td>
									</tr>
									<?php $savingsTotal	+=	$savingObject->amount; ?>
									<?php } ?>
								</tbody>
								<?php if ($savingsTotal > 0) { ?>
								<tfoot class="font-weight-bold">
									<tr>
										<td>
											Total Savings
										</td>
										<td>
											£<?php echo number_format($savingsTotal, 2, ".", ","); ?>
										</td>
									</tr>
								</tfoot>
								<?php } ?>
							</table>
						</div>
						<hr />
						<h4>Notes</h4>
						<p><?php echo $jsonObject->notes; ?></p>
						<hr />
						<h3>Don't forget</h3>
						<p>Many councils require evidence of income and expenditure such as Electric Bill, Gas Bill, Debt Recovery letters, bank statements, etc.</p>
						<br />
						<button class="btn btn-info d-print-none" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
					</div>
				</div>
			</form>
		</div>
		<?php include_once(__DIR__ . "/includes/corejs.php"); ?>
	</body>
</html>