<?php

use Phinx\Migration\AbstractMigration;

class LessonsGroupStudents extends AbstractMigration
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
    protected $tableName = 'lessons_group_students';
    
    public function up()
    {
        
        $table = $this->table($this->tableName);
        $table
            ->addColumn('title_subject', 'string')
            ->addColumn('start_datetime', 'datetime')
            ->addColumn('end_datetime', 'datetime')
            ->addColumn('id_subject_for_group', 'integer')
            ->addIndex('start_datetime', array('name' => 'idx_'.$this->tableName.'_start_datetime'))
            ->addIndex('id_subject_for_group', array('name' => 'idx_'.$this->tableName.'_id_subject_for_group'))
            ->addForeignKey('id_subject_for_group', 'subjects_for_group_students', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->save();
    }

    public function down(){
        $exists = $this->hasTable($this->tableName);
        if ($exists) {
            $this->table($this->tableName)
                ->dropForeignKey('id_subject_for_group')
                ->drop();
        }
    }
}
