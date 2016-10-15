<?php

use Phinx\Seed\AbstractSeed;

class LearningYears extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    protected $tableName = 'learning_years';

    public function run()
    {
        $table = $this->table($this->tableName);
        $data = array(
            array('start_year' => 2011, 'end_year' => 2012),
            array('start_year' => 2012, 'end_year' => 2013),
            array('start_year' => 2013, 'end_year' => 2014),
            array('start_year' => 2014, 'end_year' => 2015),
            array('start_year' => 2015, 'end_year' => 2016),
        );

        $table->insert($data)->save();
    }
}
