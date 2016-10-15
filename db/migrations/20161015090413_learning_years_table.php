<?php

use Phinx\Migration\AbstractMigration;

class LearningYearsTable extends AbstractMigration
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
    protected $tableName = 'learning_years';

    public function up()
    {
        $table = $this->table($this->tableName);
        $table
            ->addColumn('start_year', 'year')
            ->addColumn('end_year', 'year')
            ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addColumn('updated', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addIndex(array('start_year'), array('unique' => true, 'name' => 'idx_'.$this->tableName.'_start_year'))
            ->addIndex(array('end_year'), array('unique' => true, 'name' => 'idx_'.$this->tableName.'_end_year'))
            ->addIndex(array('start_year', 'end_year'), array('unique' => true, 'name' => 'idx_'.$this->tableName.'_start_end_year'))
            ->save();
    }

    public function down(){
        $exists = $this->hasTable($this->tableName);
        if($exists){
            $this->table($this->tableName)->drop();
        }
    }
}
