<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'deskripsi', 'tanggal', 'nilai', 'dompet_id', 'kategori_id', 'status_id'];
}
