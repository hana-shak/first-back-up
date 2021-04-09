@extends('layouts.public')
@section('title')
مناقشة واحدة
@endsection

@section('main')

{{-- {{$disc->disc_image}}
{{$disc->disc_title}}
{{$disc->disc_body}}
{{$disc->anonymous}}<br>
{{$disc->user->name}}<br>
{{$disc->user->id}}
{{$disc->subdiscussion->name}}
<hr>--}}
@foreach ($disc->replies as $m)
{{-- {{$m->id}}
{{$m->reply_title}}
{{$m->reply_body}}
<hr> --}}
@endforeach


<div class="container margin_60">
 <h5>   {{$disc->subdiscussion->name}}</h5>

    <div class="row">

        <div class="col-lg-9">
             <div class="box_style_1">
                <div class="post nopadding">
                    @if($disc->disc_image)
                           <img src="/discussion/images/{{$disc->disc_image}}" alt="Image" class="img-fluid"   height="35%" width="70%" >
                    @else
                     {{-- <h5> No PICTURE</h5> --}}
                     @endif
                    <div class="post_info clearfix">


                         <div class="post-left" id="custom-info">
                            <ul>
                                @if($disc->anonymous)
                                <li><i class="icon-tags"></i>الناشر<a href="#index">مجهول</a>
                                </li>
                                @else
                                <li><i class="icon-tags"></i>الناشر<a href="#profilepage">{{$disc->user->name}}</a>

                                </li>
                                @endif
                                {{-- <li><i class="icon-calendar-empty"></i>كتب بتاريخ <span>{{Date($disc->created_at->diffForHumans('Y-m-d'))}}</span> --}}
                                {{-- <li><i class="icon-calendar-empty"></i>كتب بتاريخ <span>{{Date::createFromDate($disc->created_at)->format('l j F Y H:i:s')}}</span> --}}
                                <li><i class="icon-calendar-empty"></i>كتب بتاريخ <span>{{Date::instance($disc->created_at)->diffForHumans()}}</span>
                                <li><i class="icon-calendar-empty"></i>كتب بتاريخ <span>{{Date::instance($disc->created_at)->format('l j F Y ')}}</span>
                                </li>
                                 {{-- <li><i class="icon-inbox-alt"></i>In <a href="#"> </a>->format('Y-m-d') dddd, MMMM D, YYYY h:mm
                                </li>
                                <li><i class="icon-tags"></i>Tags <a href="#">Works</a> <a href="#">Personal</a>
                                </li> --}}
                              </ul>
                         </div>

                    </div>
                    <h2>{{$disc->disc_title}}</h2>
                    <p>
                        {{$disc->disc_body}}
                    </p>
                    @if($disc->replies->count() !== 0)
                    <div class="post-right"><i class="icon-comment"></i><a href="#">{{$disc->replies->count()}}  </a>رد</div>
                    @else
                    <div class="post-right"><i class="icon-comment"></i><a href="#">0</a>رد</div>
                    @endif


                    @if(auth::id() == $disc->user->id )
                    <div title="Code: 0xec78" class="the-icons col-md-3"><i class="icon-edit-2"></i><a href="/update/{{$disc->id}}">تعديل </a> <span class="i-name"></span><span class="i-code"></span></div>
                    <div title="Code: 0xec80" class="the-icons col-md-3"><i class="icon-trash-4"></i><a href="/delete/{{$disc->id}}">حذف </a> <span class="i-name"></span><span class="i-code"></span></div>
                    @endif

                    {{-- relation is correct --}}
                    {{$disc->likes->count()}}
                    {{-- LIKE  --}}


                    @auth

                    @if(!($disc->likedBy(Auth::id())))
                    <div title="Code: 0xe843" class="the-icons col-md-3"><i class="icon-thumbs-up"></i><a href="/like/{{$disc->id}}">لايك </a><span class="i-name"></span><span class="i-code"></span></div>
                    @else
                    <div title="Code: 0xe842" class="the-icons col-md-3"><i class="icon-thumbs-down"></i><a href="/unlike/{{$disc->id}}">مولايك </a> <span class="i-name"></span><span class="i-code"></span></div>
                    @endif
                    @endauth


                     {{-- <p>
                        Aenean iaculis sodales dui, non hendrerit lorem rhoncus ut. Pellentesque ullamcorper venenatis elit idaipiscingi Duis tellus neque, tincidunt eget pulvinar sit amet, rutrum nec urna. Suspendisse pretium laoreet elit vel ultricies. Maecenas ullamcorper ultricies rhoncus. Aliquam erat volutpat.
                    </p>
                    <blockquote class="styled">
                         <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                        <small>Someone famous in <cite title="">Body of work</cite></small>
                    </blockquote> --}}
                    {{-- <div title="Code: 0xe843" class="the-icons col-md-3"><i class="icon-thumbs-up"></i><a href="/like/{{$disc->id}}">لايك </a><span class="i-name"></span><span class="i-code"></span></div>

                    <div title="Code: 0xe842" class="the-icons col-md-3"><i class="icon-thumbs-down"></i><a href="/unlike/{{$disc->id}}">مولايك </a> <span class="i-name"></span><span class="i-code"></span></div> --}}

                </div>

                <!-- end post -->
             </div>
            <!-- end box_style_1 -->

            <!-- REPLY SECTION -->


            @auth
            <h4>شارك بإجابة</h4>
            <form action="/reply" method="post" enctype="multipart/form-data">
                @csrf
                <input name="invisible" type="hidden" value={{$disc->id}}>

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
                    @foreach($disc->replies as $m)
                    <li>


                        <!---->

                      <div class="avatar">
                            <a href="#"><img src="{{URL::asset('main/img/avatar1.jpg')}}" alt="Image">
                            </a>
                        </div>
                        <div class="comment_right clearfix">

                            @if($m->anonymous)
                            <div class="comment_info">
                                رد بواسطة <a href="#">مجهول</a><span>|</span> {{$m->created_at}} <span>|</span><a href="#">Reply</a>
                            </div>
                                @else
                                <div class="comment_info">
                                    رد بواسطة <a href="#">{{$m->user->name}}</a><span>|</span> {{$m->created_at}} <span>|</span><a href="#">Reply</a>
                                </div>
                                @endif

                                @if($m->reply_image)
                                   <img src="/discussion/images/{{$m->reply_image}}" alt="Image" class="img-fluid"   height="150px" width="150px" >
                                @else
                                {{-- <h5> No PICTURE</h5> --}}
                               @endif
                            <p> {{$m->reply_body}}</p>
                        </div>
                        @if(auth::id() == $m->user->id )
                        <div title="Code: 0xec78" class="the-icons col-md-3"><i class="icon-edit-2"></i><a href="/repupdate/{{$m->id}}">تعديل </a> <span class="i-name"></span><span class="i-code"></span></div>
                        <div title="Code: 0xec80" class="the-icons col-md-3"><i class="icon-trash-4"></i><a href="/repdelete/{{$m->id}}">حذف </a> <span class="i-name"></span><span class="i-code"></span></div>
                        @endif

                        @if(auth::id() !== $m->user->id)
                        <div title="Code: 0xe885" class="the-icons col-md-3"><i class="icon-block"></i><a href="/report/{{$m->id}}">الابلاغ عن اساءة </a> <span class="i-name"></span><span class="i-code"></span></div>
                        @endif

                    </li>

                    @endforeach
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

