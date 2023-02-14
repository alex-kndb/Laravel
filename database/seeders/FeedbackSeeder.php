<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('feedbacks')->insert($this->getData());
    }

    public function getData() : array
    {
        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'author' => \fake()->userName(),
                'title' => \fake()->jobTitle(),
                'feedback' => \fake()->realText(300),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }
        return $data;
    }

}
