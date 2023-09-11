<?php

namespace App\Modules\Web\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MemberShip extends Model {

    protected $table = 'membership';
    
    protected $fillable = [
         'bd_name',
        'name',
        'fathers_name',
        'mothers_name',
        'date_of_birth',
        'blood_group',
        'house_no',
        'area_name',
        'post_code',
        'thana_name',
        'district_name',
        'p_house_no',
        'p_area_name',
        'p_post_code',
        'p_thana_name',
        'p_district_name',
        'nid',
        'designation',
        'email',
        'phone',
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
