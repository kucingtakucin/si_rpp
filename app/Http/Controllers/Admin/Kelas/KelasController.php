<?php

namespace App\Http\Controllers\Admin\Kelas;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = [
            'kelas' => Kelas::with(['guru'])->get()
        ];
        return view('Admin.Kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = [
            'guru' => Guru::all(),
        ];
        return view('Admin.Kelas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'id_guru' => ['required'],
        ]);
        Kelas::create($request->all());
        return redirect()->route('kelas.index')->with('success', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  Kelas  $kelas
     * @return Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Kelas  $kelas
     * @return Response
     */
    public function edit(Kelas $kelas)
    {
        $data = [
            'kelas' => Kelas::where('id', $kelas->id)->first(),
            'guru' => Guru::all()

        ];
        // dd($data);
        return view('Admin.Kelas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Kelas  $kelas
     * @return Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama' => ['required'],
            'id_guru' => ['required'],
        ]);
        $kelas->update($request->all());
        return redirect()->route('kelas.index')->with('success', 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Kelas  $kelas
     * @return Response
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Berhasil Dihapus');
    }
}
