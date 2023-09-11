<?php

namespace App\Modules\Web\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LegalAidPanel extends Model {

    protected $table = 'legal_aid_panel';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'education',
        'institute',
        'present_address',
        'description',
        'image_link',
        'status',
    ];

   

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
