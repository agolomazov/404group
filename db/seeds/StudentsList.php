<?php

use Phinx\Seed\AbstractSeed;

class StudentsList extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */

    protected $tableName = 'students';

    public function run()
    {
        $table = $this->table($this->tableName);
        $data = array();
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 100; $i++) {
            $data[$i] = array(
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'birthday' => $faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
                'email' => $faker->email,
                'ip_student' => $faker->localIpv4,
                'scientific_id' => mt_rand(1, 15)
            );

            if (mt_rand(0, 100) > 50) {
                $data[$i]['description'] = $faker->realText(mt_rand(200, 500));
            }
        }

        $table->insert($data)->save();

    }
}
