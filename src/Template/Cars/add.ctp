<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <h2>Add Car</h2>
            </div>
            <div class="card-body">
                <?= $this->Form->create($car,['type' => 'file']) ?>
                <table class="table">
                    <tr>
                        <td><?= $this->Form->control('brand', ['class' => 'form-control', 'label' => 'Marke']) ?></td>
                        <td><?= $this->Form->control('model', ['class' => 'form-control', 'label' => 'Modell']) ?></td>
                    </tr>
                    <tr>
                        <td><?= $this->Form->control('rental_price', ['class' => 'form-control', 'label' => 'Mietpreis pro Tag (€)']) ?></td>
                        <td><?= $this->Form->control('deposit', ['class' => 'form-control', 'label' => 'Kaution (€)']) ?></td>
                    </tr>
                    <tr>
                        <?= $this->Form->file('image', ['class' => 'form-control', 'label' => 'Bild']) ?>
                    </tr>
                </table>
                <div class="form-group">
                    <?= $this->Form->button('Auto hinzufügen', ['class' => 'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
