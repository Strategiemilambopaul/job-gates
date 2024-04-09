<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $jobs=Job::all();
        return view('index',compact('jobs'));
    }
    public function account()
    {
        return view('account');
    }
    public function job_applied()
    {
        return view('job-applied');
    }
    public function job_detail(Request $request)
    {
        
        $job=Job::find($request->id);
        

        return view('job-detail', compact('job'));
    }
    public function my_jobs()
    {
        return view('my-jobs');
    }
    public function jobs()
    {
        return view('jobs');
    }
    public function saved_jobs()
    {
        return view('saved-jobs');
    }
    public function post_job()
    {
        return view('post-job');
    }
    public function job_store(Request $request)
    {
        
       
        $Company=Company::create([
            'name' => $request->company_name,
            'location'=>$request->location,
            'website' => $request->website
        ]);
        
        Job::create([
            'title'=>$request->title,
            'category'=>$request->category,
            'nature' => $request->time,
            'vacancy'=> $request->vacancy,
            'salary'=> $request->salary,
            'location'=>$request->Location,
            'description'=> $request->description,
            'benefits' => $request->benefits,
            'resposability'=> $request->resposability,
            'qualifications' => $request->qualifications,
            'keywords' => $request->keywords,
            'Company_id'=>$Company->id,
            'created_at'=>now()


        ]);

        return redirect('post-job');
    }
    

}
