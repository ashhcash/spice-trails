<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Recipes<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>


    <div>
        <a href="<?= base_url('admin/category/create') ?>">
            <button type="button" class="btn btn-primary m-2">Add Recipe</button>
        </a>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recipe List</h3>
            </div>
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible m-2">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="close text-darks" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible m-2">
                    <?= session()->getFlashdata('error') ?>

                    <button type="button" class="close text-darks" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('deleted')): ?>
                <div class="alert alert-danger alert-dismissible m-2">
                    <?= session()->getFlashdata('deleted') ?>

                    <button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Recipe Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($recipeCategory as $category => $b): ?>

                            <tr>


                                <td><?= $category + 1 ?></td>



                                <td><?= $b['name'] ?></td>




                                <td>
                                    <a href="<?= base_url('admin/recipecategory/edit/') ?>"
                                        class="btn btn-success btn-sm text-white">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="<?= base_url('admin/recipecategory/delete/' . $b['id']) ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this category?')">
                                        Delete
                                    </a>
                                </td>


                            </tr>
                        <?php endforeach ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>









    <form method="POST" action="<?= base_url('admin/category/store') ?>" class="upload-form z-3 shadow p-5"
        enctype="multipart/form-data">



        <?php if (session()->getFlashdata('done')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('done') ?>
                <button type="button" style="color:white !" class="close text-light" data-dismiss="alert"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


        <?php elseif (session()->getFlashdata('failed')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('failed') ?>
                <button type="button" style="color:white" class="close text-light" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <h4>Upload Categories</h4>


        <div class="mb-3 form-group">
            <label for="floatingInput" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="floatingInput" value="" required>

        </div>


        <button class="btn btn-primary" type="submit">Upload</button>
    </form>




</main>



<?= $this->endSection() ?>