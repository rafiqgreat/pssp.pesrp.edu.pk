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
        <h1><?php echo 'PEF/PEIMA Partner Application Form' ?></h1>
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
          <button
            class="btn btn-primary w-100 d-flex justify-content-between align-items-center"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#leadApplicantDetails"
            aria-expanded="false"
            aria-controls="leadApplicantDetails"
          >
            <span>Lead Applicant Detail</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
            </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="leadApplicantDetails">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="applicant1_fullname" class="form-label">Full Name (as per CNIC)</label>
                <input type="text" class="form-control" name="applicant1_fullname" id="applicant1_fullname" required placeholder="Enter Applicant Full Name" />
              </div>
              <div class="col-md-6">
                <label for="applicant1_fathername" class="form-label">Father / Husband Name</label>
                <input type="text" class="form-control" name="applicant1_fathername" id="applicant1_fathername" required placeholder="Enter Applicant Father / Husband Name" />
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant1_district_id" class="form-label">District</label>
                <select class="form-select form-control" name="applicant1_district_id" id="applicant1_district_id" required>
                  <option value="">Select District</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant1_tehsil_id" class="form-label">Tehsil</label>
                <select class="form-select form-control" name="applicant1_tehsil_id" id="applicant1_tehsil_id" required>
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant1_domicile_id" class="form-label">District of Domicile</label>
                <select class="form-select form-control" name="applicant1_domicile_id" id="applicant1_domicile_id" required>
                  <option value="">Select District of Domicile</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant1_cnic" class="form-label">CNIC</label>
                <input type="number" class="form-control" name="applicant1_cnic" id="applicant1_cnic" required placeholder="Enter CNIC" />
              </div>
              <div class="col-md-4">
                <label for="applicant1_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="applicant1_dob" id="applicant1_dob" required />
              </div>
              <div class="col-md-4">
                <label for="applicant1_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="applicant1_gender" id="applicant1_gender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant1_marital_status" class="form-label">Applicant Marital Status</label>
                <select class="form-select form-control" name="applicant1_marital_status" id="applicant1_marital_status" required>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant1_whatsapp_no" class="form-label">Mobile (WhatsApp)</label>
                <input type="number" class="form-control" name="applicant1_whatsapp_no" id="applicant1_whatsapp_no" required />
              </div>
              <div class="col-md-4">
                <label for="applicant1_telephone" class="form-label">Telephone (Mobile)</label>
                <input type="number" class="form-control" name="applicant1_telephone" id="applicant1_telephone" required />
              </div>
            </div>
          </div>
        </div>

    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button
            class="btn btn-primary w-100 d-flex justify-content-between align-items-center"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#applicant2Details"
            aria-expanded="false"
            aria-controls="applicant2Details"
          >
            <span>Applicant 2 Detail</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
            </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="applicant2Details">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="applicant2_fullname" class="form-label">Full Name (as per CNIC)</label>
                <input type="text" class="form-control" name="applicant2_fullname" id="applicant2_fullname" required placeholder="Enter Applicant Full Name" />
              </div>
              <div class="col-md-6">
                <label for="applicant2_fathername" class="form-label">Father / Husband Name</label>
                <input type="text" class="form-control" name="applicant2_fathername" id="applicant2_fathername" required placeholder="Enter Applicant Father / Husband Name" />
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant2_district_id" class="form-label">District</label>
                <select class="form-select form-control" name="applicant2_district_id" id="applicant2_district_id" required>
                  <option value="">Select District</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant2_tehsil_id" class="form-label">Tehsil</label>
                <select class="form-select form-control" name="applicant2_tehsil_id" id="applicant2_tehsil_id" required>
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant2_domicile_id" class="form-label">District of Domicile</label>
                <select class="form-select form-control" name="applicant2_domicile_id" id="applicant2_domicile_id" required>
                  <option value="">Select District of Domicile</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant2_cnic" class="form-label">CNIC</label>
                <input type="number" class="form-control" name="applicant2_cnic" id="applicant2_cnic" required placeholder="Enter CNIC" />
              </div>
              <div class="col-md-4">
                <label for="applicant2_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="applicant2_dob" id="applicant2_dob" required />
              </div>
              <div class="col-md-4">
                <label for="applicant2_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="applicant2_gender" id="applicant2_gender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant2_marital_status" class="form-label">Applicant Marital Status</label>
                <select class="form-select form-control" name="applicant2_marital_status" id="applicant2_marital_status" required>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant2_whatsapp_no" class="form-label">Mobile (WhatsApp)</label>
                <input type="number" class="form-control" name="applicant2_whatsapp_no" id="applicant2_whatsapp_no" required />
              </div>
              <div class="col-md-4">
                <label for="applicant2_telephone" class="form-label">Telephone (Mobile)</label>
                <input type="number" class="form-control" name="applicant2_telephone" id="applicant2_telephone" required />
              </div>
            </div>
          </div>
        </div>

    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button
            class="btn btn-primary w-100 d-flex justify-content-between align-items-center"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#applicant3Details"
            aria-expanded="false"
            aria-controls="applicant3Details"
          >
            <span>Applicant 3 Detail</span>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="currentColor"
              class="bi bi-chevron-down"
              viewBox="0 0 16 16"
            >
              <path
                fill-rule="evenodd"
                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
              />
            </svg>
          </button>
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="applicant3Details">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="applicant3_fullname" class="form-label">Full Name (as per CNIC)</label>
                <input type="text" class="form-control" name="applicant3_fullname" id="applicant3_fullname" required placeholder="Enter Applicant Full Name" />
              </div>
              <div class="col-md-6">
                <label for="applicant3_fathername" class="form-label">Father / Husband Name</label>
                <input type="text" class="form-control" name="applicant3_fathername" id="applicant3_fathername" required placeholder="Enter Applicant Father / Husband Name" />
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant3_district_id" class="form-label">District</label>
                <select class="form-select form-control" name="applicant3_district_id" id="applicant3_district_id" required>
                  <option value="">Select District</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant3_tehsil_id" class="form-label">Tehsil</label>
                <select class="form-select form-control" name="applicant3_tehsil_id" id="applicant3_tehsil_id" required>
                  <option value="">Select Tehsil</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant3_domicile_id" class="form-label">District of Domicile</label>
                <select class="form-select form-control" name="applicant3_domicile_id" id="applicant3_domicile_id" required>
                  <option value="">Select District of Domicile</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant3_cnic" class="form-label">CNIC</label>
                <input type="number" class="form-control" name="applicant3_cnic" id="applicant3_cnic" required placeholder="Enter CNIC" />
              </div>
              <div class="col-md-4">
                <label for="applicant3_dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="applicant3_dob" id="applicant3_dob" required />
              </div>
              <div class="col-md-4">
                <label for="applicant3_gender" class="form-label">Gender</label>
                <select class="form-select form-control" name="applicant3_gender" id="applicant3_gender" required>
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
            </div>
        
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="applicant3_marital_status" class="form-label">Applicant Marital Status</label>
                <select class="form-select form-control" name="applicant3_marital_status" id="applicant3_marital_status" required>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="applicant3_whatsapp_no" class="form-label">Mobile (WhatsApp)</label>
                <input type="number" class="form-control" name="applicant3_whatsapp_no" id="applicant3_whatsapp_no" required />
              </div>
              <div class="col-md-4">
                <label for="applicant3_telephone" class="form-label">Telephone (Mobile)</label>
                <input type="number" class="form-control" name="applicant3_telephone" id="applicant3_telephone" required />
              </div>
            </div>
          </div>
        </div>
    
    	<div class="bg-white p-3 mb-4 rounded shadow">
          <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#qualificationDetails"
                  aria-expanded="false"
                  aria-controls="qualificationDetails">
            <span>Qualification</span>
            <svg id="qualificationIcon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                 class="bi bi-chevron-down transition-transform" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
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
                      <select id="applicant" class="form-select">
                        <option value="Applicant1">Applicant 1</option>
                        <option value="Applicant2">Applicant 2</option>
                      </select>
                    </td>
                    <td>
                      <select id="degree" class="form-select">
                        <option value="BSc">Bachelor of Science</option>
                        <option value="MSc">Master of Science</option>
                      </select>
                    </td>
                    <td>
                      <select id="institution" class="form-select">
                        <option value="Inst1">Institution 1</option>
                        <option value="Inst2">Institution 2</option>
                      </select>
                    </td>
                    <td>
                      <select id="type" class="form-select">
                        <option value="Regular">Regular</option>
                        <option value="Private">Private</option>
                      </select>
                    </td>
                    <td>
                      <select id="percentage" class="form-select">
                        <option value="50">50%</option>
                        <option value="60">60%</option>
                      </select>
                    </td>
                    <td>
                      <select id="from" class="form-select">
                        <option value="2020-01-01">2020-01-01</option>
                        <option value="2021-01-01">2021-01-01</option>
                      </select>
                    </td>
                    <td>
                      <select id="to" class="form-select">
                        <option value="2022-01-01">2022-01-01</option>
                        <option value="2023-01-01">2023-01-01</option>
                      </select>
                    </td>
                    <td>
                      <button onclick="addQualification()" class="btn btn-sm btn-success">Add</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        
            <button onclick="saveQualifications()" class="btn btn-primary mt-3">Save</button>
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
            <div class="mb-3">
              <label class="form-label">Total Experience (Years)</label>
              <select class="form-select">
                <option value="1">1 Year</option>
                <option value="2">2 Years</option>
              </select>
            </div>
        
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
                      <select id="applicantExperience" class="form-select">
                        <option value="Applicant1">Applicant 1</option>
                        <option value="Applicant2">Applicant 2</option>
                      </select>
                    </td>
                    <td>
                      <select id="employer" class="form-select">
                        <option value="Employer1">Employer 1</option>
                        <option value="Employer2">Employer 2</option>
                      </select>
                    </td>
                    <td>
                      <select id="designation" class="form-select">
                        <option value="Manager">Manager</option>
                        <option value="Engineer">Engineer</option>
                      </select>
                    </td>
                    <td>
                      <select id="fromExperience" class="form-select">
                        <option value="2020-01-01">2020-01-01</option>
                        <option value="2021-01-01">2021-01-01</option>
                      </select>
                    </td>
                    <td>
                      <select id="toExperience" class="form-select">
                        <option value="2022-01-01">2022-01-01</option>
                        <option value="2023-01-01">2023-01-01</option>
                      </select>
                    </td>
                    <td>
                      <select id="expYears" class="form-select">
                        <option value="1">1 Year</option>
                        <option value="2">2 Years</option>
                      </select>
                    </td>
                    <td>
                      <button onclick="addExperience()" class="btn btn-sm btn-success">Add</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
        
            <button onclick="saveExperience()" class="btn btn-primary mt-3">Save</button>
          </div>
        </div>

		<div class="bg-white p-3 mb-4 rounded shadow">
          <button
            class="btn btn-primary w-100 d-flex justify-content-between align-items-center"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#declarationDetails"
            aria-expanded="false"
            aria-controls="declarationDetails"
          >
            <span>Declaration</span>
            <svg
              id="declarationIcon"
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
        
          <div class="collapse mt-3 border rounded p-3 bg-light" id="declarationDetails">
            <div class="mb-3">
              <p class="form-label">
                At present, the private individual has not filed a litigation case
                against Punjab Education Foundation in any court of law.
              </p>
        
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="litigation"
                  id="litigationYes"
                  value="yes"
                  required
                />
                <label class="form-check-label" for="litigationYes">Yes</label>
              </div>
        
              <div class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="litigation"
                  id="litigationNo"
                  value="no"
                  required
                />
                <label class="form-check-label" for="litigationNo">No</label>
              </div>
        
              <div id="caseAttachment" class="mt-3 d-none">
                <label for="caseFile" class="form-label">
                  If "No", attach a photocopy of the case/detail with this application
                </label>
                <input
                  type="file"
                  id="caseFile"
                  class="form-control"
                />
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
        <div class="col"><a href="<?php echo url('/admin/school') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"> <?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"> <?php echo lang('submit') ?></button></div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</section>
<?php include viewPath('admin/includes/footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	$('#school_state_id').on('change', function() {
		  $.post('<?=base_url("school/distirct_by_state")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  state_id : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#school_district_id option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#school_district_id')
			 .append($("<option></option>")
						.attr("value", value.district_id)
						.text(value.district_name_en)
					  ); 
			});   
		});
	});
	$('#school_district_id').on('change', function() {
		  $.post('<?=base_url("school/tehsil_by_district")?>',
		{
		  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		  district_id : this.value
		},
		function(data){
		  arr = $.parseJSON(data);     
		  console.log(arr);     
		  $('#school_tehsil_id option:not(:first)').remove();
		  $.each(arr, function(key, value) {           
		 $('#school_tehsil_id')
			 .append($("<option></option>")
						.attr("value", value.tehsil_id)
						.text(value.tehsil_name_en)
					  ); 
			});   
		});
	});

  let currentlyEditing = null;

  function addQualification() {
    const applicant = document.getElementById("applicant").value;
    const degree = document.getElementById("degree").value;
    const institution = document.getElementById("institution").value;
    const type = document.getElementById("type").value;
    const percentage = document.getElementById("percentage").value;
    const from = document.getElementById("from").value;
    const to = document.getElementById("to").value;

    const tableBody = document.querySelector("#qualificationTable tbody");
    let newRow = document.createElement("tr");

    const rowHTML = `
      <td>${applicant}</td>
      <td>${degree}</td>
      <td>${institution}</td>
      <td>${type}</td>
      <td>${percentage}</td>
      <td>${from}</td>
      <td>${to}</td>
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

    document.getElementById("applicant").value = cells[0].textContent;
    document.getElementById("degree").value = cells[1].textContent;
    document.getElementById("institution").value = cells[2].textContent;
    document.getElementById("type").value = cells[3].textContent;
    document.getElementById("percentage").value = cells[4].textContent;
    document.getElementById("from").value = cells[5].textContent;
    document.getElementById("to").value = cells[6].textContent;

    document.querySelector("[onclick='addQualification()']").textContent = "Update";
  }

  function resetForm() {
    document.getElementById("applicant").value = "Applicant1";
    document.getElementById("degree").value = "BSc";
    document.getElementById("institution").value = "Inst1";
    document.getElementById("type").value = "Regular";
    document.getElementById("percentage").value = "50";
    document.getElementById("from").value = "2020-01-01";
    document.getElementById("to").value = "2022-01-01";
  }

  function saveQualifications() {
    alert("Qualifications saved successfully!");
  }
  
  let currentlyEditingExperience = null;

	function addExperience() {
	  const applicant = document.getElementById("applicantExperience").value;
	  const employer = document.getElementById("employer").value;
	  const designation = document.getElementById("designation").value;
	  const from = document.getElementById("fromExperience").value;
	  const to = document.getElementById("toExperience").value;
	  const years = document.getElementById("expYears").value;
	
	  const tableBody = document.querySelector("#experienceTable tbody");
	  let newRow = document.createElement("tr");
	
	  const rowHTML = `
		<td>${applicant}</td>
		<td>${employer}</td>
		<td>${designation}</td>
		<td>${from}</td>
		<td>${to}</td>
		<td>${years}</td>
		<td>
		  <button onclick="editExperience(this.closest('tr'))" class="btn btn-sm btn-warning me-1">Edit</button>
		  <button onclick="deleteExperience(this)" class="btn btn-sm btn-danger">Delete</button>
		</td>
	  `;
	
	  if (currentlyEditingExperience) {
		currentlyEditingExperience.innerHTML = rowHTML;
		currentlyEditingExperience = null;
		document.querySelector("[onclick='addExperience()']").textContent = "Add";
	  } else {
		newRow.innerHTML = rowHTML;
		tableBody.insertBefore(newRow, document.getElementById("inputRowExperience"));
	  }
	
	  resetExperienceForm();
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
	
	  document.getElementById("applicantExperience").value = cells[0].textContent;
	  document.getElementById("employer").value = cells[1].textContent;
	  document.getElementById("designation").value = cells[2].textContent;
	  document.getElementById("fromExperience").value = cells[3].textContent;
	  document.getElementById("toExperience").value = cells[4].textContent;
	  document.getElementById("expYears").value = cells[5].textContent;
	
	  document.querySelector("[onclick='addExperience()']").textContent = "Update";
	}
	
	function resetExperienceForm() {
	  document.getElementById("applicantExperience").value = "Applicant1";
	  document.getElementById("employer").value = "Employer1";
	  document.getElementById("designation").value = "Manager";
	  document.getElementById("fromExperience").value = "2020-01-01";
	  document.getElementById("toExperience").value = "2022-01-01";
	  document.getElementById("expYears").value = "1";
	}
	
	function saveExperience() {
	  alert("Experience data saved successfully!");
	}
	
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
