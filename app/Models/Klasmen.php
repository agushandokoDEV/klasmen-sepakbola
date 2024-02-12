<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasmen extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = 'klasmen';
    protected $keyType = 'string';

    // protected $fillable=['club_id'];

    public function club()
    {
        return $this->belongsTo(Club::class,'club_id');
    }
}
