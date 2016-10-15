<?php

use Phinx\Migration\AbstractMigration;

class ResultsStudentsSubject extends AbstractMigration
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

    protected $tableName = 'results_students_subject';

    public function up()
    {
        $table = $this->table($this->tableName);
        $table->addColumn('id_lesson', 'integer')
            ->addColumn('result', 'decimal', array('scale' => 2, 'precision' => 3))
            ->addColumn('id_student', 'integer')
            ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addColumn('updated', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addIndex('id_lesson', array('name' => 'idx_'.$this->tableName.'_id_lesson'))
            ->addIndex('id_student', array('name' => 'idx_'.$this->tableName.'_id_student'))
            ->addIndex('result', array('name' => 'idx_'.$this->tableName.'_id_result'))
            ->addForeignKey('id_lesson', 'lessons_group_students', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->addForeignKey('id_student', 'students', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->save();
    }
    
    public function down(){
        $exists = $this->hasTable($this->tableName);
        if ($exists) {
            $this->table($this->tableName)
                ->dropForeignKey('id_lesson')
                ->dropForeignKey('id_student')
                ->drop();
        }
    }
    
    
}
