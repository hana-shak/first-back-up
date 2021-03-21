<?php

namespace App\Http\Controllers;

use App\DiscussionCategory;
use Illuminate\Http\Request;

class DiscussionCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
        //->except('')
    }

    public function index()
    {
        return view('dashboard.discussioncategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function newdiscussioncategory()
    {
        return view('dashboard.catdiscussioncreation');
    }
    public function validation($request)
    {
        $request->validate([
            'name'           => 'required|min:3',
            'description'    => 'required',
            'image'          => 'required',
        ]);
    }


    public function create(Request $request)
    {
       $this->validation($request);

       if ($request->hasFile('image')) {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $file->move('discussion/images', $filename);
    } else {
        $filename = "discussion.jpg";
    }
        DiscussionCategory::create([
            'name'           =>  $request->name,
            'description'    =>  $request->description,
            'image'          => $filename,
        ]);

        // return "added new discussion to show allcategory";
        return redirect('/totalcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DiscussionCategory $discussionCategory)
    {
        $discussioncategory = DiscussionCategory::orderByDesc('id')->get();
        // dd($discussioncategory);
        return view('dashboard.discussioncategory',compact('discussioncategory'));
    }
     public function singlecat(DiscussionCategory $discussionCategory, $id)
     {

        $sdiscussioncategory = DiscussionCategory::findOrFail($id);
                //mostly no need for it
        return view ('dashboard.singlediscussioncategory',compact('sdiscussioncategory'));
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscussionCategory $discussionCategory, $id)
    {
        $singlediscussioncategory = DiscussionCategory::findOrFail($id);
        return view('dashboard.categorydiscussionedit', compact('singlediscussioncategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscussionCategory $discussionCategory, $id)
    {
        $this->validation($request);

        if ($request->hasFile('image')) {
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time() . '.' . $ext;
         $file->move('discussion/images', $filename);
     } else {
         $filename = "discussion.jpg";
     }

     DiscussionCategory::where('id',$id)->update([
        'name'           =>  $request->name,
        'description'    =>  $request->description,
        'image'          => $filename,
     ]);

      return redirect ('/totalcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscussionCategory  $discussionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscussionCategory $discussionCategory, $id)
    {
           DiscussionCategory::destroy($id);
           return redirect('/totalcategory');
    }


}
