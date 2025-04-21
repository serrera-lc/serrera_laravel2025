<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usersinfo extends Model
{
    //
    use HasUuids;
    use HasFactory;
    protected $table = 'usersinfo';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'sex',
        'birthday',
        'username',
        'email',
        'password',
        'user_type',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
    
    

}
