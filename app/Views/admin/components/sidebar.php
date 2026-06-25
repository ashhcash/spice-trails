<!-- Main Sidebar Container -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<aside class="main-sidebar sidebars-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand p-3" href="#top" aria-label="Spice Trails home">
      <span class="brand-mark">ST</span>
      <span>
        <strong>Spice Trails</strong>
        <small>Every plate has a place</small>
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-5 d-flex">
            <div class="info">
                <p class="d-block"><i class="fas fa-user-shield"></i>   Welcome Admin!</p>
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
    <ul class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false">

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

            <a href="#"
                class="nav-link <?= $blogActive ? 'active' : '' ?>">

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

<!-- 
        category menu -->


    


        <li class="nav-item">

            <a href="<?= base_url('admin/category')?>"
                class="nav-link">

                <i class="fas fa-list"></i>

                <p>
                    Category Management
                    <i class="right fas fa-angle-left"></i>
                </p>

            </a>

            

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

            <a href="<?= base_url('admin/logout') ?>"
                class="nav-link text-danger">

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
</aside>