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

                    .single-inner {
                        width: 100% !important;
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




            </div>
        </div>
        <a href="#top" class="topbtn text-white" id="topBtn"><i class="fa-solid fa-arrow-up"></i></a>
    </section>
<script>
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