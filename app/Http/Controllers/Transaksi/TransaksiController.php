<?php

namespace App\Http\Controllers\transaksi;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Catatan;
use App\Models\Foto;
use App\Models\Pelanggaran;
use App\Models\Pelaporan;
use App\Models\Pengguna;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

require_once app_path('Helpers/function.php');

class TransaksiController extends Controller
{
    //
    public function laporanpolisi()
    {
        session()->put('lp', url()->full());
        $data['menu'] = 'Laporan Polisi';
        $data['breadcrumb'] = 'Laporan Polisi';
        $data['laporan'] = Pelaporan::all();
        // dd(session()->all());
        return view('page.transaksi.lp.index', $data);
    }

    public function tambahlaporanpolisi()
    {
        $data['menu'] = 'Laporan Polisi';
        $data['breadcrumb'] = 'Laporan Polisi';
        $data['kategori'] = Pelanggaran::all();
        $data['agama'] = Agama::all();
        $data['pengguna'] = Pengguna::all();
        return view('page.transaksi.lp.add', $data);
    }

    public function proseslaporanpolisi(Request $request)
    {
        // dd($request->all());
        if ($request->fungsi == 'tambah') {
            $pelaporan = new Pelaporan();
            $pelaporan->id_kategori = $request->id_kategori;
            $pelaporan->penerima_laporan = $request->penerima_laporan;
            $pelaporan->mengetahui_laporan = $request->mengetahui_laporan;
            $pelaporan->pasal = $request->pasal;
            $pelaporan->hari = $request->hari;
            $pelaporan->tanggal = $request->tanggal;
            $pelaporan->pukul = $request->pukul;
            $pelaporan->nama_pelapor = $request->nama_pelapor;
            $pelaporan->jk_pelapor = $request->jk_pelapor;
            $pelaporan->umur_pelapor = $request->umur_pelapor;
            $pelaporan->tempat_lahir_pelapor = $request->tempat_lahir_pelapor;
            $pelaporan->tanggal_lahir_pelapor = $request->tanggal_lahir_pelapor;
            $pelaporan->bangsa_pelapor = $request->bangsa_pelapor;
            $pelaporan->agama_pelapor = $request->agama_pelapor;
            $pelaporan->pekerjaan_pelapor = $request->pekerjaan_pelapor;
            $pelaporan->alamat_pelapor = $request->alamat_pelapor;
            $pelaporan->catatan_laporan = $request->catatan_laporan;
            $pelaporan->status = 0;
            $pelaporan->created_by = session()->get('username');
            $pelaporan->save();

            return redirect(session('lp'))->with('success', 'Data Berhasil Ditambah');
        } else if ($request->fungsi == 'edit') {
        }
    }

    public function kirim($id)
    {
        $data = Pelaporan::find($id);

        $bulan = date('n');
        $tahun = date('Y');

        // ambil kategori
        $kategori = Pelanggaran::find($data->id_kategori);
        $kodeKategori = $kategori->kode ?? 'X';

        // nomor urut
        $count = Pelaporan::whereYear('created_at', $tahun)
            ->whereNotNull('nomor')
            ->count() + 1;

        // generate nomor
        $nomor = generateNomorLp($count, $kodeKategori, $bulan, $tahun);

        // simpan
        $data->nomor = $nomor;
        $data->status = 1;
        $data->updated_at = now();
        $data->updated_by = session()->get('username');
        $data->save();

        return redirect(session('lp'))->with('success', 'Data Berhasil Dikirim');
    }

    public function detail($id)
    {
        $lp = Pelaporan::with([
            'pelanggaran.kategori_pelanggaran',
            'menerima.biodata',
            'foto',
            'catatan'
        ])->find($id);

        return view('page.transaksi.lp.detail', compact('lp'));
    }

    public function hapus($id)
    {
        try {
            $pelaporan = Pelanggaran::find(decrypt($id));
            $pelaporan->delete();
            return redirect(session('lp'))->with('success', 'Data Terhapus');
        } catch (Exception $e) {
            return redirect(session('lp'))->with('error', $e->getMessage());
        }
    }

    public function penyidik($id)
    {
        $data['lp'] = Pelaporan::with('pelanggaran')->find($id);
        return view('page.transaksi.penyidik.index', $data);
    }

    public function pin($id)
    {
        $data['lp'] = Pelaporan::with('pelanggaran')->find($id);
        return view('page.transaksi.kasi_komandan.index', $data);
    }

    public function cekpin(Request $request, $id)
    {
        // ambil user dari session
        $user = Pengguna::with('biodata')
            ->where('username', session('username'))
            ->first();

        if (!$user || !$user->biodata) {
            return back()->with('error', 'User tidak valid');
        }

        $inputPin = hash('sha256', $request->pin);

        if ($inputPin !== $user->biodata->pin) {
            return back()->with('error', 'PIN salah');
        }

        // simpan akses
        session()->put('akses_lp_' . $id, true);

        return redirect('transaksi/lp/detail/' . $id);
    }

    public function upload(Request $request, $id)
    {
        $lp = Pelaporan::find($id);

        $key = hash('sha256', 'secret_key', true);

        $path = storage_path('app/private');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        //  SIMPAN FOTO
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {

                $data = file_get_contents($file);
                $iv = random_bytes(16);

                $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

                $nama = Str::random(20) . '.enc';

                //  PAKAI PATH YANG SUDAH DIBUAT
                file_put_contents($path . '/' . $nama, $iv . $encrypted);

                Foto::create([
                    'id_lp' => $id,
                    'file' => $nama,
                    'created_by' => session()->get('username')
                ]);
            }
        }

        //  SIMPAN CATATAN
        foreach ($request->pertanyaan as $i => $p) {
            if ($p) {
                Catatan::create([
                    'id_lp' => $id,
                    'pertanyaan' => $p,
                    'jawaban' => $request->jawaban[$i],
                    'created_by' => session()->get('username')
                ]);
            }
        }

        $lp->status = 2;
        $lp->save();

        return redirect()->back()->with('success', 'Berhasil dikirim');
    }

    public function lihatGambar($file)
    {
        $path = storage_path('app/private/' . $file);

        $data = file_get_contents($path);

        $iv = substr($data, 0, 16);
        $encrypted = substr($data, 16);

        $key = hash('sha256', 'secret_key', true);

        $decrypted = openssl_decrypt($encrypted, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

        return response($decrypted)->header('Content-Type', 'image/jpeg');
    }
}
