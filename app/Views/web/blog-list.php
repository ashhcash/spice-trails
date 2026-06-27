<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content'); ?>

<?php
$activeCategory = $activeCategory ?? '';
$search = $search ?? '';
$blogs = $blogs ?? [];
$categories = $categories ?? [];
?>

<main id="top">
    <section class="blog-list-hero" aria-labelledby="blog-list-title">
        <div>
            <p class="eyebrow">Food Notes</p>
            <h1 id="blog-list-title">Fresh stories from the kitchen, market, and road.</h1>
            <p>Browse the latest blog posts by category, or search for a dish, place, ingredient, or memory.</p>
        </div>
    </section>

    <section class="blog-list-layout" id="stories">
        <aside class="blog-filter-sidebar" aria-label="Blog filters">
            <section class="panel blog-search-panel">
                <p class="eyebrow">Search</p>
                <form action="<?= base_url('blogs') ?>" method="get" class="blog-search-form">
                    <?php if ($activeCategory !== ''): ?>
                        <input type="hidden" name="category" value="<?= esc($activeCategory) ?>">
                    <?php endif; ?>
                    <label class="visually-hidden" for="blogSearch">Search blogs</label>
                    <input id="blogSearch" name="search" type="search" value="<?= esc($search) ?>"
                        placeholder="Search biryani, sweets, travel...">
                    <button class="button primary" type="submit">Search</button>
                </form>
            </section>

            <section class="panel">
                <p class="eyebrow">Categories</p>
                <div class="blog-category-list">
                    <a class="<?= $activeCategory === '' ? 'active' : '' ?>" href="<?= base_url('blogs') ?>">
                        All Blogs
                    </a>
                    <?php foreach ($categories as $category): ?>
                        <?php $categoryName = $category['name'] ?? ''; ?>
                        <?php if ($categoryName !== ''): ?>
                            <a class="<?= $activeCategory === $categoryName ? 'active' : '' ?>"
                                href="<?= base_url('blogs') . '?' . http_build_query(['category' => $categoryName, 'search' => $search]) ?>">
                                <?= esc($categoryName) ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="panel highlight">
                <p class="eyebrow">Notebook</p>
                <h2>Read by appetite.</h2>
                <p>Use categories for quick browsing, or search for a favorite dish, region, or ingredient.</p>
            </section>
        </aside>

        <div class="blog-list-content">
            <div class="section-heading">
                <p class="eyebrow">Latest Posts</p>
                <h2><?= $activeCategory !== '' ? esc($activeCategory) : 'All Blog Stories' ?></h2>
            </div>

            <?php if ($search !== '' || $activeCategory !== ''): ?>
                <div class="active-blog-filters">
                    <?php if ($search !== ''): ?>
                        <span>Search: <?= esc($search) ?></span>
                    <?php endif; ?>
                    <?php if ($activeCategory !== ''): ?>
                        <span>Category: <?= esc($activeCategory) ?></span>
                    <?php endif; ?>
                    <a href="<?= base_url('blogs') ?>">Clear filters</a>
                </div>
            <?php endif; ?>

            <div class="blog-card-grid">
                <?php if (!empty($blogs)): ?>
                    <?php foreach ($blogs as $blog): ?>
                        <?php
                        $title = $blog['blog_name'] ?? 'Untitled blog';
                        $description = trim(strip_tags($blog['description'] ?? ''));
                        $date = $blog['date'] ?? '';
                        $timestamp = $date !== '' ? strtotime($date) : false;
                        $image = $blog['blog_image'] ?? '';
                        $imageUrl = $image !== ''
                            ? base_url('public/assets/uploads/' . basename($image))
                            : 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=900&q=80';
                        ?>
                        <article class="blog-card">
                            <a class="blog-card-image" href="#newsletter" aria-label="Read <?= esc($title) ?>">
                                <img src="<?= esc($imageUrl) ?>" alt="<?= esc($title) ?>">
                            </a>
                            <div class="blog-card-body">
                                <div class="post-meta">
                                    <?php if (!empty($blog['category'])): ?>
                                        <span><?= esc($blog['category']) ?></span>
                                    <?php endif; ?>
                                    <?php if ($timestamp !== false): ?>
                                        <span><?= esc(date('M d, Y', $timestamp)) ?></span>
                                    <?php endif; ?>
                                </div>
                                <h3><?= esc($title) ?></h3>
                                <p><?= esc($description !== '' ? $description : 'A fresh food story from the Spice Trails notebook.') ?>
                                </p>
                                <a class="read-link" href="<?= base_url('blogs/' . $blog['slug']) ?>">Read story</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty-state">No blogs found for this filter. Try another category or search term.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>


    <style>
        .blog-list-hero {
            padding: clamp(48px, 8vw, 94px) clamp(18px, 5vw, 76px);
            color: #fff;
            background:
                linear-gradient(90deg, rgba(33, 29, 26, 0.86), rgba(39, 100, 74, 0.5)),
                url("https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?auto=format&fit=crop&w=1800&q=85") center/cover;
        }

        .blog-list-hero div {
            max-width: 760px;
        }

        .blog-list-hero h1 {
            margin: 0;
            max-width: 12ch;
            font-size: clamp(2.6rem, 6vw, 5.4rem);
            line-height: 0.96;
            letter-spacing: 0;
        }

        .blog-list-hero p:not(.eyebrow) {
            max-width: 620px;
            margin: 20px 0 0;
            color: rgba(255, 255, 255, 0.88);
            font-family: Arial, sans-serif;
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .blog-list-layout {
            display: grid;
            grid-template-columns: minmax(240px, 300px) minmax(0, 1fr);
            gap: clamp(26px, 4vw, 52px);
            padding: clamp(40px, 7vw, 76px) clamp(18px, 5vw, 76px);
        }

        .blog-filter-sidebar {
            display: grid;
            align-content: start;
            gap: 18px;
        }

        .blog-search-form {
            display: grid;
            gap: 10px;
        }

        .blog-search-form input {
            width: 100%;
            min-height: 46px;
            padding: 0 14px;
            color: var(--ink);
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 4px;
            outline: none;
        }

        .blog-search-form input:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(39, 100, 74, 0.14);
        }

        .blog-search-form .button {
            width: 100%;
        }

        .blog-category-list {
            display: grid;
            gap: 8px;
            margin-top: 14px;
        }

        .blog-category-list a,
        .active-blog-filters span,
        .active-blog-filters a {
            min-height: 40px;
            display: inline-flex;
            align-items: center;
            padding: 0 14px;
            border: 1px solid var(--line);
            border-radius: 999px;
            background: #fff;
            color: var(--muted) !important;
            font-family: Arial, sans-serif;
            font-size: 0.9rem;
            font-weight: 800;
        }

        .blog-category-list a.active,
        .blog-category-list a:hover {
            color: #fff !important;
            background: var(--green);
            border-color: var(--green);
        }

        .blog-list-content {
            min-width: 0;
        }

        .active-blog-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 22px 0 0;
        }

        .active-blog-filters a {
            color: #fff !important;
            background: var(--red);
            border-color: var(--red);
        }

        .blog-card-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
            margin-top: 28px;
        }

        .blog-card-grid .empty-state {
            grid-column: 1 / -1;
        }

        .blog-card {
            display: grid;
            overflow: hidden;
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: 0 14px 28px rgba(67, 42, 20, 0.08);
        }

        .blog-card-image {
            display: block;
            aspect-ratio: 16 / 10;
            overflow: hidden;
            background: var(--panel);
        }

        .blog-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 220ms ease;
        }

        .blog-card:hover .blog-card-image img {
            transform: scale(1.04);
        }

        .blog-card-body {
            display: flex;
            flex-direction: column;
            min-height: 260px;
            padding: 22px;
        }

        .blog-card-body h3 {
            margin: 12px 0 10px;
            font-size: clamp(1.35rem, 2.2vw, 1.9rem);
            line-height: 1.08;
        }

        .blog-card-body p {
            margin: 0;
            color: var(--muted);
            font-family: Arial, sans-serif;
            line-height: 1.62;
        }


        @media (max-width: 900px) {

            .site-header,
            .layout,
            .blog-list-layout,
            .newsletter {
                grid-template-columns: 1fr;
            }

            .blog-filter-sidebar {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }


        .sidebar,
        .blog-filter-sidebar,
        .newsletter form,
        .feature-band {
            display: grid;
            grid-template-columns: 1fr;
        }
    </style>
</main>
<script></script>

<?= $this->endSection(); ?>