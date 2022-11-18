<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {


        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('description', 'like', '%' . request('search') . '%');
        }
    }

    protected $fillable = ['isDone'];
}
