<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes'; // Pastikan nama tabel sesuai dengan yang ada di database.

    /**
     * Kolom-kolom yang dapat diisi secara massal.
     */

    protected $fillable = ['user_id', 'income', 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
