<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Parser;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    use ParserTrait;

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Parser $parser
     * @return RedirectResponse
     */
    public function __invoke(Request $request, Parser $parser): RedirectResponse
    {
        $link = 'https://www.vedomosti.ru/rss/issue.xml';
        $data =  $parser->setLink($link)->getParseData();

        if(empty($data)) {
            return redirect()->route('admin.index')->with('error', "Не удалось спарсить новости!");
        }

        try {
            $count = $this->saveParsingNewsToDb($data);
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', "Не удалось сохранить новости после парсинга! ".$e->getMessage());
        }

        return redirect()->route('admin.index')->with('status', "$count новостей было сохранено!");
    }
}
