<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::all();
        $breadcrumb = (object)[
            'title' => 'Management Berita',
            'list' => ['Berita', 'Berita']
        ];

        $activeMenu = 'berita';
        $activeSubMenu = '';
        return view('admin.berita.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'activeSubMenu' => $activeSubMenu, 'beritas' => $beritas]);
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
        try {
            Berita::create([
                'judul' => $request->judul,
                'deskription' => $request->deskripsi,
                'selengkapnya' => $request->selengkapnya
            ]);
            return response()->json([
                'success' => true,
                'redirect_url' => route('berita')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
        $berita = Berita::find($id);
        return response()->json($berita);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Berita::where('id', $id)->update([
                'judul' => $request->input('e-judul'),
                'deskription' => $request->input('e-deskripsi'),
                'selengkapnya' => $request->input('e-selengkapnya')
            ]);
            return response()->json([
                'success' => true,
                'redirect_url' => route('berita')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Berita::destroy($id);
            return redirect()->route('berita');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
