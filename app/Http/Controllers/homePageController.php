<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import the DB facade

class HomePageController extends Controller
{
    public function showHome()
    {
        // Fetch all news items using the query builder
        $newsItems = DB::table('news')->get();
        
        // Fetch the newest news for category one
        $newestNews = $this->getNewestNewsForCategoryOne();
        
        $oldestNews = $this->getOldestNews();
        
        // Pass the newsItems and newestNews data to the view
        return view('homepage', ['newsItems' => $newsItems, 'newestNews' => $newestNews , 'oldestNews' => $oldestNews]);
    }

    public function getNewestNewsForCategoryOne()
    {
        // Using query builder instead of raw SQL for consistency and safety
        $newestNews = DB::table('news')
                        ->where('CategoryNews', '1')
                        ->orderBy('CreatedAt', 'desc')
                        ->limit(2)
                        ->get();

        return $newestNews;
    }

    public function getOldestNews()
    {
        $oldestNews = DB::table('News')
            ->orderBy('CreatedAt', 'asc')
            ->limit(3)
            ->get();

        return $oldestNews;
    }
}