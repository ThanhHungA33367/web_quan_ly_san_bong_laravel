<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Field extends Model
{
    use HasFactory;
//    public function getOptionAttribute{
//        $object = new self();
//        if($object->type === 'Sân 7'){
//
//        }
//    })
    public $timestamps = false;

    public function getTimeOpen(): string
    {
        return Carbon::parse($this->time_open)->format('G:i');
    }
    public function getTimeClose(): string
    {
        return Carbon::parse($this->time_close)->format('G:i');
    }
    protected $fillable = ['title','name','phone','address','type','image','size','id_province','id_district','id_ward'];
    public function getPriceMin($id){
        return Calendar::where('id_field','=',$id )->min('price');
        }
    public function getPriceMax($id){
        return Calendar::where('id_field','=',$id )->max('price');
    }

}
