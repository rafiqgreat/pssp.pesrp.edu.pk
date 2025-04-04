<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo lang('school') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo url('/school') ?>"> <?php echo lang('school_list') ?></a></li>
          <li class="breadcrumb-item active"> <?php echo lang('school_add') ?></li>
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
      <h3 class="card-title"> <?php echo lang('school_add') ?></h3>

      <div class="card-tools pull-right">
        <a href="<?php echo url('school') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  <?php echo lang('school') ?></a>
      </div>

    </div>

    <?php echo form_open_multipart('school/save', [ 'class' => 'form-validate' ], ); ?>
    <div class="card-body">
        <div class="row form-group">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_name"> <?php echo lang('school_name') ?></label>
                <input type="text" class="form-control" name="school_name" id="school_name" required placeholder="Enter Name" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="username"> <?php echo lang('school_username') ?></label>
                <input type="text" class="form-control" name="username" id="username" required placeholder="Enter Username" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_password"> <?php echo lang('school_password') ?></label>
        		<input type="password" class="form-control" data-rule-remote="<?php echo url('permissions/checkIfUnique') ?>" name="password" id="password" required placeholder="Enter Password" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_department"> <?php echo lang('school_department') ?></label>
                <input type="text" class="form-control" name="school_department" id="school_department" required placeholder="Enter School Department" autofocus />
            </div>
            
        </div>
        <div class="row form-group">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_state_id"> <?php echo lang('school_state') ?></label>
                <select class="form-control" name="school_state_id" id="school_state_id" required>
                    <option value="">Select State</option>
                    <?php
					   foreach($states as $state)
					  {
						echo '<option value="'.$state->state_id.'">'.$state->state_name_en.'</option>';
					  }
                  	?>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_district_id"> <?php echo lang('school_district') ?></label>
        		<select class="form-control" name="school_district_id" id="school_district_id" required>
                    <option value="">Select District</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_tehsil_id"> <?php echo lang('school_tehsil') ?></label>
                <select class="form-control" name="school_tehsil_id" id="school_tehsil_id" required>
                    <option value="">Select Tehsil</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_address"> <?php echo lang('school_address') ?></label>
        		<input type="text" class="form-control" name="school_address" id="school_address" required placeholder="Enter School Address" autofocus />
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_uc"> <?php echo lang('school_uc') ?></label>
                <input type="number" class="form-control" name="school_uc" id="school_uc" required placeholder="Enter School UC" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_uc_name"> <?php echo lang('school_uc_name') ?></label>
        		<input type="text" class="form-control" name="school_uc_name" id="school_uc_name" required placeholder="Enter School UC Name" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_level"> <?php echo lang('school_level') ?></label>
                <select class="form-control" name="school_level" id="school_level" required>
                    <option value="">Select Level</option>
                    <option value="Primary">Primary</option>
                    <option value="Middle">Middle</option>
                    <option value="High">High</option>
                    <option value="Higher Secondary">Higher Secondary</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_gender"> <?php echo lang('school_gender') ?></label>
        		<select class="form-control" name="school_gender" id="school_gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_email"> <?php echo lang('school_email') ?></label>
                <input type="text" class="form-control" name="school_email" id="school_email" required placeholder="Enter School Email" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_phone"> <?php echo lang('school_phone') ?></label>
        		<input type="text" class="form-control" name="school_phone" id="school_phone" required placeholder="Enter School Phone No." autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_contact_name"> <?php echo lang('school_contact_name') ?></label>
                <input type="text" class="form-control" name="school_contact_name" id="school_contact_name" required placeholder="Enter School Contact Name" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_contact_mobile"> <?php echo lang('school_contact_mobile') ?></label>
        		<input type="text" class="form-control" name="school_contact_mobile" id="school_contact_mobile" required placeholder="Enter School Contact Mobile" autofocus />
            </div>
        </div>
        
        <div class="row form-group">
        	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_type"> <?php echo lang('school_type') ?></label>
        		<select class="form-control" name="school_type" id="school_type" required>
                    <option value="">Select Type</option>
                    <option value="Public">Public</option>
                    <option value="Private">Private</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_chain_id"> <?php echo lang('school_chain_id') ?></label>
        		<select name="school_chain_id" class="form-control form-group" id="school_chain_id" placeholder="" >
                    <option value="">---Select School Chain---</option>
                    <?php 
                        foreach($schoolchains as $sc){
                            echo '<option value="'.$sc->schoolchain_id.'">'.$sc->schoolchain_name_en.'</option>';
                          }
                    ?>  
                </select> 
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_logo"> <?php echo lang('school_logo') ?></label>
                <input type="file" name="school_logo" class="form-control" id="school_logo" placeholder="" >
            </div>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('/school') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"> <?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"> <?php echo lang('submit') ?></button></div>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</section>
<?php include viewPath('includes/footer'); ?>
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
</script>