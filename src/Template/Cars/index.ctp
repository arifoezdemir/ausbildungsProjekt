<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<h1>SOFORT verfügbare Autos!</h1>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Bild</th>
        <th>Marke</th>
        <th>Modell</th>
        <th>Preis (€)</th>
        <th>Kaution (€)</th>
        <th>Reservieren</th>
        <?php if ($isAdmin): ?>
            <th>Aktionen</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($cars as $car): ?>
    <tr>
        <td><?= h($car->id) ?></td>
        <td>
            <?php if (!empty($car->image)): ?>
                <?= $this->Html->image($car->image, ['height' => '100px']) ?>
            <?php endif; ?>
        </td>
        <td><?= h($car->brand) ?></td>
        <td><?= h($car->model) ?></td>
        <td><?= h($car->rental_price) ?></td>
        <td><?= h($car->deposit) ?></td>
        <td>
        <?= $this->Html->link(__('Reservieren'), ['action' => 'reserve', $car->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
        </td>
        <?php if ($isAdmin): ?>
            <td>
                <button type="button" class="btn btn-outline-warning btn-sm"> <?= $this->Html->link('Bearbeiten', ['action' => 'edit', $car->id]) ?> </button> 
                <button type="button" class="btn btn-outline-danger btn-sm"> <?= $this->Form->postLink('Löschen', ['action' => 'delete', $car->id], ['confirm' => 'Bist du sicher?']) ?> </button>
            </td>
        <?php endif; ?>
    </tr>
    <?php endforeach; ?>
<?php if ($isAdmin): ?>
    <?= $this->Html->link('Kfz inserieren', ['action' => 'add'] , ['class' => 'btn btn-prima'] ) ?>
<?php endif; ?>
</table>
<div class="paginator row justify-content-between">
    <div class="col-auto">
        <?= $this->Paginator->prev('« Vorherige Seite') ?>
    </div>
    <div class="col-auto">
        <?= $this->Paginator->numbers() ?>
    </div>
    <div class="col-auto">
        <?= $this->Paginator->next('Nächste Seite »') ?>
    </div>
    <div class="col-auto">
        <p><?= $this->Paginator->counter(['format' => __('Seite {{page}} von {{pages}}')]) ?></p>
    </div>
</div>