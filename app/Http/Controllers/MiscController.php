<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MiscController extends Controller
{
    public function changeLocale($locale): RedirectResponse
    {
        Session()->put('locale', $locale);

        return redirect()->back();
    }

    public function styleGuide(): Factory|View|Application
    {
        return view('style-guide');
    }
}
