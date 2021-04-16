@extends('layouts.public')
@section('title')
مجتمع أكزيمتي
@endsection

@section('main')
<span>
<h5>{{$sub->discussioncategory->name}} >>>  {{$sub->name}}</h5></span>
{{--
@foreach($sub->discussions as $item)

{{$item->disc_title}}<br>
{{$item->disc_body}}<br>
{{$item->disc_id}}<br>
<hr>
@endforeach --}}


<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
    @foreach($sub->discussions as $item)
    <div class="row">
        <div class="col-lg-4 col-md-4">

            <div class="img_list">
                <a href="/"><img src="/discussion/images/{{$item->image}}" alt="Image">
                </a>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="tour_list_desc">
                <h3><strong>{{$item->disc_title}}</strong> </h3>

                 <h4>باسم</h4>
                <h4>بتاريخ</h4>
                <p>{{$item->disc_body}}</p>
                <h>عدد الردود</h5>
                <h5>عدد اللايكات</h5>
            </div>
        </div>

    @endforeach
</div>





@endsection
