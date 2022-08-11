@extends('layouts.user')
<meta name="csrf-token" content="{{ csrf_token() }}">



@section('contentuser')
    <div class="container-fluid mt--6">
        <div class="row">


            <div class="col-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>เพิ่มรายละเอียดการสั่ง</h4>

                    </div>
                    <div class="card-body pt-0">

                        <form action="{{ route('cake-add') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">ชื่อเค้ก</label>
                                        <input class="form-control" name="name_cake_admin" type="text"
                                            value="{{ $products->name }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">ราคา</label>
                                        <input class="form-control" name="price" type="text"
                                            value="{{ $products->price }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input"
                                            class="form-control-label">หน้าเค้กที่ต้องการ</label>
                                        <input class="form-control" name="name_cake_user" type="text">

                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-datetime-local-input"
                                            class="form-control-label">ชื่อผู้รับ</label>
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-datetime-local-input"
                                            class="form-control-label">เบอร์โทร</label>
                                        <input class="form-control" name="tel" type="text">
                                    </div>
                                </div>



                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="example-datetime-local-input"
                                            class="form-control-label">วันที่รับ</label>
                                        <input class="form-control" type="datetime-local" name="date_end"
                                            value="2022-11-23T10:30:00" id="example-datetime-local-input">
                                    </div>

                                </div>


                            </div>
                            <br>

                            <input type="submit" value="เพิ่ม" class="btn btn-success ">
                        </form>

                    </div>


                </div>

            </div>
        @endsection
