<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FraudMaster extends Model
{
    protected $table = 'fraud_masters';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function multiImg(){
        return $this->hasMany(MultiFile::class,'fraud_master_id');
    }
}
