<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Position\AddRequest;
use App\Http\Requests\Position\EditRequest;
use App\Models\Position;
use App\Models\Log;
use DateTime,Auth;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $position = Position::select('id','name','width','height','status','updated_at','user_id')->with(['user' => function ($query) {
            $query->select('id','lastname','firstname');
        }])->orderBy('id','desc')->get()->toArray();

        return view('backend.module.position.list',['position' => $position]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent   = Position::select('id','name','parent_id')->get()->toArray();
        return view('backend.module.position.add',['parent' => $parent]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $position             = new Position;
        $position->name       = $request->txtName;
        $position->width      = $request->txtWidth;
        $position->height     = $request->txtHeight;
        $position->status     = ($request->chkStatus == "on") ? "on" : "off";
        $position->image      = $request->txtImage;
        $position->alt        = $request->txtAlt;
        $position->parent_id  = $request->sltParent;
        $position->link       = $request->txtLink;
        $position->user_id    = Auth::user()->id;
        $position->created_at = new DateTime();
        $check                = $position->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtName . " (".$position->id.")";
            $log->action     = "Add";
            $log->controller = "Position";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.position.create')->with('success','Add A Successful Position');
        } else {
            return redirect()->route('admin.position')->with('success','Add A Successful Position');
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
        $position = Position::findOrFail($id);
        $parent   = Position::select('id','name','parent_id')->get()->toArray();
        return view('backend.module.position.edit',['position' => $position,'parent' => $parent]);
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
        $position             = Position::findOrFail($id);
        $position->name       = $request->txtName;
        $position->width      = $request->txtWidth;
        $position->height     = $request->txtHeight;
        $position->status     = ($request->chkStatus == "on") ? "on" : "off";
        $position->image      = $request->txtImage;
        $position->alt        = $request->txtAlt;
        $position->parent_id  = $request->sltParent;
        $position->link       = $request->txtLink;
        $position->user_id    = Auth::user()->id;
        $position->updated_at = new DateTime();
        $check                = $position->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $position["name"]. " (".$position["id"].")";
            $log->action     = "Edit";
            $log->controller = "Position";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.position.edit',['id' => $id])->with('success','Edit A Successful Position');
        } else {
            return redirect()->route('admin.position')->with('success','Edit A Successful Position');
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
        $position = Position::findOrFail($id);
        $check    = $position->delete();

        if ($check) {
            $log             = new Log;
            $log->title      = $position["name"]. " (".$position["id"].")";
            $log->action     = "Delete";
            $log->controller = "Position";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        return redirect()->route('admin.position')->with('success','Delete A Successful Position');
    }
}
