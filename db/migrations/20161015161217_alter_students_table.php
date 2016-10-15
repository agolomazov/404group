<?php

use Phinx\Migration\AbstractMigration;

class AlterStudentsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    protected $tableName = 'students';

    public function change()
    {
        $table = $this->table($this->tableName);
        $table->addColumn('scientific_id', 'integer')
            ->addIndex('scientific_id', array('name' => 'idx_' . $this->tableName . '_scientific_id'))
            ->addForeignKey('scientific_id', 'scientific_directors', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->save();
    }
}
