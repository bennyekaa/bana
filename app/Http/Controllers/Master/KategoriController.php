<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    {
        session()->put('kategori', url()->full());
        $data['menu'] = 'Kategori';
        $data['breadcrumb'] = 'Kategori';
        $data['kategori'] = Kategori::all();
        return view('page.master.kategori.index', $data);
    }

    public function tambah(){
        $data['menu'] = 'Tambah Kategori';
        $data['breadcrumb'] = 'Tambah Kategori';
        return view('page.master.kategori.add', $data);
    }

    public function edit($id){
        $data['menu'] = 'Edit Kategori';
        $data['breadcrumb'] = 'Edit Kategori';
        $data['kategori'] = Kategori::find(decrypt($id));
        return view('page.master.kategori.edit', $data);
    }

    public function hapus($id){
        try {
            $kategori = Kategori::find(decrypt($id));
            $kategori->delete();
            return redirect(session('kategori'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return redirect(session('kategori'))->with('error', $e->getMessage());
        }
    }

    public function status($id,$stat){
        try {
            $kategori = Kategori::find(decrypt($id));
            $kategori->status = $stat;
            $kategori->updated_by = session()->get('username');
            $kategori->save();
            return redirect(session('kategori'))->with('success', 'Status Berubah');
        } catch (Exception $e) {
            return redirect(session('kategori'))->with('error', $e->getMessage());
        }
    }

    public function action(Request $request){
        if ($request->fungsi == 'tambah') {
            $kategori = new Kategori();
            $kategori->nama = $request->nama;
            $kategori->keterangan = $request->keterangan;
            $kategori->created_by = session()->get('username');
            $kategori->save();

            return redirect(session('kategori'))->with('success', 'Data Berhasil Ditambah');
        } else if ($request->fungsi == 'edit') {
            $kategori = Kategori::find(decrypt($request->id));
            $kategori->nama = $request->nama;
            $kategori->keterangan = $request->keterangan;
            $kategori->created_by = session()->get('username');
            $kategori->save();
            return redirect(session('kategori'))->with('success', 'Data Berhasil Diubah');
        }
    }
}
