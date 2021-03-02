@extends('layouts.admin')
@section('title')

@endsection

@section('main')
<form method="POST" action="/updatesubcat/{{$ssubdiscat->id}}"  enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">الاسم كامل</label>
        <input class="form-control" name="name" type="text" placeholder="الاسم الكامل" value="{{$ssubdiscat->name}}">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">اختيار الفئة التي ينتمي اليها</label>
        <select class="form-control" id="exampleFormControlSelect1" name="discussion_categories_id">
            {{-- <option value="{{$scatdis->id}}">{{ $scatdis->name}}</option> --}}
            @foreach ($catdis as $scatdis)
            <option value="{{$scatdis->id}}">{{$scatdis->name}}</option>
            @endforeach

        </select>
      </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">الوصف</label>

        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" value="{{$ssubdiscat->description}}"> {{$ssubdiscat->description}}</textarea>
      </div>



    <!-- File input -->
   <div class="form-group">
        <label for="exampleFormControlFile1">اختيار صورة</label>
       <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" value="{{$ssubdiscat->image}}" >
       <img src="/discussion/images/{{$ssubdiscat->image}}" alt="" width="100px" height="100px">
   </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
