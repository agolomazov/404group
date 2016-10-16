<?php

use Phinx\Migration\AbstractMigration;

class ViewSeeStudentFromOneIpAndDescription extends AbstractMigration
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
    protected $viewName = 'vAllStudentWithDescriptionAndOneIP';

    public function up()
    {

        $query = "
        CREATE VIEW ".$this->viewName." AS SELECT
            students.first_name,
            students.last_name
        FROM
            students
        WHERE
            students.ip_student IN (
                SELECT
                    students.ip_student AS ip_student
                FROM
                    students
                GROUP BY
                    students.ip_student
                HAVING
                    COUNT(students.ip_student) > 1
            )
        AND NOT ISNULL(students.description);";
        $this->execute($query);
    }

    public function down()
    {
        $query = 'DROP VIEW ' . $this->viewName . ';';
        $this->execute($query);
    }
    
}
