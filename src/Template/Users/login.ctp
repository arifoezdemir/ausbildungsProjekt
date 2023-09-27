<h1>Einloggen</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('username', ['required' => true, 'placeholder' => 'Username']) ?>
<?= $this->Form->control('password', ['required' => true, 'placeholder' => 'Password']) ?>
<?= $this->Form->button(__('Einloggen'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link('Registrieren', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-secondary']) ?>
<?= $this->Form->end() ?>