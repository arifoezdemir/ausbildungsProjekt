
<h2>Auto reservieren</h2>
<style>
    .form-group input[type="date"] {
        width: 150px;
    }
</style>

<h2><?= h($car->brand) ?> <?= h($car->model) ?></h2>

<table class="table">
    <tr>
        <th>Bild</th>
        <td><?php if (!empty($car->image)): ?>
            <img src="<?= $this->Url->image($car->image, ['fullBase' => true]) ?>" alt="Car Image">
        <?php endif; ?></td>
    </tr>
    <tr>
        <th>Automarke</th>
        <td><?= h($car->brand) ?></td>
    </tr>
    <tr>
        <th>Modell</th>
        <td><?= h($car->model) ?></td>
    </tr>
    <tr>
        <th>Miete pro Tag (€)</th>
        <td><?= h($car->rental_price) ?></td>
    </tr>
    <tr>
        <th>Kaution (€)</th>
        <td><?= h($car->deposit) ?></td>
    </tr>
</table>

<?= $this->Form->create(null, ['url' => ['controller' => 'Cars', 'action' => 'reserve', $car->id]]) ?>
<?= $this->Form->hidden('car_id', ['value' => $car->id]) ?>

<div class="form-group">
        <label for="start_date">Startdatum</label>
        <input type="date" id="start_date" name="start_date" class="form-control">
    </div>

    <div class="form-group">
        <label for="end_date">Enddatum</label>
        <input type="date" id="end_date" name="end_date" class="form-control">
    </div>


<?= $this->Form->button('Auto reservieren', ['class' => 'btn btn-primary']) ?>
<?= $this->Form->end() ?>