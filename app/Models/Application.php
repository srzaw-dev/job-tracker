<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'company_name', 'role', 'location',
        'job_posting', 'status', 'is_open', 'date_applied',
        'notes', 'contacts'
    ];

    protected $casts = [
        'notes' => 'array',
        'contacts' => 'array',
        'is_open' => 'boolean',
        'date_applied' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}
