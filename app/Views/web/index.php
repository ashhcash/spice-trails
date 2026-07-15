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