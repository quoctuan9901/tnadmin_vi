<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
use DateTime;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page)
    {
        $data["page"]    = Page::findOrFail($page);
        $data["content"] = PageContent::where('page_id', $page)->get()->toArray();
        return view('backend.module.content.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($page)
    {
        $data["page"] = Page::findOrFail($page);
        return view ('backend.module.content.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$page)
    {
        $content             = new PageContent;
        $content->code       = $request->txtCode;
        $content->content_vi = $request->txtContentVi;
        if (env('APP_LANG')) {
            $content->content_en = $request->txtContentEn;
        }
        $content->page_id    = $page;
        $content->created_at = new DateTime;
        $content->save();

        if ($request->btnSave) {
            return redirect()->route('admin.content.create',['page' => $page])->with('success','Add A Successful Content');
        } else {
            return redirect()->route('admin.content.index',['page' => $page])->with('success','Add A Successful Content');
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
    public function edit($page,$id)
    {
        $data["page"] = Page::findOrFail($page);
        $data["content"]  = PageContent::findOrFail($id);
        return view('backend.module.content.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page,$id)
    {
        $content             = PageContent::findOrFail($id);
        $content->code       = $request->txtCode;
        $content->content_vi = $request->txtContentVi;
        if (env('APP_LANG')) {
            $content->content_en = $request->txtContentEn;
        }
        $content->page_id    = $page;
        $content->updated_at = new DateTime;
        $content->save();

        if ($request->btnSave) {
            return redirect()->route('admin.content.create',['page' => $page])->with('success','Update A Successful Content');
        } else {
            return redirect()->route('admin.content.index',['page' => $page])->with('success','Update A Successful Content');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($page,$id)
    {
        $content  = PageContent::findOrFail($id);
        $content->delete();

        return redirect()->route('admin.content.index',['page' => $page])->with('success','Delete A Successful Content');
    }
}
