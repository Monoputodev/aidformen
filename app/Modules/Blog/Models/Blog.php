<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Blog extends Model {

    protected $table = 'blogs';
    
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'author',
        'short_description',
        'description',
        'image_link',
        'status',
        'date'
    ];

    public function relPostCategory(){
        return $this->hasOne('App\Modules\Category\Models\Category', 'id', 'category_id');
    }
    
    public function relUser(){
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    // TODO :: boot
    // boot() function used to insert logged user_id at 'created_by' & 'updated_by'
    public static function boot(){
        parent::boot();
        static::creating(function($query){
            if(Auth::check()){
                $query->created_by = @\Auth::user()->id;
            }
        });
        static::updating(function($query){
            if(Auth::check()){
                $query->updated_by = @\Auth::user()->id;
            }
        });
    }

}
