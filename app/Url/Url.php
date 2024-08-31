<?php

namespace App\Url;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'url';

    protected $fillable = [
        'original_url',
        'short_code',
        'access_count',
        'user_id',
    ];
}
