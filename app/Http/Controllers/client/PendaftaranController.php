<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Ortu;
use App\Models\RiwayatSantri;
use App\Models\Santri;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = (object)[
            'title' => 'Pendaftaran Online Santri Baru',
            'list' => 'PP Nurul Huda'
        ];
        return view('client.pendaftaran', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thn_pelajaran' => ['required'],
            'nisn' => ['required', 'unique:santris,nisn'],
            'nik' => ['required', 'unique:santris,nik'],
            'name' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required'],
            'tmp_lahir' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'date'],
            'provinsi' => ['required'],
            'kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'desa' => ['required'],
            'alamat' => ['required', 'string', 'max:255'],
            'rt' => ['required'],
            'rw' => ['required'],
            'no_kk' => ['required'],
            'ayah' => ['required', 'string', 'max:255'],
            'no_ktp_ayah' => ['required', 'max:255'],
            'pendidikan_ayah' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'ibu' => ['required', 'string', 'max:255'],
            'no_ktp_ibu' => ['required'],
            'pendidikan_ibu' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'no_tlp' => ['required'],
        ], [
            'thn_pelajaran.required' => 'Tahun pelajaran harus dipilih',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.unique' => 'NISN sudah terdaftar',
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama maksimal 255 karakter',
            'tmp_lahir.required' => 'Tempat lahir harus dipilih',
            'tgl_lahir.required' => 'Tanggal lahir harus dipilih',
            'provinsi.required' => 'Provinsi harus dipilih',
            'kabupaten.required' => 'Kabupaten harus dipilih',
            'kecamatan.required' => 'Kecamatan harus dipilih',
            'desa.required' => 'Desa harus dipilih',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'no_kk.required' => 'No. KK harus diisi',
            'ayah.required' => 'Nama ayah harus diisi',
            'no_ktp_ayah.required' => 'No. KTP ayah harus diisi',
            'pendidikan_ayah.required' => 'Pendidikan ayah harus dipilih',
            'pekerjaan_ayah.required' => 'Pekerjaan ayah harus dipilih',
            'ibu.required' => 'Nama ibu harus diisi',
            'no_ktp_ibu.required' => 'No. KTP ibu harus diisi',
            'pendidikan_ibu.required' => 'Pendidikan ibu harus dipilih',
            'pekerjaan_ibu.required' => 'Pekerjaan ibu harus dipilih',
            'no_tlp.required' => 'No. Telp harus diisi',
        ]);

        $santri = Santri::create([
            'no_daftar' => $request->no_daftar,
            'tgl_daftar' => $request->tgl_daftar,
            'thn_pelajaran' => $request->thn_pelajaran,
            'nis' => $request->nis,
            'nisn' => $request->input('nisn'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('name'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tmp_lahir' => $request->input('tmp_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'provinsi' => $request->input('provinsi'),
            'kabupaten' => $request->input('kabupaten'),
            'kab_id' => $request->input('kab_id'),
            'kecamatan' => $request->input('kecamatan'),
            'kec_id' => $request->kec_id,
            'desa' => $request->input('desa'),
            'alamat' => $request->input('alamat'),
            'rt' => $request->input('rt'),
            'rw' => $request->input('rw'),
        ]);

        $ortu = Ortu::create([
            'santri_id' => $santri->id,
            'no_kk' => $request->no_kk,
            'ayah' => $request->input('ayah'),
            'no_ktp_ayah' => $request->input('no_ktp_ayah'),
            'pendidikan_ayah' => $request->input('pendidikan_ayah'),
            'pekerjaan_ayah' => $request->input('pekerjaan_ayah'),
            'ibu' => $request->input('ibu'),
            'no_ktp_ibu' => $request->input('no_ktp_ibu'),
            'pendidikan_ibu' => $request->input('pendidikan_ibu'),
            'pekerjaan_ibu' => $request->input('pekerjaan_ibu'),
            'no_tlp' => $request->input('no_tlp'),
        ]);

        $riwayat = RiwayatSantri::create([
            'santri_id' => $santri->id,
            'pendidikan_santri' => $request->pendidikan_santri,
            'asal_sekoalah' => $request->asal_sekoalah,
            'thn_lulus' => $request->thn_lulus,
            'daftar_kelas' => $request->aftar_kelas,
        ]);
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
