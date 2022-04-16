<?php

namespace App\Http\Controllers;

use App\Project;
use App\Developer;
use App\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Alert;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view ('pages.project.index', ['projects' => $projects->sortByDesc('id')->all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $developers = Developer::all();

        return view ('pages.project.create', ['developer_name' => $developers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'project_code' => 'required|max:255|unique:projects,project_code',
            'project_name' => 'required|max:255',
            'client_name' => 'required|max:255',
            'developer_id' => 'required',
            'project_start' => 'required|date',
            'project_finish' => 'required|date',
            'price' => 'required',
            'pj' => 'required|max:255'
        ];

        $customMessage = [
            'required' => 'Silahkan Masukan :attribute',
            'unique' => ':attribute Telah Digunakan'
        ];
        
        $this->validate($request, $rules, $customMessage);

        Project::create($request->all());
        $projectterbaru = DB::table('projects')->latest('id')->first();
        $project = Project::find($projectterbaru->id);
        $progress = new Progress(['progress'=>0, 'period'=> $request->project_start, 'act_cost'=> 0]);
        $project->progress()->save($progress);
        Alert::success('Sukses','Data Berhasil Ditambah');
        return redirect('/proyek');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('pages.project.detail',['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view ('pages.project.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        Project::where('id', $project->id)
            ->update([
                'project_code' => $request->project_code,
                'project_name' => $request->project_name,
                'client_name' => $request->client_name,
                'developer_id' => $request->developer_id,
                'status_id' => $request->status_id,
                'project_start' => $request->project_start,
                'project_finish' => $request->project_finish,
                'price' => $request->price,
                'pj' => $request->pj
            ]);
            toast('Data Berhasil Diubah','success');
            return redirect('/proyek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::destroy($project->id);
        toast('Data Berhasil Dihapus','success');
        return redirect('/proyek');
    }

    public function exportPDF() 
    {
        $projects = Project::all();
        $pdf = PDF::loadView('pages.project.projectpdf', ['projects' => $projects]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('dataproyek.pdf');
    }

}
