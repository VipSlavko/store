<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Producer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'producers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',

    ];
    
}
