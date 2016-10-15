<?php

use Phinx\Seed\AbstractSeed;

class SubjectsForStudents extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    protected $tableName = 'subjects_for_group_students';

    public function run()
    {
        $table = $this->table($this->tableName);
        $data = array();

        for ($i = 1; $i < 6; $i++) {
            $data[] = array(
                'id_group' => 1,
                'id_subject' => $i,
                'id_semester' => 1
            );
        }

        for ($i = 1; $i < 6; $i++) {
            $data[] = array(
                'id_group' => 2,
                'id_subject' => $i,
                'id_semester' => 1
            );
        }

        for ($i = 1; $i < 6; $i++) {
            $data[] = array(
                'id_group' => 3,
                'id_subject' => $i,
                'id_semester' => 1
            );
        }

        for ($i = 6; $i < 11; $i++) {
            $data[] = array(
                'id_group' => 1,
                'id_subject' => $i,
                'id_semester' => 2
            );
        }

        for ($i = 6; $i < 11; $i++) {
            $data[] = array(
                'id_group' => 2,
                'id_subject' => $i,
                'id_semester' => 2
            );
        }

        for ($i = 6; $i < 11; $i++) {
            $data[] = array(
                'id_group' => 3,
                'id_subject' => $i,
                'id_semester' => 2
            );
        }

        for ($i = 11; $i < 16; $i++) {
            $data[] = array(
                'id_group' => 4,
                'id_subject' => $i,
                'id_semester' => 3
            );
        }

        for ($i = 11; $i < 16; $i++) {
            $data[] = array(
                'id_group' => 5,
                'id_subject' => $i,
                'id_semester' => 3
            );
        }

        for ($i = 11; $i < 16; $i++) {
            $data[] = array(
                'id_group' => 6,
                'id_subject' => $i,
                'id_semester' => 3
            );
        }


        for ($i = 16; $i < 21; $i++) {
            $data[] = array(
                'id_group' => 4,
                'id_subject' => $i,
                'id_semester' => 4
            );
        }

        for ($i = 16; $i < 21; $i++) {
            $data[] = array(
                'id_group' => 5,
                'id_subject' => $i,
                'id_semester' => 4
            );
        }

        for ($i = 16; $i < 21; $i++) {
            $data[] = array(
                'id_group' => 6,
                'id_subject' => $i,
                'id_semester' => 4
            );
        }

        for ($i = 21; $i < 26; $i++) {
            $data[] = array(
                'id_group' => 7,
                'id_subject' => $i,
                'id_semester' => 5
            );
        }

        for ($i = 21; $i < 26; $i++) {
            $data[] = array(
                'id_group' => 8,
                'id_subject' => $i,
                'id_semester' => 5
            );
        }

        for ($i = 21; $i < 26; $i++) {
            $data[] = array(
                'id_group' => 9,
                'id_subject' => $i,
                'id_semester' => 5
            );
        }

        for ($i = 26; $i < 31; $i++) {
            $data[] = array(
                'id_group' => 7,
                'id_subject' => $i,
                'id_semester' => 6
            );
        }

        for ($i = 26; $i < 31; $i++) {
            $data[] = array(
                'id_group' => 8,
                'id_subject' => $i,
                'id_semester' => 6
            );
        }

        for ($i = 26; $i < 31; $i++) {
            $data[] = array(
                'id_group' => 9,
                'id_subject' => $i,
                'id_semester' => 6
            );
        }

        for ($i = 31; $i < 36; $i++) {
            $data[] = array(
                'id_group' => 10,
                'id_subject' => $i,
                'id_semester' => 7
            );
        }

        for ($i = 31; $i < 36; $i++) {
            $data[] = array(
                'id_group' => 11,
                'id_subject' => $i,
                'id_semester' => 7
            );
        }

        for ($i = 31; $i < 36; $i++) {
            $data[] = array(
                'id_group' => 12,
                'id_subject' => $i,
                'id_semester' => 7
            );
        }

        for ($i = 36; $i < 41; $i++) {
            $data[] = array(
                'id_group' => 10,
                'id_subject' => $i,
                'id_semester' => 8
            );
        }

        for ($i = 36; $i < 41; $i++) {
            $data[] = array(
                'id_group' => 11,
                'id_subject' => $i,
                'id_semester' => 8
            );
        }

        for ($i = 36; $i < 41; $i++) {
            $data[] = array(
                'id_group' => 12,
                'id_subject' => $i,
                'id_semester' => 8
            );
        }

        for ($i = 41; $i < 44; $i++) {
            $data[] = array(
                'id_group' => 13,
                'id_subject' => $i,
                'id_semester' => 9
            );
        }

        for ($i = 41; $i < 44; $i++) {
            $data[] = array(
                'id_group' => 14,
                'id_subject' => $i,
                'id_semester' => 9
            );
        }

        for ($i = 41; $i < 44; $i++) {
            $data[] = array(
                'id_group' => 15,
                'id_subject' => $i,
                'id_semester' => 9
            );
        }

        for ($i = 44; $i < 47; $i++) {
            $data[] = array(
                'id_group' => 13,
                'id_subject' => $i,
                'id_semester' => 10
            );
        }

        for ($i = 44; $i < 47; $i++) {
            $data[] = array(
                'id_group' => 14,
                'id_subject' => $i,
                'id_semester' => 10
            );
        }

        for ($i = 44; $i < 47; $i++) {
            $data[] = array(
                'id_group' => 15,
                'id_subject' => $i,
                'id_semester' => 10
            );
        }

        $table->insert($data)->save();

    }
}
