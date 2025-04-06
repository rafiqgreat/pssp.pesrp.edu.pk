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

    <?php echo form_open_multipart('user/applicationform/save', [ 'class' => 'form-validate' ], ); ?>
    <div class="card-body">
    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#leadApplicantDetails" aria-expanded="false" aria-controls="leadApplicantDetails" > 
              <span>Lead Applicant Detail</span> 
              <svg   xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" >   
			  	<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/> 
              </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="leadApplicantDetails">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="ye_lead_fname" class="form-label">Full Name (as per CNIC)</label>
                <input type="text" class="form-control" name="ye_lead_fname" id="ye_lead_fname" required placeholder="Enter Applicant Full Name" />
              </div>
              <div class="col-md-6">
                <label for="ye_lead_fhusband" class="form-label">Father / Husband Name</label>
                <input type="text" class="form-control" name="ye_lead_fhusband" id="ye_lead_fhusband" required placeholder="Enter Applicant Father / Husband Name" />
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_lead_districtid" class="form-label">District</label>
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
                <label for="ye_lead_tehsilid" class="form-label">Tehsil</label>
                <select class="form-select form-control" name="ye_lead_tehsilid" id="ye_lead_tehsilid" required>
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_lead_dom_disid" class="form-label">District of Domicile</label>
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
                <label for="ye_lead_cnic" class="form-label">CNIC</label>
                <input type="number" class="form-control" name="ye_lead_cnic" id="ye_lead_cnic" required placeholder="Enter CNIC" />
              </div>
              <div class="col-md-4">
                <label for="ye_lead_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="ye_lead_dob" id="ye_lead_dob" required />
              </div>
              <div class="col-md-4">
                <label for="ye_lead_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="ye_lead_gender" id="ye_lead_gender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_lead_maritalstatus" class="form-label">Applicant Marital Status</label>
                <select class="form-select form-control" name="ye_lead_maritalstatus" id="ye_lead_maritalstatus" required>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="ye_lead_wmobile" class="form-label">Mobile (WhatsApp)</label>
                <input type="number" class="form-control" name="ye_lead_wmobile" id="ye_lead_wmobile" required />
              </div>
              <div class="col-md-4">
                <label for="ye_lead_mobile" class="form-label">Telephone (Mobile)</label>
                <input type="number" class="form-control" name="ye_lead_mobile" id="ye_lead_mobile" required />
              </div>
            </div>
            <button id="submitLeadApplicantBtn" class="btn btn-primary">Save and Continue</button>
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
                <input type="number" class="form-control" name="ye_s1_cnic" id="ye_s1_cnic" required placeholder="Enter CNIC" />
              </div>
              <div class="col-md-4">
                <label for="ye_s1_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="ye_s1_dob" id="ye_s1_dob" required />
              </div>
              <div class="col-md-4">
                <label for="ye_s1_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="ye_s1_gender" id="ye_s1_gender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s1_maritalstatus" class="form-label">Applicant Marital Status</label>
                <select class="form-select form-control" name="ye_s1_maritalstatus" id="ye_s1_maritalstatus" required>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                </select>
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
            <button id="submits1ApplicantBtn" class="btn btn-primary">Save and Continue</button>
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
                <input type="number" class="form-control" name="ye_s2_cnic" id="ye_s2_cnic" required placeholder="Enter CNIC" />
              </div>
              <div class="col-md-4">
                <label for="ye_s2_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="ye_s2_dob" id="ye_s2_dob" required />
              </div>
              <div class="col-md-4">
                <label for="ye_s2_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="ye_s2_gender" id="ye_s2_gender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="ye_s2_maritalstatus" class="form-label">Applicant Marital Status</label>
                <select class="form-select form-control" name="ye_s2_maritalstatus" id="ye_s2_maritalstatus" required>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                </select>
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
            <button id="submitS2ApplicantBtn" class="btn btn-primary">Save and Continue</button>
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
                  <tr id="inputRow">
                    <td>
                      <select id="qual_user_type" class="form-select form-control" name="qual_user_type">
                        <option value="lead">Lead</option>
                        <option value="s1">SA1</option>
                        <option value="s2">SA2</option>
                      </select>
                    </td>
                    <td>
                      <select id="qual_deg_name" class="form-select form-control" name="qual_deg_name">
                        <option value="Matric">Matric</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="BSc">Bachelor of Science</option>
                        <option value="MSc">Master of Science</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" class="form-control" name="qual_institution" id="qual_institution"  />
                    </td>
                    <td>
                      <select id="qual_deg_type" class="form-select form-control" name="qual_deg_type">
                        <option value="Regular">Regular</option>
                        <option value="Private">Private</option>
                        <option value="Distance">Distance</option>
                      </select>
                    </td>
                    <td>
                      <input type="number" class="form-control" name="qual_percentage" id="qual_percentage"  />
                    </td>
                    <td>
                      <input type="date" class="form-control" name="qual_from" id="qual_from"  />
                    </td>
                    <td>
                      <input type="date" class="form-control" name="qual_to" id="qual_to"  />
                    </td>
                    <td>
                      <button onclick="addQualification()" class="btn btn-sm btn-success">Add</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button onclick="saveQualifications()" class="btn btn-primary mt-3">Save and Continue</button>
          </div>
        </div>
        
        <div class="bg-white p-3 mb-4 rounded shadow">
          <button
            class="btn btn-primary w-100 d-flex justify-content-between align-items-center"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#experienceDetails"
            aria-expanded="false"
            aria-controls="experienceDetails"
          >
            <span>Experience</span>
            <svg
              id="experienceIcon"
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              class="bi bi-chevron-down transition-transform"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
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
                  <tr id="inputRowExperience">
                    <td>
                      <select id="exp_type" class="form-select form-control" name="exp_type">
                        <option value="lead">Lead</option>
                        <option value="s1">SA1</option>
                        <option value="s2">SA2</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" class="form-control" name="exp_employer" id="exp_employer"  />
                    </td>
                    <td>
                      <input type="text" class="form-control" name="exp_designation" id="exp_designation"  />
                    </td>
                    <td>
                      <input type="date" class="form-control" name="exp_from" id="exp_from"  />
                    </td>
                    <td>
                      <input type="date" class="form-control" name="exp_to" id="exp_to"  />
                    </td>
                    <td>
                      <input type="number" class="form-control" name="exp_year" id="exp_year"  />
                    </td>
                    <td>
                      <button onclick="addExperience()" class="btn btn-sm btn-success">Add</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
       		<button onclick="saveExperience()" class="btn btn-primary mt-3">Save and Continue</button>
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
                At present, the private individual has not filed a litigation case
                against Punjab Education Foundation in any court of law.
              </p>
        
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="litigation" id="litigationYes" value="yes"  />
                <label class="form-check-label" for="litigationYes">Yes</label>
              </div>
        
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="litigation" id="litigationNo" value="no"  />
                <label class="form-check-label" for="litigationNo">No</label>
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
            <button onclick="saveDeclaration()" class="btn btn-primary mt-3">Save and Go to Select School</button>
          </div>
        </div>
    </div>
    <!-- /.card-body -->

    <?php /*?><div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/admin/school') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"> <?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"> <?php echo lang('submit') ?></button></div>
      </div>
    </div><?php */?>
    <?php echo form_close(); ?>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include viewPath('admin/includes/footer'); ?>

<script type="text/javascript">
	$('#ye_lead_districtid').on('change', function() {
		$.post('<?=base_url("user/applicationform/tehsil_by_district")?>',
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
		$.post('<?=base_url("user/applicationform/tehsil_by_district")?>',
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
		$.post('<?=base_url("user/applicationform/tehsil_by_district")?>',
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
	let insertedYeId = null;
	
	$('#submitLeadApplicantBtn').on('click', function (e) {
		e.preventDefault();
	
		var formData = {
			ye_lead_fname: $('#ye_lead_fname').val(),
			ye_lead_fhusband: $('#ye_lead_fhusband').val(),
			ye_lead_districtid: $('#ye_lead_districtid').val(),
			ye_lead_tehsilid: $('#ye_lead_tehsilid').val(),
			ye_lead_dom_disid: $('#ye_lead_dom_disid').val(),
			ye_lead_cnic: $('#ye_lead_cnic').val(),
			ye_lead_dob: $('#ye_lead_dob').val(),
			ye_lead_gender: $('#ye_lead_gender').val(),
			ye_lead_maritalstatus: $('#ye_lead_maritalstatus').val(),
			ye_lead_wmobile: $('#ye_lead_wmobile').val(),
			ye_lead_mobile: $('#ye_lead_mobile').val()
		};
	
		$.ajax({
			url: '<?=base_url("user/applicationform/insert_lead_applicant")?>',
			method: 'POST',
			data: formData,
			dataType: 'json',
			success: function (response) {
				if (response.status == 'success') {
					alert('Lead applicant inserted successfully!');
					insertedYeId = response.insert_id;
					// 1. Collapse/Hide Lead Applicant tab
					$('#leadApplicantDetails').collapse('hide');
			
					// 2. Disable the button that toggles the first tab
					$('[data-bs-target="#leadApplicantDetails"]').prop('disabled', true);
			
					// 3. Expand/Show Applicant 2 tab
					$('#s1Applicant').collapse('show');
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function (xhr) {
				alert('AJAX error');
			}
		});
	});
	
	$('#submits1ApplicantBtn').on('click', function (e) {
		e.preventDefault();
	
		if (!insertedYeId) {
			alert('Please fill Lead Applicant first.');
			return;
		}
	
		var formData = {
			ye_id: insertedYeId,
			ye_s1_fname: $('#ye_s1_fname').val(),
			ye_s1_fhusband: $('#ye_s1_fhusband').val(),
			ye_s1_districtid: $('#ye_s1_districtid').val(),
			ye_s1_tehsilid: $('#ye_s1_tehsilid').val(),
			ye_s1_dom_disid: $('#ye_s1_dom_disid').val(),
			ye_s1_cnic: $('#ye_s1_cnic').val(),
			ye_s1_dob: $('#ye_s1_dob').val(),
			ye_s1_gender: $('#ye_s1_gender').val(),
			ye_s1_maritalstatus: $('#ye_s1_maritalstatus').val(),
			ye_s1_wmobile: $('#ye_s1_wmobile').val(),
			ye_s1_mobile: $('#ye_s1_mobile').val()
		};
	
		$.ajax({
			url: '<?=base_url("user/applicationform/update_s1_applicant")?>',
			method: 'POST',
			data: formData,
			dataType: 'json',
			success: function (response) {
				if (response.status === 'success') {
					alert('Support Applicant 1 saved successfully!');
					$('#s1Applicant').collapse('hide');
					
					// 2. Disable the button that toggles the first tab
					$('[data-bs-target="#s1Applicant"]').prop('disabled', true);
					
					// 3. Expand/Show Applicant 2 tab
					$('#s2Applicant').collapse('show');
					
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function () {
				alert('AJAX error while saving Support Applicant 1.');
			}
		});
	});

	$('#submitS2ApplicantBtn').on('click', function (e) {
		e.preventDefault();
	
		if (!insertedYeId) {
			alert('Please fill Lead Applicant first.');
			return;
		}
	
		var formData = {
			ye_id: insertedYeId,
			ye_s2_fname: $('#ye_s2_fname').val(),
			ye_s2_fhusband: $('#ye_s2_fhusband').val(),
			ye_s2_districtid: $('#ye_s2_districtid').val(),
			ye_s2_tehsilid: $('#ye_s2_tehsilid').val(),
			ye_s2_dom_disid: $('#ye_s2_dom_disid').val(),
			ye_s2_cnic: $('#ye_s2_cnic').val(),
			ye_s2_dob: $('#ye_s2_dob').val(),
			ye_s2_gender: $('#ye_s2_gender').val(),
			ye_s2_maritalstatus: $('#ye_s2_maritalstatus').val(),
			ye_s2_wmobile: $('#ye_s2_wmobile').val(),
			ye_s2_mobile: $('#ye_s2_mobile').val()
		};
	
		$.ajax({
			url: '<?= base_url("user/applicationform/update_s2_applicant") ?>',
			method: 'POST',
			data: formData,
			dataType: 'json',
			success: function (response) {
				if (response.status === 'success') {
					alert('Support Applicant 2 saved successfully!');
					$('#s2Applicant').collapse('hide');
					$('[data-bs-target="#s2Applicant"]').prop('disabled', true);
	
					// Open the qualification tab
					$('#qualificationDetails').collapse('show');
				} else {
					alert('Error: ' + response.message);
				}
			},
			error: function () {
				alert('AJAX error while saving Support Applicant 2.');
			}
		});
	});
	
//============================codeing for qualification tab====================================  	
  let currentlyEditing = null;

	function addQualification() {
		const qual_user_type = document.getElementById("qual_user_type").value;
		const qual_deg_name = document.getElementById("qual_deg_name").value;
		const qual_institution = document.getElementById("qual_institution").value;
		const qual_deg_type = document.getElementById("qual_deg_type").value;
		const qual_percentage = document.getElementById("qual_percentage").value;
		const qual_from = document.getElementById("qual_from").value;
		const qual_to = document.getElementById("qual_to").value;
	
		const tableBody = document.querySelector("#qualificationTable tbody");
		let newRow = document.createElement("tr");
	
		const rowHTML = `
		  <td>${qual_user_type}</td>
		  <td>${qual_deg_name}</td>
		  <td>${qual_institution}</td>
		  <td>${qual_deg_type}</td>
		  <td>${qual_percentage}</td>
		  <td>${qual_from}</td>
		  <td>${qual_to}</td>
		  <td>
			<button onclick="editRow(this.closest('tr'))" class="btn btn-sm btn-warning me-1">Edit</button>
			<button onclick="deleteRow(this)" class="btn btn-sm btn-danger">Delete</button>
		  </td>
		`;
	
		if (currentlyEditing) {
		  currentlyEditing.innerHTML = rowHTML;
		  currentlyEditing = null;
		  document.querySelector("[onclick='addQualification()']").textContent = "Add";
		} else {
		  newRow.innerHTML = rowHTML;
		  tableBody.insertBefore(newRow, document.getElementById("inputRow"));
		}
	
		resetForm();
	  }
	
	function deleteRow(button) {
		const row = button.closest("tr");
		if (currentlyEditing === row) {
		  document.querySelector("[onclick='addQualification()']").textContent = "Add";
		  currentlyEditing = null;
		}
		row.remove();
	  }
	
	function editRow(row) {
		currentlyEditing = row;
		const cells = row.querySelectorAll("td");
	
		document.getElementById("qual_user_type").value = cells[0].textContent;
		document.getElementById("qual_deg_name").value = cells[1].textContent;
		document.getElementById("qual_institution").value = cells[2].textContent;
		document.getElementById("qual_deg_type").value = cells[3].textContent;
		document.getElementById("qual_percentage").value = cells[4].textContent;
		document.getElementById("qual_from").value = cells[5].textContent;
		document.getElementById("qual_to").value = cells[6].textContent;
	
		document.querySelector("[onclick='addQualification()']").textContent = "Update";
	  }
	
	function resetForm() {
		document.getElementById("qual_user_type").value = "Lead";
		document.getElementById("qual_deg_name").value = "Matric";
		document.getElementById("qual_institution").value = "BISE";
		document.getElementById("qual_deg_type").value = "Regular";
		document.getElementById("qual_percentage").value = "50";
		document.getElementById("qual_from").value = "2020-01-01";
		document.getElementById("qual_to").value = "2022-01-01";
	  }
	
	function saveQualifications() {
		  const rows = document.querySelectorAll("#qualificationTable tbody tr:not(#inputRow)");
		  const qualifications = [];
		
		  rows.forEach(row => {
			const cells = row.querySelectorAll("td");
			qualifications.push({
			  qual_user_type: cells[0].textContent.trim(),
			  qual_deg_name: cells[1].textContent.trim(),
			  qual_institution: cells[2].textContent.trim(),
			  qual_deg_type: cells[3].textContent.trim(),
			  qual_percentage: parseFloat(cells[4].textContent.trim()),
			  qual_from: cells[5].textContent.trim(),
			  qual_to: cells[6].textContent.trim()
			});
		  });
		
		  if (qualifications.length === 0) {
			alert("No qualifications to save!");
			return;
		  }
		
		  // Optional: Add validation here
		
		  // AJAX request to save all qualifications
		  fetch("<?= base_url('user/applicationform/save_qualification'); ?>", {
			method: "POST",
			headers: {
			  "Content-Type": "application/json",
			  "X-Requested-With": "XMLHttpRequest"
			},
			body: JSON.stringify({ qualifications })
		  })
		  .then(res => res.json())
		  .then(data => {
			if (data.status === "success") {
			  alert("Qualifications saved successfully!");
		
			  // Optionally, reset form and table after success
			  document.querySelectorAll("#qualificationTable tbody tr:not(#inputRow)").forEach(row => row.remove());
			  resetForm(); // Reset the form fields
		
			  // Close the Qualification Tab
			  const qualificationTab = new bootstrap.Collapse(document.getElementById('qualificationDetails'), {
				toggle: false
			  });
			  qualificationTab.hide();
		
			  // Open the Experience Tab
			  const experienceTab = new bootstrap.Collapse(document.getElementById('experienceDetails'), {
				toggle: true
			  });
			} else {
			  alert("Error saving qualifications.");
			}
		  })
		  .catch(err => {
			console.error(err);
			alert("Something went wrong.");
		  });
		}

//============================codeing for experience tan====================================  
  let currentlyEditingExperience = null;

	function addExperience() {
		// Get values from the input fields
		const exp_type = document.getElementById("exp_type").value;
		const exp_employer = document.getElementById("exp_employer").value;
		const exp_designation = document.getElementById("exp_designation").value;
		const exp_from = document.getElementById("exp_from").value;
		const exp_to = document.getElementById("exp_to").value;
		const exp_year = document.getElementById("exp_year").value;
	
		// Get table body for inserting new row
		const tableBody = document.querySelector("#experienceTable tbody");
		let newRow = document.createElement("tr");
	
		const rowHTML = `
			<td>${exp_type}</td>
			<td>${exp_employer}</td>
			<td>${exp_designation}</td>
			<td>${exp_from}</td>
			<td>${exp_to}</td>
			<td>${exp_year}</td>
			<td>
			  <button onclick="editExperience(this.closest('tr'))" class="btn btn-sm btn-warning me-1">Edit</button>
			  <button onclick="deleteExperience(this)" class="btn btn-sm btn-danger">Delete</button>
			</td>
		`;
	
		// If currently editing, update the row content instead of adding a new one
		if (currentlyEditingExperience) {
			currentlyEditingExperience.innerHTML = rowHTML;
			currentlyEditingExperience = null;
			document.querySelector("[onclick='addExperience()']").textContent = "Add";
		} else {
			// Otherwise, insert the new row before the input row
			newRow.innerHTML = rowHTML;
			tableBody.insertBefore(newRow, document.getElementById("inputRowExperience"));
		}
	
		// Reset the form fields after adding or editing
		resetExperienceForm();
	}
	
	function resetExperienceForm() {
		// Clear the input fields and reset to default state
		document.getElementById("exp_type").value = "Lead"; // Reset to default value
		document.getElementById("exp_employer").value = "Employer";
		document.getElementById("exp_designation").value = "Designation";
		document.getElementById("exp_from").value = "From";
		document.getElementById("exp_to").value = "To";
		document.getElementById("exp_year").value = "Years";
	}
	
	function deleteExperience(button) {
	  const row = button.closest("tr");
	  if (currentlyEditingExperience === row) {
		document.querySelector("[onclick='addExperience()']").textContent = "Add";
		currentlyEditingExperience = null;
	  }
	  row.remove();
	}
	
	function editExperience(row) {
	  currentlyEditingExperience = row;
	  const cells = row.querySelectorAll("td");
	
	  document.getElementById("qual_user_type").value = cells[0].textContent;
	  document.getElementById("exp_employer").value = cells[1].textContent;
	  document.getElementById("exp_designation").value = cells[2].textContent;
	  document.getElementById("exp_from").value = cells[3].textContent;
	  document.getElementById("exp_to").value = cells[4].textContent;
	  document.getElementById("exp_year").value = cells[5].textContent;
	
	  document.querySelector("[onclick='addExperience()']").textContent = "Update";
	}
	
	function saveExperience() {
	  // Collect the experience data (you can also add validation here if needed)
	  const rows = document.querySelectorAll("#experienceTable tbody tr:not(#inputRowExperience)");
	  const experiences = [];
	
	  rows.forEach(row => {
		const cells = row.querySelectorAll("td");
		experiences.push({
		  exp_user_type: cells[0].textContent.trim(),
		  exp_employer: cells[1].textContent.trim(),
		  exp_designation: cells[2].textContent.trim(),
		  exp_from: cells[3].textContent.trim(),
		  exp_to: cells[4].textContent.trim(),
		  exp_year: parseInt(cells[5].textContent.trim())
		});
	  });
	
	  if (experiences.length === 0) {
		alert("No experience data to save!");
		return;
	  }
	
	  // Optional: Add validation here
	
	  // AJAX request to save all experience
	  fetch("<?= base_url('user/applicationform/save_experience'); ?>", {
		method: "POST",
		headers: {
		  "Content-Type": "application/json",
		  "X-Requested-With": "XMLHttpRequest"
		},
		body: JSON.stringify({ experiences })
	  })
	  .then(res => res.json())
	  .then(data => {
		if (data.status === "success") {
		  alert("Experience saved successfully!");
	
		  // Optionally, reset the form and table after success
		  document.querySelectorAll("#experienceTable tbody tr:not(#inputRowExperience)").forEach(row => row.remove());
		  resetExperienceForm(); // Reset the form fields
	
		  // Close the Experience Tab
		  const experienceTab = new bootstrap.Collapse(document.getElementById('experienceDetails'), {
			toggle: false
		  });
		  experienceTab.hide();
	
		  // Open the Declaration Tab
		  const declarationTab = new bootstrap.Collapse(document.getElementById('declarationDetails'), {
			toggle: true
		  });
		} else {
		  alert("Error saving experience.");
		}
	  })
	  .catch(err => {
		console.error(err);
		alert("Something went wrong.");
	  });
	}

//===========================================================================	
	function saveDeclaration() {
		const litigationYes = document.getElementById("litigationYes").checked;
		const litigationNo = document.getElementById("litigationNo").checked;
		let litigation = "";
	
		if (litigationYes) {
			litigation = "yes";
		} else if (litigationNo) {
			litigation = "no";
		} else {
			alert("Please select if there is any litigation case.");
			return;
		}
	
		// Create FormData to support file upload
		const formData = new FormData();
		formData.append("litigation", litigation);
	
		// If "Yes" is selected, check and append file
		if (litigation === "yes") {
			const fileInput = document.getElementById("ye_declaration_img");
			if (fileInput.files.length === 0) {
				alert("Please upload a case file/document.");
				return;
			}
			formData.append("ye_declaration_img", fileInput.files[0]);
		}
	
		// Use fetch to post the form
		fetch("<?= base_url('user/applicationform/save_declaration'); ?>", {
			method: "POST",
			headers: {
				"X-Requested-With": "XMLHttpRequest"
			},
			body: formData
		})
		.then(res => res.json())
		.then(data => {
			if (data.status === "success") {
				alert("Declaration saved successfully!");
				window.location.href = "<?= base_url('user/applicationform/select_school'); ?>";
			} else {
				alert("Error saving declaration.");
			}
		})
		.catch(err => {
			console.error(err);
			alert("Something went wrong.");
		});
	}
	


	
	



</script>
