<?php
defined('BASEPATH') or exit('No direct script access allowed');  ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <title>Login - PEIMA</title>
  <!-- Tailwind CSS via CDN -->
  <!-- Add this in the <head> section -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Custom CSS for Main Color and Urdu Font -->

</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
  <!-- Header with Two Logos -->
  <header class="w-full bg-gray-300 text-dark px-3 py-2">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center space-x-4">
        <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/Logo_1.png'); ?>" alt="PEIMA Logo" class="h-20" /></a>
        <div class="flex flex-col">
          <h3 class="text-xl font-bold text-dark">Punjab Education Initiatives Management Authority</h3>
          <h4 class="text-lg text-dark">Public Schools Support Program Spell-11</h4>
        </div>
      </div>
      <div class="space-x-2">
        <?php /*?><a href="./Login.html"
                    class="p-2 cursor-pointer bg-green-400 rounded-lg p-4 text-dark font-semibold">Login</a><?php */ ?>
        <a href="<?php echo url('user/login/register') ?>"
          class="p-2 cursor-pointer bg-white rounded-lg p-4 text-dark font-semibold">Register</a>
        <?php /*?><a href="./Admin_login.html"
                    class="p-2 cursor-pointer bg-white bg-blue-500
                     p-4 rounded-lg text-dark font-semibold">Admin Login</a><?php */ ?>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="flex-grow container mx-auto mt-1 md:mt-1 px-2 py-4 ">

    <!-- Login Form Container -->
    <div class="grid grid-cols-1 md:grid-cols-[60%_40%] gap-8 items-center pr-5">

      <!-- Left Side: Image/Information -->
      <div class="hidden md:block">
        <img src="<?= base_url('assets/images/login_pics.jpg'); ?>" alt="PEIMA Initiative" class="rounded-lg shadow-md">
        <p class="mt-8 text-gray-600 text-sm italic">
          Empowering Education in Punjab. Join us in reshaping the future of our schools.
        </p>
      </div>

      <!-- Right Side: Login Form -->
      <div class="bg-white shadow-lg rounded-lg p-2 md:pr-12 pl-12 pt-4 pb-4">
        <?php if (!empty($this->session->flashdata('message'))): ?>
          <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
            <p><?php echo $this->session->flashdata('message'); ?></p>
          </div>
        <?php endif; ?>
        <?php /*?><h2 class="text-3xl font-semibold text-main mb-6 text-center">Login</h2><?php */ ?>

        <!-- Urdu Instructions -->
        <div class="text-center mb-4">
          <h1 class="text-red-600 font-bold urdufont-right">درخواست جمع کرانے سے پہلے اس کی شرائط و ضوابط کو پڑھنا لازمی ہے۔</h1>
          <div class="flex flex-wrap justify-center mt-2">
            <h1 class="urdu text-blue-500 font-bold mr-4 urdufont-right"><a href="<?= base_url('assets/docs/user_manual_sample_pssp.pdf'); ?>" target="_blank">ہدایات برائے &nbsp;&nbsp; Application Portal </a></h1>
            | &nbsp;&nbsp;<h1 class="urdu text-blue-500 font-bold urdufont-right"><a href="<?= base_url('assets/docs/TORs_PSRP_SPELL_11.pdf'); ?>" target="_blank">  ہدایات برائے درخواست دھندگان (TORs)</a></h1>
          </div>
        </div>

        <?php echo form_open('/user/login/check', ['method' => 'POST', 'autocomplete' => 'off', 'class' => 'space-y-4']); ?>

        <!-- Username Field -->
        <div class="pl-10 pr-10">
          <label for="username" class="block font-bold text-gray-700 mb-2">Username / CNIC</label>
          <input type="tel" name="username" id="username" class="form-control w-full p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" placeholder="<?php echo 'username' ?>" value="<?php echo post('username') ?>" autofocus required>
          <?php echo form_error('username', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
        </div>

        <!-- Password Field -->
        <div class="pl-10 pr-10">
          <label for="password" class="block font-bold text-gray-700 mb-2">Password:</label>
          <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" required>
          <?php echo form_error('password', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
        </div class="pl-10 pr-10">

        <!-- Login Button -->
        <div class="pl-10 pr-10 mt-4">
          <button type="submit" class="btn-main py-2 px-4 w-full rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 block text-center"><?php echo lang('signin') ?></button>
        </div>
        <!-- Register Link -->
        <p class="pl-10 pr-10">
          <a href="<?php echo url('user/login/forget?username=' . post('username')) ?>"><?php echo lang('forget_password_?') . ' Click Here' ?></a><br>
        </p>
        <?php /*?><p class="text-md text-gray-600 text-center">
                        Don't have an account? <a href="./register.html" class="text-main underline">Register here</a>.
                    </p><?php */ ?>
        <?php echo form_close(); ?>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-gray-200 text-center py-4 mt-8">
    <p class="text-gray-600">© <?php echo date('Y'); ?> PEIMA</p>
  </footer>
</body>
<script>
document.getElementById('username').addEventListener('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '');
});
</script>