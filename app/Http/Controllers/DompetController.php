<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;

class DompetController extends Controller
{
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
}
