<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorPertandingan extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $table = 'skor_pertandingan';
    protected $keyType = 'string';

    public function homeclub()
    {
        return $this->belongsTo(Club::class,'home_club_id');
    }

    public function awayclub()
    {
        return $this->belongsTo(Club::class, 'away_club_id');
    }
}
