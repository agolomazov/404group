<?php

use Phinx\Migration\AbstractMigration;

class CreateViewForAllStudents extends AbstractMigration
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
                            students.id,
                            CONCAT_WS(
                                ' ',
                                students.first_name,
                                students.last_name
                            ) AS full_name,
                            DATE_FORMAT(birthday, '%d.%m.%Y') as birthday,
                            students.email,
                            students.ip_student,
                          students.created,
                            CONCAT_WS(' ', scientific_directors.first_name, scientific_directors.last_name, ', ', scientific_directors.post) as scientific_dir,
                            students.description
                        FROM
                            students
                        JOIN scientific_directors ON students.scientific_id = scientific_directors.id
                    ORDER BY id;";

        $this->execute($query);
    }

    public function down(){
        $query = 'DROP VIEW '.$this->viewName.';';
        $this->execute($query);
    }
}
