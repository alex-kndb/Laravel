<?php

declare(strict_types=1);

namespace App\Services;

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
}
