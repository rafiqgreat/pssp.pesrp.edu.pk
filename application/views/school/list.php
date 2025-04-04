<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('includes/header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo lang('school_list') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active"><?php echo lang('school_list') ?></li>
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
      <h3 class="card-title"><?php echo lang('school_list') ?></h3>
      <div class="card-tools pull-right">
        <?php if (hasPermissions('school_add')): ?>
          <a href="<?php echo url('school/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?php echo lang('new_school') ?></a>
        <?php endif ?>
      </div>
    </div>
    <div class="card-body">
      <table id="dataTable1" class="table table-bordered table-responsive">
        <thead>
          <tr>
            <th>Sr.</th>
            <th>Username</th>
            <th>Type</th>
            <th>Name</th>
            <th>Address</th>
            <th>State</th>
            <th>District</th>
            <th>Tehsil</th>
            <th>Level</th>
            <th>Gender</th>
            <th><?php echo lang('action') ?></th>
          </tr>
        </thead>
        <tbody>

          <?php
			 $i = 0;
			 foreach ($schools as $row): 
			 
			 ?>
            <tr>
              <td><?php print ++$i; ?></td>
              <td><?php echo $row->username ?></td>
              <td><?php echo $row->school_type ?></td>
              <td><?php echo $row->school_name ?></td>
              <td><?php echo $row->school_address ?></td>
              <td><?php echo $row->state_name_en ?></td>
              <td><?php echo $row->district_name_en ?></td>
              <td><?php echo $row->tehsil_name_en; ?></td>
              <td><?php echo $row->school_level; ?></td>
              <td><?php echo $row->school_gender; ?></td>
              <td>
                <?php if (hasPermissions('school_edit')): ?>
                  <a href="<?php echo url('school/edit/'.$row->school_id) ?>" class="btn btn-sm btn-default" title="<?php echo lang('school_edit') ?>" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                <?php endif ?>
                <?php if (hasPermissions('school_delete')): ?>
                  <a href="<?php echo url('school/delete/'.$row->school_id) ?>" class="btn btn-sm btn-default" onclick='return confirm("Do you really want to delete this school ? \nIt may cause errors where it is currently being used !!")' title="<?php echo lang('school_delete') ?>" data-toggle="tooltip"><i class="fa fa-trash"></i></a>
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->

<?php include viewPath('includes/footer'); ?>
<?php
//google map api key: AIzaSyCNvWukrHmBuI-J1F3jhvQHc11y5Wux6bA
function getCityFromCoordinates($latitude, $longitude) {
	 $apiKey = "AIzaSyCNvWukrHmBuI-J1F3jhvQHc11y5Wux6bA"; // Replace with your API key
	 $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$latitude,$longitude&key=$apiKey";

	 $response = file_get_contents($url);
	 $data = json_decode($response, true);

	 if ($data['status'] == 'OK') {
		  foreach ($data['results'][0]['address_components'] as $component) {
				if (in_array("locality", $component["types"])) {
					 return $component["long_name"]; // City name
				}
		  }
	 }

	 return "";
}
?>
<script>
  $('#dataTable1').DataTable()
</script>