<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('title');
        if(request('title')) {
            $jobs = Job::where('title', 'LIKE', "%{$search}%")->paginate(10);
        } else {
            $jobs = Job::paginate(10);
        }
        return view('main', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Job::class);
        $validated = $request->validate([
            'title' => 'required',
            'info' => 'required',
            'photo' => 'required'
        ]);
        $photo_path = $request->file('photo')->store('photos');
        $validated['photo'] = $photo_path;
        $validated['user_id'] = auth()->id();
        $job = Job::create($validated);
        return redirect(route('jobs.show', ['job' => $job]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $this->authorize('update', Job::class);
        return view('job.create', [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $this->authorize('update', Job::class);
        $data = $request->validate([
            'title' => 'required',
            'info' => 'required',
            'photo' => 'required',
        ]);
        $photo_path = $request->file('photo')->store('public/photos');
        $data['photo'] = $photo_path;
        $job->update($data);
        return redirect(route('jobs.show', ['job' => $job]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete', Job::class);
        $job->delete();
        return redirect(route('main'));
    }
}
