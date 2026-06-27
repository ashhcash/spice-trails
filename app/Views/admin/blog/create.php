<?= $this->extend('admin/components/assemble') ?>
<?= $this->section('title') ?>Blog Create<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main class="container py-4">

    <!-- ✅ Flash Messages -->

     <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible m-2">
                    <?= session()->getFlashdata('error') ?>

                    <button type="button" class="close text-darks" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>


    <h2 class="mb-4">Add New Blog</h2>



    <form method="POST" action="<?= base_url('admin/blog/store') ?>" enctype="multipart/form-data" autocomplete="off">

        <!-- SEO Section -->
        <div class="card mb-4">

            <div class="card-body">

                <div class="form-group mb-3">
                    <label><strong>Title</strong></label>
                    <input type="text" class="form-control" name="blog_name" value="<?= old('blog_name') ?>"
                        maxlength="255" placeholder="Enter your title">
                </div>

                <div class="form-group mb-3">
                    <label><strong>Description</strong></label>
                    <input class="form-control" name="description" rows="3" maxlength="255" value="<?= old('description') ?>"
                        placeholder="less than 255 characters"></input>
                </div>

                 <div class="form-group mb-3">
                    <label><strong>Slug</strong></label>
                    <input class="form-control" name="slug"  maxlength="255" value="<?= old('slug') ?>"
                        placeholder="less than 255 characters"></input>
                </div>

            </div>
        </div>

        <!-- Blog Image Upload -->
        <div class="form-group mb-3">
            <label for="blog_image"><strong>Blog Image</strong></label>
            <input type="file" class="form-control-file" name="blog_image" id="blog_image" accept="image/*" required>
        </div>

        <!-- Blog Date -->
        <div class="form-group mb-3">
            <label><strong>Publish Date</strong></label>
            <input type="date" class="form-control" name="date" value="" required>
        </div>

        <!-- Blog Category -->
        <div class="form-group mb-3">
            <label for="category"><strong>Blog Category</strong></label>
            <select name="category" id="category" class="form-control">
                
                <?php foreach ($category as $c): ?>

                    
                <option value="<?= $c['name'] ?>"><?= $c['name'] ?></option>

                <?php endforeach ?>
            </select>
        </div>


        <!-- Toggle Editor -->
        <div class="form-group mb-2">
            <button type="button" onclick="toggleEditor()" class="btn btn-secondary">🔁 Toggle Editor</button>
        </div>

        <!-- CKEditor Wrapper -->
        <div id="editorWrapper">
            <textarea id="ckeditor" class="form-control"></textarea>
        </div>

        <!-- CodeMirror Wrapper -->
        <div id="codeEditorWrapper">
            <textarea id="codemirrorEditor" class="form-control"></textarea>
        </div>

        <!-- Hidden description field for submission -->
        <textarea name="text" id="finalContent" value="<?= old('text') ?>" hidden></textarea>

        <button type="submit" class="btn btn-primary mt-3" >💾 Save Blog</button>
    </form>

</main>


<?= $this->endSection() ?>



<?= $this->section('scripts') ?>
<!-- ✅ CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<!-- ✅ CodeMirror -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/theme/monokai.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.9/mode/htmlmixed/htmlmixed.min.js"></script>

<style>
    .CodeMirror {
        height: auto;
        min-height: 300px;
        border: 1px solid #ccc;
        margin-top: 10px;
    }

    #codeEditorWrapper {
        display: none;
    }
</style>

<script>
    let isCodeMode = false;
    let ckeditorInstance;
    let codemirrorInstance;

    const editorWrapper = document.getElementById('editorWrapper');
    const codeEditorWrapper = document.getElementById('codeEditorWrapper');
    const finalContent = document.getElementById('finalContent');

    ClassicEditor
        .create(document.querySelector('#ckeditor'))
        .then(editor => {
            ckeditorInstance = editor;
            editorWrapper.style.display = 'block';
        })
        .catch(error => console.error(error));

    function toggleEditor() {
        isCodeMode = !isCodeMode;

        if (isCodeMode) {
            const html = ckeditorInstance.getData();
            editorWrapper.style.display = 'none';
            codeEditorWrapper.style.display = 'block';

            if (!codemirrorInstance) {
                codemirrorInstance = CodeMirror.fromTextArea(document.getElementById('codemirrorEditor'), {
                    mode: "htmlmixed",
                    theme: "monokai",
                    lineNumbers: true,
                    lineWrapping: true
                });
            }
            codemirrorInstance.setValue(html);
        } else {
            const html = codemirrorInstance.getValue();
            ckeditorInstance.setData(html);
            codeEditorWrapper.style.display = 'none';
            editorWrapper.style.display = 'block';
        }
    }

    document.querySelector('form').addEventListener('submit', function () {
        finalContent.value = isCodeMode ?
            codemirrorInstance.getValue() :
            ckeditorInstance.getData();
    });
</script>
<?= $this->endSection() ?>