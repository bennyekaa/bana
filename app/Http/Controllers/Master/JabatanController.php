<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Exception;

class JabatanController extends Controller
{
    public function index()
    {
        session()->put('jabatan', url()->full());

        $data['menu'] = 'Jabatan';
        $data['breadcrumb'] = 'Jabatan';
        $data['jabatan'] = Jabatan::orderBy('jabatan')->get();

        return view('page.master.jabatan.index', $data);
    }

    public function tambah()
    {
        return view('page.master.jabatan.add');
    }

    public function edit($id)
    {
        $data['jabatan'] = Jabatan::find(decrypt($id));
        return view('page.master.jabatan.edit', $data);
    }

    public function hapus($id)
    {
        try {
            Jabatan::find(decrypt($id))->delete();
            return redirect(session('jabatan'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function status($id, $stat)
    {
        $data = Jabatan::find(decrypt($id));
        $data->status = $stat;
        $data->save();

        return back()->with('success', 'Status Berubah');
    }

    public function action(Request $request)
    {
        if ($request->fungsi == 'tambah') {
            $data = new Jabatan();
        } else {
            $data = Jabatan::find(decrypt($request->id));
        }

        $data->jabatan = $request->jabatan;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect(session('jabatan'))
            ->with('success', 'Data berhasil disimpan');
    }
}
