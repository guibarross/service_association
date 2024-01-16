<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        "local",
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'service_user');
    }
}
