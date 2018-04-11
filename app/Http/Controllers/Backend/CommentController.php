<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Log;
use App\Http\Requests\Comment\ReplyRequest;
use DateTime,Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        $comment = Comment::select('id','comment','parent_id','user_id','table_name','table_id','created_at','status')->with(
            [
                'user' => function ($query) {
                    $query->select('id','lastname','firstname');
                }
            ]
        )->orderBy('id','desc')->get()->toArray();
        return view('backend.module.comment.list',['comment' => $comment]);
    }

    /**
     * Show the form for send a comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReply ($id) {
        $comment = Comment::findOrFail($id);
        $article = \DB::table($comment["table_name"])
                                ->select('id','title')
                                ->where("id" ,'=',$comment["table_id"])->first();
        return view('backend.module.comment.reply',['comment' => $comment,'article' => $article]);
    }

    /**
     * Store a newly created comment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReply (ReplyRequest $request,$id) {
        $comment             = new Comment;
        $comment->comment    = $request->txtReply;
        $comment->ip_comment = $request->ip();
        $comment->like       = $request->txtLike;
        $comment->dislike    = $request->txtDislike;
        $comment->report     = $request->txtReport;
        $comment->user_id    = Auth::user()->id;
        $comment->table_name = $request->txtTableName;
        $comment->table_id   = $request->txtTableId;
        $comment->parent_id  = $id;
        $comment->status     = ($request->chkStatus == "on") ? "on" : "off";
        $comment->created_at = new DateTime();
        $check               = $comment->save();

        if ($check) {
            $log             = new Log;
            $log->title      = $comment["comment"]. " (".$comment["id"].")";
            $log->action     = "Reply";
            $log->controller = "Comment";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        if ($request->btnSave) {
            return redirect()->route('admin.comment.getReply',['id' => $id])->with('success','Reply A Successful Comment');
        } else {
            return redirect()->route('admin.comment')->with('success','Reply A Successful Comment');
        }
    }

    /**
     * Remove the comment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id) {
        $comment = Comment::findOrFail($id);
        $check   = $comment->delete();

        if ($check) {
            $log             = new Log;
            $log->title      = $comment["comment"]. " (".$comment["id"].")";
            $log->action     = "Delete";
            $log->controller = "Comment";
            $log->fullname   = Auth::user()->firstname.' '.Auth::user()->lastname." (".Auth::user()->id.")";
            $log->created_at = new DateTime();
            $log->save();
        }

        return redirect()->route('admin.comment')->with('success','Delete A Successful Comment');
    }
}