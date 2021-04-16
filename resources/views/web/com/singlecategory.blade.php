@extends('layouts.public')
@section('title')
مجتمع أكزيمتي
@endsection

@section('main')
<span>
{{-- <h5>{{$sub->discussioncategory->name}} >>>  {{$sub->name}}</h5></span> --}}

<h3>{{$subcat->name}}</h3>




<div class="container ">
    <div class="row">
      @foreach($subs as $item)
          <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                  <div class="img_container">
                      <a href="/dispersub/{{$item->id}}">
                          <img src="/discussion/images/{{$item->image}}" width="300" height="300"  alt="Image">

                      </a>
                  </div>

                  <div class="tour_title">
                      <h3><strong>{{$item->name}}</strong> </h3>
                  </div>
          </div>
      @endforeach
    </div>
  </div>
@endsection
