<?php

namespace App\Http\Controllers;

use App\Models\Application;
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
        $careers = Career::all();
        return view ('front.career-details', compact('career', 'careers')); 
    }

    // public function showApplicationForm()
    // {
    //     $careers = Career::all();
    //     return view('front.career-details', compact('careers'));
    // }

    // public function storeApplication(Request $request, Career $career)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone_number' => 'required|string|max:20',
    //         'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     $resumePath = $request->file('resume')->store('resumes');

    //     Application::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone_number' => $request->phone_number,
    //         'career_id' => $career->id,
    //         'resume' => $resumePath,
    //     ]);

    //     return redirect()->route('front.career-details', ['career' => $career->slug])->with('success', 'Application submitted successfully.');
    // }

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
