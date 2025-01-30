<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pocket extends Model
{
    use HasFactory;

    protected $table = 'incomes'; // Pastikan nama tabel sesuai dengan yang ada di database.

    /**
     * Kolom-kolom yang dapat diisi secara massal.
     */
    protected $fillable = [
        'income', // Pendapatan
        'date',   // Tanggal transaksi
    ];
}
