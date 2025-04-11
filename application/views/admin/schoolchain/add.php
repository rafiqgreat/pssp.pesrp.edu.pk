<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('admin/includes/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo lang('schoolchain') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/admin/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item"><a href="<?php echo url('/admin/schoolchain') ?>"> <?php echo lang('schoolchain_list') ?></a></li>
          <li class="breadcrumb-item active"> <?php echo lang('new_schoolchain') ?></li>
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
      <h3 class="card-title"> <?php echo lang('schoolchain_add') ?></h3>

      <div class="card-tools pull-right">
        <a href="<?php echo url('admin/schoolchain') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;  <?php echo lang('schoolchain') ?></a>
      </div>

    </div>

    <?php echo form_open_multipart('admin/schoolchain/save_schoolchain', [ 'class' => 'form-validate' ], ); ?>
    <div class="card-body">
        <div class="row form-group">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="schoolchain_name_en"> <?php echo lang('schoolchain_name') ?></label>
                <input type="text" class="form-control" name="schoolchain_name_en" id="schoolchain_name_en" required placeholder="Enter Schoolchain Name" autofocus />
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="schoolchain_code"> <?php echo lang('schoolchain_code') ?></label>
        		<input type="text" class="form-control" name="schoolchain_code" id="schoolchain_code" required placeholder="Enter Schoolchain Code" autofocus />
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="schoolchain_sort"> <?php echo lang('schoolchain_order') ?></label>
        		<input type="text" class="form-control" name="schoolchain_sort" id="schoolchain_sort" required placeholder="Enter Schoolchain Order" autofocus />
            </div>
            
        </div>
        
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <div class="row">
        <div class="col"><a href="<?php echo url('admin/location/schoolchain') ?>" onclick="return confirm('Are you sure you want to leave?')" class="btn btn-flat btn-danger"> <?php echo lang('cancel') ?></a></div>
        <div class="col text-right"><button type="submit" class="btn btn-flat btn-primary"> <?php echo lang('submit') ?></button></div>
      </div>
    </div>
    <!-- /.card-footer-->

    <?php echo form_close(); ?>

  </div>
  <!-- /.card -->

</section>
<!-- /.content -->



<?php include viewPath('admin/includes/footer'); ?>