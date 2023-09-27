<?php
use Migrations\AbstractMigration;

class AddReservedToCars extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('cars');
        $table->addColumn('is_reserved', 'boolean', [
            'default' => null,
            'null' => false,
        ]);
        $table->update();
    }
}
