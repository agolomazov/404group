<?php

use Phinx\Seed\AbstractSeed;

class LessonResults extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    protected $tableName = 'results_students_subject';

    public function run()
    {
        $table = $this->table($this->tableName);
        $data = array();

        for($i = 1; $i < 101; $i++){
            for($j = 1; $j < 967; $j++){
                if(mt_rand(20, 100) > 50){
                    $data[] = array(
                        'id_lesson' => $j,
                        'id_student' => $i,
                        'result' => (double)mt_rand(20, 99)
                    );
                }
            }
        }

        $table->insert($data)->save();
    }
}
