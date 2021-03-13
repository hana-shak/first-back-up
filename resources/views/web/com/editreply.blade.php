@extends('layouts.public')
@section('token')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
@endsection
@section('title')
مجتمع أكزيمتي
@endsection

{{-- I will comment the selected menus until relations work  --}}

@section('main')




<h4>شارك بإجابة</h4>
<form action="/update/{{$reply->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <input name="invisible" type="hidden" value={{$reply->id}}>

    <div class="form-group">
        <textarea name="message"   class="form-control style_2" style="height:150px;" placeholder="Message">
        {{$reply->reply_body}}
        </textarea>
    </div>
     @if($reply->reply_image)
    <img src="/discussion/images/{{$reply->reply_image}}"  width="100px" height="100px" />
    @endif
    {{-- <img src="/discussion/images/{{$reply->reply_image}}"  width="100px" height="100px" /> --}}
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
@endsection
