<?php

namespace App\Http\Controllers\admin;

use App\Models\Santri;
use Barryvdh\DomPDF\PDF as DomPDF;
use App\Models\IzinSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IzinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Management Perizinan Santri',
            'list' => ['Home', 'Welcome']
        ];

        $data = IzinSantri::filter(request(['santri', 'izin_search']))->orderBy('created_at', 'asc')->paginate(3)->withQueryString();

        $activeMenu = 'izin';
        $activeSubMenu = '';
        return view('admin.perizinan-santri.index', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'activeSubMenu' => $activeSubMenu, 'izins' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'izin_nis' => 'exists:santris,nis',
        ], [
            'izin_nis.exists' => 'NIS santri yang dimasukkan tidak ditemukan.',
        ]);

        $santri = Santri::where('nis', $request->input('izin_nis'))->first();

        if ($santri) {
            session(['santri' => $santri]);
            return response()->json([
                'success' => true,
                'redirect_url' => route('form-izin')
            ]);
        }

        return response()->json(['success' => false], 400);
    }



    public function showForm()
    {
        $year = date('Y');
        $month = date('m');

        // entri terakhir untuk tahun dan bulan yang sama
        $lastEntry = IzinSantri::whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->orderBy('kode_izin', 'desc')
            ->first();

        //  nomor urutan berikutnya
        $sequence = 1;
        if ($lastEntry) {
            $lastKode = substr($lastEntry->kode_izin, -3);
            $sequence = intval($lastKode) + 1;
        }

        // Format NIS
        $kodeIzin = sprintf('SI%s%s%03d', $year, $month, $sequence);


        $tanggalIzin = Carbon::now()->format('d/m/Y');

        $breadcrumb = (object)[
            'title' => 'Form Perizinan Santri',
            'list' => ['Home', 'Welcome']
        ];
        $activeMenu = 'izin';
        $activeSubMenu = '';
        $santri = session('santri');

        if (!$santri) {
            return redirect()->route('izin')->with('error', 'Data santri tidak ditemukan.');
        }
        return view('admin.perizinan-santri.form-izin', compact('santri'), ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu, 'activeSubMenu' => $activeSubMenu, 'tgl_izin' => $tanggalIzin, 'kode' => $kodeIzin]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'form_izin_keterangan' => ['required'],
            'form_lama_izin' => ['required'],
        ], [
            'form_izin_keterangan.required' => 'Keterangan izin harus dipilih!',
            'form_lama_izin.required' => 'Lama izin harus diisi!',
        ]);

        $izin = IzinSantri::create([
            'santri_id' => $request->izin_santri_id,
            'kode_izin' => $request->form_izin_kode,
            'keterangan' => $request->form_izin_keterangan,
            'lama_izin' => $request->form_lama_izin,
            'tgl_izin' => $request->tgl_izin,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => 'belum kembali',
        ]);
        if ($izin) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('izin')
            ]);
        }
    }

    public function izinKembali(string $id)
    {
        IzinSantri::where('id', $id)->update(['status' => 'sudah kembali']);
        return redirect()->back();
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
        $izin = IzinSantri::with("santri")->findOrFail($id);

        $breadcrumb = (object) [
            'title' => 'Update Perizinan Santri',
            'list' => ['Home', 'Welcome']
        ];
        $activeMenu = 'izin';
        $activeSubMenu = '';

        return view('admin.perizinan-santri.form-izin-edit', compact('izin', 'breadcrumb', 'activeMenu', 'activeSubMenu'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'e-form_izin_keterangan' => ['required'],
            'e-form_lama_izin' => ['required'],
        ], [
            'e-form_izin_keterangan.required' => 'Keterangan izin harus dipilih!',
            'e-form_lama_izin.required' => 'Lama izin harus diisi!',
        ]);

        $edit = IzinSantri::where('id', $id)->update([
            'keterangan' => $request->input('e-form_izin_keterangan'),
            'lama_izin' => $request->input('e-form_lama_izin'),
            'tgl_kembali' => $request->input('e-tgl_kembali')
        ]);

        if ($edit) {
            return response()->json([
                'success' => true,
                'redirect_url' => route('izin')
            ]);
        }
    }


    public function exportPdf($id, DomPDF $domPDF)
    {
        $izin = IzinSantri::with('santri')->findOrFail($id);
        return view('admin.perizinan-santri.pdf', compact('izin'));
        // $pdf = $domPDF->loadView('admin.perizinan-santri.pdf', compact('izin'));
        // return $pdf->download('izin-perizinan-' . $izin->id . '.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        IzinSantri::where('id', $id)->delete();
        return redirect()->back();
    }
}
