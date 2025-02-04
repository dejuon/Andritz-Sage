<style>
	.input-sm {
		padding: 4px 4px;
	}

	.tabel-info,
	td {
		height: 30px;
		padding: 5px;
		word-wrap: break-word;
	}
</style>
<div class="content-wrapper">
	<section class="content-header">
		<h1>Sales Orders Form</h1>
		<ol class="breadcrumb">
			<li><a href="<?= base_url('') ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#"> Sales Order</a></li>
			<li class="active">Form</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form action="<?= $form_action;
						?>" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<a href="<?= base_url(); ?>salesorder" title="Reset Data" onclick="<?php echo base_url(); ?>" class="btn btn-social btn-flat bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class='fa fa-refresh'></i> Reset Sales Order Form</a>

							<a href="#" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Back to Sales Order List">
								<i class="fa fa-arrow-circle-left "></i>Back to Sales Order List
							</a>
						</div>

						<div class="box-body">
							<div class="row">
								<?php if (!empty(session()->getFlashdata('messagesuccess'))) { ?>
									<div class="alert alert-success">
										<?php echo session()->getFlashdata('messagesuccess'); ?>
									</div>
								<?php } else if (!empty(session()->getFlashdata('messagefailed'))) { ?>
									<div class="alert alert-error">
										<?php echo session()->getFlashdata('messagefailed'); ?>
									</div>
								<?php } ?>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group subtitle_head">
										<label class="text-right"><strong>Select Contract :</strong></label>
									</div>
								</div>
								<div class='col-sm-4'>
									<div class='form-group'>
										<label>Contract </label>
										<div class="input-group <?= ($validation->hasError('ct_no')) ? 'has-error' : ''; ?>">
											<span class="input-group-addon input-sm"><a href="<?= base_url(); ?>salesorder/form_select_contractopen/" data-remote="false" data-toggle="modal" data-target="#modalBox"><i class="fa fa-search"></i></a></span>
											<input type="text" maxlength="10" size="10" class="form-control input-sm required" name="ct_no" id="ct_no" placeholder="Contract Number" value="<?= $ct_no ?>" readonly>
											<span class="help-block"><?= $validation->getError('ct_no'); ?></span>

										</div></input>
									</div>
								</div>
								<div class='col-sm-6'>
									<label>Contract Description </label>
									<input type="text" class="form-control input-sm required" id="ct_desc" name="ct_desc" placeholder="" value="<?= $ct_desc; ?>" readonly />
								</div>

								<div class='col-sm-2'>
									<div class="form-group">
										<label>Sales Person</label>
										<input type="text" class="form-control input-sm required" id="ct_salesperson" name="ct_salesperson" placeholder="" value="<?= $ct_salesperson; ?>" readonly />
									</div>
								</div>

							</div>
							<div class="row">
								<div class='col-sm-2'>
									<label>Customer No. </label>
									<input type="text" class="form-control input-sm required" id="ct_custno" name="ct_custno" placeholder="" value="<?= $ct_custno; ?>" readonly />
								</div>
								<div class='col-sm-2'>
									<label>Customer Email </label>
									<input type="text" class="form-control input-sm required" id="ct_email" name="ct_email" placeholder="" value="<?= $ct_email; ?>" readonly />
								</div>
								<div class='col-sm-8'>
									<label>Customer Name </label>
									<input type="text" class="form-control input-sm required" id="ct_namecust" name="ct_namecust" placeholder="" value="<?= $ct_custname; ?>" readonly />
								</div>

							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group subtitle_head">
										<label class="text-right"><strong>Project :</strong></label>
									</div>
								</div>
								<div class='col-sm-4'>
									<div class='form-group'>
										<label>Project </label>
										<div class="input-group">
											<span class="input-group-addon input-sm"><a href="<?= base_url() . 'salesorder/form_select_project_by_contract/' . $ct_no; ?>/" data-remote="false" data-toggle="modal" data-target="#modalBox"><i class=" fa fa-search"></i></a></span>
											<input type="text" maxlength="10" size="10" class="form-control input-sm required" id="prj_no" name="prj_no" placeholder="Project Number" value="<?= $prj_no; ?>" readonly>
										</div></input>
									</div>
								</div>
								<div class='col-sm-4'>
									<label>Description </label>
									<input type="text" class="form-control input-sm required" id="prj_desc" name="prj_desc" placeholder="" value="<?= $prj_desc; ?>" readonly />
								</div>
								<div class='col-sm-2'>
									<label>PO Customer <code> (auto filled) </code> </label>
									<input type="text" class="form-control input-sm required" id="po_cust" name="po_cust" placeholder="" value="<?= $po_cust; ?>" <?php if ($po_cust == '') {
																																										echo '';
																																									} else {
																																										echo 'readonly';
																																									} ?> />
								</div>
								<div class='col-sm-2'>
									<label>PO Date <code> (auto filled) </code> </label>
									<div class="input-group input-group-sm date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control input-sm required" id="prj_startdate" name="prj_startdate" placeholder="" value="<?= $prj_startdate; ?>" readonly />
									</div>

								</div>

							</div>
							<div class="row">
								<div class='col-sm-2'>
									<label>CRM Number<code> (manual input)) </code> </label>
									<input type="text" class="form-control input-sm required" id="crm_no" name="crm_no" placeholder="input here.." value="" />
								</div>

								<div class='col-sm-2'>

									<div class='form-group'>
										<label>Req. Date <code> (manual input) </code> </label>
										<div class="input-group input-group-sm date">
											<div class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</div>
											<input class="datepicker form-control input-sm pull-right" id="req_date" name="req_date" type="text" value="">
										</div>
									</div>
								</div>
								<div class='col-sm-4'>
									<label>Order Description <code> (manual input) </code> </label>
									<input type="text" class="form-control input-sm required" id="ord_desc" name="ord_desc" placeholder="input here.." value="" />
								</div>
								<div class='col-sm-2'>
									<label>Service Type <code> (Auto Filled) </code> </label>
									<input type="text" class="form-control input-sm required" id="so_service" name="so_service" value="<?= $prj_startdate; ?>" readonly />
								</div>
								<div class='col-sm-2'>
									<label>Remarks <code> (manual input) </code> </label>
									<input type="text" class="form-control input-sm required" id="so_remarks" name="so_remarks" placeholder="input here.." value="" />
								</div>

							</div>
							<div class="row">
								<div class='col-sm-4'>
									<div class='form-group'>
										<label>Inventory No </label>
										<input type="text" class="form-control input-sm required" id="inventory_no" name="inventory_no" placeholder="input here.." value="">
									</div>
								</div>
								<div class='col-sm-4'>
									<label>Material No <code> (auto filled) </code> </label>
									<input type="text" class="form-control input-sm required" id="material_no" name="material_no" placeholder="" value="" />
								</div>

								<div class='col-sm-2'>
									<label>Qty <code> (manual input) </code> </label>
									<input type="text" class="form-control input-sm required|numeric" id="so_qty" name="so_qty" placeholder="input here.." value="" />
								</div>
								<div class='col-sm-2'>
									<label>Uom <code> (manual input) </code> </label>
									<input type="text" class="form-control input-sm required" id="so_uom" name="so_uom" placeholder="input here.." value="" />
								</div>
							</div>
						</div>

					</div>




				</div>
				<div class='box-footer'>
					<div class='col-xs-12'>
						<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm'><i class='fa fa-times'></i> Cancel</button>
						<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right'><i class='fa fa-check'></i> Saved & Sent Notif</button>
					</div>
				</div>


			</div>
		</form>
</div>
</div>
</div>
</section>
</div>
<?php //$this->load->view('global/confirm_delete');
?>