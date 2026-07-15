<section class="newsletter d-flex flex-column align-items-left justify-content-left bg-light" id="newsletter"
  aria-labelledby="newsletter-title">
  <div class="d-flex flex-row justify-content-between align-items-center">
    <div>
      <p class="eyebrow">Keep in touch</p>
      <h2 id="newsletter-title">Subscribe to our newsletter</h2>
    </div>
    <form id="newsletterForm pt-5 d-flex flex-row">
      <label class="visually-hidden" for="emailInput">Email address</label>
      <input id="emailInput" type="email" placeholder="you@example.com" required>
      <button class="button primary" type="submit">Join</button>

    </form>
  </div>
  <hr>

  <div class="footer-bottom d-flex flex-row align-items-inline justify-content-between ps-5 pe-5 ms-5 me-5">
    <div class="footer-text w-25">
      <a href="<?= base_url() ?>">
        <h2><b>Food Blog</b></h2><br>
        <h3>by aonebox</h3>
      </a>
      <p class=" pt-3">Aonebox food blogs deliver engaging, easy-to-read reviews of restaurants, cafes, and street
        food spots, helping readers discover the best dining experiences. With detailed insights on taste, ambience, and
        value, Aonebox makes exploring food destinations simple, reliable, and enjoyable for every foodie.
      </p>
    </div>
    <div class="useful-links">
      <h3><b>Useful Links</b></h3>
      <ul class="ps-0">
        <li class="pt-2"><a href="<?= base_url() ?>">Home</a></li>
        <li class="pt-2"><a href="<?= base_url('blogs') ?>">Blogs</a></li>
        <li class="pt-2"><a href="<?= base_url('recipes') ?>">Recipes</a></li>
        <li class="pt-2"><a href="<?= base_url('about') ?>">About Us</a></li>
      </ul>
    </div>
    <div>
      <h3><b>Social Links</b></h3>
      <div class="d-flex flex-row socials pt-3">
        <i class="fa-brands fa-square-facebook"></i>
        <i class="fa-brands fa-square-instagram"></i>
      </div>
    </div>

  </div>
</section>
<footer class="site-footer">
  <p><a href="<?= base_url('/') ?>" class="footer-link">Food Blog</a> . All Rights Reserved. Managed by <a
      href="https://www.aonebox.com/" class="footer-link">a-one box</a></p>
  <style>
    .footer-link {
      color: #a7342c;
    }

    .socials i {
      font-size: 2rem;
      margin-right: 1rem;
    }

    .socials i:hover {
      color: #a7342c;
    }

    .useful-links ul li:hover {
      color: #a7342c;
    }
    @media (max-width: 640px) 
    {
      .footer-bottom{
        flex-direction: column !important; 
        margin: 0 !important;
        padding: 0 !important;
      }
      .footer-text{
        width: 100% !important;
      }

    }
  </style>
  <div>
    <a href="<?= base_url('blogs') ?>">Blogs</a>
    <a href="<?= base_url('about') ?>">About</a>
    <a href="#newsletter">Subscribe</a>
  </div>
</footer>

<script src="<?= base_url('public/assets/js/script.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>