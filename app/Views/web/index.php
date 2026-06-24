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
        <a class="button primary" href="#stories">Read Latest</a>
        <a class="button secondary" href="#newsletter">Subscribe</a>
      </div>
    </div>
    <aside class="hero-card" aria-label="Featured story" id="breathing-button">
      <span>Featured</span>
      <h2>Ghee, smoke, and the morning rush at Tiretta Bazaar</h2>
      <p>Breakfast momo steam, hand-pulled noodles, and the last old-school bakery counter before noon.</p>
    </aside>
  </section>

  <section class="ticker" aria-label="Popular topics">
    <span>Kolkata biryani</span>
    <span>Lost recipes</span>
    <span>Street food</span>
    <span>Bengal sweets</span>
    <span>Travel plates</span>
    <span>Home kitchens</span>
  </section>

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
          <button class="filter active" data-filter="all" type="button">All</button>
          <button class="filter" data-filter="Food" type="button">Food</button>
          <button class="filter" data-filter="Travel" type="button">Travel</button>
          <button class="filter" data-filter="Recipe" type="button">Recipe</button>
        </div>
      </div>

      <div class="post-list" id="postList"></div>
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
          <button data-filter="Food" type="button">Food history</button>
          <button data-filter="Travel" type="button">Food travel</button>
          <button data-filter="Recipe" type="button">Recipes</button>
          <button data-search="street" type="button">Street food</button>
          <button data-search="sweet" type="button">Sweets</button>
          <button data-search="breakfast" type="button">Breakfast</button>
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
    <a class="button primary" href="#stories">Browse Recipes</a>
  </section>


</main>
<?= $this->endSection(); ?>