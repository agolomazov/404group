<?php

use Phinx\Migration\AbstractMigration;

class StudentLogTransition extends AbstractMigration
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
    protected $tableName = 'student_transitions_log';

    public function up()
    {
        $table = $this->table('student_transitions_log');
        $table
                    ->addColumn('id_student', 'integer')
                    ->addColumn('from_learning_group', 'integer', array('default' => null))
                    ->addColumn('to_learning_group', 'integer')
                    ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
                    ->addIndex('id_student', array('name' => 'idx_'.$this->tableName.'_id_student'))
                    ->addIndex('from_learning_group', array('name' => 'idx_'.$this->tableName.'_from_learning_group'))
                    ->addIndex('to_learning_group', array('name' => 'idx_'.$this->tableName.'_to_learning_group'))
                    ->addForeignKey('id_student', 'students', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
                    ->addForeignKey('from_learning_group', 'learning_group_years', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
                    ->addForeignKey('to_learning_group', 'learning_group_years', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
                    ->save();

    }

    public function down(){
        $exists = $this->hasTable($this->tableName);
        if($exists){
            $this->table($this->tableName)
                ->dropForeignKey('id_student')
                ->dropForeignKey('from_learning_group')
                ->dropForeignKey('to_learning_group')
                ->drop();
        }
    }
}
