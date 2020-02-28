<?php

namespace App\Http\Controllers;

use App\Model\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
    	return view ('job.index',[
    		'jobs' => Job::paginate(10),
    	]);
    }

    public function show($id, Job $slug)
    {
    	return view('job.show', [
    		'job' => Job::find($id),
    	]);
    }
}
