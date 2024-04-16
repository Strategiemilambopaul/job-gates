<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\Job_save;
use App\Models\Job_apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        
            $jobs=Job::all();
        
        
        
        return view('index',compact('jobs'));
    }
    public function account()
    {
        return view('account');
    }
    public function setJob(Request $request)
    {
        
        if(isset($request->save)){

            Job_save::create([
                'user_id'=>Auth::id(),
                'job_id'=>$request->save
            ]);
        }else{
            Job_apply::create([
                'user_id'=>Auth::id(),
                'job_id'=>$request->apply
            ]);
        }
        return redirect()->back();
    }
    public function job_applied(Request $request)
    {
       $user = User::find(Auth::id());
        $jobs=$user->job_applies;
        return view('job-applied', compact('jobs'));
    }
    public function saved_jobs(Request $request)
    {
        $user = User::find(Auth::id());
        $jobs=$user->job_saves;
       
        return view('saved-jobs', compact('jobs'));
    }
    public function job_detail(Request $request)
    {
        
        $job=Job::find($request->id);
        return view('job-detail', compact('job'));
    }
    public function my_jobs()
    {
        $jobs=User::find(Auth::id())->jobs;
        return view('my-jobs', compact('jobs'));
    }
    public function jobs(Request $request)
    {
        if(!isset($request->location) and isset($request->keywords) and isset($request->category)){
            $jobs=DB::table('jobs')
                ->where('keywords','=',$request->keywords)
                ->where('location','=',$request->location)
                ->where('category','=', $request->category)
                ->get();
        }else{ 
            $jobs=Job::all();
        }
        return view('jobs', compact('jobs'));
    }
    
    public function post_job(Request $request)
    {
        $job = Job::find($request->id);
        return view('post-job', compact('job'));
    }
    public function job_store(Request $request)
    {
       
      if(is_null($request->jobId )){ 
       
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
                'user_id'=>Auth::id(),
                'created_at'=>now()

            ]);
      }else{
        $job = Job::find($request->jobId);
        $Company = Company::find($request->companyId);
       
        $Company->name = $request->company_name;
        $Company->location=$request->location;
        $Company->website = $request->website;
        $Company->save();

        
        $job->title = $request->title;
        $job->category=$request->category;
        $job->nature = $request->time;
        $job->vacancy = $request->vacancy;
        $job->salary = $request->salary;
        $job->location=$request->Location;
        $job->description= $request->description;
        $job->benefits = $request->benefits;
        $job->resposability= $request->resposability;
        $job->qualifications = $request->qualifications;
        $job->keywords = $request->keywords;
        $job->Company_id=$request->companyId;
        $job->user_id=Auth::id();
        $job->updated_at=now();
        $job->save();
      }

        return redirect('post-job');
    }

    public function job_delete(Request $request)
    {
       
        
       Job::find($request->delete)->delete();
        return redirect('my-jobs', 302);
    }
    public function job_saves_delete(Request $request)
    {
       
        $Job_save=Job_save::where('job_id','=',$request->delete)->delete();
        return redirect('saved-jobs', 302);
    }
    public function job_applies_delete(Request $request)
    {
       
        
        $Job_apply=Job_apply::where('job_id','=',$request->delete)->delete();
        return redirect('job-applied', 302);
    }
    

}
