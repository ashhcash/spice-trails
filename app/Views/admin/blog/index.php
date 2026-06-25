<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Blog<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main>


    <div>
        <a href="<?= base_url('admin/blog/create') ?>">
            <button type="button" class="btn btn-primary m-2">Add Blog</button>
        </a>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blog List</h3>
            </div>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible m-2">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="close text-darks" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible m-2">
                    <?= session()->getFlashdata('error') ?>

                    <button type="button" class="close text-darks" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('delete')): ?>
                <div class="alert alert-danger alert-dismissible m-2">
                    <?= session()->getFlashdata('delete') ?>

                    <button type="button" class="close text-dark" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif; ?>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Blog Image</th>
                            <th>Blog Date</th>
                            <th>Blog Category</th>
                            <th>Blog Name</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($blogs as $blog => $b): ?>

                            <tr>
                                <td><?= $blog + 1 ?></td>

                                <!-- ✅ Blog Image Column -->
                                <td>
                                    <img src="<?= base_url() ?>public/assets/uploads/<?= basename($b['blog_image']) ?>" alt="Blog Image"
                                        style="height: 60px; width: 60px; object-fit: cover; border-radius: 5px;">
                                </td>

                                <td><?= $b['date']?></td>

                                <td><?= $b['category']?></td>

                                <td><?= $b['blog_name']?></td>

                                <td>
                                    <a href="" target="_blank" class="btn btn-info btn-sm">
                                        View
                                    </a>
                                </td>

                                <td>
                                    <a href="<?= base_url('admin/blog/edit/' . $b['id']) ?>" class="btn btn-success btn-sm text-white">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="<?= base_url('admin/blog/delete/' . $b['id']) ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this blog?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Blog Image</th>
                            <th>Blog Date</th>
                            <th>Blog Category</th>
                            <th>Blog Name</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</main>


<?= $this->endSection() ?>