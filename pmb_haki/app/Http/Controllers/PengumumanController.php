<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();
        return view('pengumuman', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        try {
            $path = null;
            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('pengumuman', 'public');
            }

            Pengumuman::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $path,
            ]);

            return redirect()->back()->with('success', 'Pengumuman berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Gagal menambahkan pengumuman: ' . $e->getMessage()]);
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar) {
                Storage::delete('public/' . $pengumuman->gambar);
            }
            $path = $request->file('gambar')->store('pengumuman', 'public');
            $pengumuman->gambar = $path;
        }

        $pengumuman->judul = $request->judul;
        $pengumuman->deskripsi = $request->deskripsi;
        $pengumuman->save();

        return redirect()->back()->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy($id)
    {
        try {
            $pengumuman = Pengumuman::findOrFail($id);

            // Delete the image from storage
            if ($pengumuman->gambar) {
                Storage::delete('public/' . $pengumuman->gambar);
            }

            // Delete the announcement
            $pengumuman->delete();

            return redirect()->back()->with('success', 'Pengumuman berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Gagal menghapus pengumuman: ' . $e->getMessage()]);
        }
    }

}
