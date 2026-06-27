<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Recipes Category<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main>


    <div>
      

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recipe Category List</h3>
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
                            <th>Category Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($recipeCategory as $index => $b): ?>
                            <tr>

                                <td><?= $index + 1 ?></td>

                                <!-- Name column -->
                                <td>
                                    <span class="text-name"><?= $b['name'] ?></span>
                                    <input type="text" class="form-control edit-input d-none" value="<?= $b['name'] ?>">
                                </td>

                                <!-- Edit / Update -->
                                <td>
                                    <button class="btn btn-success btn-sm editBtn">Edit</button>
                                    <button class="btn btn-primary btn-sm updateBtn d-none" data-id="<?= $b['id'] ?>">
                                        Update
                                    </button>
                                    <button class="btn btn-secondary btn-sm cancelBtn d-none">Cancel</button>
                                </td>

                                <!-- Delete -->
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









    <form method="POST" action="<?= base_url('admin/category/recipecatstore') ?>" class="upload-form z-3 shadow p-5"
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


<script>
$(document).ready(function(){

    // Click Edit
    $('.editBtn').click(function(){
        let row = $(this).closest('tr');

        row.find('.text-name').addClass('d-none');
        row.find('.edit-input').removeClass('d-none');

        row.find('.editBtn').addClass('d-none');
        row.find('.updateBtn, .cancelBtn').removeClass('d-none');
    });

    // Click Cancel
    $('.cancelBtn').click(function(){
        let row = $(this).closest('tr');

        row.find('.edit-input').addClass('d-none');
        row.find('.text-name').removeClass('d-none');

        row.find('.updateBtn, .cancelBtn').addClass('d-none');
        row.find('.editBtn').removeClass('d-none');
    });

    // Click Update (AJAX)
    $('.updateBtn').click(function(){
        let row = $(this).closest('tr');
        let id = $(this).data('id');
        let newName = row.find('.edit-input').val();

        $.ajax({
            url: "<?= base_url('admin/recipecategory/update') ?>",
            type: "POST",
            data: {
                id: id,
                name: newName
            },
            success: function(response){
                // update UI
                row.find('.text-name').text(newName);

                row.find('.edit-input').addClass('d-none');
                row.find('.text-name').removeClass('d-none');

                row.find('.updateBtn, .cancelBtn').addClass('d-none');
                row.find('.editBtn').removeClass('d-none');
            },
            error: function(){
                alert('Update failed');
            }
        });

    });

});
</script>



<?= $this->endSection() ?>