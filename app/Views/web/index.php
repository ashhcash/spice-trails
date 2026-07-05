<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content'); ?>
<main id="top">
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
  </section>

<style>
  .post-card{
    display: block;

  }
  ..post-card img{
    min-height: 230px;
    max-height: 230px;
  }
</style>

  <script>


    document.addEventListener("DOMContentLoaded", function () {

      const searchInput = document.getElementById("searchInput");
      const posts = document.querySelectorAll(".post-card");
      const filterButtons = document.querySelectorAll(".filter");

      let activeFilter = "all";

      // 🔍 SEARCH FUNCTION
      searchInput.addEventListener("input", function () {
        applyFilters();
      });

      // 🧩 FILTER BUTTON CLICK
      filterButtons.forEach(button => {
        button.addEventListener("click", function () {
          activeFilter = this.dataset.filter.toLowerCase();

          // active button style (optional)
          filterButtons.forEach(btn => btn.classList.remove("active"));
          this.classList.add("active");

          applyFilters();
        });
      });

      // 🚀 MAIN FILTER FUNCTION
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
  </script>



</main>
<?= $this->endSection(); ?>