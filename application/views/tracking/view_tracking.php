<style>
.bold{
	font-weight:bold;
}
table.celborder> td {
  border: 1px solid black;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfSaCZ78ZRtFWUwBlRBBHJbT4qaWAbrGY"></script>
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.css">
<div class="content-wrapper">
  <section class="content"> 
    <!-- For Messages -->
    <?php $this->load->view('template/_messages.php') ?>
    <div class="card">
      <div class="card-header">
        <div class="d-inline-block">
          <h3 class="card-title"><i class="fa fa-list"></i>&nbsp; Tracking Detail</h3>
        </div>
        <div class="d-inline-block float-right">
          <?php //if($this->rbac->check_operation_permission('city_add')): ?>
          <a href="<?= base_url('tracking'); ?>" class="btn btn-success"><i class="fa fa-list"></i> Tracking List</a>
          <?php //endif; ?>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table width="100%" border="0" cellspacing="2" cellpadding="2">
            <tr>
              <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                        <tr>
                          <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                              <tr>
                                <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td><table class="celborder" width="100%" border="1" cellspacing="1" cellpadding="5">
                                          <tr>
                                            <td width="130" class="bold">Tracking ID:</td>
                                            <td><?php echo $tracking_detail['tra_id'];?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Message:</td>
                                            <td><?php echo $tracking_detail['tra_message']; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Result:</td>
                                            <td>
																<?php
                                                $varified = '<span style="color:red;">Not Verified</span>'; 
                                                if($tracking_detail['City_Name'] == $tracking_detail['Tracking_City'] 
                                                   && $tracking_detail['City_Name'] != '' && $tracking_detail['Tracking_City'] != '')
                                                {
                                                   $varified = '<span style="color:green;">Verified</span>';
                                                }
                                                   
                                                print $varified;	
                                                 ?>
                                             </td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Do No:</td>
                                            <td><?php echo $tracking_detail['Do_No']; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Do Create Date:</td>
                                            <td><?php echo $tracking_detail['Do_Date']; ?></td>
                                          </tr>
										  				<tr>
                                            <td class="bold">Do Scan Date:</td>
                                            <td><?php echo $tracking_detail['Do_Date_Scan']; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Customer ID:</td>
                                            <td><?php echo $tracking_detail['Customer_ID']; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Customer Name:</td>
                                            <td><?php echo $tracking_detail['Customer_Name']; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Customer City:</td>
                                            <td><?php echo $tracking_detail['City_Name']; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Employee:</td>
                                            <td><?php echo $tracking_detail['First_Name'].'('.$tracking_detail['tra_emp_id'].')'; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold">QR-Code:</td>
                                            <td><?php echo $tracking_detail['tra_qr_code']; ?></td>
                                          </tr>
                                          <tr>
                                            <td class="bold" valign="top">Product Detail:</td>
                                            <td>
														  		<?php 
																$qrcode_detail = $this->tracking_model->get_dispatchorderqrcodetracking_detail_by_id($tracking_detail['tra_qr_code']);
																//print '<pre>'; print_r($qrcode_detail);
																/*Array
																(
																	 [C_ID] => 1
																	 [T_ID] => 2
																	 [Detail_ID] => 1
																	 [Qr_String] => 1001011420050002#####1406-13712#####1406-3 3252
																	 [Dispatched_Qty] => 1.00
																	 [U_ID] => 2
																	 [SaleType_ID] => 1
																	 [Brand_ID] => 1
																	 [Product_ID] => 142
																	 [Packing_ID] => 5
																	 [SubProduct_ID] => 2
																)*/
																$typeofsale = substr($tracking_detail['tra_qr_code'],0,1);
																$quantity = (int)substr($tracking_detail['tra_qr_code'],1,3);
																$brandid = (int)substr($tracking_detail['tra_qr_code'],4,2);
																$prodid = (int)substr($tracking_detail['tra_qr_code'],6,3);
																$type = (int)substr($tracking_detail['tra_qr_code'],9,3);
																$colorcodeSubProduct_Code = (int)substr($tracking_detail['tra_qr_code'],12,4);
																?>
                                                <?php if(!empty($qrcode_detail)){?>
                                                <table width="100%" border="0" cellspacing="1" cellpadding="1">
                                                    <tr>
                                                        <td width="110" class="bold">Type of Sale:</td>
                                                        <td>
                                                        	<?php 
																			$type_detail = $this->tracking_model->get_type_by_id($qrcode_detail['SaleType_ID']);
																			print $type_detail['SaleType_Name'];
																			?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Quantity:</td>
                                                        <td><?php echo $qrcode_detail['Dispatched_Qty'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Brand:</td>
                                                        <td>
																				<?php 
                                                            $brand_detail = $this->tracking_model->get_brand_by_id($qrcode_detail['Brand_ID']);
                                                            print $brand_detail['Brand_Desc'];
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Product:</td>
                                                        <td>
																		  	<?php echo $qrcode_detail['Product_ID'];?>
                                                         <?php 
                                                            $prod_detail = $this->tracking_model->get_product_by_id($qrcode_detail['Product_ID']);
                                                            if(!empty($prod_detail))
																					print ' - '.$prod_detail['Product_Desc'];
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Packing Type:</td>
                                                        <td>
																		  	<?php 
                                                            $packing_detail = $this->tracking_model->get_packing_by_id($qrcode_detail['Packing_ID']);
                                                            if(!empty($packing_detail))
																					print $packing_detail['Packing_Desc'];
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold">Colorcode:</td>
                                                        <td>
																			  <?php 
                                                            $color_detail = $this->tracking_model->get_sal_subproduct_by_id($qrcode_detail['SubProduct_ID']);
                                                            if($color_detail)
                                                               print $color_detail['SubProduct_Desc'];
                                                            //print '<pre>';print_r($color_detail);
                                                            ?>
                                                         </td>
                                                    </tr>
                                                </table>
                                                <?php }?>
                                            </td>
                                          </tr>
                                          <?php /*?><tr>
                                            <td class="bold">City:</td>
                                            <td><?php  
												$apiKey = 'AIzaSyDfSaCZ78ZRtFWUwBlRBBHJbT4qaWAbrGY';  // Replace with your actual API key
												print $city = $this->tracking_model->getCityFromLatLong($tracking_detail['tra_lat'], $tracking_detail['tra_lon'], $apiKey); ?>
                                            </td>
                                          </tr><?php */?>
                                          <tr>
                                            <td class="bold">Tracking City:</td>
                                            <td><?php echo $tracking_detail['Tracking_City']; ?></td>
                                          </tr>
                                          <tr>
                                            <td valign="top" class="bold">Map:</td>
                                            <td>
                                            	<div id="map" style="height: 300px; width: 100%;"></div>
															<?php
                                             function displayMap($lat, $lng) {
                                                echo "
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
                                                   google.maps.event.addDomListener(window, 'load', initMap);
                                                </script>
                                                ";
                                             }
                                          
                                             displayMap($tracking_detail['tra_lat'], $tracking_detail['tra_lon']); // Example coordinates for San Francisco
                                             ?>
                                          
                                          </td>
                                          </tr>
                                          <tr>
                                            <td class="bold">Date:</td>
                                            <td><?php echo $tracking_detail['tra_datetime']; ?></td>
                                          </tr>
                                          <?php /*?><tr>
                                            <td class="bold">Error:</td>
                                            <td><?php echo $tracking_detail['tra_error']; ?></td>
                                          </tr><?php */?>
                                          <tr>
                                            <td colspan="2">&nbsp;</td>
                                          </tr>
                                          <tr>
                                            <td colspan="2" align="center"><a style="margin-bottom:10px;" class="btn btn-sm btn-success" href="<?php print base_url('tracking/trackinglist/');?>">Back to Tracking List</a></td>
                                          </tr>
                                        </table></td>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table></td>
                  </tr>
                  
                </table></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.card-body --> 
    </div>
  </section>
</div>
<script>
$( document ).ready(function() {
	$("#tracking").addClass('active menu-open');
	$("#tracking>a").addClass('active');
});  
</script> 
