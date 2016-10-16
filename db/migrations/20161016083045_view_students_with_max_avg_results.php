<?php

use Phinx\Migration\AbstractMigration;

class ViewStudentsWithMaxAvgResults extends AbstractMigration
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
    protected $viewName = 'vStudentsWithMaxAVGResults';
    
    public function up()
    {
        $query = "CREATE VIEW '.$this->viewName.' AS
                    SELECT
                        CONCAT_WS(
                            ' ',
                            students.first_name,
                            students.last_name
                        ) AS full_name,
                        AVG(
                            results_students_subject.result
                        ) AS avg_result
                    FROM
                        results_students_subject
                    JOIN students ON results_students_subject.id_student = students.id
                    GROUP BY results_students_subject.id_student
                    ORDER BY avg_result DESC
            LIMIT 10";
        $this->execute($query);
    }

    public function down(){
        $query = 'DROP VIEW '.$this->viewName.';';
        $this->execute($query);
    }
}
