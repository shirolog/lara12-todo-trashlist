<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UrlController extends Controller
{
    public function store(Request $request) {

        $vlaidator = Validator::make($request->all(), [
            
            'original_url' => 'url|required',
        ]);

        if($vlaidator->fails()) {

            return redirect()->back()->withInput()->withErrors($vlaidator);
        }

        $short_url = Url::generateShortUrl($request->original_url);

        $url = new Url();

        $url ->original_url = $request->original_url;
        $url ->short_url = $short_url;
        $url ->expired_at = Carbon::now()->addDay(config('app.url_expiration_days'));
        $url->save();

        return redirect()->route('urls.index');
    }
}
