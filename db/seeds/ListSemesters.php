<?php

use Phinx\Seed\AbstractSeed;

class ListSemesters extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */

    protected $tableName = 'semesters';

    public function run()
    {
        $table = $this->table($this->tableName);
        $data = array(
            array('title_semester' => '1 семестр'),
            array('title_semester' => '2 семестр'),
            array('title_semester' => '3 семестр'),
            array('title_semester' => '4 семестр'),
            array('title_semester' => '5 семестр'),
            array('title_semester' => '6 семестр'),
            array('title_semester' => '7 семестр'),
            array('title_semester' => '8 семестр'),
            array('title_semester' => '9 семестр'),
            array('title_semester' => '10 семестр')
        );

        $table->insert($data)->save();
    }
}
