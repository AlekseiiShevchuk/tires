<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('static_pages.about');
    }

    /**
     * Show the handels page.
     *
     * @return \Illuminate\Http\Response
     */
    public function handels()
    {
        return view('static_pages.handels');
    }
}
