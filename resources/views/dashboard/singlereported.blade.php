@extends('layouts.admin')
@section('title')

الردود المشتكى عليها
@endsection

@section('main')


{{$singlereport->reply->reply_body}}<br>
{{$singlereport->reply->reply_image}}<br>
{{$singlereport->user->name}}<br>

{{$singlereport->id}}
<a href="/deletereportedreply/{{$singlereport->reply->id}}">
    <button type="button" class="btn btn-info">حذف</button>

</a>


@endsection
