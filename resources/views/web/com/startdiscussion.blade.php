@extends('layouts.public')
@section('token')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
@endsection
@section('title')
مجتمع أكزيمتي
@endsection

@section('main')
<div class="container margin_60">
    <div class="row">
        <div class="col-md-8">
            <div class="form_title">
                <h3><strong><i class="icon-pencil"></i></strong>ابدأ مناقشتك</h3>
                <p>شاركنا مناقشتك من هنا
                </p>
            </div>
            <div class="step">
                <div id="message-contact"></div>
                <form method="POST" action="/submit" id="contactform" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الفئة الرئيسية</label>
                                <select class="form-control dynamic" name="category" id="category">
                                    <option value="">اختر الفئة الرئيسية</option>
                                    @foreach($cats as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>الفئة الفرعية</label>
                                {{--Dependent Dropdown Select List/Subcategory--}}
                                <select class="form-control" name="subcategory" id="subcategory" >
                                    <option value="" >اختر الفئة الفرعية</option>
                                </select>

                            </div>

                        </div>
                    </div>



                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label> عنوان المناقشة</label>
                                <input type="text" class="form-control"  name="disc_title" placeholder="عنوان المناقشة">
                            </div>
                        </div>

                    </div>
                    <!-- End row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>المناقشة</label>
                                <textarea rows="5" id="message_contact" name="disc_body" class="form-control" placeholder="اكتب هنا" style="height:200px;"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>ادخال صورة</label>
                                    <input type="file" name="image" id="js-upload-files" multiple>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                    <label><input type="checkbox" name="anonymous" id="anonymous">
                                       الظهور كمتخفي(عدم اظهار الاسم)</label>
                            </div>
                            <input type="submit" value="ادخال" class="btn_1" id="submit-contact">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End col-md-8 -->

        <div class="col-md-4">
            <div class="box_style_1">
                {{-- <span class="tape"></span>
                <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>
                <p>
                    Place Charles de Gaulle, 75008 Paris
                </p>
                <hr>
                <h4>Help center <span><i class="icon-help pull-right"></i></span></h4>
                <p>
                    Lorem ipsum dolor sit amet, vim id accusata sensibus, id ridens quaeque qui. Ne qui vocent ornatus molestie.
                </p>
                <ul id="contact-info">
                    <li>+ 61 (2) 8093 3400 / + 61 (2) 8093 3402</li>
                    <li><a href="#">info@domain.com</a>
                    </li>
                </ul> --}}
            </div>
            <div class="box_style_4">
                {{-- <i class="icon_set_1_icon-57"></i>
                <h4>Need <span>Help?</span></h4>
                <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                <small>Monday to Friday 9.00am - 7.30pm</small> --}}
            </div>
        </div>
        <!-- End col-md-4 -->
    </div>
    <!-- End row -->
</div>
<!-- End container -->



<script>
$(document).ready(function(){
    $('select[name="category"]').on('change',function(){
        // console.log("listening");
        var cat_id = $(this).val();

        if(cat_id){

            // console.log(cat_id);
            $.ajax({
                url:'/getSubs/'+cat_id,
                type:'GET',
                dataType:'json',
                success:function(data){
                    // console.log(data);
                    $('select[name="subcategory"]').empty();
                    $.each(data,function(key,value){
                             $('select[name="subcategory"]')
.append('<option value="'+key+'">'+value+'</option>');
                    });
                }
            });
        }else{
            $('select[name="subcategory"]').empty();
        }
    });
});
</script>
@endsection
