<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvaluationRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Area;
use App\Models\Evaluation;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(ReservationRequest $request) {
        $resevation = $request->all();
        Reservation::create($resevation);
        return view('thanks_to_reservation');
    }
    
    public function delete(Request $request) {
        Reservation::find($request->reservation_id)->delete();
        return redirect('/mypage');
    }
    
    public function change($id) {
        $reservation = Reservation::find($id);
        $reservation['time'] = mb_substr($reservation['time'], 0, 5);
        $shop = Shop::find($reservation['shop_id']);
        $areas = Area::all();
        $genres = Genre::all();
        return view('change', compact('reservation', 'shop', 'areas', 'genres'));
    }
    
    public function update(ReservationRequest $request) {
        $reservation = $request->only(['reservation_id', 'date', 'time', 'number']);
        Reservation::find($reservation['reservation_id'])->update($reservation);
        return view('thanks_to_update');
    }

    public function evaluation($id) {
        $reservation = Reservation::find($id);
        $reservation['time'] = mb_substr($reservation['time'], 0, 5);
        $shop = Shop::find($reservation['shop_id']);
        $areas = Area::all();
        $genres = Genre::all();
        return view('evaluation', compact('reservation', 'shop', 'areas', 'genres'));
    }

    public function comment(EvaluationRequest $request) {
        $evaluation = $request->only('reservation_id', 'evaluation', 'comment');
        Evaluation::create($evaluation);
        return view('thanks_to_evaluation');
    }
}
