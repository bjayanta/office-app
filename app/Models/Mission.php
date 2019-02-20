<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model {

    public function owner() {
        return $this->belongsTo('App\Models\Admin\Admin', 'admin_id', 'id');
    }

    public function admin() {
        return $this->belongsTo('App\Models\Admin\Admin', 'admin_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User\User', 'user_id', 'id');
    }
}
