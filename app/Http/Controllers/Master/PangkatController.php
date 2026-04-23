<?php

namespace App\Http\Controllers\Master;

use App\Models\Pangkat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    public function index()
    {
        session()->put('pangkat', url()->full());

        $data['pangkat'] = Pangkat::orderBy('pangkat')->get();

        return view('page.master.pangkat.index', $data);
    }

    public function tambah()
    {
        return view('page.master.pangkat.add');
    }

    public function edit($id)
    {
        $data['pangkat'] = Pangkat::find(decrypt($id));

        return view('page.master.pangkat.edit', $data);
    }

    public function hapus($id)
    {
        Pangkat::find(decrypt($id))->delete();

        return back()
            ->with('success', 'Data Terhapus');
    }

    public function status($id, $stat)
    {
        $data = Pangkat::find(decrypt($id));
        $data->status = $stat;
        $data->save();

        return back();
    }

    public function action(Request $request)
    {

        if ($request->fungsi == 'tambah') {
            $data = new Pangkat();
        } else {
            $data = Pangkat::find(
                decrypt($request->id)
            );
        }

        $data->pangkat = $request->pangkat;
        $data->korps = $request->korps;
        $data->keterangan = $request->keterangan;

        $data->save();

        return redirect(session('pangkat'))
            ->with('success', 'Data berhasil disimpan');
    }
}
