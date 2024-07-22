<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Application;
use App\Models\Career;
use App\Models\Client;
use App\Models\CompanyProfile;
use App\Models\Contact;
use App\Models\FrequentlyAskedQuestion;
use App\Models\HomeSlider;
use App\Models\Message;
use App\Models\Product;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index () {
        $homes = HomeSlider::orderBy('id')->get();
        $services = Service::orderBy('id')->get();
        $products = Product::orderBy('id')->get();
        $clients = Client::orderBy('id')->get();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.index', compact(['homes', 'services', 'products', 'clients', 'companyProfiles']));
    }

    public function about () {
        $abouts = About::orderBy('id')->get();
        $faqs = FrequentlyAskedQuestion::orderBy('id')->get();
        $teams = Team::orderBy('id')->get();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.about', compact('abouts', 'faqs', 'teams', 'companyProfiles')); 
    }

    public function service () {
        $services = Service::orderBy('id')->get();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.service', compact('services', 'companyProfiles')); 
    }

    public function serviceDetails (Service $service) {
        $services = Service::all();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.service-details', compact('service','services', 'companyProfiles')); 
    }

    public function career () {
        $careers = Career::orderBy('id')->get();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.career', compact(['careers', 'companyProfiles'])); 
    }

    public function careerDetails (Career $career) {
        $careers = Career::all();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.career-details', compact('career', 'careers', 'companyProfiles')); 
    }

    public function product () {
        $products = Product::orderBy('id')->get();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.product', compact('products', 'companyProfiles')); 
    }

    public function productDetails (Product $product) {
        $products = Product::all();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.product-details', compact('product', 'products', 'companyProfiles')); 
    }

    public function client () {
        $clients = Client::orderBy('id')->get();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.client', compact('clients', 'companyProfiles')); 
    }

    public function contact () {
        $contacts = Contact::orderBy('id')->get();
        $companyProfiles = CompanyProfile::orderBy('id')->get();
        return view ('front.contact', compact('contacts', 'companyProfiles')); 
    }

    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Save application to the database
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Your message has been successfully sent!');
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
