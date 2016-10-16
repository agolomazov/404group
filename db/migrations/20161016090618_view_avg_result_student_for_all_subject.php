<?php

use Phinx\Migration\AbstractMigration;

class ViewAvgResultStudentForAllSubject extends AbstractMigration
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

    protected $viewName = 'vAVGResultStudentForAllSubjects';

    public function up()
    {
        $query = 'CREATE VIEW '.$this->viewName.' AS SELECT
	students.id,
	students.first_name,
	students.last_name,
	CONCAT_WS(
		" ",
		students.first_name,
		students.last_name
	) AS full_name,
	FORMAT(
		AVG(
			results_students_subject.result
		),
		2
	) AS avg_result,
	subjects.title AS title_subject,
	semesters.title_semester
FROM
	students
JOIN results_students_subject ON students.id = results_students_subject.id_student
JOIN lessons_group_students ON results_students_subject.id_lesson = lessons_group_students.id
JOIN subjects_for_group_students ON lessons_group_students.id_subject_for_group = subjects_for_group_students.id
JOIN subjects ON subjects_for_group_students.id_subject = subjects.id
JOIN semesters ON subjects_for_group_students.id_semester = semesters.id
GROUP BY
	students.id,
	subjects.id,
	semesters.id';

        $this->execute($query);
    }

    public function down(){
        $query = 'DROP VIEW '.$this->viewName.';';
        $this->execute($query);
    }
}
