<?php

namespace App\Http\Controllers;

use App\Models\Project as ModelsProject;
use App\Models\Projects;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($limit)
    {

        $projects = false;
        
        if ( $limit == 'false' || $limit == false ) {
            $projects = DB::table('projects')->get();



        }else{
            $projects = DB::table('projects')->limit($limit)->get();
        }


        for ($i=0; $i < count($projects); $i++) { 
            unset($projects[$i]->content);
        }

        
        return $projects;



    }

    public function view()
    {

        $projects = DB::table('projects')->get();

        
        return view('admin.projects.index')->with('projects', $projects);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // return $request;
        Projects::create([
            'title' => request('title'),
            'img' => request('img'),
            'github' => request('github'),
            'url' => request('url'),
            'description' => request('description'),
            'content' => request('content')
        ]);

        return redirect()->route('projects.view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $project = Projects::findOrFail($id);

        return $project;


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Projects::findOrFail($id);

        return view('admin.projects.edit')->with('project', $project);
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
        $project = Projects::findOrFail($id);

        $project->update([
            'title' => request('title'),
            'img' => request('img'),
            'github' => request('github'),
            'url' => request('url'),
            'description' => request('description'),
            'content' => request('content')
        ]);

        return redirect()->route('projects.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from projects where id = ?',[$id]);
        return redirect()->route('projects.view');
    }
}
