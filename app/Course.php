<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Course extends Model
{
//    public function User(){
//        return $this->hasMany('App\User');
//    }
    protected $fillable = [
        'name', 'teacher','image','slug'
    ];
    /*
     * Show image from backEnd
     * Created By: phpStorm
     * Date:10-05-2020
     * Time:02:09 AM
     */

    public function getFeaturedAttribute($image){
        return asset($image);
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
