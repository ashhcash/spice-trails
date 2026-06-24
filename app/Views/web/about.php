<?= $this->extend('web/components/assemble.php') ?>
<?= $this->section('content') ?>

<main>
    <div class="main-container">
          <div class="dz-bnr-inr dz-banner-dark overlay-secondary-middle dz-bnr-inr-md" style="background-image:url(<?= base_url('public/') ?>assets/images/banner/bnr3.png);">
        <div class="container">
            <div class="dz-bnr-inr-entry d-table-cell">
                <h1 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.2s; animation-name: fadeInUp;">Gallery</h1>
                <nav aria-label="breadcrumb" class="breadcrumb-row wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item">About</li>
                    </ul>
                </nav>
                <div class="dz-btn">
                    <a href="tel:+919836125775" class="btn btn-lg btn-icon btn-primary radius-xl btn-shadow mb-3 mb-sm-0">
                        <span class="left-icon">
                            <i class="feather icon-phone-call"></i>
                        </span>
                        +91 98361 25775
                    </a>
                </div>
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

        <div class="section d-flex flex-row justify-content-center align-items-center pt-5">
            <div class="about-img d-flex justify-content-center ">
                <img src="<?= base_url('public/assets/img/about/2.png')?>" class="rounded">
            </div>
            <div class="header1 pe-5 text-left">
                <h1>About Me</h1>
                <p>Welcome to Spice Trails! I’m Aparna, a passionate food blogger born, raised, and deeply rooted in the
                    culinary heart of Kolkata. <br>
                    To me, food isn't just sustenance—it’s a living map of history, culture,
                    and emotion, passed down through generations. From the aromatic chaos of local bazaars and the
                    irresistible pull of legendary street-side phuchka stalls to the comforting, complex flavors
                    simmering in traditional Bengali kitchens, I’m on a continuous journey to document the stories
                    behind every bite.<br> Whether you are here to master an authentic heirloom recipe or discover the
                    city's best-kept culinary secrets, Spice Trails is your invitation to pull up a chair, celebrate the
                    rich heritage of Bengal, and explore the vibrant world of flavors with me.
                </p>

                <p>
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
            </div>
        </div>

    </div>

    <style>
        .about-img img{
            height: 70%;
            width: 60%;
        }
        .header1{
            height: 70%;
            width: 70%;
        }
    </style>
</main>

<?= $this->endSection(); ?>