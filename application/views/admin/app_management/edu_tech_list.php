<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php include viewPath('admin/includes/header'); ?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo 'Edu Tech List' ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/admin/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active"><?php echo 'Edu Tech List' ?></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex p-0">
            <h3 class="card-title p-3"><?php echo 'Edu Tech List' ?></h3>
            <div class="ml-auto p-2">
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Sr.</th>
                  <th>Name</th>
                  <th>District</th>
                  <th>Tehsil</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0;
                foreach ($edu_tech as $row): ?>
                  <tr>
                    <td><?php print ++$i; ?></td>
                    <td><?php echo $row->et_fname ?></td>
                    <td><?php echo $row->district_name_en ?></td>
                    <td><?php echo $row->tehsil_name_en ?></td>
                    <td>
                      <input type="checkbox" name="my-checkbox" onchange="('<?php echo $row->et_id ?>', this.checked)" <?php echo ($row->et_application_status == 1) ? 'checked' : ''; ?> data-bootstrap-switch data-off-color="secondary" data-on-color="success" data-off-text="<?php echo lang('lan_inactive') ?>" data-on-text="<?php echo lang('lan_active') ?>">
                    </td>
                    <td>
                      <?php //if (hasPermissions('district_delete')): ?>
                      	<a href="<?php echo url('admin/app_management/et_view/'.$row->et_id) ?>" class="btn btn-sm btn-info" title="<?php echo 'View Detail' ?>" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo url('admin/app_management/et_delete/' . $row->et_id . '?table=tbl_user_edu_tech&key=et_id') ?>" class="btn btn-sm btn-default" onclick='return confirm("Do you really want to delete this Application ? \nIt may cause errors where it is currently being used !!")' title="<?php echo lang('et_delete') ?>" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                      <?php // endif ?>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->



<?php include viewPath('admin/includes/footer'); ?>

<script>
  /*window.updateStateStatus = (district_id, status) => {
    $.get('< ?php echo url('location/change_district_status') ?>/' + district_id, {
      district_status: status // Fix: Use correct parameter name
    }, (data, status) => {
      if (data == 'done') {
        // Success response
      } else {
        alert('< ?php echo lang('user_unable_change_status') ?>');
      }
    });
  };*/
</script>