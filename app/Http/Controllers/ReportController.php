<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReportController extends Controller
{

    public function __construct(){
        $this->middleware('auth:admin')->except('create');
    }

    public function index()
    {
       // $reported = Report::all();
        $reported = Report::orderByDesc('id')->get();;
        return view('dashboard.reportedreplies',compact('reported'));

    }


    public function create($id)
    {
        $reply = Reply::findOrFail($id);
        Report::create([
            'user_id'=>$reply->user->id,
            'replies_id'=> $id,
        ]);
        return redirect()->back();


    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $singlereport = Report::findOrFail($id);
       //dd($singlereport->reply->reply_body);
       //dd($singlereport->user->name);

        return view('dashboard.singlereported',compact('singlereport'));
    }


    public function edit(Report $report)
    {
        //
    }


    public function update(Request $request, Report $report)
    {
        //
    }

    //
    public function destroyReply($id)
    {
       Reply::destroy($id);
       return ($this->index());
    }

    //Deleting report itself not the reply
    public function destroy($id)
    {
       Report::destroy($id);
       return ($this->index());
    }
}
