<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($shop_id) {
        $user = \Auth::user();
        if (!$user->is_like($shop_id)) {
            $user->like_shops()->attach($shop_id);
        }
        return back();
    }
    public function destroy($shop_id) {
        $user = \Auth::user();
        if ($user->is_like($shop_id)) {
            $user->like_shops()->detach($shop_id);
        }
        return back();
    }
}
