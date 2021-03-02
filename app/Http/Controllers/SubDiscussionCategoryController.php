<?php

namespace App\Http\Controllers;

use App\DiscussionCategory;
use App\SubDiscussionCategory;
use Illuminate\Http\Request;

class SubDiscussionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //This method to show single category discussion, lists all subs for this cat
    public function index($id)
    {
         $subcat = DiscussionCategory::findOrFail($id);
         $subs = $subcat->subdiscussions;
         //return $subcats;
         return view('dashboard.subcatdisc',compact('subcat','subs'));
    }


    //This method to show single sub category discussion
    public function show($id)
    {
        $subdis = SubDiscussionCategory::findOrFail($id);
        return view('dashboard.singlesubdis',compact('subdis'));
    }


    //This method to reach create form
    public function newsub()
    {
        $catdis = DiscussionCategory::all();
        //dd($catdisid);
        return view('dashboard.subcatdiscreation',compact('catdis'));
    }

    public function validation($request)
    {
        $request->validate([
            'name'           => 'required|min:3',
            'description'    => 'required',
            'image'          => 'required',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        SubDiscussionCategory::create([
             'name'           =>  $request->name,
             'description'    =>  $request->description,
             'image'          =>  $filename,
             'discussion_categories_id'  =>  $request->discussion_categories_id,
         ]);

         $id =  $request->discussion_categories_id;
         return ($this->index($id));
     }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubDiscussionCategory  $subDiscussionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubDiscussionCategory $subDiscussionCategory, $id)
    {
        $ssubdiscat = SubDiscussionCategory::findOrFail($id);
        $catdis = DiscussionCategory::all();
        return view ('dashboard.subcatdiscedit',compact('ssubdiscat','catdis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubDiscussionCategory  $subDiscussionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubDiscussionCategory $subDiscussionCategory, $id)
    {
        //  $this->validation($request);

        if ($request->hasFile('image')) {
         $file = $request->file('image');
         $ext = $file->getClientOriginalExtension();
         $filename = time() . '.' . $ext;
         $file->move('discussion/images', $filename);
     } else {
         $filename = "subdiscussion.jpg";
     }

     SubDiscussionCategory::where('id',$id)->update([
        'name'           =>  $request->name,
        'description'    =>  $request->description,
        'image'          => $filename,
        'discussion_categories_id'  =>  $request->discussion_categories_id,
     ]);

    //  dd($request);
    //  return "edited";
    return ($this->show($id));//return to method that return to singlesubcat

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubDiscussionCategory  $subDiscussionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubDiscussionCategory $subDiscussionCategory ,$id)
    {
        // $x =  $subDiscussionCategory->discussioncategory;
        // $xx = $x->id;
        // dd($xx);
        SubDiscussionCategory::destroy($id);
          return "Deleted";
        //  return ($this->show($x));

    }
}
