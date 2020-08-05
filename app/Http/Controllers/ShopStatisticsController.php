<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopModels\Statistics_product;

class ShopStatisticsController extends Controller
{
    public function statistics(){
        $fiveMostVisited = (new Statistics_product)->fiveMostVisitedProducts();
        $fiveMostUnvisited = (new Statistics_product)->fiveMostUnvisitedProducts();
        $averageCheck = (new Statistics_product)->averageCheck();

        return view('statistics', compact('fiveMostVisited', 'fiveMostUnvisited', 'averageCheck'));
        }
}
