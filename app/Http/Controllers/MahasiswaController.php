<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.index', [
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->file('foto')->store('foto-mhs'));
        $validatedData = $request->validate([
            'nim' => 'required',
            'namamhs' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'email' => 'required',
            'foto' => 'image|file|max:2048'
        ]);

        // if ($request->file('foto')) {
        //     $valdiatedData['foto'] = $request->file('foto')->store('foto-mhs');
        // }

        if ($foto = $request->file('foto')) {
            $destinationPath = 'img/';
            $profileFoto = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileFoto);
            $validatedData['foto'] = "$profileFoto";
        }

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa/show', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nim' => 'required',
            'namamhs' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'email' => 'required',
            'foto' => 'image|file|max:2048'
        ]);


        if ($foto = $request->file('foto')) {
            $destinationPath = 'img/';
            $profileFoto = date('YmdHis') . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileFoto);
            $validatedData['foto'] = "$profileFoto";
        } else {
            unset($validatedData['foto']);
        }


        Mahasiswa::where('id', $mahasiswa->id)
            ->update($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
