<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include viewPath('admin/includes/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo lang('settings') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/admin/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active"><?php echo lang('settings') ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-3">
      <?php include 'sidebar.php'; ?>
    </div>
    <div class="col-sm-9">
      <!-- Default card -->
      <div class="card">
        <div class="card-header with-border">
          <h3 class="card-title"><?php echo lang('company_setings') ?></h3>
        </div>
        <?php echo form_open_multipart('admin/settings/companyUpdate', [ 'class' => 'form-validate', 'autocomplete' => 'off', 'method' => 'post' ]); ?>
        <div class="card-body">
          <div class="form-group">
            <label for="formSetting-Company-Name"><?php echo lang('settings_company_name') ?></label>
            <input type="text" class="form-control" name="company_name" id="formSetting-Company-Name" value="<?php echo setting('company_name') ?>" required placeholder="<?php echo lang('settings_company_name') ?>" autofocus />
          </div>
          <div class="form-group">
            <label for="formSetting-Company-Email"><?php echo lang('settings_company_email') ?></label>
            <input type="text" class="form-control" name="company_email" id="formSetting-Company-Email" value="<?php echo setting('company_email') ?>" required placeholder="<?php echo lang('settings_company_email') ?>" autofocus />
          </div>
			 <div class="form-group">
            <label for="formSetting-spell">Spell</label>
            <input type="text" class="form-control" name="spell" id="formSetting-spell" value="<?php echo setting('spell') ?>" required placeholder="<?php echo lang('settings_spell') ?>" autofocus />
          </div>
          <div class="form-group">
            <label for="formSetting-deadline">Application Deadline</label>
            <input type="datetime-local" class="form-control" name="deadline" id="formSetting-Company-Email" value="<?php echo setting('deadline') ?>" required placeholder="<?php echo lang('settings_deadline') ?>" autofocus />
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="submit" class="btn btn-flat btn-primary"><?php echo lang('submit') ?></button>
        </div>
        <!-- /.card-footer-->
        <?php echo form_close(); ?>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
<!-- /.content -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deadlineInput = document.getElementById('formSetting-deadline');
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    
    const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
    deadlineInput.setAttribute('min', minDateTime);
  });

  $(document).ready(function() {
	  
    $('.form-validate').validate();
      //Initialize Select2 Elements
    $('.select2').select2()
  })
  function previewImage(input, previewDom) {
    if (input.files && input.files[0]) {
      $(previewDom).show();
      var reader = new FileReader();
      reader.onload = function(e) {
        $(previewDom).find('img').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }else{
      $(previewDom).hide();
    }
  }
</script>
<?php include viewPath('admin/includes/footer'); ?>
