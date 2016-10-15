<?php

use Phinx\Seed\AbstractSeed;

class GroupYears extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */

    protected $tableName = 'learning_group_years';

    public function run()
    {

        $table = $this->table($this->tableName);
        $data = array(
            array('id_group' => 1, 'id_learn_year' => 1),
            array('id_group' => 2, 'id_learn_year' => 1),
            array('id_group' => 3, 'id_learn_year' => 1),
            array('id_group' => 4, 'id_learn_year' => 2),
            array('id_group' => 5, 'id_learn_year' => 2),
            array('id_group' => 6, 'id_learn_year' => 2),
            array('id_group' => 7, 'id_learn_year' => 3),
            array('id_group' => 8, 'id_learn_year' => 3),
            array('id_group' => 9, 'id_learn_year' => 3),
            array('id_group' => 10, 'id_learn_year' => 4),
            array('id_group' => 11, 'id_learn_year' => 4),
            array('id_group' => 12, 'id_learn_year' => 4),
            array('id_group' => 13, 'id_learn_year' => 5),
            array('id_group' => 14, 'id_learn_year' => 5),
            array('id_group' => 15, 'id_learn_year' => 5),
        );

        $table->insert($data)->save();

    }
}
