<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\AddRequest;
use App\Http\Requests\Banner\EditRequest;
use App\Models\Banner;
use App\Models\Position;
use App\Models\Log;
use DateTime,Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::select('id','name','link','updated_at','status','user_id','position_id')->with(
            [
                'user' => function ($query) {
                    $query->select('id','lastname','firstname');
                },
                'position' => function ($query) {
                    $query->select('id','name');
                }
            ]
        )->orderBy('id','desc')->get()->toArray();

        return view('backend.module.banner.list',['banner' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position = Position::select('id','name','parent_id')->get()->toArray();
        return view('backend.module.banner.add',['position' => $position]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $banner              = new Banner;
        $banner->name        = $request->txtName;
        $banner->script_code = $request->txtScript;
        $banner->link        = $request->txtLink;
        $banner->image       = $request->txtImage;
        $banner->alt         = $request->txtAlt;
        $banner->description = $request->txtDescription;
        $banner->position_id = $request->sltPosition;
        $banner->access      = $request->sltAccess;
        $banner->target_open = $request->sltTarget;
        $banner->status      = ($request->chkStatus == "on") ? "on" : "off";
        $banner->user_id     = Auth::user()->id;
        $banner->created_at  = new DateTime();

        if (env('APP_LANG')) {
            $banner->name_en        = $request->txtNameEn;
            $banner->description_en = $request->txtDescriptionEn;
            $banner->link_en        = $request->txtLinkEn;
        }

        $check               = $banner->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtName . " (".$banner->id.")";
            $log->action     = "Add";
            $log->controller = "Banner";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }
        
        if ($request->btnSave) {
            return redirect()->route('admin.banner.create')->with('success','Add A Successful Banner');
        } else {
            return redirect()->route('admin.banner')->with('success','Add A Successful Banner');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner   = Banner::findOrFail($id);
        $position = Position::select('id','name','parent_id')->get()->toArray();
        return view('backend.module.banner.edit',['banner' => $banner,'position' => $position]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $banner              = Banner::findOrFail($id);
        $banner->name        = $request->txtName;
        $banner->script_code = $request->txtScript;
        $banner->link        = $request->txtLink;
        $banner->image       = $request->txtImage;
        $banner->alt         = $request->txtAlt;
        $banner->description = $request->txtDescription;
        $banner->position_id = $request->sltPosition;
        $banner->access      = $request->sltAccess;
        $banner->target_open = $request->sltTarget;
        $banner->status      = ($request->chkStatus == "on") ? "on" : "off";
        $banner->user_id     = Auth::user()->id;
        $banner->updated_at  = new DateTime();

        if (env('APP_LANG')) {
            $banner->name_en        = $request->txtNameEn;
            $banner->description_en = $request->txtDescriptionEn;
            $banner->link_en        = $request->txtLinkEn;
        }

        $check               = $banner->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $banner["name"]. " (".$banner["id"].")";
            $log->action     = "Edit";
            $log->controller = "Banner";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }
        
        if ($request->btnSave) {
            return redirect()->route('admin.banner.edit',['id' => $id])->with('success','Update A Successful Banner');
        } else {
            return redirect()->route('admin.banner')->with('success','Update A Successful Banner');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $banner = Banner::findOrFail($id);
        $check  = $banner->delete();

        if ($check) {
            $log             = new Log;
            $log->title      = $banner["name"]. " (".$banner["id"].")";
            $log->action     = "Delete";
            $log->controller = "Banner";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        return redirect()->route('admin.banner')->with('success','Delete A Successful Banner');
    }
}