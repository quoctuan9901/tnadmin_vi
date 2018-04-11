<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Config\EditRequest;
use App\Models\Config;
use App\Models\Log;
use Auth,DateTime,DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('product')->select('id','title','updated_at')->orderBy('id','desc')->skip(0)->take(5)->get()->toArray();
        $news = DB::table('news')->select('id','title','updated_at')->orderBy('id','desc')->skip(0)->take(5)->get()->toArray();
        $user = DB::table('users')->select('id','email','updated_at')->orderBy('id','desc')->skip(0)->take(5)->get()->toArray();
        $post = DB::table('post')->select('id','title','updated_at')->orderBy('id','desc')->skip(0)->take(5)->get()->toArray();
        return view('backend.module.dashboard.index',['products' => $products,'news' => $news,'user' => $user,'post' => $post]);
    }

    public function getConfig()
    {
        $config   = Config::findOrFail(1)->first()->toArray();
        return view('backend.module.dashboard.config',['config' => $config]);
    }

    public function postConfig(EditRequest $request)
    {
        $config                      = Config::findOrFail(1);
        $config->name_site           = $request->txtNameSite;
        $config->title               = $request->txtSiteTitle;
        $config->keywords            = $request->txtMetaKeywords;
        $config->description         = $request->txtMetaDescription;
        $config->copyright           = $request->txtCopyright;
        $config->author              = $request->txtAuthor;
        $config->dc_created          = $request->txtCreated;
        $config->dc_rights_copyright = $request->txtRightCopyright;
        $config->dc_creator_name     = $request->txtCreatorName;
        $config->dc_creator_email    = $request->txtCreatorEmail;
        $config->dc_identifier       = $request->txtIdentifier;
        $config->dc_language         = $request->txtLanguage;
        $config->robots              = $request->sltMetaRobot;
        $config->geo_placename       = $request->txtPlacename;
        $config->geo_region          = $request->txtRegion;
        $config->geo_position        = $request->txtPositionGeo;
        $config->icbm                = $request->txtICBM;
        $config->revisit_after       = $request->txtRevisitAfter;
        $config->host                = $request->txtHost;
        $config->email               = $request->txtUsername;
        $config->pass                = $request->txtPassword;
        $config->port                = $request->txtPort;
        $config->item_page_news      = $request->txtItemNews;
        $config->item_page_product   = $request->txtItemProduct;
        $config->contact_email       = $request->txtContactEmail;
        $config->contact_phone       = $request->txtContactPhone;
        $config->contact_address     = $request->txtContactAddress;
        $config->facebook            = $request->txtFacebook;
        $config->youtube             = $request->txtYoutube;
        $config->twitter             = $request->txtTwitter;
        $config->linkedin            = $request->txtLinkedin;
        $config->google_plus         = $request->txtGooglePlus;
        $config->logo                = $request->txtLogo;
        $config->no_photo            = $request->txtImageError;
        $config->updated_at          = new DateTime();
        $check                       = $config->save();

        if ($check) {
            $log             = new Log;
            $log->title      = "Config System";
            $log->action     = "Edit";
            $log->controller = "Config";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }
        
        if ($request->btnSave) {
            return redirect()->route('admin.dashboard.config')->with('success','Update Successful Config');
        } else {
            return redirect()->route('admin.dashboard.index')->with('success','Update Successful Config');
        }
    }
}
