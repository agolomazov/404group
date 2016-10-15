<?php

use Phinx\Seed\AbstractSeed;

class GroupsList extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    protected $tableName = 'learning_group';

    public function run()
    {
        $table = $this->table($this->tableName);
        $data = array(
            array('group_code' => '1СИ-1'),
            array('group_code' => '1СИ-2'),
            array('group_code' => '1СИ-з'),
            array('group_code' => '2СИ-1'),
            array('group_code' => '2СИ-2'),
            array('group_code' => '2СИ-з'),
            array('group_code' => '3СИ-1'),
            array('group_code' => '3СИ-2'),
            array('group_code' => '3СИ-з'),
            array('group_code' => '4СИ-1'),
            array('group_code' => '4СИ-2'),
            array('group_code' => '4СИ-з'),
            array('group_code' => '5СИ-1'),
            array('group_code' => '5СИ-2'),
            array('group_code' => '5СИ-з')
        );

        $table->insert($data)->save();
    }
}
