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
    <a href="<?php echo url('admin/dashboard') ?>" class="nav-link <?php echo ($page->menu == 'dashboard') ? 'active' : '' ?>">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        <?php echo lang('dashboard') ?>
      </p>
    </a>
  </li>
  
   <?php if (hasPermissions('profile_view')): ?>
    <li class="nav-item">
      <a href="<?php echo url('admin/profile') ?>" class="nav-link <?php echo ($page->menu == 'profile') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo lang('profile') ?>
        </p>
      </a>
    </li>
  <?php endif ?>

  <?php if (hasPermissions('users_list')): ?>
    <li class="nav-item">
      <a href="<?php echo url('admin/users') ?>" class="nav-link <?php echo ($page->menu == 'users') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'User Management' ?>
        </p>
      </a>
    </li>
  <?php endif ?>
  
  <?php //if (hasPermissions('users_list')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'application_management') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Application Management' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php if (hasPermissions('location_management')): ?>
    <li class="nav-item has-treeview <?php echo ($page->menu == 'location') ? 'menu-open' : '' ?>">
      <a href="#" class="nav-link  <?php echo ($page->menu == 'location') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-cog"></i>
        <p>
          <?php echo lang('location_management') ?>
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?php echo url('admin/location') ?>" class="nav-link <?php echo ($page->submenu == '') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('state_list') ?> </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo url('admin/location/district') ?>" class="nav-link <?php echo ($page->submenu == 'district') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('district_list') ?> </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo url('admin/location/tehsil') ?>" class="nav-link <?php echo ($page->submenu == 'tehsil') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('tehsil_list') ?> </p>
          </a>
        </li>
      </ul>
    </li>
  <?php endif ?>
  <?php //if (hasPermissions('users_list')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'user_rights') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'User Rights' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  
  <?php //if (hasPermissions('users_list')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'messaging') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Messaging' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  
  <?php //if (hasPermissions('users_list')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'reporting') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Reporting' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  
  <?php //if (hasPermissions('users_list')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'download') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Download' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php //if (hasPermissions('users_list')): ?>
    <li class="nav-item">
      <a href="<?php echo '' ?>" class="nav-link <?php echo ($page->menu == 'merit_calculation') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo 'Merit Calculation' ?>
        </p>
      </a>
    </li>
  <?php //endif ?>
  <?php if (hasPermissions('roles_list')): ?>
    <li class="nav-item">
      <a href="<?php echo url('admin/roles') ?>" class="nav-link <?php echo ($page->menu == 'roles') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-lock"></i>
        <p>
          <?php echo lang('manage_roles') ?>
        </p>
      </a>
    </li>
  <?php endif ?>

  <?php if (hasPermissions('permissions_list')): ?>
    <li class="nav-item">
      <a href="<?php echo url('admin/permissions') ?>" class="nav-link <?php echo ($page->menu == 'permissions') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo lang('manage_permissions') ?>
        </p>
      </a>
    </li>
  <?php endif ?>
  
  
  
  
  
  <?php if (hasPermissions('school_management')): ?>
    <li class="nav-item has-treeview <?php echo ($page->menu == 'school') ? 'menu-open' : '' ?>">
      <a href="#" class="nav-link  <?php echo ($page->menu == 'school') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-cog"></i>
        <p>
          <?php echo lang('school_management') ?>
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?php echo url('admin/school') ?>" class="nav-link <?php echo ($page->submenu == '') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('school_list') ?> </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo url('admin/school/import') ?>" class="nav-link <?php echo ($page->submenu == 'import') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('school_import') ?></p>
          </a>
        </li>
        <?php /*?><li class="nav-item">
        <a href="<?php echo url('admin/schoolchain') ?>" class="nav-link <?php echo ($page->submenu=='schoolchain')?'active':'' ?>">
          <i class="far fa-circle nav-icon"></i> <p> <?php echo lang('school_chain') ?> </p>
        </a>
      </li><?php */ ?>
      </ul>
    </li>
  <?php endif ?>
  <?php if (hasPermissions('company_settings')): ?>
    <li class="nav-item has-treeview <?php echo ($page->menu == 'settings') ? 'menu-open' : '' ?>">
      <a href="#" class="nav-link  <?php echo ($page->menu == 'settings') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-cog"></i>
        <p>
          <?php echo 'Site Configuration' ?>
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?php echo url('admin/settings/general') ?>" class="nav-link <?php echo ($page->submenu == 'general') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('general_setings') ?> </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo url('admin/settings/company') ?>" class="nav-link <?php echo ($page->submenu == 'company') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('company_setings') ?> </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo url('admin/settings/email_templates') ?>" class="nav-link <?php echo ($page->submenu == 'email_templates') ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p> <?php echo lang('manage_email_template') ?></p>
          </a>
        </li>
      </ul>
    </li>
  <?php endif ?>
	<?php if (hasPermissions('backup_db')): ?>
    <li class="nav-item">
      <a href="<?php echo url('admin/backup') ?>" class="nav-link <?php echo ($page->menu == 'backup') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo lang('backup') ?>
        </p>
      </a>
    </li>
  <?php endif ?>


  <li class="nav-item">
    <a href="<?php echo url('admin//logout') ?>" class="nav-link <?php echo ($page->menu == 'logout') ? 'active' : '' ?>">
      <i class="nav-icon fas fa-user"></i>
      <p>
        <?php echo 'Logout'; ?>
      </p>
    </a>
  </li>





<?php /*?><?php if (hasPermissions('activity_log_list')): ?>
    <li class="nav-item">
      <a href="<?php echo url('admin/activity_logs') ?>" class="nav-link <?php echo ($page->menu == 'activity_logs') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-history"></i>
        <p>
          <?php echo lang('activity_logs') ?>
        </p>
      </a>
    </li>
  <?php endif ?>
  <?php if (hasPermissions('school_management')): ?>
    <li class="nav-item">
      <a href="<?php echo url('admin/schoolchain') ?>" class="nav-link <?php echo ($page->menu == 'schoolchain') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
          <?php echo lang('school_chain') ?>
        </p>
      </a>
    </li>
  <?php endif ?><?php */?>

  <?php /*?><li class="nav-header"><strong>  <?php echo lang('ci_examples') ?>  </strong> &nbsp;
  <span class="right badge badge-primary">New</span>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
      <?php echo lang('datatables') ?>
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/ci_examples/basic_datatables') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('basic_datatables') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/ci_examples/serverside_datatables') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('serverside_datatables') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('admin/adminlte/ci_examples/form_validation') ?>" class="nav-link">
      <i class="nav-icon fas fa-table"></i>
      <p>
      <?php echo lang('form_validation') ?>
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('admin/adminlte/ci_examples/file_uploads') ?>" class="nav-link">
      <i class="nav-icon fas fa-upload"></i>
      <p>
      <?php echo lang('file_upload') ?>
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('admin/adminlte/ci_examples/multi_file_uploads') ?>" class="nav-link">
      <i class="nav-icon fas fa-file-upload"></i>
      <p>
      <?php echo lang('multi_file_upload') ?>
      </p>
    </a>
  </li>

  <li class="nav-header"><strong> AdminLTE 3 Pages</strong></li>
  <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        <?php echo lang('dashboard') ?>
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/main/dashboard') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('dashboard') ?> v1</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/main/dashboard2') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('dashboard') ?> v2</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/main/dashboard3') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('dashboard') ?> v3</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('admin/adminlte/main/widgets') ?>" class="nav-link">
      <i class="nav-icon fas fa-th"></i>
      <p>
      <?php echo lang('widgets') ?>
      </p>
    </a>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-copy"></i>
      <p>
      <?php echo lang('layout_options') ?>
        <i class="fas fa-angle-left right"></i>
        <span class="badge badge-info right">6</span>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/layout/top_nav') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('top_navigation') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/layout/top_nav_sidebar') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('top_navigation_sidebar') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/layout/boxed') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('boxed') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/layout/fixed_sidebar') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('fixed_sidebar') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/layout/fixed_topnav') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('fixed_navbar') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/layout/fixed_footer') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('fixed_footer') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/layout/collapsed_sidebar') ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('collapsed_sidebar') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-chart-pie"></i>
      <p>
      <?php echo lang('charts') ?>
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/charts/chartjs'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('chartjs') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/charts/flot'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('flot') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/charts/inline'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('inline') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tree"></i>
      <p>
      <?php echo lang('ui_elements') ?>
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/general'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('general') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/icons'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('icons') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/buttons'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('buttons') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/sliders'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('sliders') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/modals'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('modals_alerts') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/navbar'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('nav_tabs') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/timeline'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('timeline') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/Ui/ribbons'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('ribbons') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-edit"></i>
      <p>
      <?php echo lang('forms') ?>
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/forms/general'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('general_elements') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/forms/advanced'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('advanced_elements') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/forms/editors'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('editors') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/forms/validation'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('validation') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-table"></i>
      <p>
      <?php echo lang('tables') ?>
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/tables/simple'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('simple_tables') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/tables/data'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('datatables') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/tables/jsgrid'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('jsgrid') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-header"><?php echo lang('examples') ?></li>
  <li class="nav-item">
    <a href="<?php echo url('admin/adminlte/main/calendar'); ?>" class="nav-link">
      <i class="nav-icon far fa-calendar-alt"></i>
      <p>
      <?php echo lang('calendar') ?>
        <span class="badge badge-info right">2</span>
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="<?php echo url('admin/adminlte/main/gallery'); ?>" class="nav-link">
      <i class="nav-icon far fa-image"></i>
      <p>
      <?php echo lang('gallery') ?>
      </p>
    </a>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon far fa-envelope"></i>
      <p>
      <?php echo lang('mailbox') ?>
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/mailbox/mailbox'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('inbox') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/mailbox/compose'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('compose') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/mailbox/read_mail'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('read') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-book"></i>
      <p>
      <?php echo lang('pages') ?>
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/invoice'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('invoice') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/profile'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('profile') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/e-commerce'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('ecommerce') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/projects'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('projects') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/project_add'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('project_add') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/project_edit'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('project_edit') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/project_detail'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('project_detail') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/contacts'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('contacts') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon far fa-plus-square"></i>
      <p>
      <?php echo lang('extras') ?>
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/login'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('extras') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/register'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('register') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/forgot_password'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('forgot_password') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/recover_password'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('recover_password') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/lockscreen'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('lockscreen') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/legacy_user_menu'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('legacy_user_menu') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/language_menu'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('legacy_user_menu') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/error404'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('error_404') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/error500'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('error_500') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/pace'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('pace') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/blank'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('blank_page') ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo url('admin/adminlte/examples/starter'); ?>" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('starter_page') ?></p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-header"><?php echo lang('MISCELLANEOUS') ?></li>
  <li class="nav-item">
    <a href="https://adminlte.io/docs/3.0" class="nav-link">
      <i class="nav-icon fas fa-file"></i>
      <p><?php echo lang('documentation') ?></p>
    </a>
  </li>
  <li class="nav-header"><?php echo lang('multi_level_example') ?></li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="fas fa-circle nav-icon"></i>
      <p><?php echo lang('level') ?> 1</p>
    </a>
  </li>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-circle"></i>
      <p>
        <?php echo lang('level') ?> 1
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('level') ?> 2</p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>
            <?php echo lang('level') ?> 2
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p><?php echo lang('level') ?> 3</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p><?php echo lang('level') ?> 3</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-dot-circle nav-icon"></i>
              <p><?php echo lang('level') ?> 3</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p><?php echo lang('level') ?> 2</p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="fas fa-circle nav-icon"></i>
      <p><?php echo lang('level') ?> 1</p>
    </a>
  </li>
  <li class="nav-header"><?php echo lang('labels') ?></li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon far fa-circle text-danger"></i>
      <p class="text"><?php echo lang('important') ?></p>
    </a>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon far fa-circle text-warning"></i>
      <p><?php echo lang('warning') ?></p>
    </a>
  </li>
  <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="nav-icon far fa-circle text-info"></i>
      <p><?php echo lang('informational') ?></p>
    </a>
  </li><?php */ ?>

</ul>