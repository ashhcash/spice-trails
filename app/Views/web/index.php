<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content'); ?>
<main id="top">


  <div class="preloader">
    <span class="loader"></span>



  </div>

  <style>
    .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100vh;
      background: #fff;
      /* or your theme color */
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 99999;
      transition: opacity 0.5s ease, visibility 0.5s ease;
    }

    /* Hide state */
    .preloader.hide {
      opacity: 0;
      visibility: hidden;
    }

    .loader {
      --color-1: rgb(22 59 52 / 86%);
      --color-2: #FF0000;
      --size: 2.15px;

      width: calc(48 * var(--size));
      height: calc(48 * var(--size));
      border-radius: 50%;
      display: inline-block;
      position: relative;
      border: calc(3 * var(--size)) solid;
      border-color: var(--color-1) var(--color-1) transparent transparent;
      box-sizing: border-box;
      animation: rotation 1s linear infinite;
    }

    .loader::after,
    .loader::before {
      content: '';
      box-sizing: border-box;
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      margin: auto;
      border: calc(3 * var(--size)) solid;
      border-color: transparent transparent var(--color-2) var(--color-2);
      width: calc(40 * var(--size));
      height: calc(40 * var(--size));
      border-radius: 50%;
      box-sizing: border-box;
      animation: rotationBack 0.5s linear infinite;
      transform-origin: center center;
    }

    .loader::before {
      width: calc(32 * var(--size));
      height: calc(32 * var(--size));
      border-color: var(--color-1) var(--color-1) transparent transparent;
      animation: rotation 1.5s linear infinite;
    }

    @keyframes rotation {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    @keyframes rotationBack {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(-360deg);
      }
    }
  </style>

  <section class="hero" aria-labelledby="hero-title">

    <div class="hero-graphics" aria-hidden="true">
      <span class="hero-orbit hero-orbit-one"></span>
      <span class="hero-orbit hero-orbit-two"></span>
      <span class="hero-glow"></span>
      <span class="hero-spark hero-spark-one"></span>
      <span class="hero-spark hero-spark-two"></span>
      <span class="hero-spark hero-spark-three"></span>
      <span class="hero-stamp"><b>FOOD</b><b>•</b><b>CULTURE</b><b>•</b><b>TRAVEL</b><b>•</b></span>
      <span class="hero-monogram">01<small>FLAVOUR<br>JOURNAL</small></span>
      <span class="hero-note hero-note-top"><i class="fa-solid fa-location-dot"></i> Kolkata food notes</span>
      <span class="hero-note hero-note-bottom"><i class="fa-solid fa-utensils"></i> Stories worth tasting</span>
    </div>

    <div class="hero-copy">
      <!-- <p class="eyebrow">Field notes from markets, kitchens, and old eating houses</p> -->
      <h2 id="hero-title">Food stories from the lanes where flavor still remembers.</h2>
      <p>
        A journal of regional Indian food, street snacks, home recipes, and travel meals,
        written for curious eaters who want the story behind the bite.
      </p>
      <div class="hero-actions">
        <a class="button primary" href="<?= base_url('blogs') ?>">Read More</a>
        <a class="button secondary" href="#newsletter">Subscribe</a>
      </div>
    </div>
    <aside class="hero-card" aria-label="Featured story" id="breathing-button">
      <span>Featured</span>
      <h2>Ghee, smoke, and the morning rush at Tiretta Bazaar</h2>
      <p>Breakfast momo steam, hand-pulled noodles, and the last old-school bakery counter before noon.</p>
    </aside>
  </section>

  <!-- <section class="ticker" aria-label="Popular topics">
    <span>Kolkata biryani</span>
    <span>Lost recipes</span>
    <span>Street food</span>
    <span>Bengal sweets</span>
    <span>Travel plates</span>
    <span>Home kitchens</span>
  </section> -->

  <section class="layout" id="stories">
    <div class="content-column">
      <div class="section-heading">
        <p class="eyebrow">Latest Posts</p>
        <h2>New from the blog</h2>
      </div>

      <div class="tools" aria-label="Filter stories">
        <label class="search-box">
          <span class="visually-hidden">Search stories</span>
          <input id="searchInput" type="search" placeholder="Search biryani, sweets, travel...">
        </label>
        <div class="filter-group" role="group" aria-label="Categories">
          <button class="filter active" data-filter="all">All</button>
          <?php foreach ($categories as $category): ?>
            <button class="filter" data-filter="<?= esc($category['name']) ?>"
              type="button"><?= esc($category['name']) ?></button>
          <?php endforeach; ?>

        </div>
      </div>

      <div class="post-list row ">
        <?php foreach ($blogdata as $blog): ?>
          <?php $date = $blog['date'] ?? '';
          $timestamp = $date !== '' ? strtotime($date) : false;
          $title = $blog['blog_name'] ?? 'Untitled blog';
          $description = trim(strip_tags($blog['description'] ?? ''));
          ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <article class="post-card" data-category="<?= esc($blog['category']) ?>">
              <div class="">
                <img src="<?= base_url('public/assets/' . $blog['blog_image']) ?>" alt="food image">
                <div class="post-body">
                  <div class="post-meta">
                    <span><?= $blog['category'] ?></span>
                    <span><?= esc(date('M d, Y', $timestamp)) ?></span>

                  </div>
                  <h3>
                    <?= esc(
                      implode(' ', array_slice(explode(' ', $title), 0, 4)) .
                      (str_word_count($title) > 4 ? '...' : '')
                    ) ?>
                  </h3>
                  <p>
                    <?= esc(
                      implode(' ', array_slice(
                        explode(' ', $description !== '' ? $description : 'A fresh food story from the Food Blog notebook.'),
                        0,
                        15
                      )) . (str_word_count($description) > 15 ? '...' : '')
                    ) ?>
                  </p>
                  <a class="read-link" href="<?= base_url('blogs/' . $blog['slug']) ?>">Read story</a>
                </div>
              </div>
            </article>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <aside class="sidebar" id="about">
      <section class="profile panel">
        <img src="https://images.unsplash.com/photo-1541544741938-0af808871cc0?auto=format&fit=crop&w=900&q=80"
          alt="A table filled with Indian dishes">
        <h2>About the writer</h2>
        <p>
          I chase the meals that people remember out loud: the festival bhog,
          the corner biryani, the family pickle, and the tea stall that knows everyone.
        </p>
      </section>

      <section class="panel">
        <h2>Categories</h2>
        <div class="tag-cloud">

          <?php foreach ($categories as $category): ?>
            <button class="filter" data-filter="<?= esc($category['name']) ?>"
              type="button"><?= esc($category['name']) ?></button>
          <?php endforeach; ?>

        </div>
      </section>

      <section class="panel highlight" id="foodwalks">
        <p class="eyebrow">Next Foodwalk</p>
        <h2>North Kolkata breakfast trail</h2>
        <p>Tea, kochuri, jilipi, fish fry, and three stops where the counters open before the city fully wakes.</p>
        <a class="text-link" href="#newsletter">Get updates</a>
      </section>
    </aside>
  </section>

  <section class="feature-band" id="recipes">
    <div>
      <p class="eyebrow">Recipe Notebook</p>
      <h2>Sunday kosha mangsho with a patient onion base</h2>
      <p>
        A slow, dark, deeply spiced mutton curry built for rice, adda, and second helpings.
        The full method keeps the heat gentle and the masala honest.
      </p>
    </div>
    <a class="button primary" href="<?= base_url('recipes') ?>">Browse Recipes</a>
    <a href="#top" class="topbtn text-white" id="topBtn"><i class="fa-solid fa-arrow-up"></i></a>
  </section>


  <style>
    .hero {
      position: relative;
      isolation: isolate;
      overflow: hidden;
    }

    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      z-index: -1;
      pointer-events: none;
      background: linear-gradient(110deg, rgba(22, 59, 52, 0.2), transparent 48%, rgba(167, 52, 44, 0.14));
    }

    .hero-copy,
    .hero-card {
      position: relative;
      z-index: 4;
    }

    .hero-graphics {
      position: absolute;
      inset: 0;
      z-index: 3;
      overflow: hidden;
      pointer-events: none;
    }

    .hero-orbit {
      position: absolute;
      display: block;
      width: clamp(250px, 33vw, 500px);
      aspect-ratio: 1;
      border: 1px solid rgba(255, 255, 255, 0.32);
      border-radius: 50%;
    }

    .hero-orbit::before {
      content: "";
      position: absolute;
      width: 11px;
      height: 11px;
      border-radius: 50%;
      background: var(--mustard);
      box-shadow: 0 0 0 7px rgba(215, 157, 42, 0.16), 0 0 24px rgba(215, 157, 42, 0.78);
    }

    .hero-orbit-one {
      top: -22%;
      right: -2%;
      border-style: dashed;
      border-width: 2px;
      animation: hero-orbit-spin 24s linear infinite;
    }

    .hero-orbit-one::before {
      top: 16%;
      left: 15%;
    }

    .hero-orbit-two {
      right: 5%;
      bottom: -38%;
      width: clamp(300px, 39vw, 590px);
      border: 2px solid rgba(255, 255, 255, 0.36);
      animation: hero-orbit-spin 32s linear infinite reverse;
    }

    .hero-orbit-two::before {
      top: 8%;
      right: 19%;
      width: 8px;
      height: 8px;
      background: var(--red);
      box-shadow: 0 0 0 6px rgba(167, 52, 44, 0.18), 0 0 20px rgba(167, 52, 44, 0.7);
    }

    .hero-glow {
      right: 4%;
      top: 6%;
      width: clamp(220px, 31vw, 460px);
      aspect-ratio: 1;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(215, 157, 42, 0.38), rgba(215, 157, 42, 0) 68%);
      filter: blur(5px);
      animation: hero-glow-pulse 5s ease-in-out infinite;
    }

    .hero-spark {
      position: absolute;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #fff;
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.9);
      animation: hero-spark-float 4s ease-in-out infinite;
    }

    .hero-spark-one {
      top: 20%;
      right: 38%;
    }

    .hero-spark-two {
      top: 54%;
      right: 9%;
      animation-delay: -1.8s;
    }

    .hero-spark-three {
      bottom: 16%;
      right: 44%;
      width: 4px;
      height: 4px;
      animation-delay: -2.8s;
    }

    .hero-note {
      position: absolute;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 14px;
      color: #fff;
      background: rgba(22, 59, 52, 0.62);
      border: 1px solid rgba(255, 255, 255, 0.36);
      border-radius: 999px;
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.16);
      backdrop-filter: blur(9px);
      font-family: Arial, sans-serif;
      font-size: 0.72rem;
      font-weight: 800;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      animation: hero-note-drift 6s ease-in-out infinite;
    }

    .hero-note i {
      color: var(--mustard);
    }

    .hero-note-top {
      top: 18%;
      right: 12%;
    }

    .hero-note-bottom {
      right: 30%;
      bottom: 12%;
      animation-delay: -3s;
    }

    .hero-stamp {
      position: absolute;
      top: 42%;
      right: -54px;
      display: flex;
      gap: 10px;
      align-items: center;
      padding: 10px 20px;
      color: rgba(255, 255, 255, 0.94);
      background: var(--red);
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.24);
      font-family: Arial, sans-serif;
      font-size: 0.68rem;
      letter-spacing: 0.16em;
      transform: rotate(-90deg);
      transform-origin: center;
      animation: hero-stamp-slide 7s ease-in-out infinite;
    }

    .hero-stamp b:nth-child(even) {
      color: var(--mustard);
    }

    .hero-monogram {
      position: absolute;
      top: 16%;
      right: clamp(14%, 20vw, 25%);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 116px;
      aspect-ratio: 1;
      color: #fff;
      border: 2px solid rgba(255, 255, 255, 0.75);
      border-radius: 50%;
      box-shadow: inset 0 0 0 8px rgba(22, 59, 52, 0.2), 0 0 0 8px rgba(255, 255, 255, 0.08);
      font-family: "Merriweather", serif;
      font-size: 2.5rem;
      font-weight: 800;
      line-height: 0.9;
      text-align: center;
      text-shadow: 0 2px 12px rgba(0, 0, 0, 0.28);
      animation: hero-note-drift 6s ease-in-out infinite reverse;
    }

    .hero-monogram small {
      margin-top: 7px;
      font-family: Arial, sans-serif;
      font-size: 0.46rem;
      font-weight: 800;
      letter-spacing: 0.14em;
      line-height: 1.35;
    }

    @keyframes hero-orbit-spin {
      to {
        transform: rotate(360deg);
      }
    }

    @keyframes hero-glow-pulse {
      50% {
        transform: scale(1.12);
        opacity: 0.7;
      }
    }

    @keyframes hero-spark-float {
      50% {
        transform: translateY(-16px) scale(1.35);
        opacity: 0.55;
      }
    }

    @keyframes hero-note-drift {
      50% {
        transform: translateY(-10px);
      }
    }

    @keyframes hero-stamp-slide {
      50% {
        transform: rotate(-90deg) translateX(-10px);
      }
    }

    @media (max-width: 900px) {
      .hero-note-top {
        right: 8%;
      }

      .hero-note-bottom {
        right: 9%;
        bottom: 31%;
      }

      .hero-orbit-two {
        right: -12%;
      }

      .hero-stamp {
        right: -64px;
      }
    }

    @media (max-width: 640px) {
      .hero-note {
        font-size: 0.62rem;
        padding: 8px 10px;
      }

      .hero-note-top {
        top: 10%;
      }

      .hero-note-bottom {
        right: 4%;
        bottom: 34%;
      }

      .hero-orbit-one {
        right: -35%;
      }

      .hero-spark-one {
        right: 18%;
      }

      .hero-monogram {
        top: 9%;
        right: 16%;
        width: 88px;
        font-size: 1.9rem;
      }

      .hero-stamp {
        display: none;
      }
    }

    @media (prefers-reduced-motion: reduce) {

      .hero-orbit,
      .hero-glow,
      .hero-spark,
      .hero-note,
      .hero-stamp,
      .hero-monogram {
        /* animation: none; */
      }
    }

    .post-card {
      display: block;

    }

    .post-card img {
      min-height: 230px;
      max-height: 230px;
    }

    .topbtn {
      position: fixed;
      right: 25px;
      bottom: 40px;
      background-color: rgb(22 59 52 / 86%);
      color: #fff;
      padding: 12px 16px;
      border-radius: 30%;
      font-size: 18px;
      text-decoration: none;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transform: translateY(20px);
      transition: all 0.3s ease;
    }

    /* Show state */
    .topbtn.show {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    /* Optional hover */
    .topbtn:hover {
      background-color: #000;
    }

    @media (min-width: 992px) {
      .col-lg-4 {
        width: 48%;
      }
    }

    @media (min-width: 768px) {
      .col-md-6 {
        width: 48%;
      }
    }

    @media (min-width: 576px) {
      .col-sm-12 {
        width: 100%;
      }
    }
  </style>

  <script>


    document.addEventListener("DOMContentLoaded", function () {

      const searchInput = document.getElementById("searchInput");
      const posts = document.querySelectorAll(".post-card");
      const filterButtons = document.querySelectorAll(".filter");

      let activeFilter = "all";


      searchInput.addEventListener("input", function () {
        applyFilters();
      });


      filterButtons.forEach(button => {
        button.addEventListener("click", function () {
          activeFilter = this.dataset.filter.toLowerCase();


          filterButtons.forEach(btn => btn.classList.remove("active"));
          this.classList.add("active");

          applyFilters();
        });
      });


      function applyFilters() {
        const searchText = searchInput.value.toLowerCase();

        posts.forEach(post => {
          const title = post.querySelector("h3").innerText.toLowerCase();
          const desc = post.querySelector("p").innerText.toLowerCase();
          const category = post.dataset.category.toLowerCase();

          const matchesSearch =
            title.includes(searchText) || desc.includes(searchText);

          const matchesFilter =
            activeFilter === "all" || category === activeFilter;

          if (matchesSearch && matchesFilter) {
            post.style.display = "";
          } else {
            post.style.display = "none";
          }
        });
      }

    });

    window.addEventListener("load", function () {
      const preloader = document.querySelector(".preloader");

      setTimeout(() => {
        preloader.classList.add("hide");
      }, 500);
    });


    const topBtn = document.getElementById("topBtn");

    window.addEventListener("scroll", function () {
      const scrollPosition = window.scrollY;
      const pageHeight = document.body.scrollHeight - window.innerHeight;

      if (scrollPosition > pageHeight / 2) {
        topBtn.classList.add("show");
      } else {
        topBtn.classList.remove("show");
      }
    });
  </script>



</main>
<?= $this->endSection(); ?>