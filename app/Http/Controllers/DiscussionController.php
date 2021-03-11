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
        $this->middleware('auth')->except('showsingleDiscussion','showAllDiscussions');
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
    }
    //Adam test for reply relation
    public function test(){
        $x = Discussion::findOrFail(4);
        // return $x->replies;
        return $x->subdiscussion;


    }

    public function showsingleDiscussion(Discussion $discussion, $id)
    {
            $latestdis = Discussion::findOrFail($id)->get();
            return view('web.com.singlediscussion', compact('latestdis'));

    }


    //show all discussions in first community page
    public function showAllDiscussions(){
        $all_disc = Discussion::latest('id')->get();
       return view ('web.com.first',compact('all_disc'));
        //dd($all_disc);

    }
    //this for profile/discussions section
    public function discussionPerUser(){

        $discs =auth()->user()->discussions;

        return ($discs);
    }



    public function store(Request $request)
    {
        return view('web.com.editdiscussion');
    }

    public function edit(Discussion $discussion, $id)
    {
        //because of relations, error in retrieving data
        //for ajax
        $cats =DiscussionCategory::all()->pluck('name','id');
        $s = SubDiscussionCategory::all();
        $discussion = Discussion::findOrFail($id)->get();
        //$n = $discussion->subdiscussion;
        //dd($n);
        return view('web.com.editdiscussion',compact('discussion','cats'));
    }


    public function update(Request $request, Discussion $discussion,$id)
    {
        $user = auth::user();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('discussion/images', $filename);
        } else {
            $filename = "0";
        }

        if($request->has('anonymous')){
            $anon = 1;
        }else{
            $anon = 0;
        }

        Discussion::where('id',$id)->update([
            'sub_discussion_categories_id' =>  $request->subcat,
            'user_id'        =>  $user->id,
            'disc_title'     =>  $request->disc_title,
            'disc_body'      =>  $request->disc_body,
            'disc_image'     =>  $filename,
            'anonymous'      =>  $anon,
        ]);




        $id = $request->id;
        //$discussion = Discussion::findOrFail($id)->get();
       return ($this->showafterupdate($id));

        // dd($request);
        //return "edited";
    }

    public function showafterupdate($id){

        $latestdis = Discussion::findOrFail($id)->get();
        return view('web.com.singlediscussion', compact('latestdis'));

    }

    public function destroy(Discussion $discussion, $id)
    {
        Discussion::destroy($id);
        return ($this->showAllDiscussions());
    }
}
