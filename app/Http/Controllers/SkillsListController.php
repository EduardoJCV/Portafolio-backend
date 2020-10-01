<?php

namespace App\Http\Controllers;

use App\Models\SkillList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkillsListController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $skillsList = DB::table('skill_lists')->get();
        $skills = DB::table('skills')->get();

        for ($i=0; $i < count($skillsList); $i++) { 
            for ($a=0; $a < count($skills); $a++) { 
                if (  $skillsList[$i]->id == $skills[$a]->skill_lists_id ) {
                    if ( !isset( $skillsList[$i]->skills ) ) {
                        $skillsList[$i]->skills = [];
                        array_push($skillsList[$i]->skills, $skills[$a]);
                    }else{
                        array_push($skillsList[$i]->skills, $skills[$a]);
                    }
                }
            }            
        }

        return $skillsList;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.skillslists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SkillList::create([
            'name' => request('name'),
            'icon' => request('icon')
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
        $skillsList = SkillList::findOrFail($id);
        
        return view('admin.skillslists.edit')->with('skillsList', $skillsList);
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
        $skillsList = SkillList::findOrFail($id);

        $skillsList->update([
            'name' => request('name'),
            'icon'=> request('icon')
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
        DB::delete('delete from skill_lists where id = ?',[$id]);
        DB::delete('delete from skills where skill_lists_id = ?',[$id]);
        return redirect()->route('skills.view');
    }
}
