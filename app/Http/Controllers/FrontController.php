<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Application;
use App\Models\Career;
use App\Models\FrequentlyAskedQuestion;
use App\Models\HomeSlider;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index () {
        $homes = HomeSlider::orderBy('id')->get();
        $services = Service::orderBy('id')->get();
        return view ('front.index', compact(['homes', 'services']));
    }

    public function about () {
        $abouts = About::orderBy('id')->get();
        $faqs = FrequentlyAskedQuestion::orderBy('id')->get();
        $teams = Team::orderBy('id')->get();
        return view ('front.about', compact('abouts', 'faqs', 'teams')); 
    }

    public function service () {
        $services = Service::orderBy('id')->get();
        return view ('front.service', compact('services')); 
    }

    public function serviceDetails (Service $service) {
        $services = Service::all();
        return view ('front.service-details', compact('service','services')); 
    }

    public function career () {
        $careers = Career::orderBy('id')->get();
        return view ('front.career', compact(['careers'])); 
    }

    public function careerDetails (Career $career) {
        $careers = Career::all();
        return view ('front.career-details', compact('career', 'careers')); 
    }

    public function storeApplication(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'career_id' => 'required|exists:careers,id',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
            $request['resume'] = $resumePath;
        }

        // Save application to the database
        Application::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'career_id' => $request->career_id,
            'resume' => $resumePath,
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully!');
    }
}
