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
        <h1>Application Preview Individual</h1>
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
     		<?php if(!empty($indvidual)){ //print '<pre>'; print_r($indvidual);?>
            <table style="text-align:center;width:100%;" cellspacing="2" >
                <tr>
                   <td><img src="<?= base_url('assets/img/gop2.png'); ?>" width="100" /></td>
                   <td width="100%">
                     <span style="font-size:24px; font-weight:bold">PEIMA</span><br>
                      Public Schools Reorganization Program Spell-11<br>Individual<br>
                      <span style="font-size:20px; font-weight:bold">Application ID: <?php print $indvidual['ind_id'];?></span>
                   </td>
                   <td><img src="<?= base_url('assets/img/peima.png'); ?>" width="100" /></td>
                </tr>
             </table>
             <strong>Applicant Detail</strong>
             <table style="width:100%;" border="1" cellpadding="5">
                <tr>
                   <td><strong>Full Name</strong></td>
                   <td><?php print $indvidual['ind_fname'];?></td>
                   <td><strong>Father / Husband Name</strong></td>
                   <td><?php print $indvidual['ind_fhusband'];?></td>
                   <td><strong>Gender</strong></td>
                   <td><?php print $indvidual['ind_gender'];?></td>
                </tr>
                <tr>
                   <td><strong>Postal Address</strong></td>
                   <td colspan="5"><?php print $indvidual['ind_address'];?></td>
                </tr>
                <tr>
                   <td><strong>District</strong></td>
                   <td><?php print $indvidual['district_name'];?></td>
                   <td><strong>Tehsil</strong></td>
                   <td><?php print $indvidual['tehsil_name'];?></td>
                   <td><strong>Domicile District</strong></td>
                   <td><?php print $indvidual['dom_district_name'];?></td>
                </tr>
                <tr>
                   <td><strong>CNIC</strong></td>
                   <td><?php print $indvidual['ind_cnic'];?></td>
                   <td><strong>Date of Birth</strong></td>
                   <td><?php print date('d/m/Y', strtotime($indvidual['ind_dob']));?></td>
                   <td><strong>Marital Status</strong></td>
                   <td><?php print $indvidual['ind_maritalstatus'];?></td>
                </tr>
                <tr>
                   <td><strong>Email</strong></td>
                   <td colspan="5"><?php print $indvidual['ind_email'];?></td>
                </tr>
                <tr>
                   <td><strong>Mobile (WhatsApp)</strong></td>
                   <td><?php print $indvidual['ind_wmobile'];?></td>
                   <td><strong>Telephone (Mobile)</strong></td>
                   <td colspan="4"><?php print $indvidual['ind_mobile'];?></td>
                </tr>
             </table>
             
             <br><strong>Qualification Details</strong>
             <table style="width:100%;" border="1" cellpadding="5">
                <tr>
                  <td>Sr#</td>
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
                      $i++;
               ?>
                      <tr>
                         <td><?php print $i;?></td>
                         <td><?php print $qulaification['qi_deg_name'];?></td>
                         <td><?php print $qulaification['qi_institution'];?></td>
                         <td><?php print $qulaification['qi_deg_type'];?></td>
                         <td><?php print $qulaification['qi_percentage'];?></td>
                         <td><?php print date('d-M-Y', strtotime($qulaification['qi_from']));?></td>
                         <td><?php print date('d-M-Y', strtotime($qulaification['qi_to']));?></td>
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
                      $i++;
               ?>
                      <tr>
                         <td><?php print $i;?></td>
                         <td><?php print $experience['ei_employer'];?></td>
                         <td><?php print $experience['ei_designation'];?></td>
                         <td><?php print date('d-M-Y', strtotime($experience['ei_from']));?></td>
                         <td><?php print date('d-M-Y', strtotime($experience['ei_to']));?></td>
                         <td><?php print $experience['ei_year'];?></td>
                      </tr>
                <?php }
                }else{?>
                   <tr>
                      <td colspan="6">No experiences record found.</td>
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
                  <td>Gender</td> 
                  <td>School Level</td>
                  <td>Total Teachers</td>
                  <td>Total Students</td>             
                </tr>
                <?php
                $i = 0; 
                if($indvidual['ind_school_1'] != '' || $indvidual['ind_school_2'] || $indvidual['ind_school_3'])
                {
						 $schoolids = array();
						 if($indvidual['ind_school_1'] != '')
						 	$schoolids[] = $indvidual['ind_school_1'];
						 if($indvidual['ind_school_2'] != '')
						 	$schoolids[] = $indvidual['ind_school_2'];
						 if($indvidual['ind_school_3'] != '')
						 	$schoolids[] = $indvidual['ind_school_3'];		
						 $schools = $this->user_applicationformind_model->get_schooldetail_id($schoolids);
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
                            <td><?php print $school['school_gender'];?></td>
                            <td><?php print $school['school_level'];?></td>
                            <td><?php print $school['school_total_teachers'];?></td>
                            <td><?php print $school['school_total_students'];?></td>
								 </tr>
                <?php }
						 }
                }else{?>
                   <tr>
                      <td colspan="9">No schools record found.</td>
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
                     <td><strong>Name of Applicant</strong></td>
                     <td><strong>Signature/Stamp</strong></td>
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
                  <li>Original affidavit(s) on stamp paper worth Rs.300/- according to given specimen at Appendix-D of TORs</li>
               </ol>
             </div>
             <?php if($indvidual['ind_final_submit'] != 1){?>
                <div style="text-align:right; margin:10px 0">
                  <a href="<?php echo url('user/applicationformind/edit') ?>" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i> Edit Application</a> &nbsp;&nbsp;
                  <a href="<?php echo url('user/applicationformind/finalsubmission') ?>" class="btn btn-sm btn-success" title="Final Submission">Final Submit Application</a>
                </div>
             <?php }?>
          <?php }else{?>
          	No record found.
          <?php }?>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include viewPath('admin/includes/footer'); ?>