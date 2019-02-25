<?php

namespace App\Http\Controllers\Lab;

use DB;
use Carbon\Carbon;
use App\Models\System\Meta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetaController extends Controller {

    public function getMeta() {
        return DB::connection('sqlite')->table('metas')->get();
    }

    public function setMeta() {
        $data = [
            [
                'meta_key' => 'auth',
                'meta_value' => 'Jayanta Biswas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meta_key' => 'email',
                'meta_value' => 'bjayanta.neo@gmail.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'meta_key' => 'website',
                'meta_value' => 'jayanta.xyz',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Meta::insert($data);
    }
}
