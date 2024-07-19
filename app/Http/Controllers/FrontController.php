<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\HomeSlider;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index () {
        $homes = HomeSlider::orderBy('id')->get();
        $services = Service::orderBy('id')->get();
        return view ('front.index', compact(['homes', 'services']));
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

    public function career () {
        $careers = Career::orderBy('id')->get();
        return view ('front.career', compact(['careers'])); 
    }

    public function careerDetails (Career $career) {
        return view ('front.career-details', compact('career')); 
    }
}
