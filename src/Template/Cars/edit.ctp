<h1>Auto bearbeiten</h1>

<table class="table">
    <?= $this->Form->create($car) ?>
    <tr>
        <td><?= $this->Form->label('Marke') ?></td>
        <td><?= $this->Form->text('brand', ['class' => 'form-control']) ?></td>
    </tr>
    <tr>
        <td><?= $this->Form->label('Modell') ?></td>
        <td><?= $this->Form->text('model', ['class' => 'form-control']) ?></td>
    </tr>
    <tr>
        <td><?= $this->Form->label('Mietpreis pro Tag (€)') ?></td>
        <td><?= $this->Form->text('rental_price', ['class' => 'form-control']) ?></td>
    </tr>
    <tr>
        <td><?= $this->Form->label('Kaution (€)') ?></td>
        <td><?= $this->Form->text('deposit', ['class' => 'form-control']) ?></td>
    </tr>
    <tr>
        <td colspan="2"><?= $this->Form->button('Speichern', ['class' => 'btn btn-primary']) ?></td>
    </tr>
    <?= $this->Form->end() ?>
</table>

<?= $this->Html->link('Abbrechen', ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
