<?php

use Phinx\Seed\AbstractSeed;

class SubjectSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */

    protected $tableName = 'subjects';

    public function run()
    {
        $table = $this->table($this->tableName);

        $data = array(
            array('title' => 'Высшая математика'),
            array('title' => 'Физика'),
            array('title' => 'Химия'),
            array('title' => 'Русский язык и культура речи'),
            array('title' => 'Введение в специальность'),
            array('title' => 'Дискретная математика'),
            array('title' => 'Технология программирования'),
            array('title' => 'Структуры данных и алгоритмы'),
            array('title' => 'Базы данных'),
            array('title' => 'Схемотехника'),
            array('title' => 'Архитектура сетей и систем')
        );

        $table->insert($data)->save();
    }
}
