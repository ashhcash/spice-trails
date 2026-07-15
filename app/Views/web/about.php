<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content') ?>

<main>
    <div class="main-container">
        <div class="dz-bnr-inr dz-banner-dark dz-bnr-inr-md"
            style="background-image:url(<?= base_url('public/') ?>assets/img/about/about-cover.png);">
            <div class="container">
                <div class="dz-bnr-inr-entry d-table-cell">
                    <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.8s"
                        style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">
                        About</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row wow fadeInUp" data-wow-delay="0.4s"
                        data-wow-duration="0.8s"
                        style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.4s; animation-name: fadeInUp;">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                            <li class="breadcrumb-item">About</li>
                        </ul>
                    </nav>
                    <!-- <div class="dz-btn">
                        <a href="tel:+919836125775"
                            class="btn btn-lg btn-icon radius-xl btn-shadow mb-3 mb-sm-0">
                            <span class="left-icon">
                                <i class="feather icon-phone-call"></i>
                            </span>
                            +91 98361 25775
                        </a>
                    </div> -->
                </div>
            </div>

            <ul class="dz-social">
                <li>
                    <a href="https://www.instagram.com" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com" target="_blank">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <!-- <li>
                <a href="https://twitter.com" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
            </li>
            <li>
                <a href="https://www.youtube.com" target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </li> -->
            </ul>
        </div>

        <div class="section d-flex flex-row justify-content-center pt-5">
            <div class="about-img d-flex flex-column justify-content-center align-items-center">
                <img src="<?= base_url('public/assets/img/about/2.png') ?>" class="rounded">
                <div class="d-flex flex-column pt-3">
                    <h4>
                        <hr><b>Contact Me</b>
                        <hr>
                    </h4>
                    <div class="socials d-flex flex-row"><i class="fa-brands fa-square-facebook"></i>
                        <i class="fa-brands fa-square-instagram"></i>
                        <i class="fa-brands fa-square-pinterest"></i>
                    </div>
                </div>
                <section class="panel mt-4">
                    <h2>Categories</h2>
                    <div class="tag-cloud">

                        <?php foreach ($categories as $category): ?>
                            <button data-filter="<?= esc($category['name']) ?>"
                                type="button"><?= esc($category['name']) ?></button>
                        <?php endforeach; ?>

                    </div>
                </section>
                <section class="panel highlight w-50 mt-4 mb-5" id="foodwalks">
                    <p class="eyebrow">Next Foodwalk</p>
                    <h2>North Kolkata breakfast trail</h2>
                    <p>Tea, kochuri, jilipi, fish fry, and three stops where the counters open before the city fully
                        wakes.</p>
                    
                </section>

            </div>
            <div class="header1 pe-5 text-left d-flex flex-column ">
                <h1 class="mb-4">About Me</h1>
                <p class="about-txt">Welcome to Spice Trails! I’m Aparna, a passionate food blogger born, raised, and
                    deeply rooted in the
                    culinary heart of Kolkata. <br>
                    To me, food isn't just sustenance—it’s a living map of history, culture,
                    and emotion, passed down through generations. From the aromatic chaos of local bazaars and the
                    irresistible pull of legendary street-side phuchka stalls to the comforting, complex flavors
                    simmering in traditional Bengali kitchens, I’m on a continuous journey to document the stories
                    behind every bite.<br> Whether you are here to master an authentic heirloom recipe or discover the
                    city's best-kept culinary secrets, Spice Trails is your invitation to pull up a chair, celebrate the
                    rich heritage of Bengal, and explore the vibrant world of flavors with me.
                </p>

                <p class="about-txt">
                    For a long time, my world revolved entirely around the beautiful, busy rhythm of being a housewife.
                    Tending to a home and raising a family brought immense fulfillment, but it was within the four walls
                    of my kitchen that I discovered my truest creative escape. Cooking became my canvas; a space where a
                    pinch of panch phoron or the slow reduction of a kosha mangsho allowed me to express love and
                    artistry.<br>

                    But my passion didn't stop at my own stove. Over the years, escaping the routine meant stepping out
                    to explore Kolkata's legendary food scene. I found pure joy in becoming a culinary explorer in my
                    own city—whether sitting in a historic cabin in North Kolkata tasting century-old cutlets, or
                    pulling up a chair at a bustling, modern café in Park Street. Tasting a chef’s vision at a
                    restaurant sparked a new curiosity in me to understand the "why" behind the flavors. Spice Trails
                    was born out of this beautiful balance: a housewife’s love for comforting home-cooked heirloom
                    recipes, blended with an eager foodie’s thrill of discovering the ultimate restaurant bite.
                </p>

                <p class="about-txt">
                    Through Spice Trails, I aim to share not just recipes, but the stories, traditions, and emotions
                    that make each dish unforgettable. Join me as we explore the rich tapestry of flavors that define
                    Kolkata and beyond. Together, let's celebrate the art of food, one story at a time. </p>



            </div>
        </div>
<a href="#top" class="topbtn text-white" id="topBtn"><i class="fa-solid fa-arrow-up"></i></a>
    </div>

    <style>
        .about-img img {
            height: 70%;
            width: 60%;
        }

        .header1 {
            height: 70%;
            width: 70%;
        }

        .about-txt {
            font-size: 1.1rem;
        }

        .socials i {
            font-size: 2rem;
            margin-right: 1rem;
        }

        .socials i:hover {
            color: #a7342c;
        }

        .filter:hover {
            background-color: #a7342c;
            color: white;
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

        @media (max-width: 640px)
        {
            .section
            {
                flex-direction: column !important;
            } 
            .panel {
                width: 75% !important;
            }
            .header1{
                text-align: center !important;
                align-items: center !important;
                justify-content: center !important;
                width: 100% !important;
                padding-left: 30px;
            }
        }

        @media (max-width: 900px) 
        {
            .section
            {
                flex-direction: column !important;
            } 
            .panel {
                width: 75% !important;
            }
            .header1{
                text-align: center !important;
                align-items: center !important;
                justify-content: center !important;
                width: 100% !important;
                padding-left: 30px;
            }
        }
    </style>
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