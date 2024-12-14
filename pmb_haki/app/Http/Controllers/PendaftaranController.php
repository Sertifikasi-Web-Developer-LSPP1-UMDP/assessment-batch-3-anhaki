<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendaftaran');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'program_studi' => 'required|string',
            'asal_sma' => 'required|string|max:255',
            'nilai_ijazah' => 'required|numeric|between:0,100',
        ]);

        $validated['user_id'] = Auth::id();

        Mahasiswa::create($validated);
        Auth::user()->update(['mhs_status' => 'pending']);

        return redirect()->route('/')->with('success', 'Pendaftaran berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
