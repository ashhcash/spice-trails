<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title'); ?></title>
  <!-- Meta Description -->
  <?= $this->renderSection('description'); ?>

  <?= $this->renderSection('meta_data') ?>
  <!-- Meta -->
  <link rel="preconnect" href="https://images.unsplash.com">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/styles.css') ?>">
  <link rel="stylesheet" href="<?= base_url('public/assets/css/blog.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

  <link
    href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">

  <link
    href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
    rel="stylesheet">
</head>

<body>
  <header class="site-header">
    <a class="brand" href="<?= base_url() ?>" aria-label="Spice Trails home">
      <span class="brand-mark">ST</span>
      <span>
        <strong>Food Blog</strong>
        <small>by aonebox</small>
      </span>
    </a>

    <nav class="main-nav" aria-label="Primary navigation">
      <a href="<?= base_url('/') ?>">Home</a>
      <a href="<?= base_url('about') ?>">About</a>
      <a href="<?= base_url('blogs') ?>">Food </a>
      <a href="<?= base_url('recipes') ?>">Recipe </a>
      <!-- <a href="#about">Travel</a> -->
    </nav>
  </header>