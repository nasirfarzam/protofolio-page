<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $this->authorize('view', $project);

        $projects = Project::orderBy('created_at', 'DESC')->get();
        return view('admin.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Project::class);

        $project = new Project();

        $project->name = $request['name'];
        $project->link = $request['link'];
        $this->storeImage($project);

        $request->create($project);

        return back()->with('success', 'Added successfully!');
    }

    // Store Image
    public function storeImage($project)
    {
        $file = request()->file('image');

        if (request()->has('image')) {
            $fileExtension = $file->getClientOriginalExtension();
            $dbPath = "/images/" . $file->getClientOriginalName() . '_' . time() . '.' . $fileExtension;
            $file->move(public_path('/images/'), $dbPath);

            $project->image = $dbPath;
            $project->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    // Delete
    public function destroy(Project $project, $id)
    {
        $this->authorize('delete', $project);

        Project::where('id', '=', $id)->delete();

        return back()->with('success', 'Project removed successfully!');
    }
}
