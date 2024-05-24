<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Shop;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index() {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        return view('index', compact('shops', 'areas', 'genres'));
    }
    
    public function detail($id) {
        $shop = Shop::find($id);
        $areas = Area::all();
        $genres = Genre::all();
        return view('detail', compact('shop', 'areas', 'genres'));
    }
    
    public function search(Request $request) {
        $shops = Shop::with('area')->with('genre')->AreaSearch($request->area_id)->GenreSearch($request->genre_id)->KeywordSearch($request->keyword)->get();
        $areas = Area::all();
        $genres = Genre::all();
        $area_id = $request->area_id;
        $genre_id = $request->genre_id;
        $keyword = $request->keyword;
        return view('index', compact('shops', 'areas', 'genres', 'area_id', 'genre_id', 'keyword'));
    }

    public function mypage() {
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $today = Carbon::now()->format('Y-m-d');
        $reservations = Reservation::where('user_id', Auth::user()->id)->where('date', '>=', $today);
        if($reservations) {
            $reservations = $reservations->orderBy('date')->orderBy('time')->get();
        }
        $histories = Reservation::where('user_id', Auth::user()->id)->where('date', '<', $today);
        if($histories) {
            $histories = $histories->orderBy('date')->orderBy('time')->get();
        }
        return view('mypage', compact('shops', 'areas', 'genres', 'reservations', 'histories'));
    }
}
