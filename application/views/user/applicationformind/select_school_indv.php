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
        <h1><?php echo 'Individual Application Form' ?></h1>
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
      <h3 class="card-title"> <?php echo 'Select School' ?></h3>

      <div class="card-tools pull-right">
        <a href="<?php echo url('/user/') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  <?php echo '' ?></a>
      </div>

    </div>

    
    <div class="card-body">
    	<div class="bg-white p-4 mb-4 rounded shadow">
        <?php if ($this->session->userdata['success']): ?>
          <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
            <p style="color:#F00; font-size:18px; font-weight:bold"><?php echo $this->session->userdata['success']; ?><br> Now Generate Challan Form</p>
          </div>
        <?php endif; ?>

    <!-- Accordion Button -->
            <button class="btn btn-primary w-100 d-flex justify-content-between align-items-center"
                type="button" data-bs-toggle="collapse" data-bs-target="#searchDetails" aria-expanded="false" aria-controls="searchDetails">
                <span>Search</span>
                <svg id="searchIcon" xmlns="http://www.w3.org/2000/svg"
                    class="ms-auto" width="20" height="20" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>
       <?php echo form_open_multipart('user/applicationformind/save_school', ['class' => 'form-validate']); ?>

        <div class="collapse mt-3 p-3 border rounded bg-light" id="searchDetails">
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
			
            <div class="bg-white p-3 mt-4 rounded shadow">
                <h2 class="h5 mb-3">Available Schools</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Sr#</th>
                                <th>EMISCODE</th>
                                <th>School Name</th>
                                <th>District</th>
                                <th>Tehsil</th>
                                <th>Gender</th>
                                <th>School Level</th>
                                <th>Total Teachers</th>
                                <th>Total Students</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="schoolTableBody">
                            <!-- Dynamically populated -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-flat btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include viewPath('admin/includes/footer'); ?>

<script type="text/javascript">
	let nominatedSchools = [];  
	$('#school_district_id').on('change', function() {
		$.post('<?=base_url("user/applicationform/teh_by_district")?>',
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
	
	$('#school_tehsil_id').on('change', function() {
        let tehsil_id = this.value;

        if (tehsil_id) {
            $.post('<?= base_url("user/applicationform/school_by_tehsil") ?>', {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                tehsil_id: tehsil_id
            }, function(data) {
                let schools = $.parseJSON(data);
                let rows = '';

                if (schools.length > 0) {
                    $.each(schools, function(index, school) {
                        rows += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${school.username}</td>
                                <td>${school.school_name}</td>
                                <td>${school.school_district_id}</td>
                                <td>${school.school_tehsil_id}</td>
                                <td>${school.school_gender}</td>
                                <td>${school.school_level}</td>
                                <td>${school.school_total_teachers ?? '-'}</td>
                                <td>${school.school_total_students ?? '-'}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary nominate-btn" data-id="${school.school_id}">Nominate</button>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    rows = '<tr><td colspan="10" class="text-center">No schools found.</td></tr>';
                }

                $('#schoolTableBody').html(rows);
            });
        }
    });

    // Handle Nominate button click
    $(document).on('click', '.nominate-btn', function() {
        let schoolId = $(this).data('id');
        
        // Check if already nominated
        if (nominatedSchools.includes(schoolId)) {
            alert("This school is already nominated.");
            return;
        }

        // Check if max of 3 schools are nominated
        if (nominatedSchools.length < 3) {
            nominatedSchools.push(schoolId);
            $(this).text('Nominated').attr('disabled', true);  // Change button text and disable it
        } else {
            alert("You can only nominate a maximum of 3 schools.");
        }
    });

    // Submit form
    // Submit form
	$('form').submit(function(e) {
		// Prevent form submission if no schools are nominated
		if (nominatedSchools.length === 0) {
			alert('Please nominate at least one school.');
			e.preventDefault();
			return;
		}
	
		// Append nominated schools to the form before submission
		$('<input>').attr({
			type: 'hidden',
			name: 'selected_schools',  // Make sure the name matches the controller’s expected name
			value: JSON.stringify(nominatedSchools)
		}).appendTo(this);
	});

		




</script>

 <?php /*?><tr>
    <td>1</td>
    <td>EMIS12345</td>
    <td>Govt. High School Model Town</td>
    <td>Lahore</td>
    <td>Lahore City</td>
    <td>Boys</td>
    <td>High</td>
    <td>15</td>
    <td>300</td>
    <td>
        <button class="btn btn-sm btn-primary"
            onclick="nominateSchool('EMIS12345', 'Govt. High School Model Town')">Nominate</button>
    </td>
</tr>
<tr>
    <td>2</td>
    <td>EMIS67890</td>
    <td>Punjab Public School</td>
    <td>Kasur</td>
    <td>Kasur</td>
    <td>Girls</td>
    <td>Primary</td>
    <td>8</td>
    <td>150</td>
    <td>
        <button class="btn btn-sm btn-primary"
            onclick="nominateSchool('EMIS67890', 'Punjab Public School')">Nominate</button>
    </td>
</tr>
<tr>
    <td>3</td>
    <td>EMIS24680</td>
    <td>Govt. Pilot Secondary School</td>
    <td>Sheikhupura</td>
    <td>Sheikhupura</td>
    <td>Co-ed</td>
    <td>Secondary</td>
    <td>12</td>
    <td>200</td>
    <td>
        <button class="btn btn-sm btn-primary"
            onclick="nominateSchool('EMIS24680', 'Govt. Pilot Secondary School')">Nominate</button>
    </td>
</tr><?php */?>
