@extends('layouts.public')
@section('title')
أكزيمتي
@endsection
@section('slider')

@endsection
@section('main')



<div class="container margin_60">

  <div class="row">


<div class="col-md-8">

        <div class="main_title">
            <h2>مناقشاتي</h2>
            <p>

            </p>
        </div>

        <hr>
			<ul class="cbp_tmtimeline">
                @foreach ($discs as $disc )
				<li>

					<div class="cbp_tmicon timeline_icon_point"></div>
					<div class="cbp_tmlabel">
						<h5>{{$disc->disc_title}}</h5>
                        <time class="cbp_tmtime" datetime="09:30"><span>{{Date::instance($disc->created_at)->format('l j F Y ')}}</span>
                        </time>
						<p>{{$disc->disc_body}} </p>
					</div>
				</li>
                @endforeach
            </ul>
</div>













     <div class="col-md-4 mb-1">
        <a href="/uedit/{{Auth::id()}}" class="btn_1" class="mb-3">تعديل بيانات الملف الشخصي  </a>
        <br><br><br>
        {{-- <a href="/usdelete/{{Auth::id()}}" class="btn_1"> حذف الحساب الشخصي  </a> --}}

        {{-- <a href="/uedit/{{Auth::id()}}" class="btn_1">تعديل بيانات الملف الشخصي  </a> --}}
     </div>
    <!-- End col-md-4 -->

<!-- End row -->
  </div>





</div>


@endsection
