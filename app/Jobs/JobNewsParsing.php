<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Services\Contracts\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobNewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public string $link
    ){
    }

    /**
     * Execute the job.
     * @param Parser $parser
     * @return void
     * @throws \Exception
     */
    public function handle(Parser $parser): void
    {
        $data = $parser->setLink($this->link)->getParseData();
        if (!$data) {
            throw new \Exception("Не удалось спарсить новости!");
        }

        $result = $parser->saveParsingDataToDb($data);
        if (!$result) {
            throw new \Exception("Не удалось сохранить новости после парсинга!");
        }
    }
}
