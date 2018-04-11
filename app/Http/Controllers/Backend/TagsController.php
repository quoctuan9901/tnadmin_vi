<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\AddRequest;
use App\Http\Requests\Tags\EditRequest;
use App\Models\Tags;
use App\Models\Log;
use DateTime,Auth;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tags::select('id','tags','slug','updated_at','user_id')->with(
            [
                'user' => function ($query) {
                    $query->select('id','lastname','firstname');
                }
            ]
        )->orderBy('id','desc')->get()->toArray();

        return view('backend.module.tags.list',['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.module.tags.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $tags                       = new Tags;
        $tags->tags                 = $request->txtTag;
        $tags->description          = $request->txtContent;
        $tags->slug                 = $request->txtSlug;
        $tags->title_tag            = $request->txtMetaTitle;
        $tags->meta_keywords_tag    = $request->txtMetaKeywords;
        $tags->meta_description_tag = $request->txtMetaDescription;
        $tags->user_id              = Auth::user()->id;
        $tags->created_at           = new DateTime();

        if (env('APP_LANG')) {
            $tags->tags_en                 = $request->txtTagEn;
            $tags->description_en          = $request->txtContentEn;
            $tags->slug_en                 = $request->txtSlugEn;
            $tags->title_tag_en            = $request->txtMetaTitleEn;
            $tags->meta_keywords_tag_en    = $request->txtMetaKeywordsEn;
            $tags->meta_description_tag_en = $request->txtMetaDescriptionEn;
        }

        $check                      = $tags->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtTag . " (".$tags->id.")";
            $log->action     = "Add";
            $log->controller = "Tags";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }
        
        if ($request->btnSave) {
            return redirect()->route('admin.tags.create')->with('success','Add A Successful Tags');
        } else {
            return redirect()->route('admin.tags')->with('success','Add A Successful Tags');
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
        $tags = Tags::findOrFail($id);
        return view('backend.module.tags.edit',['tags' => $tags]);
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
        $tags                       = Tags::findOrFail($id);
        $tags->tags                 = $request->txtTag;
        $tags->description          = $request->txtContent;
        $tags->slug                 = $request->txtSlug;
        $tags->title_tag            = $request->txtMetaTitle;
        $tags->meta_keywords_tag    = $request->txtMetaKeywords;
        $tags->meta_description_tag = $request->txtMetaDescription;
        $tags->user_id              = Auth::user()->id;
        $tags->updated_at           = new DateTime();

        if (env('APP_LANG')) {
            $tags->tags_en                 = $request->txtTagEn;
            $tags->description_en          = $request->txtContentEn;
            $tags->slug_en                 = $request->txtSlugEn;
            $tags->title_tag_en            = $request->txtMetaTitleEn;
            $tags->meta_keywords_tag_en    = $request->txtMetaKeywordsEn;
            $tags->meta_description_tag_en = $request->txtMetaDescriptionEn;
        }

        $check                      = $tags->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $tags["tags"]. " (".$tags["id"].")";
            $log->action     = "Edit";
            $log->controller = "Tags";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }
        
        if ($request->btnSave) {
            return redirect()->route('admin.tags.edit',['id' => $id])->with('success','Update A Successful Tags');
        } else {
            return redirect()->route('admin.tags')->with('success','Update A Successful Tags');
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
        $tags  = Tags::findOrFail($id);
        $check = $tags->delete();

        if ($check) {
            $log             = new Log;
            $log->title      = $tags["tags"]. " (".$tags["id"].")";
            $log->action     = "Delete";
            $log->controller = "Tags";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        return redirect()->route('admin.tags')->with('success','Delete A Successful Tags');
    }
}