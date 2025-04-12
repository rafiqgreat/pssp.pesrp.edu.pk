<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include viewPath('user/includes/header'); ?>
<style>
	.dropdown-menu {
	  z-index: 1055 !important;
	}
	.tblapplicant tr td{
		
	}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Application Preview</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
     <div class="bg-white p-4 mb-4 rounded shadow">
     		<?php if(!empty($data_yep)){ //print '<pre>'; print_r($data_yep);?>
            <table style="text-align:center;width:100%;" cellspacing="2" >
                <tr>
                   <td><img src="<?= base_url('assets/img/gop2.png'); ?>" width="100" /></td>
                   <td width="100%">
                     <span style="font-size:24px; font-weight:bold">PEIMA</span><br>
                      Public Schools Reorganization Program Spell-11<br>Young Entreprenuers<br>
                      <span style="font-size:20px; font-weight:bold">Application ID: <?php print $data_yep['ye_id'];?></span>
                   </td>
                   <td><img src="<?= base_url('assets/img/peima.png'); ?>" width="100" /></td>
                </tr>
             </table>
             <strong>Applicant Detail</strong>
             <table style="width:100%;" border="1" cellpadding="5">
                <tr>
                   <td><strong>Full Name</strong></td>
                   <td><?php print $data_yep['ye_lead_fname'];?></td>
                   <td><strong>Father / Husband Name</strong></td>
                   <td><?php print $data_yep['ye_lead_fhusband'];?></td>
                   <td><strong>Gender</strong></td>
                   <td><?php print $data_yep['ye_lead_gender'];?></td>
                </tr>
                <tr>
                   <td><strong>Postal Address</strong></td>
                   <td colspan="5"><?php print $data_yep['ye_lead_address'];?></td>
                </tr>
                <tr>
                   <td><strong>District</strong></td>
                   <td><?php print $data_yep['district_name'];?></td>
                   <td><strong>Tehsil</strong></td>
                   <td><?php print $data_yep['tehsil_name'];?></td>
                   <td><strong>Domicile District</strong></td>
                   <td><?php print $data_yep['dom_district_name'];?></td>
                </tr>
                <tr>
                   <td><strong>CNIC</strong></td>
                   <td><?php print $data_yep['ye_lead_cnic'];?></td>
                   <td><strong>Date of Birth</strong></td>
                   <td><?php print date('d/m/Y', strtotime($data_yep['ye_lead_dob']));?></td>
                </tr>
                <tr>
                   <td><strong>Email</strong></td>
                   <td colspan="5"><?php print $data_yep['ye_lead_email'];?></td>
                </tr>
                <tr>
                   <td><strong>Mobile (WhatsApp)</strong></td>
                   <td><?php print $data_yep['ye_lead_wmobile'];?></td>
                   <td><strong>Telephone (Mobile)</strong></td>
                   <td colspan="4"><?php print $data_yep['ye_lead_mobile'];?></td>
                </tr>
             </table>
             
             <br><strong>Support Applicant Details</strong>
             <table style="width:100%;" border="1" cellpadding="5">
                <tr>
                  <td>Sr#</td>
                  <td>Full Name</td>
                  <td>Father / Husband Name</td>
                  <td>Postal Address</td>
                  <td>Gender</td>
                  <td>District</td>
                  <td>Tehsil</td>
                  <td>Domicile District</td>
                  <td>CNIC</td>
                  <td>DOB</td>
                  <td>Email</td>
                  <td>Telephone (Mobile)</td>
                  <td>Mobile (WhatsApp)</td>               
                </tr>
                <tr>
                   <td>1</td>
                   <td><?php print $data_yep['ye_s1_fname'];?></td>
                   <td><?php print $data_yep['ye_s1_fhusband'];?></td>
                   <td><?php print $data_yep['ye_s1_address'];?></td>
                   <td><?php print $data_yep['ye_s1_gender'];?></td>
                   <td><?php print $data_yep['s1district_name'];?></td>
                   <td><?php print $data_yep['s1tehsil_name'];?></td>
                   <td><?php print $data_yep['s1dom_district_name'];?></td>
                   <td><?php print $data_yep['ye_s1_cnic'];?></td>
                   <td><?php print date('d/m/Y', strtotime($data_yep['ye_s1_dob']));?></td>
                   <td><?php print $data_yep['ye_s1_email'];?></td>
                   <td><?php print $data_yep['ye_s1_wmobile'];?></td>
                   <td><?php print $data_yep['ye_s1_mobile'];?></td>
                </tr>
                <tr>
                   <td>2</td>
                   <td><?php print $data_yep['ye_s2_fname'];?></td>
                   <td><?php print $data_yep['ye_s2_fhusband'];?></td>
                   <td><?php print $data_yep['ye_s2_address'];?></td>
                   <td><?php print $data_yep['ye_s2_gender'];?></td>
                   <td><?php print $data_yep['s2district_name'];?></td>
                   <td><?php print $data_yep['s2tehsil_name'];?></td>
                   <td><?php print $data_yep['s2dom_district_name'];?></td>
                   <td><?php print $data_yep['ye_s2_cnic'];?></td>
                   <td><?php print date('d/m/Y', strtotime($data_yep['ye_s2_dob']));?></td>
                   <td><?php print $data_yep['ye_s2_email'];?></td>
                   <td><?php print $data_yep['ye_s2_wmobile'];?></td>
                   <td><?php print $data_yep['ye_s2_mobile'];?></td>
                </tr>
             </table>
             
             <br><strong>Qualification Details</strong>
             <table style="width:100%;" border="1" cellpadding="5">
                <tr>
                  <td>Sr#</td>
                  <td>Applicant Type</td>
                  <td>Degree</td>
                  <td>Institution</td>
                  <td>Type</td>
                  <td>Percentage</td>
                  <td>From</td>
                  <td>To</td>              
                </tr>
                <?php
                $i = 0; 
                if(!empty($qulaifications))
                {
                   foreach($qulaifications as $qulaification)
                   {
							 $apptypename = '';
							 if($qulaification['qual_user_type'] == 'lead')
							 	 $apptypename = $data_yep['ye_lead_fname'];
							 if($qulaification['qual_user_type'] == 's1')
							 	 $apptypename = $data_yep['ye_s1_fname'];
							 if($qulaification['qual_user_type'] == 's2')
							 	 $apptypename = $data_yep['ye_s2_fname'];	 	 
                      $i++;
               ?>
                      <tr>
                         <td><?php print $i;?></td>
                         <td><?php print $qulaification['qual_user_type'];?> <?php print $apptypename;?></td>
                         <td><?php print $qulaification['qual_deg_name'];?></td>
                         <td><?php print $qulaification['qual_institution'];?></td>
                         <td><?php print $qulaification['qual_deg_type'];?></td>
                         <td><?php print $qulaification['qual_percentage'];?></td>
                         <td><?php print date('d-M-Y', strtotime($qulaification['qual_from']));?></td>
                         <td><?php print date('d-M-Y', strtotime($qulaification['qual_to']));?></td>
                      </tr>
                <?php }
                }else{?>
                   <tr>
                      <td colspan="7">No qualifications record found.</td>
                   </tr>
                <?php }?>
             </table>
             
             <br><strong>Work Experience Details</strong>
             <table style="width:100%;" border="1" cellpadding="5">
                <tr>
                  <td>Sr#</td>
                  <td>Applicant</td>
                  <td>Employer</td>
                  <td>Designation</td>
                  <td>From</td>
                  <td>To</td> 
                  <td>Year</td>             
                </tr>
                <?php
                $i = 0; 
                if(!empty($experiences))
                {
                   foreach($experiences as $experience)
                   {
							 $apptypename = '';
							 if($experience['exp_type'] == 'lead')
							 	 $apptypename = $data_yep['ye_lead_fname'];
							 if($experience['exp_type'] == 's1')
							 	 $apptypename = $data_yep['ye_s1_fname'];
							 if($experience['exp_type'] == 's2')
							 	 $apptypename = $data_yep['ye_s2_fname'];	
                      $i++;
               ?>
                      <tr>
                         <td><?php print $i;?></td>
                         <td><?php print $experience['exp_type'];?> <?php print $apptypename;?></td>
                         <td><?php print $experience['exp_employer'];?></td>
                         <td><?php print $experience['exp_designation'];?></td>
                         <td><?php print date('d-M-Y', strtotime($experience['exp_from']));?></td>
                         <td><?php print date('d-M-Y', strtotime($experience['exp_to']));?></td>
                         <td><?php print $experience['exp_year'];?></td>
                      </tr>
                <?php }
                }else{?>
                   <tr>
                      <td colspan="7">No experiences record found.</td>
                   </tr>
                <?php }?>
             </table>
             
             <br><strong>Nominated Schools</strong>
             <table style="width:100%;" border="1" cellpadding="5">
                <tr>
                  <td>Sr#</td>
                  <td>EMISCODE</td>
                  <td>School Name</td>
                  <td>District</td>
                  <td>Tehsil</td>            
                </tr>
                <?php
                $i = 0; 
                if($data_yep['ye_school_1'] != '' || $data_yep['ye_school_2'] || $data_yep['ye_school_3'])
                {
						 $schoolids = array();
						 if($data_yep['ye_school_1'] != '')
						 	$schoolids[] = $data_yep['ye_school_1'];
						 if($data_yep['ye_school_2'] != '')
						 	$schoolids[] = $data_yep['ye_school_2'];
						 if($data_yep['ye_school_3'] != '')
						 	$schoolids[] = $data_yep['ye_school_3'];		
						 $schools = $this->user_applicationform_model->get_schooldetail_id($schoolids);
						 if(!empty($schools))
						 {
							 foreach($schools as $school)
							 {
								 $i++;
						?>
								 <tr>
									 <td><?php print $i;?></td>
									 <td><?php print $school['username'];?></td>
									 <td><?php print $school['school_name'];?></td>
									 <td><?php print $school['district_name_en'];?></td>
									 <td><?php print $school['tehsil_name_en'];?></td>
								 </tr>
                <?php }
						 }
                }else{?>
                   <tr>
                      <td colspan="5">No schools record found.</td>
                   </tr>
                <?php }?>
             </table>
             <br><strong>Declaration</strong>
             <div>
               <ol style="margin:0; padding:0 0 0 20px">
                  <li>I declare to the best of my knowledge and belief that the information I have provided in this application form is full and accurate, correct and completed.</li>
                  <li>I understand that incomplete, unsigned, pruned (have cuttings) or application having incorrect information or received after due dates shall be rejected.</li>
                  <li>I understand that I subject myselef to disciplinary action if the above facts are found to be falsified.</li>
               </ol>
             </div>
             <div style="height:140px;">
               <br>
               <table width="100%">
                  <tr>
                     <td><strong>Name of Applicant</strong><br /><?php print $data_yep['ye_lead_fname'];?></td>
                     <td><strong>Signature</strong></td>
                     <td><strong>Date</strong></td>
                  </tr>
               </table>
             </div>
             
             <br><strong>Application form Check List</strong>
             <div>
               <ol style="margin:0; padding:0 0 0 20px">
                  <li>Original Deposit Slip of Rs. 10,000/- for processing fee.</li>
                  <li>Attested copies of CNICs of all applicants</li>
                  <li>Attested copies of academic credentials containing marks detail of all three applicants. (The document / degree without marks detail shall not be considered for awarding score)</li>
                  <li>Attested copies of post qualification signed and stamped experience certificate along with contact and address details of employers, having proper date and reference number. (Experience length from (DD-MM-YYYY) to (DD-MM-YYYY) shall categorically be menstioned in experience certificate). Formate of experience certificate placed at Appendix-B.</li>
                  <li>Police character certificate of the applicant (mere receipt/applicant form shall not be accepted).</li>
               </ol>
             </div>
             <?php
					$deadlineStr = $this->settings_model->getValueByKey('deadline'); // e.g. '2025-04-30T17:00'
					
					if (!empty($deadlineStr)) {
						 try {
							  $deadline = new DateTime($deadlineStr);
							  $now = new DateTime();
					
							  if ($now < $deadline): ?>
									<div style="text-align:right; margin:10px 0">
										 <a href="<?php echo url('user/applicationform/edit') ?>" class="btn btn-sm btn-info" title="Edit">
											  <i class="fa fa-edit"></i> Edit Application
										 </a>
									</div>
							  <?php endif;
						 } catch (Exception $e) {
							  // Optional: log or handle invalid date format
						 }
					}
					?>

          <?php }else{?>
          No record found.
          <?php }?>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include viewPath('admin/includes/footer'); ?>