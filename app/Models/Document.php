<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id', 'application_id', 'name', 'type', 'path'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}
