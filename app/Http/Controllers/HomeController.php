<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function account()
    {
        return view('account');
    }
    public function job_applied()
    {
        return view('job-applied');
    }
    public function job_detail()
    {
        return view('job-detail');
    }
    public function my_jobs()
    {
        return view('my_jobs');
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
}
