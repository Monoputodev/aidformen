<?php

namespace App\Modules\Web\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ForLegalAid extends Model {

    protected $table = 'for_legal_aid';
    
    protected $fillable = [
        'name',
        'fathers_name',
        'email',
        'phone',
        'nid_file',
        'present_address',
        'permanent_address',
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
