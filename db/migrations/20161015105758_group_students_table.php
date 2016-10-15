<?php

use Phinx\Migration\AbstractMigration;

class GroupStudentsTable extends AbstractMigration
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
    protected $tableName = 'group_students';


    public function change()
    {

        $table = $this->table($this->tableName);
        $table
            ->addColumn('id_student', 'integer')
            ->addColumn('id_group', 'integer')
            ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addColumn('updated', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
            ->addIndex('id_student', array('name' => 'idx_' . $this->tableName . '_id_student'))
            ->addIndex('id_group', array('name' => 'idx_' . $this->tableName . '_id_group'))
            ->addIndex(array('id_student', 'id_group'), array('unique' => true, 'name' => 'idx_' . $this->tableName . '_id_student_group'))
            ->addForeignKey('id_student', 'students', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->addForeignKey('id_group', 'learning_group_years', 'id', array('delete' => 'CASCADE', 'update' => 'CASCADE'))
            ->save();

    }

    public function down()
    {
        $exists = $this->hasTable($this->tableName);
        if ($exists) {
            $this->table($this->tableName)
                ->dropForeignKey('id_student')
                ->dropForeignKey('id_group')
                ->drop();
        }
    }
}
