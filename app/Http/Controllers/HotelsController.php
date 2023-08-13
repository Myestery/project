<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelsController extends Controller
{

    /**
     * Display basic form of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = "Basic Form";
        $description = "Some description for the page";
        return view('real.home', compact('title', 'description'));
    }
}
