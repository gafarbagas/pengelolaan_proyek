<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Progress;
use App\Developer;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.home',[
            'project' => Project::count(),
            'user' => User::count(),
            'developer' => Developer::count(),
            'income' => Project::sum("price"),
            'onprogress' => Project::where('status_id',1)->count(),
            'done' => Project::where('status_id',2)->count(),
            'cancel' => Project::where('status_id',3)->count(),
            
        ]);

    }
}
