<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'file_name',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
