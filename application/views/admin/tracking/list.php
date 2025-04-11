<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include viewPath('admin/includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?php echo lang('tracking') ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?php echo url('/admin/') ?>"><?php echo lang('home') ?></a></li>
          <li class="breadcrumb-item active"><?php echo lang('tracking') ?></li>
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
      <h3 class="card-title"><?php echo lang('list_all_tracking') ?></h3>

      <?php /*?><div class="card-tools pull-right">
        <?php if (hasPermissions('tracking_add')): ?>
          <a href="<?php echo url('admin/tracking/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?php echo lang('create_permission') ?></a>
        <?php endif ?>
      </div><?php */?>

    </div>
    <div class="card-body">
    <?php /*?>Listing column should be
Sr, Tracker (Role), Tracker District, Tracking Code, Tracking Date Time, tracking location, Packet type, destination District, destination Tehsil and Destination Center name and code<?php */?>
      <table id="dataTable1" class="table table-bordered table-responsive">
        <thead>
          <tr>
            <th>Sr</th>
            <th>Tracker (Role)</th>
            <th>Tracker District</th>
            <th>Tracking Code</th>
            <th>Tracking Date Time</th>
            <th>Tracking Location</th>
            <th>Packet Type</th>
            <th>Destination District</th>
            <th>Destination Tehsil</th>
            <th>Destination Center Name (code)</th>
            <th><?php echo lang('action') ?></th>
          </tr>
        </thead>
        <tbody>

          <?php
			 $i = 0;
			 foreach ($tracking as $row): ?>
            <tr>
              <td><?php print ++$i; ?></td>
              <td><?php echo $row->title ?></td>
              <td><?php echo $row->district ?></td>
              <td><?php echo $row->tr_code ?></td>
              <td><?php echo date('d-m-Y / h:i A', strtotime($row->tr_datetime)); ?></td>
              <td>
              		<?php
						// Example usage:
						$latitude = 43.6532; // Toronto latitude
						$longitude = -79.3832; // Toronto longitude
						//echo getCityFromCoordinates($latitude, $longitude);
						echo getCityFromCoordinates($row->tr_lat, $row->tr_lon);
						?>

              </td>
              <td><?php echo $row->ctype ?></td>
              <td><?php echo $row->cdistrictname ?></td>
              <td><?php echo $row->ctehsilname ?></td>
              <td><?php echo $row->cname.' ('.$row->cemis.')'; ?></td>
              <td>
                <?php if (hasPermissions('tracking_view')): ?>
                  <a href="<?php echo url('admin/tracking/view/'.$row->tr_id) ?>" class="btn btn-sm btn-default" title="<?php echo lang('view_tracking') ?>" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
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

<?php include viewPath('admin/includes/footer'); ?>
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