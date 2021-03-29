@extends('layouts.admin')
@section('title')

الردود المشتكى عليها
@endsection

@section('main')


{{$singlereport->reply->reply_body}}<br>
{{$singlereport->reply->reply_image}}<br>
{{$singlereport->user->name}}<br>

{{$singlereport->id}}
{{$singlereport->reply->id}}
<hr>
<a href="/repdelete/{{$singlereport->reply->id}}">
    <button type="button" class="btn btn-info">حذف</button>

</a>


@endsection
