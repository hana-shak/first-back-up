@extends('layouts.admin')
@section('title')
تعديل فئة مناقشة
@endsection

@section('main')


<form method="POST" action="/catdiscupdate/{{$singlediscussioncategory->id}}"  enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">الاسم كامل</label>
        <input class="form-control" name="name" type="text" placeholder="الاسم الكامل" value="{{$singlediscussioncategory->name}}">
    </div>


    <div class="form-group">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" > {{$singlediscussioncategory->description}}</textarea>
      </div>



    <!-- File input -->
   <div class="form-group">
        <label for="exampleFormControlFile1">اختيار صورة</label>
       <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
       <hr>
       <img src="/discussion/images/{{$singlediscussioncategory->image}}" alt="" width="100px" height="100px">
       <hr>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
