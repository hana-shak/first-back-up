@extends('layouts.public')
@section('title')
مناقشة واحدة
@endsection

@section('main')



{{-- {{$latestdis}} --}}
@foreach ($latestdis as $item)
{{-- {{$item->id}} --}}
{{-- {{$items->replies->reply_body}} --}}
{{-- {{$item->anonymous}}<hr> --}}
 {{-- {{$item->id}}<hr>
{{$item->disc_title}}<hr>
{{$item->disc_body}}<hr>
{{$item->created_at}}<hr>
{{$item->sub_discussion_categories_id}}<hr>
{{$item->anonymous}}<hr>
{{auth::user()->name}}<hr>
<hr>
<img src="/discussion/images/{{$item->disc_image}}" height="100px" width="100px">  --}}
@endforeach

@foreach ($item->replies as $m)
<h4>5555</h4>
<h4>{{$m->reply_body}}</h4>
<hr>
{{-- <img src="/discussion/images/ {{$m->reply_image}}" alt="Image" class="img-fluid"   height="35%" width="70%" > --}}
@endforeach


{{-- @if($item->disc_image)
<img src="/discussion/images/{{$item->disc_image}}" alt="Image" class="img-fluid"   height="35%" width="70%" >

@else
<h5> No PICTURE</h5>
@endif --}}

 {{-- {{$latestdis}} --}}

{{-- @if({{$item->anonymous})
// <h4>Anonymous</h4>
// @else
// {{Auth::user()->name}}<hr>
// @endif --}}
{{-- <div title="Code: 0xec78" class="the-icons col-md-3"><i class="icon-edit-2"></i> <span class="i-name">icon-edit-2</span><span class="i-code">0xec78</span></div> --}}






<div class="container margin_60">
    <div class="row">

        <div class="col-lg-9">
             <div class="box_style_1">
                <div class="post nopadding">
                    @if($item->disc_image)
                           <img src="/discussion/images/{{$item->disc_image}}" alt="Image" class="img-fluid"   height="35%" width="70%" >
                    @else
                    {{-- <h5> No PICTURE</h5> --}}
                    @endif
                    <div class="post_info clearfix">


                         <div class="post-left" id="custom-info">
                            <ul>
                                @if($item->anonymous)
                                <li><i class="icon-tags"></i>الناشر<a href="#index">مجهول</a>
                                </li>
                                @else
                                <li><i class="icon-tags"></i>الناشر<a href="#profilepage">{{$item->user->name}}</a>
                                {{-- <li><i class="icon-tags"></i>الناشر<a href="#profilepage">{{$user->name}}</a> --}}
                                </li>
                                @endif
                                <li><i class="icon-calendar-empty"></i>كتب بتاريخ <span>{{$item->created_at}}</span>
                                </li>
                                {{-- <li><i class="icon-inbox-alt"></i>In <a href="#"> </a>
                                </li>
                                <li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a>
                                </li> --}}
                             </ul>
                         </div>

                    </div>
                    <h2>{{$item->disc_title}}</h2>
                    <p>
                        {{$item->disc_body}}
                    </p>
                    <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a>Comments</div>
                    @if(auth::id() == $item->user->id )
                    <div title="Code: 0xec78" class="the-icons col-md-3"><i class="icon-edit-2"></i><a href="/update/{{$item->id}}">تعديل </a> <span class="i-name"></span><span class="i-code"></span></div>
                    <div title="Code: 0xec80" class="the-icons col-md-3"><i class="icon-trash-4"></i><a href="/delete/{{$item->id}}">حذف </a> <span class="i-name"></span><span class="i-code"></span></div>
                    @endif





                    {{-- <p>
                        Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                    </p> --}}
                    {{-- <blockquote class="styled">
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        <small>Someone famous in <cite title="">Body of work</cite></small>
                    </blockquote> --}}
                </div>

                <!-- end post -->
             </div>
            <!-- end box_style_1 -->



            <!-- REPLY SECTION -->


            @auth
            <h4>شارك بإجابة</h4>
            <form action="/reply" method="post" enctype="multipart/form-data">
                @csrf
                <input name="invisible" type="hidden" value={{$item->id}}>

                <div class="form-group">
                    <textarea name="message"   class="form-control style_2" style="height:150px;" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <label>ادخال صورة</label>
                    <input type="file" name="image" id="js-upload-files" multiple>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="anonymous" id="anonymous">
                       الظهور كمتخفي(عدم اظهار الاسم)</label>
            </div>
                <div class="form-group">
                    <input type="submit" class="btn_1" value="شارك بإجابة" />
                </div>
            </form>

            @endauth

            @guest
            {{-- Add button to register so you can reoly [LATER AFTER FULLY DISCUSSION-REPLY CRUD with AUTHORIZATION] --}}
            @endguest

            <!--  END REPLY -->




            <h4>الردود</h4>






          <div id="comments">
                <ol>
                    <li>


                        @foreach ($item->replies as $m)
                        <div class="comment_right clearfix">

                            <p>
                               {{$m->reply_body}}
                            </p>
                            {{-- <img src="/discussion/images/ {{$m->reply_image}}" alt="Image" class="img-fluid"   height="35%" width="70%" > --}}
                        </div>
                        <hr>
                        @endforeach

                        <!---->
                        <div class="avatar">
                            <a href="#"><img src="{{URL::asset('main/img/avatar1.jpg')}}" alt="Image">
                            </a>
                        </div>
                        <div class="comment_right clearfix">
                            <div class="comment_info">
                                Posted by <a href="#">Anna Smith</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
                            </div>
                            <p>
                            </p>
                        </div>
                        <ul>
                            <li>
                                <div class="avatar">
                                    <a href="#"><img src="{{URL::asset('main/img/avatar2.jpg')}}" alt="Image">
                                    </a>
                                </div>

                                <div class="comment_right clearfix">
                                    <div class="comment_info">
                                        Posted by <a href="#">Tom Sawyer</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
                                    </div>
                                    <p>
                                        Nam cursus tellus quis magna porta adipiscing. Donec et eros leo, non pellentesque arcu. Curabitur vitae mi enim, at vestibulum magna. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sit amet sem a urna rutrumeger fringilla. Nam vel enim ipsum, et congue ante.
                                    </p>
                                    <p>
                                        Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="avatar">
                            <a href="#"><img src="{{URL::asset('main/img/avatar3.jpg')}}" alt="Image">
                            </a>
                        </div>

                        <div class="comment_right clearfix">
                            <div class="comment_info">
                                Posted by <a href="#">Adam White</a><span>|</span> 25 apr 2019 <span>|</span><a href="#">Reply</a>
                            </div>
                            <p>
                                Cursus tellus quis magna porta adipiscin
                            </p>
                        </div>
                    </li>
                </ol>
            </div>
            <!-- End Comments -->
        </div>

        <!-- End col-md-8-->

        <aside class="col-lg-3 add_bottom_30">

            <div class="widget">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button class="btn btn-default" type="button" style="margin-left:0;"><i class="icon-search"></i></button>
                </span>
                </div>
                <!-- /input-group -->
            </div>
            <!-- End Search -->
            <hr>
            <div class="widget" id="cat_blog">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">Places to visit</a>
                    </li>
                    <li><a href="#">Top tours</a>
                    </li>
                    <li><a href="#">Tips for travellers</a>
                    </li>
                    <li><a href="#">Events</a>
                    </li>
                </ul>
            </div>
            <!-- End widget -->

            <hr>

            <div class="widget">
                <h4>Recent post</h4>
                <ul class="recent_post">
                    <li>
                        <i class="icon-calendar-empty"></i> 16th July, 2020
                        <div><a href="#">It is a long established fact that a reader will be distracted </a>
                        </div>
                    </li>
                    <li>
                        <i class="icon-calendar-empty"></i> 16th July, 2020
                        <div><a href="#">It is a long established fact that a reader will be distracted </a>
                        </div>
                    </li>
                    <li>
                        <i class="icon-calendar-empty"></i> 16th July, 2020
                        <div><a href="#">It is a long established fact that a reader will be distracted </a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End widget -->
            <hr>
            <div class="widget tags">
                <h4>Tags</h4>
                <a href="#">Lorem ipsum</a>
                <a href="#">Dolor</a>
                <a href="#">Long established</a>
                <a href="#">Sit amet</a>
                <a href="#">Latin words</a>
                <a href="#">Excepteur sint</a>
            </div>
            <!-- End widget -->

        </aside>
        <!-- End aside -->

    </div>
    <!-- End row-->
</div>
<!-- End container -->
@endsection

