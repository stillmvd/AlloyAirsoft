<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Modules\Index\Readers\IndexReader;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    private IndexReader $indexReader;

    public function __construct(IndexReader $indexReader)
    {
        $this->indexReader = $indexReader;
    }

    /**
     * Route('/', GET)
     */
    public function index(): View
    {
        return view('index', $this->indexReader->getAllDataForIndex());
    }

}
