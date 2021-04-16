@extends('layouts.public')
@section('title')
أكزيمتي
@endsection
@section('slider')
 <section id="hero" class="subheader_plain">
            <div class="intro_title">
                <h3 class="animated fadeInDown">Affordable Paris tours</h3>
                <p class="animated fadeInDown">CITY TOURS / TOUR TICKETS / TOUR GUIDES</p>
                <a href="all_tours_list.html" class="animated fadeInUp button_intro">View Tours</a> <a href="single_tour.html" class="animated fadeInUp button_intro outline">Read more</a>
            </div>
        </section>
        <!-- End section -->
@endsection
@section('main')
<h1>يا أهلا وسهلا فيكم</h1>



<div class="container ">
  <div class="row">
    @foreach ($discussioncategory as $singlediscussioncategory)
        <div class="col-md-4 wow zoomIn" data-wow-delay="0.1s">
                <div class="img_container">
                    <a href="/onecategory/{{$singlediscussioncategory->id}}">
                        {{-- <img src="/discussion/images/{{$singlediscussioncategory->image}}" alt="all categories" width="180px" height="150" > class="img-fluid" --}}
                        <img src="/discussion/images/{{$singlediscussioncategory->image}}" width="300" height="300"  alt="Image">

                    </a>
                </div>

                <div class="tour_title">
                    <h3><strong>{{$singlediscussioncategory->name}}</strong> </h3>
                </div>
        </div>
    @endforeach
  </div>
</div>

        <!-- End col-md-6 -->

@endsection
