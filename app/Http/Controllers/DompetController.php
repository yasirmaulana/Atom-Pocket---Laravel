<?php

namespace App\Http\Controllers;

use App\Http\Requests\DompetRequest;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DompetController extends Controller
{
    // Method menampilkan data dompet dan filter
    public function index(Request $request)
    {
        $countAllWallet = Wallet::all()->count();
        $countActiveWallet = Wallet::where('status_id', 1)->count();
        $countNonActiveWallet = Wallet::where('status_id', 2)->count();

        if ($request->status) {
            $wallets = Wallet::where('status_id', $request->status)->get();
            return view('layouts.dompet.index', [
                'data' => $wallets,
                'jmlDompet' => $countAllWallet,
                'jmlDompetAktif' => $countActiveWallet,
                'jmlDompetTdkAktif' => $countNonActiveWallet
            ]);
        }

        $wallets = Wallet::all();

        return view('layouts.dompet.index', [
            'data' => $wallets,
            'jmlDompet' => $countAllWallet,
            'jmlDompetAktif' => $countActiveWallet,
            'jmlDompetTdkAktif' => $countNonActiveWallet
        ]);
    }

    // Method menampilkan form tambah dompet 
    public function create()
    {
        return view('layouts.dompet.create');
    }

    // Method menyimpan tambah data dompet
    public function store(DompetRequest $request)
    {
        Wallet::create([
            'nama' => $request->namadompet,
            'referensi' => $request->referensi,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status
        ]);

        return redirect('/dompet');
    }

    // Method menampilkan detail dompet
    public function show($id)
    {
        $wallet = Wallet::find($id);

        if ($wallet->status_id == 1) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }

        return view('layouts.dompet.detail', [
            'data' => $wallet,
            'statusdompet' => $status
        ]);
    }

    // Method menampilkan form ubah data dompet
    public function edit($id)
    {
        $wallet = Wallet::find($id);

        return view('layouts.dompet.edit', compact('wallet'));
    }

    // Method mengubah data dompet
    public function update(DompetRequest $request, $id)
    {
        $wallet = Wallet::find($id);

        $wallet->update([
            'nama' => $request->namadompet,
            'referensi' => $request->referensi,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status
        ]);

        return redirect('/dompet');
    }

    // Method mengubah status dompet aktif/tidak aktif
    public function setstatus($id, $kode)
    {
        $wallet = Wallet::find($id);

        $wallet->update([
            'status_id' => $kode
        ]);

        return redirect('/dompet');
    }
}
