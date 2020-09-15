<?php
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

if (!function_exists('set_current')) {
    function set_current($uri, $output = 'actived') {
        if (is_array($uri)) {
            foreach ($uri as $u){
                if (Route::is($u)){
                    return $output;
                }
            }
        }  else {
            if (Route::is($uri)){
                return $output;
            }
        }
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $dtime = Carbon::parse($date)->format('d-m-Y H:i:s');
        return $dtime;
    }

}



