<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\Source;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ParserController extends Controller
{

    public function index(): View
    {
        return \view('admin.parser.index');
    }

    /**
     * Handle the incoming request.
     *
     * @return RedirectResponse
     */
    public function parse(): RedirectResponse
    {
        foreach (Source::all() as $source) {
            try {
                \dispatch(new JobNewsParsing($source->url));
            } catch (\Exception $e) {
                return redirect()->route('admin.parser.index')->with('error', $e->getMessage());
            }
        }

        return redirect()->route('admin.parser.index')->with('status', "Новости были сохранены!");
    }
}
