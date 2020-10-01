<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = DB::table('skills')->get();


        return $skills;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skillslists = DB::table('skill_lists')->get();

        return view('admin.skills.create')->with('skillslist', $skillslists);
    }

    public function view()
    {

        $skillslists = DB::table('skill_lists')->get();
        $skills = DB::table('skills')->get();

        return view('admin.skills.index')->with('skillslist', $skillslists)->with('skills', $skills);
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
        Skill::create([
            'name' => request('name'),
            'icon' => request('icon'),
            'color' => request('color'),
            'level' => request('level'),
            'skill_lists_id' => request('skill_lists_id')
        ]);

        return redirect()->route('skills.view');
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
        $skill = Skill::findOrFail($id);
        
        return view('admin.skills.edit')->with('skill', $skill);

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
        $skill = Skill::findOrFail($id);

        $skill->update([
            'name' => request('name'),
            'icon' => request('icon'),
            'color' => request('color'),
            'level' => request('level')
        ]);

        return redirect()->route('skills.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from skills where id = ?',[$id]);
        return redirect()->route('skills.view');
    }
}
