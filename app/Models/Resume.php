<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'discipline_id',
        'note',
        'title',
        'path',
    ];

    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class, 'discipline_id');
    }
}
