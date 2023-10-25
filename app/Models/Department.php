<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    /**
     * Get the tasks for the department.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
