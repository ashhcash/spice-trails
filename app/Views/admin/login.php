<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content'); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=<?= base_url("public/admin/plugins/fontawesome-free/css/all.min.css") ?>>

    <link rel="stylesheet" href="<?= base_url('public/') ?>assets/css/boxicons.min.css">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=<?= base_url("public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") ?>>
    <!-- Theme style -->
    <link rel="stylesheet" href=<?= base_url("public/admin/dist/css/adminlte.min.css") ?>>

    <link rel="stylesheet" href=<?= base_url("public/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") ?>>
    <link rel="stylesheet" href=<?= base_url("public/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") ?>>
    <link rel="stylesheet" href=<?= base_url("public/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") ?>>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?= base_url('public/assets/css/styles.css')?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
   
</head>
  <main class="admin-login-page">
    <section class="admin-login-card" aria-labelledby="admin-login-title">
      <a class="admin-login-brand" href="<?= base_url('/') ?>" aria-label="Spice Trails home">
        <span class="brand-mark">ST</span>
        <span>
          <strong>Spice Trails</strong>
          <small>Admin panel</small>
        </span>
      </a>

      <div class="admin-login-heading">
        <p class="eyebrow">Welcome back</p>
        <h1 id="admin-login-title">Sign in to manage your blog</h1>
      </div>

     <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible m-2">
                    <?= session()->getFlashdata('error') ?>

                    <button type="button" class="close text-darks" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

      <form class="admin-login-form" action="authenticate" method="post">
        <?= csrf_field() ?>
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" placeholder="email@example.com" autocomplete="email" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Enter password" autocomplete="current-password"
          required>

        <!-- <div class="admin-login-options">
          <label class="admin-login-check">
            <input name="remember" type="checkbox">
            <span>Remember me</span>
          </label>
          <a href="#">Forgot password?</a>
        </div> -->

        <button class="button primary" type="submit">Login</button>
      </form>
    </section>
  </main>
  <style>
    .site-header{
      display: none !important;
    }
  </style>

<?= $this->endSection(); ?>
