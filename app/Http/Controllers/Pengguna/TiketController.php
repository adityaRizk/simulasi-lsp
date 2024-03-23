<?php

namespace App\Http\Controllers\Pengguna;

use Carbon\Carbon;
use App\Models\Rute;
use App\Models\User;
use App\Models\Order;
use App\Models\Jadwal;
use App\Models\Maskapai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailRiwayat($id)
    {
        $tiket = Order::with('jadwal')->where('id',$id)->first();
        // dd($tiket);
        return view('pengguna.detailTiket',compact('tiket'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function konfirmasi(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'user_id' => 'required',
            'jadwal_id' => 'required',
            'jumlah_tiket' => 'required|numeric|min:1|max:50',
        ]);

        $jadwal = Jadwal::find($credentials['jadwal_id']);
        // dd($jadwal);
        $jumlah_tiket = $credentials['jumlah_tiket'];
        $total_harga = $credentials['jumlah_tiket'] * $jadwal->harga;
        $tanggal_transaksi = date('Y-m-d');

        return view('pengguna.konfirmasi',compact('jadwal','total_harga','tanggal_transaksi','jumlah_tiket'));
    }

    public function jadwal()
    {
        $rute = Rute::all();
        $rute_asal = request()->rute_asal;
        $rute_tujuan = request()->rute_tujuan;
        $nama_maskapai = request()->nama_maskapai;

        if($nama_maskapai){
            if(request()->rute_asal && request()->rute_tujuan){
                $maskapai = Maskapai::with('rute','jadwal')->whereHas('rute', function ($query){
                    return $query->where('rute_asal','=',request()->rute_asal)->where('rute_tujuan','=',request()->rute_tujuan);
                })->where('nama_maskapai',$nama_maskapai)->get();
            }elseif(request()->rute_asal){
                $maskapai = Maskapai::with('rute','jadwal')->whereHas('rute', function ($query){
                    return $query->where('rute_asal','=',request()->rute_asal);
                })->get();
            }elseif(request()->rute_tujuan){
                $maskapai = Maskapai::with('rute','jadwal')->whereHas('rute', function ($query){
                    $query->where('rute_tujuan','=',request()->rute_tujuan);
                })->get();
            }else{
                $maskapai = Maskapai::with('rute','jadwal')->where('nama_maskapai',$nama_maskapai)->get();
            }
        }else{
            if(request()->rute_asal && request()->rute_tujuan){
                $maskapai = Maskapai::with('rute','jadwal')->whereHas('rute', function ($query){
                    return $query->where('rute_asal','=',request()->rute_asal)->where('rute_tujuan','=',request()->rute_tujuan);
                })->get();
            }elseif(request()->rute_asal){
                $maskapai = Maskapai::with('rute','jadwal')->whereHas('rute', function ($query){
                    return $query->where('rute_asal','=',request()->rute_asal);
                })->get();
            }elseif(request()->rute_tujuan){
                $maskapai = Maskapai::with('rute','jadwal')->whereHas('rute', function ($query){
                    return $query->where('rute_tujuan','=',request()->rute_tujuan);
                })->get();
            }else{
                $maskapai = Maskapai::with('rute','jadwal')->latest()->get();
            }
        }

        return view('pengguna.jadwal', compact('maskapai','rute','rute_asal','rute_tujuan'));
    }

    public function riwayat()
    {
        $data = User::where('id',Auth::user()->id)->with('order')->first();
        $order = $data->order;
        // dd($order->order);
        return view('pengguna.riwayat', compact('order'));
    }

    public function show(string $id)
    {
        $jadwal = Jadwal::with('rute')->find($id);
        return view('pengguna.detailJadwal', compact('jadwal'));
    }

    public function pesan(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'user_id' => 'required',
            'jadwal_id' => 'required',
            'total_harga' => 'required|numeric',
            'jumlah_tiket' => 'required|numeric|min:1|max:50',
        ]);

        $tiket = $request->validate([
            'tanggal_transaksi' => 'required',
        ]);

        // $orders = Order::with('tiket')->get();

        $jadwal = Jadwal::with('rute')->find($credentials['jadwal_id']);
        $kapasitas = $jadwal->rute->kapasitas - $credentials['jumlah_tiket'];
        // dd($jadwal->id);
        if($kapasitas < 0){
            return redirect('/pengguna/jadwal/'.$jadwal->id)->withErrors(['error' => 'Jumlah tiket melebihi jumlah kapasitas']);
        }else{
            $jadwal->rute->update(['kapasitas' => $kapasitas]);
        }
        // dd($);
        // do{
            // $struk = random_bytes(10);
            $struk = random_int(1000000000,9000000000);
            // dd($struk);
        // }while($jadwal);
        // dd($credentials,$tiket['tanggal_transaksi']);
        $order = Order::create($credentials);
        $order->tiket()->create([
            'struk' => $struk,
            'tanggal_transaksi' => $tiket['tanggal_transaksi'],
        ]);

        return redirect('/pengguna/riwayat')->with('success','Pesanan anda Berhasil dibuat');
    }













    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
