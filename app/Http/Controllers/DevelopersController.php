<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Category;
use Illuminate\Http\Request;
use DB;
use Alert;
use PDF;

class DevelopersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::all();
        return view ('pages.developer.index', ['developers' => $developers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view ('pages.developer.create', [
            'category_name' => $categories
        ]);
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
            'developer_code' => 'required|max:255|unique:developers,developer_code',
            'category_id' => 'required',
            'developer_name' => 'required|max:255',
            'email' => 'required|max:255',
            'telp' => 'required|max:255',
        ];

        $customMessage = [
            'required' => 'Silahkan Masukan :attribute',
            'unique' => ':attribute Telah Digunakan'
        ];
        
        $this->validate($request, $rules, $customMessage);

        Developer::create($request->all());
        Alert::success('Sukses','Data Berhasil Ditambah');
        return redirect('/pengembang');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        return view ('pages.developer.edit', ['developer' => $developer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Developer $developer)
    {
        Developer::where('id', $developer->id)
            ->update([
                'category_id' => $request->category_id,
                'developer_name' => $request->developer_name,
                'email' => $request->email,
                'telp' => $request->telp,
            ]);
            toast('Data Berhasil Diubah','success');
            return redirect('/pengembang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        Developer::destroy($developer->id);
        toast('Data Berhasil Dihapus','success');
        return redirect('/pengembang');
    }

    public function laporan() 
    {
        $developers = Developer::all();
        $pdf = PDF::loadView('pages.developer.developerpdf', ['developers' => $developers]);
        $pdf->setPaper('A4');
        return $pdf->stream('datapengembang.pdf');
    }
}
