<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Http\Requests\StorePendaftarRequest;
use App\Http\Requests\UpdatePendaftarRequest;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftars = Pendaftar::all();
        return view('pendaftar.index', compact('pendaftars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangPendidikanOptions = [
            'SMP/MTs' => 'SMP/MTs',
            'SMA/SMK/MA' => 'SMA/SMK/MA'
        ];

        $peminatanOptions = [
            'SNBT' => 'SNBT',
            'Kedinasan' => 'Kedinasan'
        ];

        return view('pendaftar.create', compact('jenjangPendidikanOptions', 'peminatanOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendaftarRequest $request)
    {
        $data = $request->validated();

        foreach (['ss1', 'ss2', 'ss3', 'ss4'] as $ss) {
            if ($request->hasFile($ss)) {
                $data[$ss] = $request->file($ss)->store('images');
            }
        }

        try {
            Pendaftar::create($data);
            return redirect()->route('pendaftar.index')->with('success', 'Berhasil menambah data!');
        } catch (\Exception $e) {
            return redirect()->route('pendaftar.index')->with('error', 'Gagal menambah data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendaftarRequest $request, Pendaftar $pendaftar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftar $pendaftar)
    {
        $pendaftar->delete();
        return redirect()->route('pendaftar.index')->with('success', 'Berhasil menghapus data!');
    }
}
