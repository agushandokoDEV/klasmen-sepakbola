<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = 'liga';
    protected $keyType = 'string';
}
