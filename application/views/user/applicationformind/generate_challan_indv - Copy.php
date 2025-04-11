<!DOCTYPE html>
<html>
    <head>
    <title>Challan Form</title>
    <style>
      body {
         font-family:Arial, Helvetica, sans-serif;
         font-size:13px;
      }
		.tblborder{
			border-collapse:collapse; border:1px solid #ccc;
		}
		.tblborder tr td{
			border-bottom:1px solid #ccc;
		}
		.tbldes{
			border-collapse:collapse; border:1px solid #ccc;
		}
		.tbldes tr td{
			border:1px solid #ccc;
		}
      </style>
    </head>
    <body>
       <table style="border-collapse:collapse; margin:0 auto; width: 530px;">
          <tr>
             <td><table style="text-align:center" cellspacing="2">
                   <tr>
                   <td width="20%"><img src="<?= base_url('assets/img/gop2.png'); ?>" width="100" /></td>
                   <td width="60%"><span style="font-size:24px; font-weight:bold">PEIMA</span><br>
                         87 B/I Gulberg-III, Lahore<br>
                         <span style="font-size:20px; font-weight:bold">THE BANK OF PUNJAB</span><br>
                         <strong>Bank's Copy</strong> </td>
                   <td width="20%"><img src="<?= base_url('assets/img/peima.png'); ?>" width="100" /></td>
                </tr>
                </table></td>
          </tr>
          <tr>
             <td style="padding-bottom:40px;">
             	<table class="tblborder" cellspacing="2" cellpadding="3" width="100%">
                   <tr style="text-align:left; border-bottom:1px solid #000">
                      <td width="35%"><strong>A/C Title:</strong></td>
                      <td>Punjab Education Initiatives Management Authority</td>
                   </tr>
                   <tr>
                      <td><strong>Slip Generated Date:</strong></td>
                      <td><?php echo date('d-m-Y'); ?></td>
                   </tr>
                   <tr>
                      <td><strong>Applicant Name:</strong></td>
                      <td><?php print ($data_indv['ind_fname']);?></td>
                   </tr>
                   <tr>
                      <td><strong>CNIC:</strong></td>
                      <td><?php print ($data_indv['ind_cnic']);?></td>
                   </tr>
                   <tr>
                      <td><strong>School Code:</strong></td>
                      <td><?php print ($data_indv['ind_school_1']);?></td>
                   </tr>
                   <tr>
                      <td><strong>Program:</strong></td>
                      <td>FAS</td>
                   </tr>
                   <tr>
                      <td><strong>School Name:</strong></td>
                      <td><?php print ($data_indv['school_1_name']);?></td>
                   </tr>
                   <tr>
                      <td><strong>District:</strong></td>
                      <td><?php print ($data_indv['district_name']);?></td>
                   </tr>
                   <tr>
                      <td><strong>Tehsil:</strong></td>
                      <td><?php print ($data_indv['tehsil_name']);?></td>
                   </tr>
                   <tr>
                      <td><strong>Mobile No:</strong></td>
                      <td><?php print ($data_indv['ind_mobile']);?></td>
                   </tr>
                </table></td>
          </tr>
          <tr >
             <td style="padding-bottom:10%">
             	<table class="tbldes" cellspacing="2" cellpadding="3" width="100%">
                   <tr style="background-color:#ddd;">
                      <td width="70%"><strong>Description</strong></td>
                      <td><strong>Amount</strong></td>
                   </tr>
                   <tr>
                      <td style="padding-bottom:20%">IRCS-Relocation Phase-I</td>
                      <td style="padding-bottom:20%"><strong>10,000</strong></td>
                   </tr>
                   <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                   </tr>
                   <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                   </tr>
                   <tr>
                      <td><strong>Total (in Fig)</strong></td>
                      <td><strong>10,000</strong></td>
                   </tr>
                   <tr>
                      <td><strong style="border-bottom:1px solid #000;">Amount in words:</strong></td>
                      <td>&nbsp;</td>
                   </tr>
                   <tr>
                      <td>Ten Thousands repuees only</td>
                      <td>&nbsp;</td>
                   </tr>
                </table>
             </td>
          </tr>
          <tr>
             <td style="padding-bottom:15%">
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
              </td>
          </tr>
       </table>
	</body>
</html>