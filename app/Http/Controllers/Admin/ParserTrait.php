<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Models\News;

trait ParserTrait
{
    /**
     * @param array $parsingData
     * @return int
     * @throws \Exception
     */
    public function saveParsingNewsToDb(array $parsingData): int
    {
        $count = 0;
        foreach ($parsingData['news'] as $news) {
            $news = News::create([
                'title' => $news['title'],
                'author' => \fake()->userName(),
                'description' => $news['description'],
                'created_at' => $news['pubDate'],
                'image' => $news['enclosure::url'],
                'status' => NewsStatus::ACTIVE,
            ]);
            if(!$news) {
                throw new \Exception("Новость не была записана!");
            }
            $count++;
        }
        return $count;
    }

}
