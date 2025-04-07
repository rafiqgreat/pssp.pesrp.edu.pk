<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('user/includes/header'); ?>
<style>
	.dropdown-menu {
	  z-index: 1055 !important;
	}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo 'Generate Challan' ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/user/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active"> <?php echo 'Application Form' ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<?php // print_r($data_indv);?>
<!-- Main content -->
<section class="content">

  <!-- Default card -->
  <div class="card">
    <div class="card-header with-border">
      <h3 class="card-title"> <?php echo 'Challan' ?></h3>
      <div class="card-tools pull-right">
        <a href="<?php echo url('/user/') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  <?php echo '' ?></a>
      </div>
    </div>

    <div class="card-body">
    	<table style="text-align:center; border-collapse:collapse; border: 1px dotted black;" >
        	<tr><td>
                <table style="text-align:center" cellspacing="2" >
                    <tr>
                      <td width="20%"><img src="<?= base_url('assets/img/gop2.png'); ?>" width="100" /></td>
                      <td width="60%"><span style="font-size:24px; font-weight:bold">PEIMA</span><br>
                      					87 B/I Gulberg-III, Lahore<br>
                                        <span style="font-size:20px; font-weight:bold">THE BANK OF PUNJAB</span><br>
                                        Bank's Copy
                      </td>
                      <td width="20%"><img src="<?= base_url('assets/img/peima.png'); ?>" width="100" /></td>
                    </tr>
                </table>
            </td></tr>
            
            <tr ><td style="padding-bottom:7%">
                <table style="text-align:left; border:#000 solid 1px" cellspacing="2" cellpadding="3" width="100%" class="mt-4">
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td width="40%">Account Title</td>
                        <td>Punjab Education Initiatives Management Authority</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>Slip Generated Date</td>
                        <td><?php echo date('d-m-Y'); ?></td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>Applicant Name</td>
                        <td><?php print_r($data_indv['ind_fname']);?></td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>CNIC</td>
                        <td><?php print_r($data_indv['ind_cnic']);?></td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>School Code</td>
                        <td><?php print_r($data_indv['ind_school_1']);?></td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>Program</td>
                        <td>FAS</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>School Name</td>
                        <td><?php print_r($data_indv['school_1_name']);?></td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>District</td>
                        <td><?php print_r($data_indv['district_name']);?></td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>Tehsil</td>
                        <td><?php print_r($data_indv['tehsil_name']);?></td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#000 solid 1px">
                        <td>Mobile No.</td>
                        <td><?php print_r($data_indv['ind_mobile']);?></td>
                    </tr>
                </table>
            </td></tr>
            
            <tr ><td style="padding-bottom:25%">
                <table style="text-align:left; border:#999 solid 3px" cellspacing="2" cellpadding="3" width="100%" class="mt-4">
                    <tr style="text-align:left; border-bottom:#000 solid 1px; background-color:#999; font-weight:bold">
                        <td width="70%">Description</td>
                        <td>Amount</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#999 solid 3px">
                        <td style="padding-bottom:20%">IRCS-Relocation Phase-I</td>
                        <td style="padding-bottom:20%">10000</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#999 solid 3px">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#999 solid 3px">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#999 solid 3px">
                        <td>Total (in Fig)</td>
                        <td>10000</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#999 solid 3px">
                        <td>Amount in words</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr style="text-align:left; border-bottom:#999 solid 3px">
                        <td>Ten Thousands repuees only</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td></tr>
            
            <tr><td style="padding-bottom:15%">
                <table style="text-align:center;" width="100%" >
                    <tr style="font-weight:bold">
                        <td width="50%">____________</td>
                        <td>_____________</td>
                    </tr>
                    <tr style="font-weight:bold">
                        <td>Applicant</td>
                        <td>Cashier</td>
                    </tr>
                </table>
            </td></tr>
            
            <tr><td style="padding-bottom:5%">
                <table style="text-align:left;" width="100%" >
                    <tr style="font-weight:bold">
                        <td>Depositer must present the "Computerized" deposit slip of BOP <br>Easy Pay Cash Management System to PIEMA Authority as proof <br />of deposit. SIgn and stamp on the downloaded challan form or <br />manual deposit is not acceptable to PIEMA Authority</td>
                    </tr>
                    <tr style="font-weight:bold">
                        <td>Print Date and Time : <?php echo date('d-m-Y'); ?></td>
                    </tr>
                </table>
            </td></tr>
        </table>
	</div>

  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include viewPath('admin/includes/footer'); ?>
