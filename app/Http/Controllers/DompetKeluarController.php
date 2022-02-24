<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransaksiRequest;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DompetKeluarController extends Controller
{
    // Method menampilkan data transaksi keluar dan filter
    public function index(Request $request)
    {
        $outTransactions = DB::table('transactions')
            ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
            ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
            ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
            ->where('transactions.status_id', 2)
            ->get();

        return view('layouts.transaksi.indexouttrx', [
            'data' => $outTransactions
        ]);
    }

    // Method menampilkan form tambah transaksi masuk 
    public function create()
    {
        $categories = Category::where('status_id', 1)->get();
        $wallets = Wallet::where('status_id', 1)->get();
        $outTransactionCount = Transaction::where('status_id', 2)->count() + 1;

        $jmlChar = strlen($outTransactionCount);
        if ($jmlChar == '1') {
            $nol = '00000';
        } elseif ($jmlChar == '2') {
            $nol = '0000';
        } elseif ($jmlChar == '3') {
            $nol = '000';
        } elseif ($jmlChar == '4') {
            $nol = '00';
        } elseif ($jmlChar == '5') {
            $nol = '0';
        } else {
            $nol = '';
        }

        $tglSekarang = date('Y-m-d');
        $kode = 'WOUT' . $nol . $outTransactionCount;

        return view('layouts.transaksi.createouttrx', [
            'categories' => $categories,
            'wallets' => $wallets,
            'kode' => $kode,
            'tglSekarang' => $tglSekarang
        ]);
    }

    // Method menyimpan tambah data transaksi masuk
    public function store(TransaksiRequest $request)
    {
        Transaction::create([
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'nilai' => $request->nilai,
            'dompet_id' => $request->dompet,
            'kategori_id' => $request->kategori,
            'status_id' => 2
        ]);

        return redirect('/dompetkeluar');
    }
}
