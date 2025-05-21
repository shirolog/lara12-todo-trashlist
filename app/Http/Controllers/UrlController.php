<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{

    public function index() {

        return view('urls.index');
    }

    public function store(Request $request) {

        dd($request->all());

        $validator = Validator::make($request->all(), [
            
            'original_url' => 'url|required',
        ]);

        if($validator->fails()) {

            return redirect()->back()->withInput()->withErrors($validator);
        }

        $short_url = Url::generateShortUrl($request->original_url);

        $url = new Url();


        $url ->original_url = $request->original_url;
        $url ->short_url = $short_url;
        $url ->expired_at = Carbon::now()->addDays(config('app.url_expiration_days'));
        $url->save();

        return  response()->json(['short_url' => url($short_url)]);
    }

    public function redirect($short_url) {

        $url = Url::where('short_url', $short_url)->first();

        if($url->expired_at->lt(Carbon::now())){
            abort(404);
        }

        return redirect($url->original_url);
    }
}
