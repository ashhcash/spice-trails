<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content') ?>
<main>
    <section class="blog-list-hero" aria-labelledby="blog-list-title">


        <div>
            <p class="eyebrow">Food Recipes</p>
            <h1 id="blog-list-title"><?= $recipedata['name'] ?></h1>
            <p><?= $recipedata['description'] ?></p>
        </div>
    </section>




    <section class="content-inner service-single">
        <div class="container">
            <div class="row">



                <div class="col-lg-8 single-inner order-lg-1 pt-5">

                    <div class="single-media dz-media single-media height-sm radius-lg wow fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="0.7s"
                        style="visibility: visible; animation-duration: 0.7s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <img src="<?= base_url('public/assets/' . $recipedata['image']) ?>" alt=""
                            class="object-fit-cover">
                    </div>
                    <div class="content-item wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.7s"
                        style=" animation-duration: 0.7s; animation-delay: 0.2s; animation-name: none;">
                        <h2 class="pt-3"><?= $recipedata['name'] ?></h2>
                        <?= $recipedata['text'] ?>

                    </div>







                </div>


                <style>
                    .blog-link {
                        color: #a7342c;
                    }

                   
                </style>

                <?= $this->include('web/components/side-bar-blog') ?>




            </div>
        </div>
    </section>

</main>


<?= $this->endSection(); ?>