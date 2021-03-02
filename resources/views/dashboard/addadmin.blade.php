@extends('layouts.admin')
@section('title')
إضافة مسؤول
@endsection

@section('main')

<form method="POST" action="/super/newadmin">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">الاسم كامل</label>
        <input class="form-control" name="name" type="text" placeholder="الاسم الكامل">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">البريد الالكتروني</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
               aria-describedby="emailHelp" placeholder="ادخل الايميل">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">رقم الموبايل</label>
        <input class="form-control"  name="mobile" type="text" placeholder="رقم الموبايل">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">كلمة المرور</label>
        <input type="text" name="password" class="form-control" id="exampleInputPassword1"
               placeholder="كلمة المرور">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1"> وظيفة المسؤول</label>
        <select class="custom-select mb-3" name="role">
            <option selected>انقر لترى الخارات</option>
            <option value="مجتمع">
                مسؤول/ة المجتمع</option>

            <option value="تغذية">
                مسؤول/ة التغذية</option>

            <option value="مقالات">
                مسؤول المقالات</option>
        </select>
    </div>




    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
