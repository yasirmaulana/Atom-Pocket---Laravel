<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\TransaksiRequest;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\Wallet;
use Illuminate\Http\Request;

class DompetMasukController extends Controller
{
    // Method menampilkan data transaksi masuk dan filter
    public function index(Request $request)
    {
        // $inTransactions = Transaction::where('status_id', 1)->get();
        $inTransactions = DB::table('transactions')
            ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
            ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
            ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
            ->get();

        return view('layouts.transaksi.index', [
            'data' => $inTransactions
        ]);
    }

    // Method menampilkan form tambah transaksi masuk 
    public function create()
    {
        $categories = Category::where('status_id', 1)->get();
        $wallets = Wallet::where('status_id', 1)->get();
        $inTransactionCount = Transaction::where('status_id', 1)->count() + 1;

        $jmlChar = strlen($inTransactionCount);
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
        $kode = 'WIN' . $nol . $inTransactionCount;

        return view('layouts.transaksi.create', [
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
            'status_id' => 1
        ]);

        return redirect('/dompetmasuk');
    }
}
