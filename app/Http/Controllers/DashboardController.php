<?php

namespace App\Http\Controllers;

use App\Imports\LahansImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\Tables\TablePemilik;
use App\Tables\TableAktaTanah;
use App\Tables\TableUser;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\Toast;
use App\Models\Pemilik;
use Illuminate\Support\Facades\Storage;
use App\Models\Lahan;
use App\Exports\AktaExport;



class DashboardController extends Controller
{
    public function dashboard() {
        $data = [
            'pemilik' => Pemilik::count(),
            'akta' => Lahan::count(),
            'akta-pemilik' => Lahan::where('keterangan', 'PEMILIK')->count(),
            'akta-limpahan' => Lahan::where('keterangan', 'LIMPAHAN')->count(),
            'akta-dilimpahkan' => Lahan::where('keterangan', 'DILIMPAHKAN')->count(),
        ];

        return view('dashboard', compact('data'));
    }
    public function data_pemilik() {
        $data = TablePemilik::class;
        return view('pages.pemilik.index', compact('data'));
    }

    public function data_pemilik_show($id) {
        $data = Pemilik::find($id);
        return view('pages.pemilik.show', compact('data', 'id'));
    }

    public function data_pemilik_update($id) {
        $data                = Pemilik::find($id);
        $data->nama          = request('nama');
        $data->nik           = request('nik');
        $data->ibu_kandung   = request('ibu_kandung');
        $data->nomor_telepon = request('nomor_telepon');
        $data->alamat        = request('alamat');

        if (request()->file('file_ktp')) {
            $now  = now()->format('Y-m-d');
            $path = 'public/ktp/' . $now . '/';
            $file = request()->file('file_ktp');
            $name = Str::slug(request('nama') . '-' . request('ibu_kandung'));
            $file->storeAs($path, $name, 'public');
            $data->ktp = $path . $name;
        }
        $data->save();

        Toast::title('Data Berhasil Di Perbaruhi !')->autoDismiss(15);
        return redirect()->route('dashboard.pemilik.show', ['id' => $id]);
    }

    public function data_pemilik_create() {
        return view('pages.pemilik.create');
    }

    public function data_pemilik_store() {
        $data                = New Pemilik;
        $data->nama          = request('nama');
        $data->nik           = request('nik');
        $data->ibu_kandung   = request('ibu_kandung');
        $data->nomor_telepon = request('nomor_telepon');
        $data->alamat        = request('alamat');
        $data->user_id       = Auth::user()->id;

        if (request()->file('file_ktp')) {
            $now  = now()->format('Y-m-d');
            $path = 'public/ktp/' . $now . '/';
            $file = request()->file('file_ktp');
            $name = Str::slug(request('nama') . '-' . request('ibu_kandung'));
            $file->storeAs($path, $name, 'public');
            $data->ktp = $path . $name;
        }
        $data->save();

        Toast::title('Data Pemilik Akta Berhasil Di Tambah !')->autoDismiss(15);
        return redirect()->route('dashboard.pemilik.show', ['id' => $data->id]);
    }

    public function data_pemilik_destroy($id) {
        Pemilik::destroy($id);
        Toast::title('Data Akta Berhasil Di Hapus !')->autoDismiss(15);
        return redirect()->route('dashboard.pemilik');
    }

    public function data_akta(Request $request) {
        // $data = TableAktaTanah::class;
        $lahans = Lahan::with('pemilik');

        if (!is_null($request->nama)) {
            $lahans->whereHas('pemilik', function ($query) use ($request) {
                $query->where('nama', 'like', '%' . $request->nama . '%');
            });
        }

        if (!is_null($request->alamat)) {
            $lahans->whereHas('pemilik', function ($query) use ($request) {
                $query->where('alamat', 'like', '%' . $request->alamat . '%');
            });
        }

        if (!is_null($request->nik)) {
            $lahans->whereHas('pemilik', function ($query) use ($request) {
                $query->where('nik', 'like', '%' . $request->nik . '%');
            });
        }

        if (!is_null($request->nomor_telepon)) {
            $lahans->whereHas('pemilik', function ($query) use ($request) {
                $query->where('nomor_telepon', 'like', '%' . $request->nomor_telepon . '%');
            });
        }

        if (!is_null($request->nomor_notaris)) {
            $lahans->where('nomor_notaris', 'like', '%' . $request->nomor_notaris . '%');
        }

        if (!is_null($request->keterangan)) {
            $lahans->where('keterangan', $request->keterangan);
        }


        $data =  $lahans->latest()->paginate($request->per_page ?? 10);
        return view('pages.akta.index', compact('data'));
    }

    public function data_akta_create($id) {
        $json = Storage::disk('public')->get('/data/daerah-indonesia.json');
        $datakota = json_decode($json, true);
        return view('pages.akta.create', compact('datakota', 'id'));
    }

    public function data_akta_store($id) {
        $lahan = new Lahan;
        $lahan->nomor_notaris   = request('nomor_notaris');
        $lahan->tanggal_notaris = request('tanggal_notaris');
        $lahan->jumlah          = request('jumlah');
        $lahan->luas_tanah      = request('luas_tanah');
        $lahan->keterangan      = request('keterangan');
        $lahan->terima          = request('terima');
        $lahan->pemilik_id      = $id;
        $lahan->user_id         = Auth::user()->id;
        $lahan->save();
        Toast::title('Data Akta Berhasil Di Tambahkan !')->autoDismiss(15);
        return redirect()->route('dashboard.pemilik.show', ['id' => $id]);
    }

    public function data_akta_show($id, $notaris) {
        $data = Lahan::find($notaris);
        $json = Storage::disk('public')->get('/data/daerah-indonesia.json');
        $datakota = json_decode($json, true);
        return view('pages.akta.show', compact('data', 'id', 'datakota'));
    }

    public function data_akta_update($id, $notaris) {
        $lahan = Lahan::find($notaris);
        $lahan->nomor_notaris   = request('nomor_notaris');
        $lahan->tanggal_notaris = request('tanggal_notaris');
        $lahan->jumlah          = request('jumlah');
        $lahan->luas_tanah      = request('luas_tanah');
        $lahan->keterangan      = request('keterangan');
        $lahan->terima          = request('terima');
        $lahan->save();
        Toast::title('Data Akta Berhasil Di Perbaruhi !')->autoDismiss(15);
        return redirect()->back();
    }
    public function data_akta_destroy($id, $notaris) {
        Lahan::destroy($notaris);
        Toast::title('Data Akta Berhasil Di Hapus !')->autoDismiss(15);
        return redirect()->route('dashboard.pemilik.show', ['id' => $id]);
    }

    public function data_akta_export(Request $request)
    {
        $filters = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'nik' => $request->input('nik'),
            'nomor_telepon' => $request->input('nomor_telepon'),
            'nomor_notaris' => $request->input('nomor_notaris'),
            'keterangan' => $request->input('keterangan'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date')
        ];

        $date = date('Ymd');
        return Excel::download(new AktaExport($filters), "data_akta_$date.xlsx");
    }

    public function import_data() {
        return view('pages.import');
    }

    public function import_data_store(Request $request) {
        Excel::import(new LahansImport(Auth::user()->id), request()->file('file'));
        Toast::title('Data Berhasil Di Import !')->autoDismiss(15);
        return redirect()->back();
    }

    public function data_user() {
        $data = TableUser::class;
        return view('pages.user.index', compact('data'));
    }
}
