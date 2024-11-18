<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Validated;

class SantriController extends Controller
{

    public function index()
    {
        // tahun dan bulan saat ini
        $year = date('Y');
        $month = date('m');

        // Temukan entri terakhir untuk tahun dan bulan yang sama
        $lastEntry = Santri::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('nis', 'desc')
            ->first();

        // Tentukan nomor urutan berikutnya
        $sequence = 1;
        if ($lastEntry) {
            $lastNis = substr($lastEntry->nis, -3);
            $sequence = intval($lastNis) + 1;
        }

        // Format NIS
        $nis = sprintf('%s%s%03d', $year, $month, $sequence);

        $kabupaten = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/35.json');
        $kabupatens = json_decode($kabupaten->body());

        $data =  Santri::filter(request(['search', 'ortu']))->latest()->paginate(3)->withQueryString();

        $breadcrumb = (object)[
            'title' => 'Data Santri',
            'list' => ['Santri', 'Welcome'],

        ];

        $activeMenu = 'santri';
        $activeSubMenu = '';
        return view('santri.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'activeSubMenu' => $activeSubMenu, 'santris' => $data, 'kabupatens' => $kabupatens, 'nis' => $nis]);
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

        // echo "<script>console.log('bisa');</script>";
        $request->validate([
            'nik' => ['required', 'unique:santris,nik'],
            'nama' => ['required', 'string', 'max:255'],
            'tempat-lahir' => ['required', 'string', 'max:255'],
            'tanggal-lahir' => ['required', 'date'],
            'agama' => ['required', 'string', 'max:255'],
            'nama-ayah' => ['required', 'string', 'max:255'],
            'nama-ibu' => ['required', 'string', 'max:255'],
            'provinsi' => ['required'],
            'kabupaten' => ['required'],
            'kecamatan' => ['required'],
            'desa' => ['required'],
            'alamat' => ['required', 'string', 'max:255']
        ], [
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama maksimal 255 karakter',
            'tempat-lahir.required' => 'Tempat lahir harus dipilih',
            'tanggal-lahir.required' => 'Tanggal lahir harus dipilih',
            'agama.required' => 'Agama harus diisi',
            'nama-ayah.required' => 'Nama ayah harus diisi',
            'nama-ibu.required' => 'Nama ibu harus diisi',
            'provinsi.required' => 'Provinsi harus dipilih',
            'kabupaten.required' => 'Kabupaten harus dipilih',
            'kecamatan.required' => 'Kecamatan harus dipilih',
            'desa.required' => 'Desa harus dipilih',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat maksimal 255 karakter',
        ]);
        try {
            $santri = Santri::create([
                'nis' => $request->nis,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->input('jenis-kelamin'),
                'tempat_lahir' => $request->input('tempat-lahir'),
                'tanggal_lahir' => $request->input('tanggal-lahir'),
                'agama' => $request->agama,
                'provinsi' => $request->input('provinsi'),
                'kab_id' => $request->kabupaten_id,
                'kabupaten' => $request->input('kabupaten'),
                'kec_id' => $request->kecamatan_id,
                'kecamatan' => $request->input('kecamatan'),
                'desa' => $request->input('desa'),
                'alamat' => $request->alamat,
            ]);
            $ortu = Ortu::create([
                'santri_id' => $santri->id,
                'ayah' => $request->input('nama-ayah'),
                'ibu' => $request->input('nama-ibu'),
            ]);

            return response()->json(['message' => 'Data santri berhasil ditambahkan.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.'], 500);
        }

        // return redirect()->back()->with('success', 'Data santri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $santri = Santri::with('ortu')->findOrFail($id);
        return response()->json($santri);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $santri = Santri::with('ortu')->findOrFail($id);
        return response()->json($santri);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataLama = Santri::with('ortu')->findOrFail($id);
        if ($dataLama['nik'] == $request->input('e-nik')) {
            $rule_nik = 'required';
        } else {
            $rule_nik = ['required', 'unique:santris,nik'];
        }

        $request->validate([
            'e-nik' => $rule_nik,
            'e-nama' => ['required', 'string', 'max:255'],
            'e-tempat-lahir' => ['required', 'string', 'max:255'],
            'e-tanggal-lahir' => ['required', 'date'],
            'e-agama' => ['required', 'string', 'max:255'],
            'e-nama-ayah' => ['required', 'string', 'max:255'],
            'e-nama-ibu' => ['required', 'string', 'max:255'],
            'e-provinsi' => ['required'],
            'e-kabupaten' => ['required'],
            'e-kecamatan' => ['required'],
            'e-desa' => ['required'],
            'e-alamat' => ['required', 'string', 'max:255']
        ], [
            'e-nik.required' => 'NIK tidak boleh kosong',
            'e-nik.unique' => 'NIK sudah terdaftar',
            'e-nama.required' => 'Nama tidak boleh kosong',
            'e-nama.string' => 'Nama harus berupa string',
            'e-nama.max' => 'Nama maksimal 255 karakter',
            'e-tempat-lahir.required' => 'Tempat lahir harus dipilih',
            'e-tanggal-lahir.required' => 'Tanggal lahir harus dipilih',
            'e-agama.required' => 'Agama harus diisi',
            'e-nama-ayah.required' => 'Nama ayah harus diisi',
            'e-nama-ibu.required' => 'Nama ibu harus diisi',
            'e-provinsi.required' => 'Provinsi harus dipilih',
            'e-kabupaten.required' => 'Kabupaten harus dipilih',
            'e-kecamatan.required' => 'Kecamatan harus dipilih',
            'e-desa.required' => 'Desa harus dipilih',
            'e-alamat.required' => 'Alamat tidak boleh kosong',
            'e-alamat.string' => 'Alamat harus berupa string',
            'e-alamat.max' => 'Alamat maksimal 255 karakter',
        ]);

        $id_ortu = $request->input('e-id-ortu');

        $santri = Santri::where('id', $id)->update([
            'nis' => $request->input('e-nis'),
            'nik' => $request->input('e-nik'),
            'nama' => $request->input('e-nama'),
            'tempat_lahir' => $request->input('e-tempat-lahir'),
            'tanggal_lahir' => $request->input('e-tanggal-lahir'),
            'agama' => $request->input('e-agama'),
            'provinsi' => $request->input('e-provinsi'),
            'kab_id' => $request->input('e-kabupaten_id'),
            'kabupaten' => $request->input('e-kabupaten'),
            'kec_id' => $request->input('e-kecamatan_id'),
            'kecamatan' => $request->input('e-kecamatan'),
            'desa' => $request->input('e-desa'),
            'jenis_kelamin' => $request->input('e-jenis-kelamin'),
            'alamat' => $request->input('e-alamat'),
        ]);
        $ortu = Ortu::where('id', $id_ortu)->update([
            'ayah' => $request->input('e-nama-ayah'),
            'ibu' => $request->input('e-nama-ibu'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Santri::where('id', $id)->delete();
        return redirect()->back();
    }
}
