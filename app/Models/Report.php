<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model {

    public function user() {
        return $this->belongsTo('App\Models\User\User', 'user_id', 'id');
    }

    public function mission() {
        return $this->belongsTo('App\Models\Mission', 'mission_id', 'id');
    }
}
