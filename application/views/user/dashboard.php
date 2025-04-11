<style>
  .district {
    font-weight: bold;
    font-size: 24px;
    margin-top: 15px;
  }
  .bdr {
    border-radius: 10px !important;
  }
  .small-box:hover {
    transform: translateY(-10px);
    transition: transform 0.5s ease-in-out;
  }
    </style>
<?php
defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php include viewPath('user/includes/header'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"> 
        	<?php 
				if($this->session->userdata['logged']['role']==2)
		  		{
					echo 'Young Entrepreneur Dashboard';
				}elseif($this->session->userdata['logged']['role']==3){
					echo 'Individual Applicant Dashboard';
				}elseif($this->session->userdata['logged']['role']==4){
					echo 'Ed Tech Firm Dashboard';
				}elseif($this->session->userdata['logged']['role']==5){
					echo 'Education Chain Dashboard';
				}elseif($this->session->userdata['logged']['role']==6){
					echo 'NGOs Dashboard';
				}else{
					echo 'Dashboard';
				}
			?>
        </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>"><?php echo lang('home'); ?></a></li>
          <?php //echo '<pre>'; print_r($this->session->userdata['logged']['role']); die();?>
          <li class="breadcrumb-item active"><?php echo lang('dashboard'); ?></li>
          
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
  
	  
	  <div class="row">
  <!-- Example box: Registration Status -->
<div class="col-lg-4 col-6 pl-3 pr-3">
  <div class="small-box bdr" style="background-color: #d4edda;">
    <div class="inner" style="padding: 30px; font-weight: bold;">
      <h4><strong>Registration Status</strong></h4>
	  <h5>Completed</h5>
      <h6><?= date('F d, Y', strtotime($user->created_at)); ?></h6>
    </div>
  </div>
</div>
  <!-- ./col -->
<div class="col-lg-4 col-6 pl-3 pr-3">
    <!-- small box -->
    <div class="small-box bdr" style="background-color: #f8d7da;"> <!-- Light Green -->
      <div class="inner" style="padding: 30px; font-weight: bold;">
        <h4><strong>Application Status</strong></h4>
		  <?php
		  if($this->session->userdata['logged']['role']==2)
		  		{			 
			  if(!empty($youngent))
			  { ?> <h5><a href="<?php echo url('/user/applicationform/applicationpreview') ?>">Complete, Review Appliation</a></h5><?php }
			  else
			  { ?> <h5><a href="<?php echo url('/user/applicationform') ?>">Incomplete, please complete</a></h5><?php }
					
				}elseif($this->session->userdata['logged']['role']==3){			
			  
			  
			  if(!empty($indivisual))
			  { 
		  
		  ?> <h5><a href="<?php echo url('/user/applicationformind/applicationpreview') ?>">Complete, Review Appliation</a></h5><?php }
			  else
			  { ?> <h5><a href="<?php echo url('/user/applicationformind') ?>">Incomplete, please complete</a></h5><?php }
			  
				}elseif($this->session->userdata['logged']['role']==4){
					?> <h5><a href="<?php echo url('/user/applicationformind') ?>">Incomplete, please complete</a></h5><?php
				}elseif($this->session->userdata['logged']['role']==5){
					?> <h5><a href="<?php echo url('/user/applicationformind') ?>">Incomplete, please complete</a></h5><?php
				}elseif($this->session->userdata['logged']['role']==6){
					?> <h5><a href="<?php echo url('/user/applicationformind') ?>">Incomplete, please complete</a></h5><?php
				}else{
					?> <h5>Incomplete, please complete</h5><?php
				}
		  ?>		 
        <h6>April 11, 2025</h6>
      </div>
    </div>
  </div>
  <!-- ./col -->
<div class="col-lg-4 col-6 pl-3 pr-3">
    <!-- small box -->
    <div class="small-box bdr" style="background-color: #f8d7da;"> <!-- Light Green -->
      <div class="inner" style="padding: 30px; font-weight: bold;">
        <h4><strong>Verification Status</strong></h4>
        <h5>Pending</h5>
        <h6>April 11, 2025</h6>
      </div>
    </div>
  </div>
</div>

    
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php include viewPath('user/includes/footer'); ?>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $url->assets ?>js/pages/dashboard.js"></script>