<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('admin/includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo lang('school') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/admin/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo url('/admin/school') ?>"> <?php echo lang('school_list') ?></a></li>
          <li class="breadcrumb-item active"> <?php echo lang('school_edit') ?></li>
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
      <h3 class="card-title"> <?php echo lang('school_edit') ?></h3>

      <div class="card-tools pull-right">
        <a href="<?php echo url('admin/school') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  <?php echo lang('school') ?></a>
      </div>

    </div>

    <?php echo form_open_multipart('admin/school/school_update/'.$school->school_id, [ 'class' => 'form-validate' ]); ?>
    <?php //print_r($school); ?>
    <div class="card-body">
        <div class="row form-group">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_name"> <?php echo lang('school_name') ?></label>
                <input type="text" class="form-control" name="school_name" id="school_name" required placeholder="Enter Name" value="<?php echo $school->school_name ?>" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="username"> <?php echo lang('school_username') ?></label>
                <input type="text" class="form-control" name="username" id="username" required placeholder="Enter Username" value="<?php echo $school->username ?>" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_password"> <?php echo lang('school_password') ?></label>
        		<input type="password" class="form-control" data-rule-remote="<?php echo url('permissions/checkIfUnique') ?>" name="password" id="password" required placeholder="Enter Password" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_department"> <?php echo lang('school_department') ?></label>
                <input type="text" class="form-control" name="school_department" id="school_department" required placeholder="Enter School Department" value="<?php echo $school->school_department ?>" autofocus />
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
						echo '<option value="'.$state->state_id.'" '.($state->state_id == $school->school_state_id ? 'selected' : '').'>'.$state->state_name_en.'</option>';
					  }
                  	?>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_district_id"> <?php echo lang('school_district') ?></label>
        		<select class="form-control" name="school_district_id" id="school_district_id" required>
                    <option value="">Select District</option>
                    <?php
					   foreach($districts as $district)
					  {
						echo '<option value="'.$district->district_id.'" '.($district->district_id == $school->school_district_id ? 'selected' : '').'>'.$district->district_name_en.'</option>';
					  }
                  	?>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_tehsil_id"> <?php echo lang('school_tehsil') ?></label>
                <select class="form-control" name="school_tehsil_id" id="school_tehsil_id" required>
                    <option value="">Select Tehsil</option>
                    <?php
					   foreach($tehsils as $tehsil)
					  {
						echo '<option value="'.$tehsil->tehsil_id.'" '.($tehsil->tehsil_id == $school->school_tehsil_id ? 'selected' : '').'>'.$tehsil->tehsil_name_en.'</option>';
					  }
                  	?>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_address"> <?php echo lang('school_address') ?></label>
        		<input type="text" class="form-control" name="school_address" id="school_address" required placeholder="Enter School Address" value="<?php echo $school->school_address ?>" autofocus />
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_uc"> <?php echo lang('school_uc') ?></label>
                <input type="number" class="form-control" name="school_uc" id="school_uc" required placeholder="Enter School UC" value="<?php echo $school->school_uc ?>" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_uc_name"> <?php echo lang('school_uc_name') ?></label>
        		<input type="text" class="form-control" name="school_uc_name" id="school_uc_name" required placeholder="Enter School UC Name" value="<?php echo $school->school_uc_name ?>" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_level"> <?php echo lang('school_level') ?></label>
                <select class="form-control" name="school_level" id="school_level" required>
                    <option value="">Select Level</option>
                    <option value="Primary" <?php if($school->school_level=="Primary"){echo "selected";}?>>Primary</option>
                    <option value="Middle" <?php if($school->school_level=="Middle"){echo "selected";}?>>Middle</option>
                    <option value="High" <?php if($school->school_level=="High"){echo "selected";}?>>High</option>
                    <option value="Higher Secondary" <?php if($school->school_level=="Higher Secondary"){echo "selected";}?>>Higher Secondary</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_gender"> <?php echo lang('school_gender') ?></label>
        		<select class="form-control" name="school_gender" id="school_gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" <?php if($school->school_gender=="Male"){echo "selected";}?>>Male</option>
                    <option value="Female" <?php if($school->school_gender=="Female"){echo "selected";}?>>Female</option>
                </select>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_email"> <?php echo lang('school_email') ?></label>
                <input type="text" class="form-control" name="school_email" id="school_email" required placeholder="Enter School Email" value="<?php echo $school->school_email ?>" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_phone"> <?php echo lang('school_phone') ?></label>
        		<input type="text" class="form-control" name="school_phone" id="school_phone" required placeholder="Enter School Phone No." value="<?php echo $school->school_phone ?>" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_contact_name"> <?php echo lang('school_contact_name') ?></label>
                <input type="text" class="form-control" name="school_contact_name" id="school_contact_name" required placeholder="Enter School Contact Name" value="<?php echo $school->school_contact_name ?>" autofocus />
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_contact_mobile"> <?php echo lang('school_contact_mobile') ?></label>
        		<input type="text" class="form-control" name="school_contact_mobile" id="school_contact_mobile" required placeholder="Enter School Contact Mobile" value="<?php echo $school->school_contact_mobile ?>" autofocus />
            </div>
        </div>
        
        <div class="row form-group">
        	<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_type"> <?php echo lang('school_type') ?></label>
        		<select class="form-control" name="school_type" id="school_type" required>
                    <option value="">Select Type</option>
                    <option value="Public" <?php if($school->school_type=="Public"){echo "selected";}?>>Public</option>
                    <option value="Private" <?php if($school->school_type=="Private"){echo "selected";}?>>Private</option>
                </select>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_chain_id"> <?php echo lang('school_chain_id') ?></label>
        		<select name="school_chain_id" class="form-control form-group" id="school_chain_id" placeholder="" >
                    <option value="">---Select School Chain---</option>
                    <?php 
                        foreach($schoolchain as $sc){
							echo '<option value="'.$sc->schoolchain_id.'" '.($sc->schoolchain_id == $school->school_chain_id ? 'selected' : '').'>'.$sc->schoolchain_name_en.'</option>';
                          }
                    ?>  
                </select> 
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <label for="school_logo"> <?php echo lang('school_logo') ?></label>
                <input type="file" name="school_logo" class="form-control" id="school_logo" placeholder="" >
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php 
					if (isset($school->school_logo) && $school->school_logo!="")
					{
						?><img src="<?php echo base_url().$school['school_logo'];?>" style="max-height:100px; max-width:100px;"/>
                        <a class="delete btn btn-sm btn-danger" style="padding-left:10px" 
                        href="<?php echo base_url("school/update". $school['school_id']);?>" 
                        title="Delete" ><i class="fa fa-trash-o"></i></a><?php }?>
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
  <!-- /.card -->

</section>
<!-- /.content -->

<?php include viewPath('admin/includes/footer'); ?>