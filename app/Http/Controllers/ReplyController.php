<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReplyController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        //->except('')
    }


    public function index()
    {
        //
    }


    public function create(Request $request)

    {
        if(!$request->hasFile('image') && !$request->message ){
            return redirect()->back();
        }else{

        $replier = auth::user();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('discussion/images', $filename);
        }else{
            $filename = "0";
        }

        if($request->has('anonymous')){
            $anon = 1;
        }else{
            $anon = 0;
        }

        Reply::create([
            'discussions_id'  =>  $request->invisible,
            'user_id'         =>  $replier->id,
            'reply_body'      =>  $request->message,
            'reply_image'     =>  $filename,
            'anonymous'       =>  $anon,
        ]);


        return redirect()->route('singlediscussion');
        }
    }


          public function latestReply(Reply $reply){

         // $disc = Discussion::findOrFail(1)->replies;
          $disc = Reply::findOrFail(1)->get();
         
          return ($disc);

                  }



    public function store(Request $request)
    {
        //
    }


    public function show(Reply $reply)
    {
        //
    }


    public function edit(Reply $reply)
    {
        //
    }


    public function update(Request $request, Reply $reply)
    {
        //
    }


    public function destroy(Reply $reply)
    {
        //
    }
}
