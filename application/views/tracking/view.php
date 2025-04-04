<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include viewPath('includes/header'); ?>
<!-- Content Header (Page header) -->

<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1><?php echo lang('tracking_dtl') ?></h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="<?php echo url('/') ?>"><?php echo lang('home') ?></a></li>
               <li class="breadcrumb-item"><a href="<?php echo url('/tracking') ?>"> <?php echo lang('tracking') ?></a></li>
               <li class="breadcrumb-item active"> <?php echo lang('tracking_dtl') ?></li>
            </ol>
         </div>
      </div>
   </div>
   <!-- /.container-fluid --> 
</section>

<!-- Main content -->
<section class="content"> 
   
   <!-- Default card -->
   <div class="card">
      <div class="card-header with-border">
         <h3 class="card-title"> <?php echo lang('tracking_dtl') ?></h3>
         <div class="card-tools pull-right"> <a href="<?php echo url('tracking') ?>" class="btn btn-flat btn-default btn-sm"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp; <?php echo lang('tracking') ?></a> </div>
      </div>
      <table width="99%" border="0" cellspacing="2" cellpadding="2" style="margin:05px 05px 05px 05px">
         <tr>
            <td>
            	<table class="celborder" width="100%" border="1" cellspacing="1" cellpadding="5">
            		<tr>
                     <td colspan="2" class="bold"><h4>Basic Detail</h4></td>
                  </tr>
                  <tr>
                     <td width="130" class="bold">Tracking ID:</td>
                     <td><?php echo $tra_dtl['tr_id'];?></td>
                  </tr>
                  <tr>
                     <td class="bold">Tracked:</td>
                     <td><?php echo date('d-m-Y / h:i A', strtotime($tra_dtl['tr_datetime'])); ?></td>
                  </tr>
                  <tr>
                     <td class="bold">Track Code:</td>
                     <td><?php echo $tra_dtl['tr_code']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">Monitor/Tracker lat,lon:</td>
                     <td><?php echo $tra_dtl['tr_lat'].', '. $tra_dtl['tr_lon']; ?></td>
                  </tr>
                  <tr>
                     <td valign="top" class="bold">Map:</td>
                     <td>
                     	<?php /*?><div id="map" style="height: 300px; width: 100%;"></div><?php */?>
                        <?php
									function displayMap($lat, $lng) 
									{
										echo "
										<div id='map' style='width: 100%; height: 400px;'></div>
										<script>
											function initMap() {
												var location = {lat: $lat, lng: $lng};
												var map = new google.maps.Map(document.getElementById('map'), {
													zoom: 16,
													center: location
												});
												var marker = new google.maps.Marker({
													position: location,
													map: map
												});
											}
										</script>
										<script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCNvWukrHmBuI-J1F3jhvQHc11y5Wux6bA&callback=initMap'></script>
										";
									}
							
								// Call the function
								displayMap($tra_dtl['tr_lat'], $tra_dtl['tr_lon']); ?>
                     </td>
                  </tr>
                  <tr>
                     <td class="bold">Tracked By:</td>
                     <td><?php echo $tra_dtl['name']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">Track Role:</td>
                     <td><?php echo $tra_dtl['title']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">District:</td>
                     <td><?php echo $tra_dtl['district']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">Tehsil:</td>
                     <td><?php echo $tra_dtl['tehsil']; ?></td>
                  </tr>
                  <tr>
                     <td colspan="2" class="bold"><h4>Packet/Delivery Detail</h4></td>
                  </tr>
                  <tr>
                     <td class="bold">Type:</td>
                     <td><?php echo $tra_dtl['ctype']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">District:</td>
                     <td><?php echo $tra_dtl['cdistrictname']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">Tehsil:</td>
                     <td><?php echo $tra_dtl['ctehsilname']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">Center ID:</td>
                     <td><?php echo $tra_dtl['cid']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">Center Name:</td>
                     <td><?php echo $tra_dtl['cname']; ?></td>
                  </tr>
                  <tr>
                     <td class="bold">EMIS:</td>
                     <td><?php echo $tra_dtl['cemis']; ?></td>
                  </tr>
                  <tr>
                     <td colspan="2">&nbsp;</td>
                  </tr>
                  <tr>
                     <td colspan="2" align="center"><a style="margin-bottom:10px;" class="btn btn-sm btn-success" href="<?php print base_url('tracking');?>">Back to Tracking List</a></td>
                  </tr>
               </table></td>
         </tr>
      </table>
   </div>
   <!-- /.card --> 
</section>
<!-- /.content --> 

<script>
  $(document).ready(function() {
    $('.form-validate').validate({
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });

    $('.check-select-all-p').on('change', function() {

      $('.check-select-p').attr('checked', $(this).is(':checked'));
      
    })

    $('.table-DT').DataTable({
      "ordering": false,
    });
  })

</script>
<?php include viewPath('includes/footer'); ?>
<script>
      //Initialize Select2 Elements
    $('.select2').select2()
</script>