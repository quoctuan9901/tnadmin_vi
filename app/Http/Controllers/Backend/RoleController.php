<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Role\AddRequest;
use App\Http\Requests\Role\EditRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Log;
use DateTime,Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id','name','role','updated_at','user_id')->with(
            [
                'user' => function ($query) {
                    $query->select('id','lastname','firstname');
                }   
            ]
        )->orderBy('id','desc')->get()->toArray();
        return view('backend.module.role.list',['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.module.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $role              = new Role;
        $role->name        = $request->txtName;
        $role->description = $request->txtDescription;
        $role->role        = json_encode($request->chkRole);
        $role->user_id     = Auth::user()->id;
        $role->created_at  = new DateTime();
        $check             = $role->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtName . " (".$role->id.")";
            $log->action     = "Add";
            $log->controller = "Role";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.role.create')->with('success','Add A Successful Role');
        } else {
            return redirect()->route('admin.role')->with('success','Add A Successful Role');
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
        $role = Role::findOrFail($id);
        return view('backend.module.role.edit',['role' => $role]);
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
        $role              = Role::findOrFail($id);
        $role->name        = $request->txtName;
        $role->description = $request->txtDescription;
        $role->role        = json_encode($request->chkRole);
        $role->user_id     = Auth::user()->id;
        $role->updated_at  = new DateTime();
        $check             = $role->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $role["name"]. " (".$role["id"].")";
            $log->action     = "Edit";
            $log->controller = "Role";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.role.edit',['id' => $id])->with('success','Update A Successful Role');
        } else {
            return redirect()->route('admin.role')->with('success','Update A Successful Role');
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
        $role  = Role::findOrFail($id);
        $check = $role->delete();

        if ($check) {
            $log             = new Log;
            $log->title      = $role["name"]. " (".$role["id"].")";
            $log->action     = "Delete";
            $log->controller = "Role";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        return redirect()->route('admin.role')->with('success','Delete A Successful Role');
    }
}