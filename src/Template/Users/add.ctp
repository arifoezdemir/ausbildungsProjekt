<h1>Benutzer hinzufügen</h1>

<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Bitte füllen Sie die Felder aus') ?></legend>
    <div class="card-body">
        <table class="table">
            <tr>
                <td><?= $this->Form->control('username', ['label' => 'Benutzername']) ?></td>
            </tr>
            <tr>
                <td><?= $this->Form->control('password', ['label' => 'Passwort']) ?></td>
            </tr>
            <tr>
                <td><?= $this->Form->control('role', ['options' => ['admin' => 'Admin', 'user' => 'User'], 'empty' => true, 'label' => 'Rolle']) ?></td>
            </tr>
        </table>
    </div>
</fieldset>
<?= $this->Form->button(__('Registrieren')) ?>
<?= $this->Form->end() ?>