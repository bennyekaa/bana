<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        session()->put('role', url()->full());
        $data['menu'] = 'Role';
        $data['breadcrumb'] = 'Role';
        $data['role'] = Role::orderBy('nama')->get();
        return view('page.master.role.index', $data);
    }

    public function tambah()
    {
        $data['menu'] = 'Tambah Role';
        $data['breadcrumb'] = 'Tambah Role';
        return view('page.master.role.add', $data);
    }

    public function edit($id)
    {
        $data['menu'] = 'Edit Role';
        $data['breadcrumb'] = 'Edit Role';
        $data['role'] = Role::find(decrypt($id));
        // dd($data['agama']);
        return view('page.master.role.edit', $data);
    }

    public function hapus($id)
    {
        try {
            $role = Role::find(decrypt($id));
            $role->delete();
            return redirect(session('role'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return redirect(session('role'))->with('error', $e->getMessage());
        }
    }

    public function status($id, $stat)
    {
        try {
            $role = Role::find(decrypt($id));
            $role->status = $stat;
            // $agama->updated_by = session()->get('username');
            $role->save();
            return redirect(session('role'))->with('success', 'Status Berubah');
        } catch (Exception $e) {
            return redirect(session('role'))->with('error', $e->getMessage());
        }
    }

    public function action(Request $request)
    {
        if ($request->fungsi == 'tambah') {
            $role = new Role();
            $role->nama = $request->nama;
            $role->keterangan = $request->keterangan;
            // $agama->created_by = session()->get('username');
            $role->save();

            return redirect(session('role'))->with('success', 'Data Berhasil Ditambah');
        } else if ($request->fungsi == 'edit') {
            $role = Role::find(decrypt($request->id));
            $role->nama = $request->nama;
            $role->keterangan = $request->keterangan;
            // $agama->created_by = session()->get('username');
            $role->save();
            return redirect(session('role'))->with('success', 'Data Berhasil Diubah');
        }
    }
}
