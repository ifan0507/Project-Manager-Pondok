<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;

class ClientSejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sejarahs = Sejarah::all();

        // Proses deskripsi untuk menampilkan 100 kata
        foreach ($sejarahs as $sejarah) {
            $sejarah->short_description = \Illuminate\Support\Str::words($sejarah->deskripsi, 100, '...');
        }

        $data = (object)[
            'title' => 'Sejarah PP Nurul Huda',
            'list' => 'Mangunsari Tekung Lumajang'
        ];

        return view('client.sejarah', ['data' => $data, 'sejarahs' => $sejarahs]);
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
