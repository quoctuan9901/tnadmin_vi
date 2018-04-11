<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\AddRequest;
use App\Http\Requests\Contact\EditRequest;
use App\Models\Contact;
use App\Models\Log;
use Auth,DateTime;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::select('id','name','email','phone','address','updated_at')->orderBy('id','desc')->get()->toArray();
        return view('backend.module.contact.list',['contact' => $contact]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.module.contact.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $contact             = new Contact;
        $contact->name       = $request->txtName;
        $contact->address    = $request->txtAddress;
        $contact->phone      = $request->txtPhone;
        $contact->fax        = $request->txtFax;
        $contact->email      = $request->txtEmail;
        $contact->map        = $request->txtMap;
        $contact->skype      = $request->txtSkype;
        $contact->facebook   = $request->txtFacebook;
        $contact->image      = $request->txtImage;
        $contact->timework   = $request->txtTimeWork;
        $contact->created_at = new DateTime();
        $check               = $contact->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $request->txtName . " (".$contact->id.")";
            $log->action     = "Add";
            $log->controller = "Contact";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.contact.create')->with('success','Add A Successful Contact');
        } else {
            return redirect()->route('admin.contact')->with('success','Add A Successful Contact');
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
        $contact = Contact::findOrFail($id);
        return view('backend.module.contact.edit',['contact' => $contact]);
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
        $contact             = Contact::findOrFail($id);
        $contact->name       = $request->txtName;
        $contact->address    = $request->txtAddress;
        $contact->phone      = $request->txtPhone;
        $contact->fax        = $request->txtFax;
        $contact->email      = $request->txtEmail;
        $contact->map        = $request->txtMap;
        $contact->skype      = $request->txtSkype;
        $contact->facebook   = $request->txtFacebook;
        $contact->image      = $request->txtImage;
        $contact->timework   = $request->txtTimeWork;
        $contact->updated_at = new DateTime();
        $check               = $contact->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $contact["name"]. " (".$contact["id"].")";
            $log->action     = "Edit";
            $log->controller = "Contact";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.contact.edit',['id' => $id])->with('success','Add A Successful Contact');
        } else {
            return redirect()->route('admin.contact')->with('success','Add A Successful Contact');
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
        $contact = Contact::findOrFail($id);
        $check   = $contact->delete();

        if ($check) {
            $log             = new Log;
            $log->title      = $contact["name"]. " (".$contact["id"].")";
            $log->action     = "Delete";
            $log->controller = "Contact";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        return redirect()->route('admin.contact')->with('success','Delete A Successful Contact');
    }
}