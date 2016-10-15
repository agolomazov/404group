<?php

use Phinx\Migration\AbstractMigration;

class SubjectsForGroupStudents extends AbstractMigration
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
    protected $tableName = 'subjects_for_group_students';

    public function up()
    {
        $table = $this->table($this->tableName);
        $table
            ->addColumn('id_group', 'integer')
            ->addColumn('id_subject', 'integer')
            ->addColumn('id_semester', 'integer')
            ->addIndex('id_group', array('name' => 'idx_' . $this->tableName . '_id_group'))
            ->addIndex('id_subject', array('name' => 'idx_' . $this->tableName . 'id_subject'))
            ->addIndex('id_semester', array('name' => 'idx_' . $this->tableName . 'id_semester'))
            ->addIndex(array('id_semester', 'id_subject', 'id_group'), array('unique' => true, 'name' => 'idx_' . $this->tableName . '_semester_subject_group'))
            ->addIndex(array('id_subject', 'id_group'), array('unique' => true, 'name' => 'idx_' . $this->tableName . '_subject_group'))
            ->addIndex(array('id_semester', 'id_group'), array('unique' => true, 'name' => 'idx_' . $this->tableName . '_semester_group'))
            ->addIndex(array('id_semester', 'id_subject'), array('unique' => true, 'name' => 'idx_' . $this->tableName . '_semester_subject'))
            ->addForeignKey('id_group', 'group_students', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->addForeignKey('id_subject', 'subjects', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->addForeignKey('id_semester', 'semesters', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
        ->save();
    }
    
    public function down(){
        $exists = $this->hasTable($this->tableName);
        if ($exists) {
            $this->table($this->tableName)
                ->dropForeignKey('id_group')
                ->dropForeignKey('id_subject')
                ->dropForeignKey('id_semester')
                ->drop();
        }
    }
}
