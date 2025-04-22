<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersinfo extends Model
{
    use HasUuids, HasFactory;

    // Specify the table associated with the model
    protected $table = 'usersinfo';

    // The attributes that are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'sex',
        'birthday',
        'username',
        'email',
        'password',
        'user_type',
    ];

    // Indicate that the model does not use auto-incrementing IDs
    public $incrementing = false;

    // Specify the key type as string for UUIDs
    protected $keyType = 'string';

    // Optionally, you might want to hash the password when setting it
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}