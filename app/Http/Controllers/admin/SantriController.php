<?php

namespace App\Http\Controllers\admin;

use App\Models\Ortu;
use App\Models\Santri;
use Illuminate\Http\Request;
use App\Models\RiwayatSantri;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class SantriController extends Controller
{
    public function index()
    {
        $year = date('Y');
        $month = date('m');

        // Temukan entri terakhir untuk tahun dan bulan yang sama
        $lastEntry = Santri::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('nis', 'desc')
            ->first();

        //  nomor urutan berikutnya
        $sequence = 1;
        if ($lastEntry) {
            $lastNis = substr($lastEntry->nis, -3);
            $sequence = intval($lastNis) + 1;
        }

        // Format NIS
        $nis = sprintf('%s%s%03d', $year, $month, $sequence);

        $lastEntry = Santri::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('no_daftar', 'desc')
            ->first();

        // nomor urutan berikutnya
        $sequence = 1;
        if ($lastEntry) {
            $lastNoDaftar = substr($lastEntry->no_daftar, -3);
            $sequence = intval($lastNoDaftar) + 1;
        }

        // Format Daftar
        $no_daftar = sprintf('DFT%s%s%03d', $year, $month, $sequence);

        $tanggalDaftar = Carbon::now()->format('d/m/Y');

        $kabupaten = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/35.json');
        $kabupatens = json_decode($kabupaten->body());

        $data =  Santri::filter(request(['search', 'ortu', 'riwayat_santri']))->orderBy('created_at', 'asc')->paginate(10)->withQueryString();

        $breadcrumb = (object)[
            'title' => 'Data Santri',
            'list' => ['Santri', 'Welcome'],

        ];

        $activeMenu = 'master';
        $activeSubMenu = 'santri';
        return view('admin.santri.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'activeSubMenu' => $activeSubMenu, 'santris' => $data, 'kabupatens' => $kabupatens, 'nis' => $nis, 'noDaftar' => $no_daftar, 'tglDaftar' => $tanggalDaftar]);
    }


    public function konfirmasiPendaftaran($id)
    {
        try {
            $santri = Santri::with(['ortu', 'RiwayatSantri'])->findOrFail($id);

            // Format nomor telepon
            $nomorTelepon = $this->formatNomorTelepon($santri->ortu->no_tlp);

            $pesan = <<<EOT
    Assalamualaikum Wr. Wb.
    
    Dengan hormat, 
    Kami menginformasikan bahwa pendaftaran atas nama:
    Nomor Pendaftaran : *{$santri->no_daftar}*
    Nama Santri : *{$santri->nama}*
    
    telah *dikonfirmasi* oleh pihak sekolah. 
    
    Selanjutnya, kami mohon agar Bapak/Ibu/Wali santri segera mengurus administrasi pembayaran sesuai dengan ketentuan yang berlaku.
    
    Jika ada pertanyaan, silakan hubungi kami di nomor WhatsApp resmi PP Nurul Huda.
    
    Terima kasih atas perhatiannya.
    
    Wassalamualaikum Wr. Wb.
    EOT;

            // Kirim pesan WhatsApp melalui bot
            $response = Http::post('http://localhost:3000/send-message', [
                'nomor' => $nomorTelepon,
                'pesan' => $pesan,
            ]);

            // Validasi jika respon berhasil
            if ($response->successful()) {
                $santri->where('id', $id)->update([
                    'konfirmasi' => 'sudah dikonfirmasi',
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Pesan WhatsApp berhasil dikirim dan pendaftaran telah dikonfirmasi.',
                    'redirect_url' => route('santri.index'),
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal mengirim pesan WhatsApp. Silakan coba lagi.',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    private function formatNomorTelepon($nomor)
    {
        // Menghilangkan karakter non-digit
        $nomor = preg_replace('/\D/', '', $nomor);

        // Mengubah no wa jika diawali 0 menjadi 62
        if (substr($nomor, 0, 1) === '0') {
            $nomor = '62' . substr($nomor, 1);
        }

        return $nomor;
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
            'nisn' => ['unique:santris,nisn'],
            'nik' => ['unique:santris,nik'],
            'name' => ['string', 'max:255'],
            'jenis_kelamin' => ['required'],
            'tmp_lahir' => ['string', 'max:255'],
            'tgl_lahir' => ['date'],
            'alamat' => ['string', 'max:255'],
            'ayah' => ['string', 'max:255'],
            'no_ktp_ayah' => ['max:255'],
            'ibu' => ['string', 'max:255'],
            'no_tlp' => ['max:13'],
        ], [

            'nisn.unique' => 'NISN sudah terdaftar',
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama maksimal 255 karakter',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'no_tlp.max' => 'No. Telp maksimal 13 karakter',
        ]);

        try {
            $santri = Santri::create([
                'no_daftar' => $request->no_daftar,
                'tgl_daftar' => $request->tgl_daftar,
                'thn_pelajaran' => $request->thn_pelajaran,
                'nis' => $request->nis,
                'nisn' => $request->input('nisn'),
                'nik' => $request->input('nik'),
                'nama' => $request->input('name'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'tempat_lahir' => $request->input('tmp_lahir'),
                'tanggal_lahir' => $request->input('tgl_lahir'),
                'provinsi' => $request->input('provinsi'),
                'kabupaten' => $request->input('kabupaten'),
                'kab_id' => $request->input('kab_id'),
                'kecamatan' => $request->input('kecamatan'),
                'kec_id' => $request->kec_id,
                'desa' => $request->input('desa'),
                'alamat' => $request->input('alamat'),
                'rt' => $request->input('rt'),
                'rw' => $request->input('rw'),
                'konfirmasi' => 'belum dikonfirmasi'
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
                'asal_sekolah' => $request->asal_sekolah,
                'thn_lulus' => $request->thn_lulus,
                'daftar_kelas' => $request->daftar_kelas,
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
        $santri = Santri::with(['ortu', 'RiwayatSantri'])->findOrFail($id);
        return response()->json($santri);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $santri = Santri::with(["ortu", "RiwayatSantri"])->findOrFail($id);
        return response()->json($santri);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataLama = Santri::with(['ortu', 'RiwayatSantri'])->findOrFail($id);
        if ($dataLama['nik'] == $request->input('e-nik') && $dataLama['nisn'] == $request->input('e-nisn')) {
            $rule_nik = 'required';
            $rule_nisn = 'required';
        } else {
            $rule_nik = ['required', 'unique:santris,nik'];
            $rule_nisn =  ['required', 'unique:santris,nisn'];
        }

        $request->validate([
            'e-thn_pelajaran' => ['required'],
            'e-nisn' => $rule_nisn,
            'e-nik' => $rule_nik,
            'e-nama' => ['required', 'string', 'max:255'],
            'e-tmp_lahir' => ['required', 'string', 'max:255'],
            'e-tgl_lahir' => ['required', 'date'],
            'e-provinsi' => ['required'],
            'e-kabupaten' => ['required'],
            'e-kecamatan' => ['required'],
            'e-desa' => ['required'],
            'e-alamat' => ['required', 'string', 'max:255'],
            'e-rt' => ['required'],
            'e-rw' => ['required'],
            'e-no_kk' => ['required'],
            'e-ayah' => ['required', 'string', 'max:255'],
            'e-no_ktp_ayah' => ['required', 'max:255'],
            'e-pendidikan_ayah' => ['required'],
            'e-pekerjaan_ayah' => ['required'],
            'e-ibu' => ['required', 'string', 'max:255'],
            'e-no_ktp_ibu' => ['required'],
            'e-pendidikan_ibu' => ['required'],
            'e-pekerjaan_ibu' => ['required'],
            'e-no_tlp' => ['required', 'max:13'],
        ], [
            'e-thn_pelajaran.required' => 'Tahun pelajaran harus dipilih',
            'e-nisn.required' => 'NISN tidak boleh kosong',
            'e-nisn.unique' => 'NISN sudah terdaftar',
            'e-nik.required' => 'NIK tidak boleh kosong',
            'e-nik.unique' => 'NIK sudah terdaftar',
            'e-nama.required' => 'Nama tidak boleh kosong',
            'e-nama.string' => 'Nama harus berupa string',
            'e-nama.max' => 'Nama maksimal 255 karakter',
            'e-tmp_lahir.required' => 'Tempat lahir harus dipilih',
            'e-tgl_lahir.required' => 'Tanggal lahir harus dipilih',
            'e-provinsi.required' => 'Provinsi harus dipilih',
            'e-kabupaten.required' => 'Kabupaten harus dipilih',
            'e-kecamatan.required' => 'Kecamatan harus dipilih',
            'e-desa.required' => 'Desa harus dipilih',
            'e-alamat.required' => 'Alamat tidak boleh kosong',
            'e-alamat.string' => 'Alamat harus berupa string',
            'e-alamat.max' => 'Alamat maksimal 255 karakter',
            'e-rt.required' => 'RT harus diisi',
            'e-rw.required' => 'RW harus diisi',
            'e-no_kk.required' => 'No. KK harus diisi',
            'e-ayah.required' => 'Nama ayah harus diisi',
            'e-no_ktp_ayah.required' => 'No. KTP ayah harus diisi',
            'e-pendidikan_ayah.required' => 'Pendidikan ayah harus dipilih',
            'e-pekerjaan_ayah.required' => 'Pekerjaan ayah harus dipilih',
            'e-ibu.required' => 'Nama ibu harus diisi',
            'e-no_ktp_ibu.required' => 'No. KTP ibu harus diisi',
            'e-pendidikan_ibu.required' => 'Pendidikan ibu harus dipilih',
            'e-pekerjaan_ibu.required' => 'Pekerjaan ibu harus dipilih',
            'e-no_tlp.required' => 'No. Telp harus diisi',
            'e-no_tlp.max' => 'No. Telp maksimal 13 karakter',
        ]);

        $id_ortu = $request->input('e-id-ortu');
        $id_riwayat = $request->input('e-id-riwayat');

        Santri::where('id', $id)->update([
            'no_daftar' => $request->input('e-no_daftar'),
            'tgl_daftar' => $request->input('e-tgl_daftar'),
            'thn_pelajaran' => $request->input('e-thn_pelajaran'),
            'nis' => $request->input('e-nis'),
            'nisn' => $request->input('e-nisn'),
            'nik' => $request->input('e-nik'),
            'nama' => $request->input('e-nama'),
            'jenis_kelamin' => $request->input('e-jenis_kelamin'),
            'tempat_lahir' => $request->input('e-tmp_lahir'),
            'tanggal_lahir' => $request->input('e-tgl_lahir'),
            'provinsi' => $request->input('e-provinsi'),
            'kabupaten' => $request->input('e-kabupaten'),
            'kab_id' => $request->input('e-kabupaten_id'),
            'kecamatan' => $request->input('e-kecamatan'),
            'kec_id' => $request->input('e-kecamatan_id'),
            'desa' => $request->input('e-desa'),
            'alamat' => $request->input('e-alamat'),
            'rt' => $request->input('e-rt'),
            'rw' => $request->input('e-rw'),
        ]);
        Ortu::where('id', $id_ortu)->update([
            'no_kk' => $request->input('e-no_kk'),
            'ayah' => $request->input('e-ayah'),
            'no_ktp_ayah' => $request->input('e-no_ktp_ayah'),
            'pendidikan_ayah' => $request->input('e-pendidikan_ayah'),
            'pekerjaan_ayah' => $request->input('e-pekerjaan_ayah'),
            'ibu' => $request->input('e-ibu'),
            'no_ktp_ibu' => $request->input('e-no_ktp_ibu'),
            'pendidikan_ibu' => $request->input('e-pendidikan_ibu'),
            'pekerjaan_ibu' => $request->input('e-pekerjaan_ibu'),
            'no_tlp' => $request->input('e-no_tlp'),
        ]);

        RiwayatSantri::where('id', $id_riwayat)->update([
            'pendidikan_santri' => $request->input('e-pendidikan_santri'),
            'asal_sekolah' => $request->input('e-asal_sekolah'),
            'thn_lulus' => $request->input('e-thn_lulus'),
            'daftar_kelas' => $request->input('e-daftar_kelas'),
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
