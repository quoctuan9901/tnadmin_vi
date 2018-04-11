<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Log;
use Auth,DB,DateTime;

class AjaxController extends Controller
{
    public function switch_change (Request $request) {
		$state  = $request["state"];
		$table  = $request["table"];
		$column = $request["column"];
		$id     = $request["id"];
		if ($state == "true") {
			$check = DB::table($table)->where('id', $id)->update([$column => "on"]);
		} else {
			$check = DB::table($table)->where('id', $id)->update([$column => "off"]);
		}

		if ($check) {
			$log             = new Log;
	        $log->title      = "Table : " . $table . " - Column : " . $column;
	        $log->action     = ($state == "true") ? "On" : "Off";
	        $log->controller = "Update Status - Feature";
	        $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
	        $log->created_at = new DateTime();
	        $log->save();
		}
		
    }

    public function position (Request $request) {
		$id       = $request["id"];
		$position = DB::table("category")->where("parent_id",$id)->max('position');
    	return $position + 1;
    }

    public function attribute () {
    	$attribute = Attribute::select('id','name','parent_id')->get()->toArray();
    	recursionSelect ($attribute);
    }

    public function change_position (Request $request) {
		$id       = $request["id"];
		$position = ($request["position"] <= 0) ? 1 : $request["position"];
    	$check = DB::table("category")->where('id', $id)->update(["position" => $position]);

    	if ($check) {
    		$log             = new Log;
	        $log->title      = "ID : " . $id . " - Position : " . $position;
	        $log->action     = "Update";
	        $log->controller = "Update Position Category";
	        $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
	        $log->created_at = new DateTime();
	        $log->save();
    	}
    }
}