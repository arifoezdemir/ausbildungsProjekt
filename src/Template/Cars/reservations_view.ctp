<h1>Übersicht der Reservierungen</h1>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Auto</th>
                <th scope="col">Benutzer</th>
                <th scope="col">Startdatum</th>
                <th scope="col">Enddatum</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
            <tr>
                <td><?= $reservation->car->brand ?> <?= $reservation->car->model ?></td>
                <td><?= $reservation->user->username ?></td>
                <td><?= $reservation->start_date->format('d.M.y') ?></td>
                <td><?= $reservation->end_date->format('d.M.y') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
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