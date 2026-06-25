<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content'); ?>

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
