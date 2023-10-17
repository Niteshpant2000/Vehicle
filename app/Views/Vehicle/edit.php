<h2><?= esc($vehicleobj) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="<?= '/vehicle/edit/' . $vehicleobj['_id'] ?>" method="post" autocomplete="off">
    <?= csrf_field() ?>

    <div class="form-floating mb-3">
        <input value="<?= $vehicleobj['company'] ?>" class="form-control" type="text" name="title" placeholder="Title" required>
        <label for="company">Company</label>
    </div>

    <div class="form-floating mb-3">
        <input value="<?= $vehicleobj['model'] ?>" class="form-control" type="text" name="author" placeholder="Author" required>
        <label for="author">Model</label>
    </div>

    <div class="form-floating mb-3">
        <input value="<?= $vehicleobj['number'] ?>" class="form-control" type="number" name="pagesRead" value="0" required>
        <label for="pagesRead">number</label>
    </div>

    <button class="btn btn-primary" name="submit">Edit Vehicle details</button>
</form>