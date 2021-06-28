<?php

namespace App\Http\Controllers\Admin\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $guru = Guru::all();
        // return view('Admin.Guru.index', ['guru' => $guru]);
        $data = [
            'guru' => Guru::all()
        ];
        return view('Admin.Guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'guru' => Guru::all(),
        ];
        return view('Admin.Guru.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['required'],
            'nama' => ['required'],
        ]);
        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Guru  $guru
     * @return Response
     */
    public function edit(Guru $guru)
    {
        $data = [
            'guru' => $guru,
        ];

        dd($guru);
        return view('Admin.Guru.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Guru  $guru
     * @return Response
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nik' => ['required'],
            'nama' => ['required'],
        ]);
        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Berhasil Dihapus');
    }
}
