<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Page\AddRequest;
use App\Http\Requests\Page\EditRequest;
use App\Models\Page;
use App\Http\Controllers\Controller;
use DateTime;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page'] = Page::all();
        return view('backend.module.pages.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.module.pages.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $page                       = new Page;
        $page->name                 = $request->txtPage;
        $page->created_at           = new DateTime();
        $page->save();

        if ($request->btnSave) {
            return redirect()->route('admin.pages.create')->with('success','Add A Successful Pages');
        } else {
            return redirect()->route('admin.pages')->with('success','Add A Successful Pages');
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
        $data["page"] = Page::findOrFail($id);
        return view('backend.module.pages.edit',$data);
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
        $page                       = Page::findOrFail($id);
        $page->name                 = $request->txtPage;
        $page->updated_at           = new DateTime();
        $page->save();

        if ($request->btnSave) {
            return redirect()->route('admin.pages.create')->with('success','Update A Successful Pages');
        } else {
            return redirect()->route('admin.pages')->with('success','Update A Successful Pages');
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
        $page  = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('admin.pages')->with('success','Delete A Successful Pages');
    }
}
