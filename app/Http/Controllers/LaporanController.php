<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $categories = Category::where('status_id', 1)->get();
        $wallets = Wallet::where('status_id', 1)->get();

        return view('layouts.laporan.laporan', [
            'categories' => $categories,
            'wallets' => $wallets,
        ]);
    }

    public function laporan(Request $request)
    {
        $query = DB::table('transactions')
            ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
            ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
            ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
            ->whereBetween('transactions.tanggal', [$request->tanggalawal, $request->tanggalakhir])
            ->get();

        if ($request->uangmasuk == "") {
            $query = DB::table('transactions')
                ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
                ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
                ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
                ->whereBetween('transactions.tanggal', [$request->tanggalawal, $request->tanggalakhir])
                ->where('transactions.status_id', '<>', 1)
                ->get();
            if ($request->kategori !== "0") {
                $query = DB::table('transactions')
                    ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
                    ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
                    ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
                    ->whereBetween('transactions.tanggal', [$request->tanggalawal, $request->tanggalakhir])
                    ->where('transactions.status_id', '<>', 1)
                    ->where('transactions.kategori_id', $request->kategori)
                    ->get();
                if ($request->dompet !== "0") {
                    $query = DB::table('transactions')
                        ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
                        ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
                        ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
                        ->whereBetween('transactions.tanggal', [$request->tanggalawal, $request->tanggalakhir])
                        ->where('transactions.status_id', '<>', 1)
                        ->where('transactions.kategori_id', $request->kategori)
                        ->where('transactions.dompet_id', $request->dompet)
                        ->get();
                }
            }
        } elseif ($request->uangkeluar == "") {
            $query = DB::table('transactions')
                ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
                ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
                ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
                ->whereBetween('transactions.tanggal', [$request->tanggalawal, $request->tanggalakhir])
                ->where('transactions.status_id', '<>', 2)
                ->get();
            if ($request->kategori !== "0") {
                $query = DB::table('transactions')
                    ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
                    ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
                    ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
                    ->whereBetween('transactions.tanggal', [$request->tanggalawal, $request->tanggalakhir])
                    ->where('transactions.status_id', '<>', 2)
                    ->where('transactions.kategori_id', $request->kategori)
                    ->get();
                if ($request->dompet !== "0") {
                    $query = DB::table('transactions')
                        ->join('wallets', 'transactions.dompet_id', '=', 'wallets.id')
                        ->join('categories', 'transactions.kategori_id', '=', 'categories.id')
                        ->select('transactions.*', 'wallets.nama as dompet', 'categories.nama as kategori')
                        ->whereBetween('transactions.tanggal', [$request->tanggalawal, $request->tanggalakhir])
                        ->where('transactions.status_id', '<>', 2)
                        ->where('transactions.kategori_id', $request->kategori)
                        ->where('transactions.dompet_id', $request->dompet)
                        ->get();
                }
            }
        }

        return view('layouts.laporan.index', [
            'data' => $query,
            'tglAwal' => $request->tanggalawal,
            'tglAkhir' => $request->tanggalakhir
        ]);
        // return $request;
    }
}
