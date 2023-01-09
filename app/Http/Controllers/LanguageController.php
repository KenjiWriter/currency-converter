<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $request->validate([
            'locale' => 'required|in:'.implode(',', config('app.locales')),
        ]);

        App::setLocale($request->locale);
        session()->put('locale', $request->locale);

        return redirect()->back();
    }
}
