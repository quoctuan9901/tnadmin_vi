<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\AddRequest;
use App\Http\Requests\Post\EditRequest;
use App\Models\Post;
use App\Models\Log;
use DateTime,Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id == 1) {
            $posts = Post::select('id','title','status','updated_at','user_id')->with(
                [
                    'user' => function ($query) {
                        $query->select('id','lastname','firstname');
                    }   
                ]
            )->orderBy('id','desc')->get()->toArray();
        } else {
            $posts = Post::select('id','title','status','updated_at','user_id')->with(
                [
                    'user' => function ($query) {
                        $query->select('id','lastname','firstname');
                    }   
                ]
            )->where('user_id',Auth::user()->id)
            ->orderBy('id','desc')->get()->toArray();
        }
        return view('backend.module.post.list',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.module.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $post                       = new Post;
        $post->title                = $request->txtTitle;
        $post->content              = $request->txtContent;
        $post->viewed               = $request->txtViewed;
        $post->youtube              = $request->txtVideo;
        $post->access               = $request->sltAccess;
        $post->target_open          = $request->sltTarget;
        $post->meta_robot           = $request->sltMetaRobot;
        $post->image                = $request->txtImage;
        $post->alt                  = $request->txtAlt;
        $post->status               = ($request->chkStatus == "on") ? "on" : "off";
        $post->slug                 = $request->txtSlug;
        $post->title_tag            = $request->txtMetaTitle;
        $post->meta_keywords_tag    = $request->txtMetaKeywords;
        $post->meta_description_tag = $request->txtMetaDescription;
        $post->user_id              = Auth::user()->id;
        $post->created_at           = new DateTime();

        if (env('APP_LANG')) {
            $post->title_en                = $request->txtTitleEn;
            $post->content_en              = $request->txtContentEn;
            $post->slug_en                 = $request->txtSlugEn;
            $post->title_tag_en            = $request->txtMetaTitleEn;
            $post->meta_keywords_tag_en    = $request->txtMetaKeywordsEn;
            $post->meta_description_tag_en = $request->txtMetaDescriptionEn;
        }

        $check                      = $post->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtTitle . " (".$post->id.")";
            $log->action     = "Add";
            $log->controller = "Post";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }
        
        if ($request->btnSave) {
            return redirect()->route('admin.post.create')->with('success','Add A Successful Post');
        } else {
            return redirect()->route('admin.post')->with('success','Add A Successful Post');
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
        $post   = Post::findOrFail($id);
        $title  = $post["title"];
        $image  = ($post["image"] == null) ? asset('backend/assets/images/upload.png') : $post["image"];
        if ($post["access"] == 0) {
            $access = "Public";
        } elseif ($post["access"] == 1) {
            $access = "Admin";
        } elseif ($post["access"] == 2) {
            $access = "Member";
        } else {
            $access = "Guest";
        }
        
        $open        = $post["target_open"];
        $viewed      = $post["viewed"];
        $video       = '<a href="'.$post["youtube"].'" target="_blank">Link</a>';
        $status      = $post["status"];
        $intro       = $post["intro"];
        $content     = $post["content"];
        $foot        = $post["foot"];
        $robot       = $post["meta_robot"];
        $title       = $post["title_tag"];
        $slug        = $post["slug"];
        $keywords    = $post["meta_keywords_tag"];
        $description = $post["meta_description_tag"];

        $html = '<div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">'.$title.'</h5>
            </div>

            <div class="modal-body">
                <div class="col-md-4">
                    <img class="img-responsive" id="main-image" src="'.$image.'" />
                </div>
                <div class="col-md-8">
                    <p><strong>Access : </strong>'.$access.'</p>
                    <p><strong>Target Open : </strong>'.$open.'</p>
                    <p><strong>Viewed : </strong>'.$viewed.'</p>
                    <p><strong>Link Youtube : </strong>'.$video.' </p>
                    <p><strong>Status : </strong>'.$status.'</p>
                </div>
                <div class="col-md-12">
                    <p>'.$intro.'</p>
                    <p>'.$content.'</p>
                    <p>'.$foot.'</p>
                    <hr />
                </div>
                
                <div class="col-md-12">
                    <p><strong>Meta Robot : </strong>'.$robot.'</p>
                    <p><strong>URL Friendly : </strong>'.$slug.'</p>
                    <p><strong>Meta Title : </strong>'.$title.'</p>
                    <p><strong>Meta Tags : </strong>'.$keywords.'</p>
                    <p><strong>Meta Description : </strong>'.$description.'</p>
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
        $post = Post::findOrFail($id);
        if (Auth::user()->id == 1 || Auth::user()->id == $post["user_id"]) {
            return view('backend.module.post.edit',['post' => $post]);
        } else {
             return redirect()->route('admin.post')->with('warning','You Do Not Have Level To Edit This Post');
        }
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
        $post                       = Post::findOrFail($id);
        $post->title                = $request->txtTitle;
        $post->content              = $request->txtContent;
        $post->viewed               = $request->txtViewed;
        $post->youtube              = $request->txtVideo;
        $post->access               = $request->sltAccess;
        $post->target_open          = $request->sltTarget;
        $post->meta_robot           = $request->sltMetaRobot;
        $post->image                = $request->txtImage;
        $post->alt                  = $request->txtAlt;
        $post->status               = ($request->chkStatus == "on") ? "on" : "off";
        $post->slug                 = $request->txtSlug;
        $post->title_tag            = $request->txtMetaTitle;
        $post->meta_keywords_tag    = $request->txtMetaKeywords;
        $post->meta_description_tag = $request->txtMetaDescription;
        $post->user_id              = Auth::user()->id;
        $post->updated_at           = new DateTime();

        if (env('APP_LANG')) {
            $post->title_en                = $request->txtTitleEn;
            $post->content_en              = $request->txtContentEn;
            $post->slug_en                 = $request->txtSlugEn;
            $post->title_tag_en            = $request->txtMetaTitleEn;
            $post->meta_keywords_tag_en    = $request->txtMetaKeywordsEn;
            $post->meta_description_tag_en = $request->txtMetaDescriptionEn;
        }

        $check                      = $post->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $post["title"]. " (".$post["id"].")";
            $log->action     = "Edit";
            $log->controller = "Post";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }
        
        if ($request->btnSave) {
            return redirect()->route('admin.post.edit',['id' => $id])->with('success','Update A Successful Post');
        } else {
            return redirect()->route('admin.post')->with('success','Update A Successful Post');
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
        $post  = Post::findOrFail($id);
        if (Auth::user()->id == 1 || Auth::user()->id == $post["user_id"]) {
            $check = $post->delete();
            if ($check) {
                $log             = new Log;
                $log->title      = $post["title"]. " (".$post["id"].")";
                $log->action     = "Delete";
                $log->controller = "Post";
                $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
                $log->created_at = new DateTime();
                $log->save();
            }
            return redirect()->route('admin.post')->with('success','Delete A Successful Post');
        } else {
            return redirect()->route('admin.post')->with('warning','You Do Not Have Level To Delete This Post');
        }
    }
}