<?php

use Phinx\Migration\AbstractMigration;

class LearningGroupYears extends AbstractMigration
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

    protected $tableName = 'learning_group_years';

    public function up()
    {
        $table = $this->table($this->tableName);
        $table
            ->addColumn('id_group', 'integer')
            ->addColumn('id_learn_year', 'integer')
            ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addColumn('updated', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addIndex(array('id_group'), array('name' => 'idx_' . $this->tableName . '_id_group'))
            ->addIndex(array('id_learn_year'), array('name' => 'idx_' . $this->tableName . '_id_year'))
            ->addIndex(array('id_group', 'id_learn_year'), array('unique' => true, 'name' => 'idx_' . $this->tableName . '_id_learn_year'))
            ->addForeignKey('id_group', 'learning_group', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->addForeignKey('id_learn_year', 'learning_years', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->save();

    }

    public function down(){
        $exists = $this->hasTable($this->tableName);
        if($exists){
            $this->table($this->tableName)
                    ->dropForeignKey('id_group')
                    ->dropForeignKey('id_learn_year')
                    ->drop();
        }
    }
}
