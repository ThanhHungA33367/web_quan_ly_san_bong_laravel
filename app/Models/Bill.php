<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bill extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','phone','price','id_field','time_start','time_end','time_status'];
    public function getTimeStart(): string
    {
        return Carbon::parse($this->time_start)->format('G:i');
    }
    public function getTimeEnd(): string
    {
        return Carbon::parse($this->time_end)->format('G:i');
    }
    public function getDate(): string
    {
        return Carbon::parse($this->time_start)->format('d-m-Y');
    }


}
