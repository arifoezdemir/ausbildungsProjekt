
<h1>Willkommen bei der CREA Autovermietung</h1>
<p>Hier bekommen Sie TOP Autos für faire Preise!</p>

<?= $this->Html->link('Autos ansehen', ['controller' => 'Cars', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
<br>
<?= $this->Html->link(__('English'), ['controller' => 'Users', 'action' => 'changeLanguage', 'en_US']); ?>
<?= $this->Html->link(__('Deutsch'), ['controller' => 'Users', 'action' => 'changeLanguage', 'de_DE']); ?>
<?= $this->Html->link(__('Spanisch'), ['controller' => 'Users', 'action' => 'changeLanguage', 'es_ES']); ?>
