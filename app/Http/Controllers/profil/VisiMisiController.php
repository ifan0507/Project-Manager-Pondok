<?php

namespace App\Http\Controllers\profil;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Visi Misi PP Nurul Huda Mangunsari'
        ];
        $data = VisiMisi::orderBy('created_at', 'asc')->get();
        $activeMenu = 'profile';
        $activeSubMenu = 'visi-misi';
        return view('profile.visi-misi', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'activeSubMenu' => $activeSubMenu, 'visiMisis' => $data]);
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
            $visi_misi = VisiMisi::create([
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);
            return response()->json(['message' => 'Visi Misi berhasil disimpan'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan'], 500);
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
        $data = VisiMisi::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visiMisi = VisiMisi::where('id', $id)->update([
            'visi' => $request->input('e-visi'),
            'misi' => $request->input('e-misi'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VisiMisi::where('id', $id)->delete();
        return redirect()->back();
    }
}
