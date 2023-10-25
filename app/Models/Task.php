<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    /**
     * Get the deparyment that owns the task.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
