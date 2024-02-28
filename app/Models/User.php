<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'cpf',
        'reg_date',
        'email',
        'password'
    ];

    public function transaction():HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
