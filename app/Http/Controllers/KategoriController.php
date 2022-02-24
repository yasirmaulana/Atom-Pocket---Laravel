<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Method menampilkan data kategori dan filter
    public function index(Request $request)
    {
        $countAllCategory = Category::all()->count();
        $countActiveCategory = Category::where('status_id', 1)->count();
        $countNonActiveCategory = Category::where('status_id', 2)->count();

        if ($request->status) {
            $categories = Category::where('status_id', $request->status)->get();
            return view('layouts.kategori.index', [
                'data' => $categories,
                'jmlKategori' => $countAllCategory,
                'jmlKategoriAktif' => $countActiveCategory,
                'jmlKategoriTdkAktif' => $countNonActiveCategory
            ]);
        }

        $categories = Category::all();

        return view('layouts.kategori.index', [
            'data' => $categories,
            'jmlKategori' => $countAllCategory,
            'jmlKategoriAktif' => $countActiveCategory,
            'jmlKategoriTdkAktif' => $countNonActiveCategory
        ]);
    }

    // Method menampilkan form tambah kategori 
    public function create()
    {
        return view('layouts.kategori.create');
    }

    // Method menyimpan tambah data kategori
    public function store(KategoriRequest $request)
    {
        Category::create([
            'nama' => $request->namakategori,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status
        ]);

        return redirect('/kategori');
    }

    // Method menampilkan detail kategori
    public function show($id)
    {
        $category = Category::find($id);

        if ($category->status_id == 1) {
            $status = 'Aktif';
        } else {
            $status = 'Tidak Aktif';
        }

        return view('layouts.kategori.detail', [
            'data' => $category,
            'statuskategori' => $status
        ]);
    }

    // Method menampilkan form ubah data kategori
    public function edit($id)
    {
        $category = Category::find($id);

        return view('layouts.kategori.edit', compact('category'));
    }

    // Method mengubah data kategori
    public function update(KategoriRequest $request, $id)
    {
        $category = Category::find($id);

        $category->update([
            'nama' => $request->namakategori,
            'deskripsi' => $request->deskripsi,
            'status_id' => $request->status
        ]);

        return redirect('/kategori');
    }

    // Method mengubah status kategori aktif/tidak aktif
    public function setstatus($id, $kode)
    {
        $category = Category::find($id);

        $category->update([
            'status_id' => $kode
        ]);

        return redirect('/kategori');
    }
}
