<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index()
    {

    }


    public function create($id)
    {
        $reply = Reply::findOrFail($id);
        
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Report $report)
    {
        //
    }


    public function edit(Report $report)
    {
        //
    }


    public function update(Request $request, Report $report)
    {
        //
    }


    public function destroy(Report $report)
    {
        //
    }
}
