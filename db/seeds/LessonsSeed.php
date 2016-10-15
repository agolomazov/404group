<?php

use Phinx\Seed\AbstractSeed;

class LessonsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */

    protected $tableName = 'lessons_group_students';

    public function run()
    {

        $table = $this->table($this->tableName);
        $data = array();
        $faker = Faker\Factory::create('ru_RU');

        $times_lessons = array(
            array('start_datetime' => '08:10:00', 'end_datetime' => '09:40:00'),
            array('start_datetime' => '10:00:00', 'end_datetime' => '11:30:00'),
            array('start_datetime' => '12:00:00', 'end_datetime' => '13:30:00'),
            array('start_datetime' => '13:40:00', 'end_datetime' => '15:10:00'),
            array('start_datetime' => '15:20:00', 'end_datetime' => '16:40:00'),
            array('start_datetime' => '16:50:00', 'end_datetime' => '18:20:00'),
            array('start_datetime' => '18:30:00', 'end_datetime' => '20:00:00')
        );

        for ($i = 1; $i <= 138; $i++) {
            foreach ($times_lessons as $item) {
                $data[] = array(
                    'title_subject' => $faker->sentence(mt_rand(3, 10)),
                    'start_datetime' => $item['start_datetime'],
                    'end_datetime' => $item['end_datetime'],
                    'id_subject_for_group' => $i
                );
            }
        }

        $table->insert($data)->save();

    }
}
