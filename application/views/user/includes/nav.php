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
  <?php //if (hasPermissions('school_management')): ?>
    <li class="nav-item">
      <a href="<?php echo url('/user/applicationform') ?>" class="nav-link <?php echo ($page->menu == 'schoolchain') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Application Form' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php //if (hasPermissions('school_management')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'schoolchain') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Select Schools' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php //if (hasPermissions('school_management')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'schoolchain') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Set Priority School' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php //if (hasPermissions('school_management')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'schoolchain') ? 'active' : '' ?>">
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