<?php if (! empty($vehicle) && is_array($vehicle)): ?>

<table class="table table-striped table-bordered mt-4">
    <thead>
        <tr>
            <th>Company</th>
            <th>Model</th>
            <th>Number</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicle as $vehicleobj): ?>
            <tr>
                <td>
                    <a href="<?= '/vehicle/' . $vehicleobj['_id'] ?>">
                        <?= esc($vehicleobj['company']) ?>
                    </a>
                </td>
                <td><?= esc($vehicleobj['model']) ?></td>
                <td><?= esc($vehicleobj['number']) ?></td>
                <td>
                    <a class="btn btn-primary" href="<?= '/vehicle/edit/' . $vehicleobj['_id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="<?= '/vehicle/delete/' . $vehicleobj['_id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
</table>

<?php else: ?>
<h2>You don't have any vehicle yet!</h3>
<?php endif ?>

<a href="vehicle/create">
<button class="btn btn-primary mt-4">Add a Vehicel</button>
</a>