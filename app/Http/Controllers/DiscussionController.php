<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Reply;
use App\DiscussionCategory;
use App\SubDiscussionCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('showsingleDiscussion');
    }

    public function index()
    {
        $cats =DiscussionCategory::all()->pluck('name','id');

        return view('web.com.startdiscussion',compact('cats'));
    }

    public function subCat($id)
    {
        $subs = SubDiscussionCategory::where('discussion_categories_id',$id)->pluck('name','id');

        return json_encode($subs);
    }

    public function validation($request)
    {
        $request->validate([

            'category'             => 'required',
            'subcategory'          => 'required',
            'disc_title'           => 'required|min:3',
            'disc_body'            => 'required',

        ]);
    }

    public function create(Request $request)
    {
        $this->validation($request);
        $user = auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('discussion/images', $filename);
        }else{
            $filename = "0";
        }


        if($request->has('anonymous')){
            //Checkbox checked, it will be existed in the request and has on value
            // return "exist";
            // return $request;
            $anon = 1;

        }else{
            //Checkbox not checked, the request does not hold it at all
            // return "does not exist";
            //return $request;
            $anon = 0;

        }
        Discussion::create([
            'sub_discussion_categories_id' =>  $request->subcategory,
            'user_id'        =>  $user->id,
            'disc_title'     =>  $request->disc_title,
            'disc_body'      =>  $request->disc_body,
            'disc_image'     =>  $filename,
            'anonymous'      =>  $anon,
        ]);


           // return "I am Fabulous";
              return redirect()->route('singlediscussion');

    }


    public function showlatestDiscussion(Discussion $discussion)
    {
            $latestdis = Discussion::latest()->take(1)->get();
            //I will need to get subcategory & category name using relations and pass them using compact
            return view('web.com.singlediscussion', compact('latestdis'));
           //return dd($latestdis);
           //return dd($latestdis);

    }

    public function showsingleDiscussion(Discussion $discussion, $id)
    {
            $latestdis = Discussion::findOrFail($id)->get();
            //I will need to get subcategory & category name using relations and pass them using compact
            return view('web.com.singlediscussion', compact('latestdis'));
           //return dd($latestdis);
           //return dd($latestdis);

    }

    //Reply on a discussion
    public function createReply(Request $request)
    {
        //DO I NEED VALIDATION FOR REPLY
        //$request->validate([
        //'reply_body'     => 'required',
        //]);

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
            'reply_body'      =>  $request->reply_body,
            'reply_image'     =>  $filename,
            'anonymous'       =>  $anon,
        ]);


            return ($request);
           //return "I am Fabulous";
           // return redirect()->route('singlediscussion');



    }


    public function store(Request $request)
    {
        //
    }

    public function edit(Discussion $discussion)
    {
        //
    }


    public function update(Request $request, Discussion $discussion)
    {
        //
    }


    public function destroy(Discussion $discussion)
    {
        //
    }
}
