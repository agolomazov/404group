<?php

use Phinx\Seed\AbstractSeed;

class ScientificDirectors extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    protected $tableName = 'scientific_directors';

    public function run()
    {
        $table = $this->table($this->tableName);
        $faker = Faker\Factory::create('ru_RU');
        $posts = array(
            'преподаватель, доцент',
            'преподаватель, профессор',
            'старший преподаватель, доцент',
            'доцент',
            'профессор',
            'заведующий кафедрой, профессор'
        );

        $data = array();

        for ($i = 0; $i < 15; $i++) {
            $data[] = array(
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'post' => $posts[mt_rand(0, count($posts) - 1)]
            );
        }

        $table->insert($data)->save();
    }
}
