<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>
    <!-- Main content -->
    <section class="content pt-3">

        <div class="container-fluid">

            <!-- Welcome Card -->
            <!-- <div class="card card-primary card-outline mb-4">
                <div class="card-body">

                    <h3>
                        
                        Welcome Back, Admin 👋
                    </h3>

                    <p class="mb-0">
                        Manage blogs, website content and monitor your website
                        activity from this dashboard.
                    </p>

                </div>
            </div> -->

            <!-- Statistics -->
            <div class="row">

                <!-- Total Blogs -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">

                        <div class="inner">
                            <h3></h3>
                            <p>Total Blogs</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-blog"></i>
                        </div>

                        <a href="<?= base_url('admin/blog') ?>" class="small-box-footer">
                            More Info <i class="fas fa-arrow-circle-right"></i>
                        </a>

                    </div>
                </div>

                <!-- Monthly Blogs -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">

                        <div class="inner">
                            <h3></h3>
                            <p>Blogs This Month</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>

                    </div>
                </div>

                <!-- Latest Messages -->
                <!-- <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">

                        <div class="inner">
                            <h3>todaymessages</h3>
                            <p>Today's Enquiries</p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>

                        <a href="" class="small-box-footer">
                            View <i class="fas fa-arrow-circle-right"></i>
                        </a>

                    </div>
                </div> -->

                <!-- Today's Date -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">

                        <div class="inner">
                            <h3><?= date('d') ?></h3>
                            <p><?= date('M Y') ?></p>
                        </div>

                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">

                <!-- LEFT SIDE -->
                <div class="col-md-8">

                    <!-- Recent Blogs -->
                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h3 class="card-title mb-0">
                                <i class="fas fa-blog mr-2"></i>Recent Blogs
                            </h3>

                            <div>
                                <a href="<?= base_url('admin/blog/create') ?>"
                                    class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add New Blog
                                </a>

                                <a href="<?= base_url('admin/blog') ?>"
                                    class="btn btn-success btn-sm">
                                    <i class="fas fa-blog"></i> Manage Blogs
                                </a>
                            </div>

                        </div>

                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th width="80">Image</th>
                                        <th>Blog Title</th>
                                        <th>Publish Date</th>
                                    </tr>
                                </thead>

                                <tbody>
                               


                                </tbody>

                            </table>

                        </div>

                    </div>

                    <!-- Recent Enquiries -->
                    <!-- <div class="card">

                        <div class="card-header bg-warning">
                            <h3 class="card-title">
                                <i class="fas fa-envelope mr-2"></i>Recent Enquiries
                            </h3>
                        </div>

                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover">

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                                <tbody>

                                  

                                </tbody>

                            </table>

                        </div>

                        <div class="card-footer text-right">
                            <a href="" class="btn btn-sm btn-primary">
                                View All Enquiries
                            </a>
                        </div>

                    </div> -->

                </div>

                <!-- RIGHT SIDE -->
                <div class="col-md-4">

                    <!-- Website Overview -->
                    <div class="card card-info">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-2"></i>Website Overview
                            </h3>
                        </div>

                        <div class="card-body">

                            <ul class="list-group">

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total Blogs</span>
                                    <span class="badge badge-primary">
                                       
                                    </span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Blogs This Month</span>
                                    <span class="badge badge-success">
                                      
                                    </span>
                                </li>
                                

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Latest Blog</span>
                                    <span>
                                    
                                    </span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Last Updated</span>
                                    <span><?= date('d M Y') ?></span>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <!-- System Status -->
                    <div class="card card-success">

                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-server mr-2"></i>System Status
                            </h3>
                        </div>

                        <div class="card-body">

                            <div class="mb-2">
                                <i class="fas fa-check-circle text-success"></i>
                                Website Running Successfully
                            </div>

                            <div class="mb-2">
                                <i class="fas fa-check-circle text-success"></i>
                                Blog Module Active
                            </div>

                            <div>
                                <i class="fas fa-check-circle text-success"></i>
                                Admin Panel Online
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
</main>

<?= $this->endSection() ?>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->