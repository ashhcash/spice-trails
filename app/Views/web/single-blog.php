<?= $this->extend('web/components/assemble.php') ?>


<?= $this->section('title') ?>
<?= $blogdata['blog_name'] ?>
<?= $this->endSection() ?>





<?= $this->section('meta_data') ?>


<meta charset="utf-8" />
<meta name="description" content="<?= $blogdata['description'] ?>" />


<!-- Canonical URL -->
<link rel="canonical" href="<?= base_url('blogs/' . $blogdata['slug']) ?>">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="<?= base_url('blogs/' . $blogdata['slug']) ?>">
<meta property="og:title" content="<?= $blogdata['blog_name'] ?>">
<meta property="og:description" content="<?= $blogdata['description'] ?>">
<meta property="og:image" content="<?= base_url('public/assets/' . $blogdata['blog_image']) ?>">
<meta property="og:image:alt" content="<?= $blogdata['blog_name'] ?>">

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1" />



<?= $this->endSection() ?>

<?= $this->section('content') ?>
<main>
   



    <section class="content-inner-4 service-single">
        <div class="container d-flex flex-column ">
            <div class="row">

 <?php
        $selectedTags = json_decode($blogdata['tags'], true);

        // Safety check
        if (!is_array($selectedTags)) {
            $selectedTags = [];
        }
        ?>

                <div class="col-lg-8 single-inner order-lg-1 pt-5 shadow-sm rounded-lg ps-4 pe-4">

                    <div class="single-media dz-media single-media height-md radius-lg wow fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="0.7s"
                        style="visibility: visible; animation-duration: 0.7s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <img src="<?= base_url('public/assets/' . $blogdata['blog_image']) ?>" alt=""
                            class="object-fit-cover">
                    </div>
                    <?php $date = $blogdata['date'] ?? '';
                    $timestamp = $date !== '' ? strtotime($date) : false; ?>
                    <div class="content-item wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.7s"
                        style=" animation-duration: 0.7s; animation-delay: 0.2s; animation-name: none;">
                        <h2 class="pt-3"><b><?= $blogdata['blog_name'] ?></b></h2>
                        <div>
                            <span class="text-secondary"><?= esc(date('M d, Y', $timestamp)) ?></span>
                            <span class="text-secondary"> | <?= implode(', ', $selectedTags) ?? '' ?> </span>
                        </div>
                        <p class="pt-2 text-secondary fw-normal"><?= $blogdata['description'] ?></p>
                        <p class="pt-2 text-secondary fw-normal"><?= $blogdata['text'] ?></p>

                    </div>







                </div>


                <style>
                    .blog-link {
                        color: #a7342c;
                    }
                    .single-inner
                    {
                        width: 100% !important;
                    }
                    .content-item p{
                        font-size: 20px !important;
                        font-weight: normal !important;
                    }
                    .content-item ul li {
                        font-size: 20px !important;
                        list-style-type: disc !important;
                        list-style-image: linear-gradient(to right, #a7342c, #f52100) !important;
                    }

                   
                </style>

               




            </div>
        </div>
    </section>

</main>


<?= $this->endSection(); ?>