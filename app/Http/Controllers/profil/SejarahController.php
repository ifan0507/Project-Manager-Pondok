<?php

namespace App\Http\Controllers\profil;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Management Sejarah'
        ];
        // $data = Sejarah::all();
        $activeMenu = 'profile';
        $activeSubMenu = 'sejarah';
        $data = Sejarah::orderBy('created_at', 'asc')->get();
        return view('profile.sejarah', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'activeSubMenu' => $activeSubMenu, 'sejarahs' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:225',
            'image' => 'image|file',
            'description' => 'required'
        ], [
            'judul.required' => 'Judul tidak boleh kosong!',
            'judul.max' => 'Judul maksimal 225 karakter!',
            'image.image' => 'File upload harus berupa gambar!',
            'image.file' => 'Harus berupa file!',
            'description.required' => 'Deskripsi tidak boleh kosong!'
        ]);
        if ($request->file('image')) {
            Sejarah::create([
                'judul' => $request->judul,
                'gambar' => $request->file('image')->store('sejarah-images'),
                'deskripsi' => $request->description
            ]);
        } else {
            Sejarah::create([
                'judul' => $request->judul,
                'deskripsi' => $request->description
            ]);
        };
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
        Sejarah::where('id', $id)->delete();
        return redirect()->back();
    }
}
