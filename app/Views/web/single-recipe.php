<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content') ?>
<main>
   




    <section class="content-inner-4 service-single">
        <div class="container d-flex flex-column ">
            <div class="row">



                <div class="col-lg-8 single-inner order-lg-1 pt-5 shadow-sm rounded-lg ps-4 pe-4">

                    <div class="single-media dz-media single-media height-md radius-lg wow fadeInUp"
                        data-wow-delay="0.1s" data-wow-duration="0.7s"
                        style="visibility: visible; animation-duration: 0.7s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <img src="<?= base_url('public/assets/' . $recipedata['image']) ?>" alt=""
                            class="object-fit-cover">
                    </div>
                    <?php $date = $recipedata['date'] ?? '';
                    $timestamp = $date !== '' ? strtotime($date) : false; ?>
                    <div class="content-item wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.7s"
                        style=" animation-duration: 0.7s; animation-delay: 0.2s; animation-name: none;">
                        <h2 class="pt-3"><b><?= $recipedata['name'] ?></b></h2>
                        <div>
                            <span class="text-secondary"><?= esc(date('M d, Y', $timestamp)) ?></span>
                            <span class="text-secondary"> | <?= $recipedata['category'] ?? '' ?> </span>
                        </div>
                        <p class="pt-3 text-secondary fw-normal"><?= $recipedata['description'] ?></p>
                        <p class="pt-2 text-secondary fw-normal"><?= $recipedata['text'] ?></p>

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

                   
                </style>




            </div>
        </div>
    </section>

</main>


<?= $this->endSection(); ?>