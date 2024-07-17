<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index () {
        return view ('front.index'); 
    }

    public function about () {
        return view ('front.about'); 
    }

    public function service () {
        return view ('front.service'); 
    }

    public function serviceDetails (Service $service) {
        return view ('front.service-details', compact('service')); 
    }
}
