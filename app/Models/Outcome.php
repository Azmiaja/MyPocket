<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Outcome extends Model
{
    use HasFactory;

    protected $table = 'outcomes'; // Pastikan nama tabel sesuai dengan yang ada di database.

    /**
     * Kolom-kolom yang dapat diisi secara massal.
     */
    protected $fillable = ['user_id', 'deskripsi', 'outcome', 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
