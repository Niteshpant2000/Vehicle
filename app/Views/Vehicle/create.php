<h2><?= esc($heading) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/vehicle/create" method="post">
    <?= csrf_field() ?>

    <div class="mt-3">
        <label class="form-label" for="company">Company</label>
        <input class="form-control" type="input" name="company" />
    </div>

    <div class="mt-3">
        <label class="form-label" for="model">Model</label>
        <input class="form-control" type="input" name="model" />
    </div>

    <div class="mt-3">
        <label class="form-label" for="number">Number</label>
        <input class="form-control" type="number" name="number" />
    </div>

    <input class="btn btn-success mt-4" type="submit" name="submit" value="Add Vehicle" />
</form>