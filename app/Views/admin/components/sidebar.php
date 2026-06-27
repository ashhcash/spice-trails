<!-- Main Sidebar Container -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>

<aside class="main-sidebar sidebars-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand p-3 pb-5" href="#top" aria-label="Spice Trails home">
        <span class="brand-mark">FB</span>
        <span>
            <strong>Food Blog</strong>
            <small>by Aonebox</small>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-5 d-flex pt-5">
            <div class="info">
                <p class="d-block"><i class="fas fa-user-shield"></i> Welcome Admin!</p>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <?php
        $currentUrl = current_url();
        ?>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>"
                        class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Blog Menu -->
                <?php
                $blogActive = (
                    uri_string() == 'admin/blog' ||
                    uri_string() == 'admin/blog/create' ||
                    strpos(uri_string(), 'admin/blog/edit') !== false
                );
                ?>

                <li class="nav-item <?= $blogActive ? 'menu-open' : '' ?>">

                    <a href="#" class="nav-link <?= $blogActive ? 'active' : '' ?>">

                        <i class="nav-icon fas fa-blog"></i>

                        <p>
                            Blog Management
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="<?= base_url('admin/blog') ?>"
                                class="nav-link <?= (uri_string() == 'admin/blog') ? 'active' : '' ?>">

                                <i class="far fa-list-alt nav-icon"></i>
                                <p>All Blogs</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url('admin/blog/create') ?>"
                                class="nav-link <?= (uri_string() == 'admin/blog/create') ? 'active' : '' ?>">

                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Create Blog</p>

                            </a>

                        </li>

                    </ul>

                </li>



                <!--  Recipe Menu    -->

                <?php $recipeActive = (
                    uri_string() == 'admin/recipe' ||
                    uri_string() == 'admin/recipe/create' ||
                    strpos(uri_string(), 'admin/recipe/edit') !== false
                );
                ?>



                <li class="nav-item <?= $recipeActive ? 'menu-open' : '' ?>">

                    <a href="#" class="nav-link <?= $recipeActive ? 'active' : '' ?>">

                        <i class="nav-icon fas fa-utensils"></i>
                        <p>
                            Recipe Management
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="<?= base_url('admin/recipe') ?>"
                                class="nav-link <?= (uri_string() == 'admin/recipe') ? 'active' : '' ?>">

                                <i class="far fa-list-alt nav-icon"></i>
                                <p>All Recipes</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url('admin/recipe/create') ?>"
                                class="nav-link <?= (uri_string() == 'admin/recipe/create') ? 'active' : '' ?>">

                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Create Recipe</p>

                            </a>

                        </li>

                    </ul>

                </li>

                <!-- 
        category menu -->


   <?php $categoryActive = (
                    uri_string() == 'admin/category' ||
                    uri_string() == 'admin/category/blog' ||
                    strpos(uri_string(), 'admin/category/recipe') !== false
                );
                ?>


                <li class="nav-item <?= $categoryActive ? 'menu-open' : '' ?>">

                    <a href="#" class="nav-link <?= $categoryActive ? 'active' : '' ?>">

                        <i class="nav-icon fas fa-list"></i>

                        <p>
                            Category Management
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="<?= base_url('admin/category/blog') ?>"
                                class="nav-link <?= (uri_string() == 'admin/category/blog') ? 'active' : '' ?>">

                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Blog Categories</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="<?= base_url('admin/category/recipe') ?>"
                                class="nav-link <?= (uri_string() == 'admin/category/recipe') ? 'active' : '' ?>">

                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Recipe Categories</p>

                            </a>

                        </li>

                    </ul>

                </li>


                <!-- Messages -->
                <!-- <li class="nav-item">

            <a href="<?= base_url('admin/message') ?>"
                class="nav-link <?= (uri_string() == 'admin/message') ? 'active' : '' ?>">

                <i class="nav-icon fas fa-envelope"></i>

                <p>
                    Enquiries
                </p>

            </a>

        </li> -->

                <!-- Logout -->
                <li class="nav-item">

                    <a href="<?= base_url('admin/logout') ?>" class="nav-link text-danger">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>
                            Logout
                        </p>

                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->



    <style>
        .admin-login-brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 28px;
        }

        .admin-login-brand strong,
        .admin-login-brand small {
            display: block;
        }

        .admin-login-brand strong {
            font-size: 1.1rem;
        }

        .admin-login-brand small {
            color: var(--muted);
            font-family: Arial, sans-serif;
            font-size: 0.78rem;
        }


        .brand strong,
        .brand small {
            display: block;
        }

        .brand strong {
            font-size: 1.1rem;
        }

        .brand small {
            color: var(--muted);
            font-family: Arial, sans-serif;
            font-size: 0.75rem;
        }

        .brand-mark {
            display: grid;
            width: 44px;
            height: 44px;
            place-items: center;
            color: #fff;
            background: var(--red);
            border-radius: 50%;
            font-weight: 800;
            font-family: Arial, sans-serif;
            letter-spacing: 0;
        }


        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            min-width: 190px;
            color: #212529;
        }
    </style>
</aside>