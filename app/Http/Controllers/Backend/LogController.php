<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\LogLogin;

class LogController extends Controller
{
    public function listLogAction () {
    	$actions = Log::select('id','title','action','controller','fullname','created_at')->orderBy('id','desc')->get()->toArray();
    	$totalLog = count($actions);
    	return view('backend.module.log.action',['actions' => $actions,'totalLog' => $totalLog]);
    }

    public function destroyOneLogAction ($id) {
    	Log::findOrFail($id)->delete();
    	return redirect()->route('admin.log.list_action')->with('success','Delete A Successful Log Action');
    }

    public function destroyAllLogAction () {
    	Log::truncate();
    	return redirect()->route('admin.log.list_action')->with('success','Delete All Successful Log Action');
    }

    public function listLogLogin () {
        $login = LogLogin::select('id','email','browser','ip_address','created_at')->orderBy('id','desc')->get()->toArray();
        $totalLog = count($login);
        return view('backend.module.log.login',['login' => $login,'totalLog' => $totalLog]);
    }

    public function destroyOneLogLogin ($id) {
        LogLogin::findOrFail($id)->delete();
        return redirect()->route('admin.log.list_login')->with('success','Delete A Successful Log Login');
    }

    public function destroyAllLogLogin () {
        LogLogin::truncate();
        return redirect()->route('admin.log.list_login')->with('success','Delete All Successful Log Login');
    }
}
