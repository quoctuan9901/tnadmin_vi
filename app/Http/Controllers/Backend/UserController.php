<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AddRequest;
use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\EditMySelfRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Position;
use App\Models\Post;
use App\Models\News;
use App\Models\Tags;
use App\Models\Product;
use App\Models\Log;
use DateTime,Auth,Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id','email','level','status','firstname','lastname','updated_at','role_id')->with(
            [
                'role' => function ($query) {
                    $query->select('id','name');
                }
            ]
        )->orderBy('id','desc')->get()->toArray();
        return view('backend.module.user.list',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id','name')->get()->toArray();
        return view('backend.module.user.add',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $user              = new User;
        $user->email       = $request->txtEmail;
        $user->password    = bcrypt($request->txtPass);
        $user->level       = $request->sltLevel;
        $user->status      = ($request->chkStatus == "on") ? "on" : "off";
        $user->avatar      = $request->txtImage;
        $user->firstname   = $request->txtFirstName;
        $user->lastname    = $request->txtLastName;
        $user->phone       = $request->txtPhone;
        $user->address     = $request->txtAddress;
        $user->facebook    = $request->txtFacebook;
        $user->description = $request->txtDescription;
        $user->role_id     =  (isset($request->sltRole)) ? $request->sltRole : null;
        $user->created_at  = new DateTime();
        $check             = $user->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtEmail . " (".$user->id.")";
            $log->action     = "Add";
            $log->controller = "User";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.user.create')->with('success','Add A Successful Member');
        } else {
            return redirect()->route('admin.user')->with('success','Add A Successful Member');
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
        $user   = User::findOrFail($id);
        $email  = $user["email"];
        $avatar  = ($user["avatar"] == null) ? asset('backend/assets/images/upload.png') : $user["avatar"];
        if ($user["level"] == 1 && $user["id"] == 1) {
            $level = "Superadmin";
        } elseif ($user["level"] == 1) {
            $level = "Admin";
        } else {
            $level = "Member";
        }
        

        $status   = $user["status"];
        $fullname = $user["firstname"] . ' ' . $user["lastname"];
        $phone    = $user["phone"];
        $address  = $user["address"];
        $facebook  = "<a href='".$user["facebook"]."'>".$user["facebook"]."</a>";
        
        $html = '<div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">'.$email.'</h5>
            </div>

            <div class="modal-body">
                <div class="col-md-4">
                    <img class="img-responsive" id="main-image" src="'.$avatar.'" />
                </div>
                <div class="col-md-8">
                    <p><strong>Fullname : </strong>'.$fullname.'</p>
                    <p><strong>Phone Number : </strong>'.$phone.'</p>
                    <p><strong>Address : </strong>'.$address.'</p>
                    <p><strong>Facebook : </strong><a href="'.$facebook.'" target="_blank">'.$facebook.'</a></p>
                    <p><strong>Level : </strong>'.$level.'</p>
                    <p><strong>Status : </strong>'.$status.'</p>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>';
        return $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::select('id','name')->get()->toArray();
        if ((Auth::user()->id != 1) && ($id == 1 || ($user["level"] == 1 && (Auth::user()->id != $id)))) {
            return redirect()->route('admin.user')->with('warning','You Do Not Have Level To Edit This Member');
        }
        return view('backend.module.user.edit',['user' => $user,'roles' => $roles]);
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
        $user = User::findOrFail($id);
        if (empty($request->txtPass)) {
            $user->password = $user["password"];
        } else {
            $user->password = bcrypt($request->txtPass);
        }

        if ($user["id"] == Auth::user()->id) {
            $user->level   = $user["level"];
            $user->status  = $user["status"];
            $user->role_id = $user["role_id"];
        } else {
            $user->level   = $request->sltLevel;
            $user->status  = ($request->chkStatus == "on") ? "on" : "off";
            $user->role_id =  (isset($request->sltRole)) ? $request->sltRole : null;
        }

        $user->avatar      = $request->txtImage;
        $user->firstname   = $request->txtFirstName;
        $user->lastname    = $request->txtLastName;
        $user->phone       = $request->txtPhone;
        $user->address     = $request->txtAddress;
        $user->facebook    = $request->txtFacebook;
        $user->description = $request->txtDescription;
        
        $user->updated_at  = new DateTime;
        $check             = $user->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $user["email"]. " (".$user["id"].")";
            $log->action     = "Edit";
            $log->controller = "User";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.user.edit',['id' => $id])->with('success','Update A Successful Member');
        } else {
            return redirect()->route('admin.user')->with('success','Update A Successful Member');
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
        $user = User::findOrFail($id);
        if (($id == 1) || (Auth::user()->id != 1 && $user["level"] == 1)) {
            return redirect()->route('admin.user')->with('warning','You Do Not Have Level To Delete This Member');
        } else {
            $category = Category::where('user_id',$id)->count();
            $banner   = Banner::where('user_id',$id)->count();
            $position = Position::where('user_id',$id)->count();
            $news     = News::where('user_id',$id)->count();
            $post     = Post::where('user_id',$id)->count();
            $tags     = Tags::where('user_id',$id)->count();
            $product  = Product::where('user_id',$id)->count();
            $role     = Role::where('user_id',$id)->count();
            if ($category == 0 && $banner == 0 && $position == 0 && $news == 0 && $post == 0 && $tags == 0 && $product == 0 && $role == 0) {
                $check    = $user->delete($id);

                if ($check) {
                    $log             = new Log;
                    $log->title      = $user["email"]. " (".$user["id"].")";
                    $log->action     = "Delete";
                    $log->controller = "User";
                    $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
                    $log->created_at = new DateTime();
                    $log->save();
                }

                return redirect()->route('admin.user')->with('success','Delete A Successful Member');
            } else {
                return redirect()->route('admin.user')->with('warning', 'You Can\'t Delete User.User Created Category,News Banner,Position,News,Post,Tags,Product Or Role');
            }
        }
    }

    public function getEditMyself () {
        $login_id = Auth::user()->id;
        $user     = User::findOrFail($login_id);
        return view('backend.module.user.myself',['user' => $user]);
    }

    public function postEditMyself (EditMySelfRequest $request) {
        $login_id = Auth::user()->id;
        $user     = User::findOrFail($login_id);
        
        if (empty($request->txtPass)) {
            $user->password = $user["password"];
        } else {
            if (!Hash::check($request->txtOldPass, $user->password)) {
                return redirect()->route('admin.user.get-edit-myself')->with('danger','Old Password Is Incorrect');
            } elseif ($request->txtPass != $request->txtRePass) {
                return redirect()->route('admin.user.get-edit-myself')->with('danger','Password And Repassword Do Mot Match');
            } else {
                $user->password = bcrypt($request->txtPass);
            }
        }

        $user->avatar      = $request->txtImage;
        $user->firstname   = $request->txtFirstName;
        $user->lastname    = $request->txtLastName;
        $user->phone       = $request->txtPhone;
        $user->address     = $request->txtAddress;
        $user->facebook    = $request->txtFacebook;
        $user->description = $request->txtDescription;
        $user->role_id     = $user["role_id"];
        $user->level       = $user["level"];
        $user->status      = $user["status"];
        $user->updated_at  = new DateTime;
        $check             = $user->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $user["email"]. " (".$user["id"].")";
            $log->action     = "Edit My Self";
            $log->controller = "User";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.user.get-edit-myself')->with('success','Update A Successful Member');
        } else {
            return redirect()->route('admin.dashboard.index')->with('success','Update A Successful Member');
        }
    }
}