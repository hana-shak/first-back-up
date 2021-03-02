@extends('layouts.admin')
@section('title')

@endsection

@section('main')

<form method="POST" action="/subcatdis"  enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">الاسم كامل</label>
        <input class="form-control" name="name" type="text" placeholder="الاسم الكامل">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="exampleFormControlSelect1" name="discussion_categories_id">

            @foreach ($catdis as $scatdis)
            <option value="{{$scatdis->id}}">{{$scatdis->name}}</option>
            @endforeach

        </select>
      </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">الوصف</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
      </div>



    <!-- File input -->
   <div class="form-group">
        <label for="exampleFormControlFile1">اختيار صورة</label>
       <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
   </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
