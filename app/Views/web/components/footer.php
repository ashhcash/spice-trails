<section class="newsletter" id="newsletter" aria-labelledby="newsletter-title">
  <div>
    <p class="eyebrow">Keep in touch</p>
    <h2 id="newsletter-title">Get one story-rich food note each week.</h2>
  </div>
  <form id="newsletterForm">
    <label class="visually-hidden" for="emailInput">Email address</label>
    <input id="emailInput" type="email" placeholder="you@example.com" required>
    <button class="button primary" type="submit">Join</button>
    <p class="form-message" id="formMessage" aria-live="polite"></p>
  </form>
</section>
<footer class="site-footer">
  <p><a href="<?=base_url('/')?>" class="footer-link">Food Blog</a> . All Rights Reserved. Managed by <a href="https://www.aonebox.com/" class="footer-link">a-one box</a></p>
  <style>
    .footer-link{
      color: #a7342c;
    }
  </style>
  <div>
    <a href="#stories">Stories</a>
    <a href="#about">About</a>
    <a href="#newsletter">Subscribe</a>
  </div>
</footer>

<script src="<?= base_url('public/assets/js/script.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>