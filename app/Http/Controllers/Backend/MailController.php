<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Http\Requests\Mail\SendRequest;
use Illuminate\Mail\Mailer;
use App\Mail\MyMail;
use App\Models\Log;
use Auth,DateTime;

class MailController extends Controller
{
    public function index () {
        $email = Mail::select('id','to','subject','content','user_id','updated_at')->with(
            [
                'user' => function ($query) {
                    $query->select('id','lastname','firstname');
                }
            ]
        )->orderBy('id','desc')->get()->toArray();
        return view('backend.module.mail.list',['email' => $email]);
    }

    public function getSend () {
        return view('backend.module.mail.send');
    }

    public function postSend (Mailer $mail,SendRequest $request) {
        $to       = $request->txtTo;
        $fullname = $request->txtFullname;
        $subject  = $request->txtSubject;
        $content  = $request->txtContent;
        $mymail   = new MyMail($fullname,$subject,$content);
        $check    = $mail->to($to)->send($mymail);
        
        if ($check == null) {
            $maildb             = new Mail;
            $maildb->to         = $request->txtTo;
            $maildb->fullname   = $request->txtFullname;
            $maildb->subject    = $request->txtSubject;
            $maildb->content    = $request->txtContent;
            $maildb->user_id    = Auth::user()->id;
            $maildb->created_at = new DateTime();
            $done               = $maildb->save();

            if ($done) {
                $log             = new Log;
                $log->title      = $request->txtSubject . " (".$maildb->id.")";
                $log->action     = "Sent";
                $log->controller = "Mail";
                $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
                $log->created_at = new DateTime();
                $log->save();
            }

            return redirect()->route('admin.mail')->with('success','Send A Successful Email');
        }
    }

    public function destroy($id)
    {
        $mail  = Mail::findOrFail($id);
        $check = $mail->delete();

        if ($check) {
            $log             = new Log;
            $log->title      = $mail["subject"]. " (".$mail["id"].")";
            $log->action     = "Delete";
            $log->controller = "Mail";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        return redirect()->route('admin.mail')->with('success','Delete A Successful Mail');
    }
}