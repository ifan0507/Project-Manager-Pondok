<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $data = (object)[
            'title' => 'PP NURUL HUDA',
            'list' => 'Mangunsari Tekung Lumajang'
        ];
        return view('client.home', ['data' => $data, 'beritas' => $beritas]);
    }

    public function detailBerita()
    {
        $data = (object)[
            'title' => 'Detail Berita',
            'list' => 'Mangunsari Tekung Lumajang'
        ];
        return view('client.detailBerita', ['data' => $data]);
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
        //
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
