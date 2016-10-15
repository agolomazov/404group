<?php

use Phinx\Migration\AbstractMigration;

class StudentsTable extends AbstractMigration
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

    public function up()
    {
        $table = $this->table($this->tableName);
        $table
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('birthday', 'date')
            ->addColumn('email', 'string')
            ->addColumn('ip_student', 'string')
            ->addColumn('description', 'text')
            ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addColumn('updated', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addIndex('ip_student', array('name' => 'idx_'.$this->tableName.'_ip_student'))
            ->addIndex(array('email'), array('unique' => true, 'name' => 'idx_'.$this->tableName.'_email'))
            ->save();
    }

    public function down(){
        $exists = $this->hasTable($this->tableName);
        if($exists){
            $this->table($this->tableName)->drop();
        }
    }

}
