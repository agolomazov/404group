<?php

use Phinx\Seed\AbstractSeed;

class GroupStudents extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */

    protected $tableName = 'group_students';

    public function run()
    {
        $table = $this->table($this->tableName);
        $data = array();

        // Первая группа
        $first_group = array();
        $second_group = array();
        $third_group = array();

        for ($i = 1; $i < 34; $i++) {
            $first_group[] = array(
                'id_student' => $i,
                'id_group' => 1
            );
        }

        for ($i = 34; $i < 67; $i++) {
            $second_group[] = array(
                'id_student' => $i,
                'id_group' => 2
            );
        }

        for ($i = 67; $i < 101; $i++) {
            $third_group[] = array(
                'id_student' => $i,
                'id_group' => 3
            );
        }

        $table->insert($first_group)->save();
        $table->insert($second_group)->save();
        $table->insert($third_group)->save();

        foreach ($first_group as &$item) {
            $item['id_group'] = 4;
        }

        foreach ($second_group as &$item) {
            $item['id_group'] = 5;
        }

        foreach ($third_group as &$item) {
            $item['id_group'] = 6;
        }

        $table->insert($first_group)->save();
        $table->insert($second_group)->save();
        $table->insert($third_group)->save();

        foreach ($first_group as &$item) {
            $item['id_group'] = 7;
        }

        foreach ($second_group as &$item) {
            $item['id_group'] = 8;
        }

        foreach ($third_group as &$item) {
            $item['id_group'] = 9;
        }

        $table->insert($first_group)->save();
        $table->insert($second_group)->save();
        $table->insert($third_group)->save();

        foreach ($first_group as &$item) {
            $item['id_group'] = 10;
        }

        foreach ($second_group as &$item) {
            $item['id_group'] = 11;
        }

        foreach ($third_group as &$item) {
            $item['id_group'] = 12;
        }

        $table->insert($first_group)->save();
        $table->insert($second_group)->save();
        $table->insert($third_group)->save();

        foreach ($first_group as &$item) {
            $item['id_group'] = 13;
        }

        foreach ($second_group as &$item) {
            $item['id_group'] = 14;
        }

        foreach ($third_group as &$item) {
            $item['id_group'] = 15;
        }

        $table->insert($first_group)->save();
        $table->insert($second_group)->save();
        $table->insert($third_group)->save();

    }
}
