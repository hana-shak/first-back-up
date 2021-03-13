@extends('layouts.public')
@section('title')
مجتمع أكزيمتي
@endsection

@section('main')
<span>
<h5>{{$sub->discussioncategory->name}} >>>  {{$sub->name}}</h5></span>

@foreach($sub->discussions as $item)

{{$item->disc_title}}<br>
{{$item->disc_body}}<br>
{{$item->disc_id}}<br>
<hr>
@endforeach


@endsection
