<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('user/includes/header'); ?>
<style>
	.dropdown-menu {
	  z-index: 1055 !important;
	}
</style>
<?php //print_r($data_young_ent);?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo 'Young Entrepreneur Application Form' ?></h1>
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

<!-- Main content -->
<section class="content">

  <!-- Default card -->
  <div class="card">
    <div class="card-header with-border">
      <h3 class="card-title"> <?php echo 'Add Detail' ?></h3>

      <div class="card-tools pull-right">
        <a href="<?php echo url('/user/') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  <?php echo '' ?></a>
      </div>

    </div>

    <?php echo form_open_multipart('user/applicationform/save_young_ent_form', [ 'class' => 'form-validate' ], ); ?>
    <div class="card-body">
    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#leadApplicantDetails" aria-expanded="false" aria-controls="leadApplicantDetails" > 
              <span>Lead Applicant Detail</span> 
              <svg   xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" >   
			  	<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/> 
              </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light show" id="leadApplicantDetails">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="ye_lead_fname" class="form-label">Full Name (as per CNIC) *</label>
                <input type="text" class="form-control" name="ye_lead_fname" id="ye_lead_fname" value="<?php print $this->session->logged['name'];?>" required placeholder="Enter Applicant Full Name" readonly="readonly"/>
              </div>
              <div class="col-md-6">
                <label for="ye_lead_fhusband" class="form-label">Father / Husband Name *</label>
                <input type="text" class="form-control" name="ye_lead_fhusband" id="ye_lead_fhusband" required placeholder="Enter Applicant Father / Husband Name" />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <label for="ye_lead_address" class="form-label">Postal Address *</label>
                <input type="text" class="form-control" name="ye_lead_address" id="ye_lead_address" value="<?php print $this->session->logged['address'];?>" required placeholder="Enter Postal Address" />
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_lead_districtid" class="form-label">District *</label>
                <select class="form-select form-control" name="ye_lead_districtid" id="ye_lead_districtid" required>
                  <option value="">Select District</option>
                    <?php
					   foreach($districts as $district)
					  {
						echo '<option value="'.$district->district_id.'">'.$district->district_name_en.'</option>';
					  }
                  	?>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_lead_tehsilid" class="form-label">Tehsil *</label>
                <select class="form-select form-control" name="ye_lead_tehsilid" id="ye_lead_tehsilid" required>
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_lead_dom_disid" class="form-label">District of Domicile *</label>
                <select class="form-select form-control" name="ye_lead_dom_disid" id="ye_lead_dom_disid" required>
                  <option value="">Select District of Domicile</option>
                   <?php
					   foreach($districts as $district)
					  {
						echo '<option value="'.$district->district_id.'">'.$district->district_name_en.'</option>';
					  }
                  	?>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_lead_cnic" class="form-label">CNIC *</label>
                <input type="number" class="form-control" name="ye_lead_cnic" id="ye_lead_cnic" value="<?php print $this->session->logged['cnic'];?>" required placeholder="Enter CNIC" readonly="readonly"/>
              </div>
              <div class="col-md-4">
                <label for="ye_lead_dob" class="form-label">Date of Birth *</label>
                <input type="date" class="form-control" name="ye_lead_dob" id="ye_lead_dob" required />
              </div>
              <div class="col-md-4">
                <label for="ye_lead_gender" class="form-label">Gender *</label>
                <select class="form-select form-control" name="ye_lead_gender" id="ye_lead_gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_lead_email" class="form-label">Email *</label>
                <input type="text" class="form-control" name="ye_lead_email" id="ye_lead_email" value="<?php print $this->session->logged['email'];?>" required placeholder="Enter Email" />
              </div>
              <div class="col-md-4">
                <label for="ye_lead_wmobile" class="form-label">Mobile (WhatsApp) *</label>
                <input type="number" class="form-control" name="ye_lead_wmobile" id="ye_lead_wmobile" required />
              </div>
              <div class="col-md-4">
                <label for="ye_lead_mobile" class="form-label">Telephone (Mobile) *</label>
                <input type="number" class="form-control" name="ye_lead_mobile" id="ye_lead_mobile" value="<?php print $this->session->logged['phone'];?>" required />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12" style="text-align:right">
              	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#s1Applicant" aria-expanded="false" aria-controls="s1Applicant"><span>Next</span></button>
              </div>
            </div>
          </div>
        </div>

    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button  class="btn btn-primary w-100 d-flex justify-content-between align-items-center"  type="button"  data-bs-toggle="collapse"  data-bs-target="#s1Applicant"  aria-expanded="false"  aria-controls="s1Applicant" >
            	<span>Support Applicant 1 Detail</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" >
              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="s1Applicant">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="ye_s1_fname" class="form-label">Full Name (as per CNIC)</label>
                <input type="text" class="form-control" name="ye_s1_fname" id="ye_s1_fname" required placeholder="Enter Applicant Full Name" />
              </div>
              <div class="col-md-6">
                <label for="ye_s1_fhusband" class="form-label">Father / Husband Name</label>
                <input type="text" class="form-control" name="ye_s1_fhusband" id="ye_s1_fhusband" required placeholder="Enter Applicant Father / Husband Name" />
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-12">
                <label for="ye_s1_address" class="form-label">Postal Address</label>
                <input type="text" class="form-control" name="ye_s1_address" id="ye_s1_address" required placeholder="Enter Postal Address" />
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s1_districtid" class="form-label">District</label>
                <select class="form-select form-control" name="ye_s1_districtid" id="ye_s1_districtid" required>
                  <option value="">Select District</option>
                  <?php
					   foreach($districts as $district)
					  {
						echo '<option value="'.$district->district_id.'">'.$district->district_name_en.'</option>';
					  }
                  	?>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_s1_tehsilid" class="form-label">Tehsil</label>
                <select class="form-select form-control" name="ye_s1_tehsilid" id="ye_s1_tehsilid" required>
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_s1_dom_disid" class="form-label">District of Domicile</label>
                <select class="form-select form-control" name="ye_s1_dom_disid" id="ye_s1_dom_disid" required>
                <option value="">Select District of Domicile</option>
                   <?php
					   foreach($districts as $district)
					  {
						echo '<option value="'.$district->district_id.'">'.$district->district_name_en.'</option>';
					  }
                  	?>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s1_cnic" class="form-label">CNIC</label>
                <input type="text" class="form-control" name="ye_s1_cnic" id="ye_s1_cnic" required
       placeholder="Enter CNIC" maxlength="13" pattern="\d{13}" title="Enter 13-digit CNIC only" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,13)">
              </div>
              <div class="col-md-4">
                <label for="ye_s1_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="ye_s1_dob" id="ye_s1_dob" required />
              </div>
              <div class="col-md-4">
                <label for="ye_s1_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="ye_s1_gender" id="ye_s1_gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s1_email" class="form-label">Email</label>
                <input type="text" class="form-control" name="ye_s1_email" id="ye_s1_email" required placeholder="Enter Email" />
              </div>
              <div class="col-md-4">
                <label for="ye_s1_wmobile" class="form-label">Mobile (WhatsApp)</label>
                <input type="number" class="form-control" name="ye_s1_wmobile" id="ye_s1_wmobile" required />
              </div>
              <div class="col-md-4">
                <label for="ye_s1_mobile" class="form-label">Telephone (Mobile)</label>
                <input type="number" class="form-control" name="ye_s1_mobile" id="ye_s1_mobile" required />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12" style="text-align:right">
              	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#s2Applicant" aria-expanded="false" aria-controls="s2Applicant"><span>Next</span></button>
              </div>
            </div>
          </div>
        </div>

    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#s2Applicant" aria-expanded="false" aria-controls="s2Applicant" >
            <span>Support Applicant 2 Detail</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" >
              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="s2Applicant">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="ye_s2_fname" class="form-label">Full Name (as per CNIC)</label>
                <input type="text" class="form-control" name="ye_s2_fname" id="ye_s2_fname" required placeholder="Enter Applicant Full Name" />
              </div>
              <div class="col-md-6">
                <label for="ye_s2_fhusband" class="form-label">Father / Husband Name</label>
                <input type="text" class="form-control" name="ye_s2_fhusband" id="ye_s2_fhusband" required placeholder="Enter Applicant Father / Husband Name" />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12">
                <label for="ye_s2_address" class="form-label">Postal Address</label>
                <input type="text" class="form-control" name="ye_s2_address" id="ye_s2_address" required placeholder="Enter Postal Address" />
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s2_districtid" class="form-label">District</label>
                <select class="form-select form-control" name="ye_s2_districtid" id="ye_s2_districtid" required>
                  <option value="">Select District</option>
                  <?php
					   foreach($districts as $district)
					  {
						echo '<option value="'.$district->district_id.'">'.$district->district_name_en.'</option>';
					  }
                  	?>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_s2_tehsilid" class="form-label">Tehsil</label>
                <select class="form-select form-control" name="ye_s2_tehsilid" id="ye_s2_tehsilid" required>
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_s2_dom_disid" class="form-label">District of Domicile</label>
                <select class="form-select form-control" name="ye_s2_dom_disid" id="ye_s2_dom_disid" required>
                  <option value="">Select District of Domicile</option>
                   <?php
					   foreach($districts as $district)
					  {
						echo '<option value="'.$district->district_id.'">'.$district->district_name_en.'</option>';
					  }
                  	?>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s2_cnic" class="form-label">CNIC</label>
                <input type="text" class="form-control" name="ye_s2_cnic" id="ye_s2_cnic" required
       placeholder="Enter CNIC" maxlength="13" pattern="\d{13}" title="Enter 13-digit CNIC only" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,13)">

              </div>
              <div class="col-md-4">
                <label for="ye_s2_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="ye_s2_dob" id="ye_s2_dob" required />
              </div>
              <div class="col-md-4">
                <label for="ye_s2_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="ye_s2_gender" id="ye_s2_gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s2_email" class="form-label">Email</label>
                <input type="text" class="form-control" name="ye_s2_email" id="ye_s2_email" required placeholder="Enter Email" />
              </div>
              <div class="col-md-4">
                <label for="ye_s2_wmobile" class="form-label">Mobile (WhatsApp)</label>
                <input type="number" class="form-control" name="ye_s2_wmobile" id="ye_s2_wmobile" required />
              </div>
              <div class="col-md-4">
                <label for="ye_s2_mobile" class="form-label">Telephone (Mobile)</label>
                <input type="number" class="form-control" name="ye_s2_mobile" id="ye_s2_mobile" required />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-12" style="text-align:right">
              	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#qualificationDetails" aria-expanded="false" aria-controls="qualificationDetails"><span>Next</span></button>
              </div>
            </div>
          </div>
        </div>
    
    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#qualificationDetails" aria-expanded="false" aria-controls="qualificationDetails">
            <span>Qualification</span>
            <svg id="qualificationIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down transition-transform" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/> </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="qualificationDetails">
            <div class="table-responsive">
              <table id="qualificationTable" class="table table-bordered table-hover">
                <thead class="table-light">
                  <tr>
                    <th>Applicant</th>
                    <th>Degree</th>
                    <th>Institution</th>
                    <th>Type</th>
                    <th>Percentage</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="qualification-row">
                    <td>
                      <select class="form-select form-control" name="qual_user_type[]">
                        <option value="">Select</option>
                        <option value="lead">Lead <?php print $this->session->logged['name'];?></option>
                        <option value="s1">SA1</option>
                        <option value="s2">SA2</option>
                      </select>
                    </td>
                    <td>
                      <select class="form-select form-control" name="qual_deg_name[]">
                        <option value="">Select</option>
                        <option value="Matric">Matric</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="B.A/B.SC(2 YEARS)">B.A/B.SC(2 YEARS)</option>
                        <option value="BS (4 YEARS)">BS (4 YEARS)</option>
                        <option value="B.ED">B.ED</option>
                        <option value="M.A">M.A</option>
                        <option value="Law Degree">Law Degree</option>
                        <option value="M.A Education">M.A Education</option>
                        <option value="M.SC">M.SC</option>
                        <option value="M.ED">M.ED</option>
                        <option value="M.PHIL/MS">M.PHIL/MS</option>
                        <option value="PHD">PHD</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" class="form-control" name="qual_institution[]"  />
                    </td>
                    <td>
                      <select class="form-select form-control" name="qual_deg_type[]">
                        <option value="">Select</option>
                        <option value="regular">Regular</option>
                        <option value="private">Private</option>
                        <option value="distance">Distance</option>
                      </select>
                    </td>
                    <td>
                    		<select class="form-select form-control" name="qual_percentage[]">
                           <option value="">Select</option>
                           <option value="&ge; 60% Marks">&ge; 60% Marks</option>
                           <option value="&ge;45%-<60%">&ge;45%-<60%</option>
                           <option value="&ge;33%-<45">&ge;33%-<45</option>
                         </select>
                    </td>
                    <td>
                      <input type="date" class="form-control" name="qual_from[]" />
                    </td>
                    <td>
                      <input type="date" class="form-control" name="qual_to[]" />
                    </td>
                    <td><button type="button" class="btn btn-danger remove-row_qualification" disabled="disabled">Remove</button></td>
                  </tr>
                </tbody>
                <tfoot>
                     <tr>
                         <td colspan="8" style="text-align: right;">
                             <button type="button" class="btn btn-sm btn-success" id="addrow_qualification">Add Row</button>
                         </td>
                     </tr>
                 </tfoot>
              </table>
            </div>
            <div class="row mb-3">
              <div class="col-md-12" style="text-align:right">
              	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#experienceDetails" aria-expanded="false" aria-controls="experienceDetails"><span>Next</span></button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#experienceDetails" aria-expanded="false" aria-controls="experienceDetails" >
            <span>Experience</span>
            <svg id="experienceIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down transition-transform" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="experienceDetails">
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="experienceTable">
                <thead class="table-light">
                  <tr>
                    <th>Applicant</th>
                    <th>Employer</th>
                    <th>Designation</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Years</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="experience-row">
                    <td>
                      <select class="form-select form-control" name="exp_type[]">
                        <option value="lead">Lead <?php print $this->session->logged['name'];?></option>
                        <option value="s1">SA1</option>
                        <option value="s2">SA2</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" class="form-control" name="exp_employer[]" />
                    </td>
                    <td>
                      <input type="text" class="form-control" name="exp_designation[]"  />
                    </td>
                    <td>
                      <input type="date" class="form-control" name="exp_from[]" />
                    </td>
                    <td>
                      <input type="date" class="form-control" name="exp_to[]" />
                    </td>
                    <td>
                      <input type="number" class="form-control" name="exp_year[]" readonly="readonly"/>
                    </td>
                    <td><button type="button" class="btn btn-danger remove-row_experience" disabled="disabled">Remove</button></td>
                  </tr>
                </tbody>
                <tfoot>
                     <tr>
                         <td colspan="7" style="text-align: right;">
                             <button type="button" class="btn btn-sm btn-success" id="addrow_experience">Add Row</button>
                         </td>
                     </tr>
                 </tfoot>
              </table>
            </div>
            
            <div class="row mb-3">
              <div class="col-md-12" style="text-align:right">
              	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#schoolDetails" aria-expanded="false" aria-controls="schoolDetails"><span>Next</span></button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#schoolDetails" aria-expanded="false" aria-controls="schoolDetails">
            <span>Select School</span>
            <svg id="declarationIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down transition-transform" viewBox="0 0 16 16" >
              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
          <div class="collapse mt-3 p-3 border rounded bg-light" id="schoolDetails">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <label for="school_district_id" class="form-label">District</label>
                    <select class="form-select form-control" id="school_district_id" name="school_district_id">
                        <option value="">Select District</option>
                        <?php foreach($districts as $district): ?>
                        <option value="<?= $district->district_id ?>"><?= $district->district_name_en ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="school_tehsil_id" class="form-label">Tehsil</label>
                    <select class="form-select form-control" id="school_tehsil_id" name="school_tehsil_id">
                        <option value="">Select Tehsil</option>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-12 mb-12">
                    <label for="ye_school_1" class="form-label">School</label>
                    <select class="form-select form-control" id="ye_school_1" name="ye_school_1">
                        <option value="">Select School</option>
                    </select>
                </div>
            </div> 
            <div class="row mb-3">
              <div class="col-md-12" style="text-align:right">
              	<button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#declarationDetails" aria-expanded="false" aria-controls="declarationDetails"><span>Next</span></button>
              </div>
            </div>           
        	</div>
          
        </div>

		<div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#declarationDetails" aria-expanded="false" aria-controls="declarationDetails">
            <span>Declaration</span>
            <svg id="declarationIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down transition-transform" viewBox="0 0 16 16" >
              <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="declarationDetails">
            <div class="mb-3">
              <p class="form-label">
                At present, I have filed a litigation case against PIEMA in any court of law.
              </p>
        
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="litigation" id="litigationNo" value="no" checked="checked"/>
                <label class="form-check-label" for="litigationNo">No</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="litigation" id="litigationYes" value="yes"  />
                <label class="form-check-label" for="litigationYes">Yes</label>
              </div>
              <div id="caseAttachment" class="mt-3 d-none">
                <label for="caseFile" class="form-label">If "Yes", attach a photocopy of the case/detail with this application</label>
                <input type="file" id="ye_declaration_img" class="form-control" name="ye_declaration_img" />
              </div>
            </div>
        
            <div class="mb-3">
              <p class="form-text">
                1. I declare that the information I have provided in this application is full and accurate, to the best of my knowledge and belief, correct and complete.
              </p>
              <p class="form-text">
                2. I accept this declaration.
              </p>
            </div>
          </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/user/dashboard') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"> <?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"> <?php echo lang('submit') ?></button></div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include viewPath('admin/includes/footer'); ?>

<script type="text/javascript">
	$('#ye_lead_districtid').on('change', function() {
		$.post('<?=base_url("user/applicationform/teh_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  ye_lead_districtid : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#ye_lead_tehsilid option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#ye_lead_tehsilid')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});
	
	$('#ye_s1_districtid').on('change', function() {
		$.post('<?=base_url("user/applicationform/teh_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  ye_s1_districtid : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#ye_s1_tehsilid option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#ye_s1_tehsilid')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});
	
	$('#ye_s2_districtid').on('change', function() {
		$.post('<?=base_url("user/applicationform/teh_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  ye_s2_districtid : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#ye_s2_tehsilid option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#ye_s2_tehsilid')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});
</script>
<script type="text/javascript">
	$('#school_district_id').on('change', function() {
		$.post('<?=base_url("user/applicationform/teh_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  school_district_id : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  //console.log(arr);     
		  $('#school_tehsil_id option:not(:first)').remove();
		  $('#ye_school_1 option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		  $('#school_tehsil_id')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});
	
	$('#school_tehsil_id').on('change', function() {
        let tehsil_id = this.value;

        if (tehsil_id) {
            $.post('<?= base_url("user/applicationform/school_by_tehsil") ?>', {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                tehsil_id: tehsil_id
            }, function(data) {
					arr = $.parseJSON(data); 
					$('#ye_school_1 option:not(:first)').remove();
					$.each(arr, function(key, value) {           
						$('#ye_school_1')
							.append($("<option></option>")
							.attr("value", value.school_id)
							.text(value.username+" - "+value.school_name+" - "+value.district_name_en+" - "+value.tehsil_name_en)
						); 
					}); 
            });
        }
    });
</script>

<script>

$(document).ready(function() {
    $("#addrow_qualification").click(function() { 
        var newRow = $(".qualification-row:first").clone();
		  newRow.find("input").val("");
		  newRow.find(".remove-row_qualification").removeAttr("disabled");
		  $("#qualificationTable tbody").append(newRow);
    });

    $(document).on("click", ".remove-row_qualification", function() {
        $(this).closest("tr").remove();
    });
	 
	 $("#addrow_experience").click(function() { 
        var newRow = $(".experience-row:first").clone();
		  newRow.find("input").val("");
		  newRow.find(".remove-row_experience").removeAttr("disabled");
		  $("#experienceTable tbody").append(newRow);
    });

    $(document).on("click", ".remove-row_qualification", function() {
        $(this).closest("tr").remove();
    });

});

document.addEventListener("DOMContentLoaded", function () {
	  const litigationRadios = document.querySelectorAll('input[name="litigation"]');
	  const caseAttachment = document.getElementById("caseAttachment");
	
	  litigationRadios.forEach((radio) => {
		radio.addEventListener("change", function () {
		  if (this.value === "yes") {
			caseAttachment.classList.remove("d-none");
		  } else {
			caseAttachment.classList.add("d-none");
		  }
		});
	  });
	});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const s1Input = document.getElementById("ye_s1_fname");
  const s2Input = document.getElementById("ye_s2_fname");

  function updateOptions(value, label, selectorValue) {
    const options = document.querySelectorAll(`select option[value="${selectorValue}"]`);
    options.forEach(option => {
      if (value.trim() !== "") {
        option.text = `${label} ${value}`;
      } else {
        option.text = label;
      }
    });
  }

  s1Input.addEventListener("input", function () {
    updateOptions(s1Input.value, "SA1", "s1");
  });

  s2Input.addEventListener("input", function () {
    updateOptions(s2Input.value, "SA2", "s2");
  });
});
</script>

<script>
function calculateExperience(fromDate, toDate) {
    const from = new Date(fromDate);
    const to = new Date(toDate);
    if (!isNaN(from) && !isNaN(to) && to >= from) {
        const diffTime = to - from;
        const diffYears = diffTime / (1000 * 60 * 60 * 24 * 365.25); // includes leap years
        return Math.round(diffYears); // Rounded to nearest whole number

    }
    return '';
}

function bindExperienceEvents(row) {
    const fromInput = row.find('.exp_from');
    const toInput = row.find('.exp_to');
    const yearInput = row.find('.exp_year');

    function updateYears() {
        const from = fromInput.val();
        const to = toInput.val();
        const years = calculateExperience(from, to);
        yearInput.val(years);
    }

    fromInput.on('change', updateYears);
    toInput.on('change', updateYears);
}

// Initial binding for existing rows
$(document).ready(function () {
    $('#experienceTable .experience-row').each(function () {
        bindExperienceEvents($(this));
    });

    // Add Row
    $('#addrow_experience').on('click', function () {
        const lastRow = $('#experienceTable .experience-row:last');
        const newRow = lastRow.clone();

        // Clear input values
        newRow.find('input, select').each(function () {
            $(this).val('');
        });

        // Enable Remove button
        newRow.find('.remove-row_experience').prop('disabled', false);

        // Append to table
        $('#experienceTable tbody').append(newRow);

        // Bind experience calculation
        bindExperienceEvents(newRow);
    });

    // Remove row
    $(document).on('click', '.remove-row_experience', function () {
        if ($('#experienceTable .experience-row').length > 1) {
            $(this).closest('.experience-row').remove();
        }
    });
});
</script>