<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use Exception;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    //
    public function index(){
        session()->put('agama', url()->full());
        $data['menu'] = 'Agama';
        $data['breadcrumb'] = 'Agama';
        $data['agama'] = Agama::orderBy('agama')->get();
        return view('page.master.agama.index', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'Tambah Agama';
        $data['breadcrumb'] = 'Tambah Kategori';
        return view('page.master.agama.add', $data);
    }

    public function edit($id)
    {
        $data['menu'] = 'Edit Agama';
        $data['breadcrumb'] = 'Edit Agama';
        $data['agama'] = Agama::find(decrypt($id));
        // dd($data['agama']);
        return view('page.master.agama.edit', $data);
    }

    public function hapus($id)
    {
        try {
            $agama = Agama::find(decrypt($id));
            $agama->delete();
            return redirect(session('agama'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return redirect(session('agama'))->with('error', $e->getMessage());
        }
    }

    public function status($id, $stat)
    {
        try {
            $agama = Agama::find(decrypt($id));
            $agama->status = $stat;
            // $agama->updated_by = session()->get('username');
            $agama->save();
            return redirect(session('agama'))->with('success', 'Status Berubah');
        } catch (Exception $e) {
            return redirect(session('agama'))->with('error', $e->getMessage());
        }
    }

    public function action(Request $request)
    {
        if ($request->fungsi == 'tambah') {
            $agama = new Agama();
            $agama->agama = $request->agama;
            $agama->keterangan = $request->keterangan;
            // $agama->created_by = session()->get('username');
            $agama->save();

            return redirect(session('agama'))->with('success', 'Data Berhasil Ditambah');
        } else if ($request->fungsi == 'edit') {
            $agama = Agama::find(decrypt($request->id));
            $agama->agama = $request->agama;
            $agama->keterangan = $request->keterangan;
            // $agama->created_by = session()->get('username');
            $agama->save();
            return redirect(session('agama'))->with('success', 'Data Berhasil Diubah');
        }
    }
}
