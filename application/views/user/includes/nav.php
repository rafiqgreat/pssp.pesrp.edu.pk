<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<style>
  .nav-link {
    color: white !important;
    /* Always white text */
    transition: background-color 0.3s ease-in-out;
    /* Smooth transition */
  }

  .nav-item {
    transition: background-color 0.3s ease-in-out;
    /* Smooth transition */
  }

  .nav-item:hover,
  .nav-item:focus-within,
  .nav-item .nav-link.active {
    background-color: #999 !important;
    /* Change to your desired highlight color */
  }
</style>
<ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
  <li class="nav-item">
    <a href="<?php echo url('user/dashboard') ?>" class="nav-link <?php echo ($page->menu == 'dashboard') ? 'active' : '' ?>">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        <?php echo lang('dashboard') ?>
      </p>
    </a>
  </li>
  <?php if($this->session->logged['role']==2){ ?>
    <li class="nav-item">
      <a href="<?php echo url('/user/applicationform') ?>" class="nav-link <?php echo ($page->menu == 'applicationform') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Application Form' ?>
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo url('/user/applicationform/applicationpreview') ?>" class="nav-link <?php echo ($page->menu == 'applicationpreview') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Application Preview' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php }elseif($this->session->logged['role']==3){?>
		<li class="nav-item">
         <a href="<?php echo url('/user/applicationformind') ?>" class="nav-link <?php echo ($page->menu == 'applicationformind') ? 'active' : '' ?>">
           <i class="nav-icon fas fa-user"></i>
           <p>
             <?php echo 'Application Form' ?>
           </p>
         </a>
       </li>
       <li class="nav-item">
         <a href="<?php echo url('/user/applicationformind/applicationpreview') ?>" class="nav-link <?php echo ($page->menu == 'applicationpreviewind') ? 'active' : '' ?>">
           <i class="nav-icon fas fa-user"></i>
           <p>
             <?php echo 'Application Preview' ?>
           </p>
         </a>
       </li>
	<?php }?>
  <?php /*?><?php if($this->session->logged['role']==2){ ?>
    <li class="nav-item">
      <a href="<?php echo url('/user/applicationform/select_school') ?>" class="nav-link <?php echo ($page->menu == 'select_school') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Select Schools' ?>
        </p>
      </a>
    </li>
   <?php }elseif($this->session->logged['role']==3){?>
   <li class="nav-item">
      <a href="<?php echo url('/user/applicationformind/select_school') ?>" class="nav-link <?php echo ($page->menu == 'select_school') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Select Schools' ?>
        </p>
      </a>
    </li>
   <?php }?><?php */?>
   <?php if($this->session->logged['role']==2){ ?>
   <li class="nav-item">
      <a href="<?php echo url('/user/applicationform/generate_challan') ?>" class="nav-link <?php echo ($page->menu == 'generate_challan') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Generate Challan' ?>
        </p>
      </a>
    </li>  
    <?php }elseif($this->session->logged['role']==3){?>
    <li class="nav-item">
      <a href="<?php echo url('/user/applicationformind/generate_challan') ?>" class="nav-link <?php echo ($page->menu == 'generate_challan') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Generate Challan' ?>
        </p>
      </a>
    </li>
    <?php }?>
  <?php //if (hasPermissions('school_management')): ?>
    <li class="nav-item">
      <a href="<?php echo url('user/profile') ?>" class="nav-link <?php echo ($page->menu == 'schoolchain') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Change Password' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php /*if (hasPermissions('activity_log_list')): ?>
    <li class="nav-item">
      <a href="<?php echo url('user/activity_logs') ?>" class="nav-link <?php echo ($page->menu == 'activity_logs') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-history"></i>
        <p>
          <?php echo lang('activity_logs') ?>
        </p>
      </a>
    </li>
  <?php endif */?>
  <li class="nav-item">
    <a href="<?php echo url('/user/logout') ?>" class="nav-link <?php echo ($page->menu == 'logout') ? 'active' : '' ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>
        <?php echo 'Logout'; ?>
      </p>
    </a>
  </li>
</ul>