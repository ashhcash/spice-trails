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
                <?php $date = $blogdata['date'] ?? '';
                $timestamp = $date !== '' ? strtotime($date) : false; ?>
                <div class="col-lg-8 single-inner order-lg-1 pt-5 shadow-sm rounded-lg ps-4 pe-4">

                    <div class="single-media dz-media height-md radius-lg wow fadeInUp" data-wow-delay="0.1s"
                        data-wow-duration="0.7s"
                        style="visibility: visible; animation-duration: 0.7s; animation-delay: 0.1s; animation-name: fadeInUp;">
                       
                        <img src="<?= base_url('public/assets/' . $blogdata['blog_image']) ?>" alt=""
                            class="object-fit-cover">

                    </div>

                    <div class="content-item wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.7s"
                        style=" animation-duration: 0.7s; animation-delay: 0.2s; animation-name: none;">
                        <h1 class="pt-3"><b><?= $blogdata['blog_name'] ?></b></h1>
                         <div class="btn btn-light" id="btn">
                            <span><?= esc(date('M d, Y ', $timestamp)) ?></span>
                            <span> | <?= implode(' , ', $selectedTags) ?? '' ?> </span>
                        </div>

                        <p class="pt-2 text-secondary fw-normal"><?= $blogdata['description'] ?></p>
                        <p class="pt-2 text-secondary fw-normal"><?= $blogdata['text'] ?></p>

                        <iframe src="<?= $blogdata['src'] ?>" width="600" height="450" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"
                            <?= $blogdata['src'] === null ? 'hidden' : '' ?> class="w-100"></iframe>

                    </div>







                </div>


                <style>
                    .blog-link {
                        color: #a7342c;
                    }

                    .single-inner {
                        width: 100% !important;
                    }

                    .content-item p {
                        font-size: 20px !important;
                        font-weight: normal !important;
                    }

                    .content-item ul li {
                        font-size: 20px !important;
                        list-style-type: disc !important;
                        list-style-image: linear-gradient(to right, #a7342c, #f52100) !important;
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

                    .single-media {
                        position: relative !important;
                    }

                    .header-secondary {
                        color: black !important;
                        position: absolute !important;
                        left: 40%;
                        top: 70%;
                        background: transparent;
                    }




                    .bg {
                        position: absolute;
                        inset: 0;
                        z-index: -1
                    }


                    .glass {
                        position: fixed;
                        inset: 70% auto auto 50%;
                        transform: translate(-50%, -50%);
                        background: rgba(255, 255, 255, .08);
                        border: 2px solid transparent;
                        box-shadow: 0 0 0 2px rgba(255, 255, 255, .6), 0 16px 32px rgba(0, 0, 0, .12);
                        backdrop-filter: url(#frosted);
                        -webkit-backdrop-filter: url(#frosted);
                        place-items: center;
                        cursor: pointer;
                        outline: 0;

                        background-color: #ffffff8e
                    }

                    .glass::before,
                    .glass::after {
                        content: "";
                        position: absolute;
                        width: 40%;


                        border-radius: 10px;
                    }

                    .glass::after {
                        transform: rotate(90deg)
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

<style>
    rating {
        font-weight: bold;
        color: #a7342c;
    }

    i {
        color: #a7342c;
        font-style: normal !important;
    }

    table {
        width: 100%;


    }

    .table {
        background-color: #fffaf2f0 !important;
    }

    tbody {
        background-color: #fffaf2f0 !important;

    }

    thead tr th {
        padding: 20px !important;
        height: auto !important;
        background-color: #27644a !important;
        color: white !important;
        border-color: black !important;
        border-width: 1px !important;
    }

    td {
        padding: 20px !important;
        height: auto !important;
        background-color: #fffaf2f0 !important;

        border-color: black !important;
        border-width: 1px !important;
    }
</style>
<?= $this->endSection(); ?>