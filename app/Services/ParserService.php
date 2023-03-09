<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\NewsStatus;
use App\Models\News;
use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    /**
     * @param string $link
     * @return Parser
     */
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return array
     */
    public function getParseData(): array
    {
        $xml = XmlParser::load($this->link);
        return $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'image' => ['uses' => 'channel.image.url'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,guid,category,description,pubDate,enclosure::url]'],
        ]);
    }

    /**
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function saveParsingDataToDb(array $data): int
    {
        $count = 0;
        foreach ($data['news'] as $news) {
            $news = News::create([
                'title' => $news['title'],
                'author' => \fake()->userName(),
                'description' => $news['description'] ?? \fake()->text(),
                'created_at' => $news['pubDate'],
                'image' => $news['enclosure::url'],
                'status' => NewsStatus::ACTIVE,
            ]);
            if($news) {
                $count++;
            }
        }
        return $count;
    }
}
