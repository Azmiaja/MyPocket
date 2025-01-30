<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $table = 'outcomes'; // Pastikan nama tabel sesuai dengan yang ada di database.

    /**
     * Kolom-kolom yang dapat diisi secara massal.
     */
    protected $fillable = [
        'outcome', // Pendapatan
        'deskripsi', // Pendapatan
        'date',   // Tanggal transaksi
    ];
}
