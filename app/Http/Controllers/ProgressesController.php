<?php

namespace App\Http\Controllers;

use App\Progress;
use App\Project;
use Illuminate\Http\Request;
use Alert;
use PDF;

class ProgressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view ('pages.progress.index',['projects' => $projects->sortByDesc('id')->all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pro)
    {
        $project = Project::find($pro);
        return view ('pages.progress.create',['project' => $project]);
    }

    public function store(Request $request)
    {
        $project = Project::find($request->id);
        $test = $request->test;
        $test1 = $request->test1;
        $request->validate([
            'period' => 'required|date',
            'progress' => 'required',
            'act_cost' => 'required',
        ]);
        $max = $test+$request->progress;
        $max1= $test1+$request->act_cost;
        if ($max>100){
            toast('Progres melebihi batas maksimum','error');
            return view ('pages.progress.create',['project' => $project]);
        }
        elseif ($max1>$project->price){
            toast('Biaya pengeluaran melebihi nilai kontrak','error');
            return view ('pages.progress.create',['project' => $project]);
        }
        else{
        $progress = new Progress([
            'period' => $request->period,
            'act_cost' => $request->act_cost,
            'progress' => $request->progress,
        ]);
        $project->progress()->save($progress);
        Alert::success('Sukses','Data Berhasil Ditambah');
        return redirect('/progres');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function show($pro)
    {
        $project = Project::find($pro);
        return view('pages.progress.detail',['project' => $project]);
    }

    // public function show(Project $project)
    // {
    //     return view('pages.progress.detail',['project' => $project]);
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function edit(Progress $progress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Progress $progress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Progress  $progress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Progress $progress)
    {
        //
    }

    public function laporan($pro) 
    {
        $projects = Project::find($pro);
        $pdf = PDF::loadView('pages.progress.progresspdf', ['projects' => $projects]);
        $pdf->setPaper('A4');
        return $pdf->stream('progresproyek.pdf');
    }
}
