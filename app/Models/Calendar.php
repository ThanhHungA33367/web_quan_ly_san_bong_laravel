<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Calendar extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function getTimeStart(): string
    {
        return Carbon::parse($this->time_start)->format('H:i');
    }
    public function getTimeEnd(): string
    {
        return Carbon::parse($this->time_end)->format('H:i');
    }

    protected $fillable = ['time_start','time_end','id_field','price'];



}
