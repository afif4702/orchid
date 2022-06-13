<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\reservasi;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\Meja;

class PesanController 
// extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //membuatdata dari form reservasi
    public function pesan(Request $request, reservasi $reservasi)
    {
        $serves = new reservasi;
        $serves->nama = $request->get('nama');
        $serves->email = $request->get('email');
        $serves->no_hp = $request->get('no_hp');
        $serves->jumlah_kursi = $request->get('jumlah_kursi');
        $serves->tanggal = $request->get('tanggal');
        $serves->waktu = $request->get('waktu');
        $serves->jenis = $request->get('jenis');
        $serves->save();
        return redirect()->back();


    }
    //create meja
    public function konfirmasimeja($id)
    {
        $meja = new Meja;
        $meja->id_reservasi = $id;
        $meja->jumlah_kursi = reservasi::findOrFail($id)->jumlah_kursi;
        $meja->save();
        return redirect()->route('admin');
    }
    // create transaksi
    public function konfirmasitransaksi($id)
    {
        $meja = new Transaksi;
        $meja->id_reservasi = $id;
        $meja->jenis = reservasi::findOrFail($id)->jenis;;
        $meja->save();
        return redirect()->route('admin');
    }

    //menampilakn data reservasi
    public function editdatapesan($id)
    {
        $sid = $id;
        $serves = reservasi::all();
        return view ('edit',compact('sid', 'serves'));
    }

    //mengambil data baru hasil updatean
    public function editupdate(Request $request, $id)
    {
        reservasi::where('id', $id)
        ->update([
            'nama' =>  $request->get('nama'),
            'email' =>  $request->get('email'),
            'no_hp' => $request->get('no_hp'),
            'jumlah_kursi' => $request->get('jumlah_kursi'),
            'tanggal' => $request->get('tanggal'),
            'waktu' => $request->get('waktu'),
            'jenis' => $request->get('jenis')

        ]);
        return redirect()->route('admin');
    }

    //menghapus data
    public function deletedatapesan($id)
    {
        reservasi::findOrFail($id)->delete();
        return redirect()->route('admin');
    }

    //create menu
    public function menu(Request $request)
    {
        $serves = new Menu;
        $serves->nama = $request->get('nama');
        $serves->jenis = $request->get('jenis');
        $serves->harga = $request->get('harga');
        $serves->deskripsi = $request->get('deskripsi');
        $serves->save();
        return redirect()->route('admin');
    }

    //menampilakn data menu
    public function editdatamenu($id)
    {
        $sid = $id;
        $serves = Menu::all();
        return view ('editMenu',compact('sid', 'serves'));
    }

    //updata data menu
    public function editupdatemenu(Request $request, $id)
    {
        Menu::where('id', $id)
        ->update([
            'nama' =>  $request->get('nama'),
            'jenis' =>  $request->get('jenis'),
            'harga' => $request->get('harga'),
            'deskripsi' => $request->get('deskripsi'),

        ]);
        return redirect()->route('admin');
    }

    //menghapus data menu
    public function deletedatamenu($id)
    {
        Menu::findOrFail($id)->delete();
        return redirect()->route('admin');
    }

    //menghapus data transaksi
    public function deletetransaksi($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('admin');
    }

    //menghapus data meja
    public function deletemeja($id)
    {
        Meja::findOrFail($id)->delete();
        return redirect()->route('admin');
    }

    public function tampilP()
    {
        $no = 1;
        $nos = 1;
        $noss = 1;
        $nosss =1;
        $serves = reservasi::all();
        $menus = Menu ::all();
        $mejas = Meja :: all();
        $transaksi = Transaksi :: all();
        return view('admin',compact('no','nos','noss','nosss', 'serves','menus','mejas', 'transaksi'));
    }

}
