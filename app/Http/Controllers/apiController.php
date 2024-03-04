<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class apiController extends Controller
{
    public function index()
    {
        // have you ever tried that in a real api ?
        // we do not use ->get() on large amount of data.
        $news = DB::table('News')
            ->select(DB::raw('DATE_FORMAT(CreatedAt, "%H:%i") as Time'), 'TitleNews')
            ->orderBy('CreatedAt', 'desc')
            ->get();
        // it is better to use a resource to collect your data
return response()->json($news);
    }
}

// for testing http://localhost:8000/api/news