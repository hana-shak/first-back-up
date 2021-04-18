@extends('layouts.public')
@section('title')
أكزيمتي
@endsection
@section('slider')

@endsection
@section('main')
{{-- @foreach ($discs as $d )
<h3>{{$d->disc_title}}</h3>
@endforeach --}}

<div class="container margin_60">

  <div class="row">
    <div class="col-md-8">
        <div class="form_title">
            <h3><strong><i class="icon-pencil"></i></strong>تعديل المعلومات الشخصية</h3>

        </div>
        <div class="step">
            <div id="message-contact"></div>
            <form method="POST" action="/useredit/{{Auth::id()}}" id="contactform" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>الاسم </label>
                            <input type="text" class="form-control"  name="name" placeholder="{{$user->name}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>البريد الالكتروني</label>
                            <input type="text" class="form-control"  name="email" placeholder="{{$user->email}}">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label> رقم الموبايل</label>
                            <input type="text" class="form-control"  name="mobile" placeholder="{{$user->mobile}}">
                        </div>
                    </div>

                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>كلمة المرور</label>
                            <input type="password" class="form-control"  name="password" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                            <div class="form-group">
                                <label>صورة الملف الشخصي</label>

                                @if($user->image)
                                <img src="/discussion/images/{{$user->image}}"  width="100px" height="100px" />
                                @endif

                                <input type="file" name="image" id="js-upload-files" multiple>

                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                     <input type="submit" value="تعديل">
                    </div>
                </div>
            </form>
        </div>
    </div>


  </div>



</div>


@endsection
