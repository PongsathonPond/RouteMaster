@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-8 order-xl-1">
            @if (session('success'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'บันทึกข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif

            @if (session('delete'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'ลบข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif

            @if (session('update'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'แก้ไขข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif



            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>จัดการข้อมูลสินค้า</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        ลำดับ</th>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        รูป</th>
                                    <th class=" text-center text-xs font-weight-bolder" data-sort="name">
                                        ชื่อสินค้า</th>
                              
                                    <th class="text-center text-xs font-weight-bolder" data-sort="name">
                                        จัดการ</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1 
                            @endphp
                               @foreach ($products as $item)
                                   
                               
                                    <tr>
                                          
                                        <td class="align-middle text-center">
                                                    {{$i++}}
                                        </td>
                                        <td class="align-middle text-center"> <img src="{{ asset($item->image) }}"
                                                alt="" width="60vh" height="60vh"></td>
                                        <td class="align-middle text-center">{{$item->name}}</td>
                                        

                                        <td class="align-middle text-center">


                                            <!-- Button trigger modal -->
                                            <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{$item->id}}">

                                            </button>

                                            <a href="{{ url('/product/delete/' . $item->id) }}"
                                                class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ลบหรือไม่ ?')"> </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$item->id}}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                แก้ไขข้อมูลห้อง
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">


                                                            <form
                                                                action="{{ url('/product/update/' . $item->id) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="pl-lg-4">
                                                                    <div class="row" style="text-align: left">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="name">ชื่อห้อง</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="name"
                                                                                    value="{{$item->name}}">
                                                                            </div>
                                                                        </div>


                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-lg">
                                                                            <div class="form-group">
                                                                                <label class="form-control-label"
                                                                                    for="image">รูปภาพ</label>
                                                                                <input type="file" class="form-control"
                                                                                    name="image"
                                                                                    value="{{$item->image}}">

                                                                                <br>
                                                                                <img src="{{ asset($item->image) }}"
                                                                                   
                                                                                    alt="" width="200px"
                                                                                    height="200px">
                                                                            </div>

                                                                            <input type="hidden" name="old_image"
                                                                                value="{{ $item->image }}">

                                                                        </div>
                                                                    </div>

                                                                    @error('name')
                                                                        <div class="my-2">
                                                                            <span class="text-danger my-2">
                                                                                {{ $message }}
                                                                            </span>
                                                                        </div>
                                                                    @enderror

                                                                    @error('email')
                                                                        <div class="my-2">
                                                                            <span class="text-danger my-2">
                                                                                {{ $message }}
                                                                            </span>
                                                                        </div>
                                                                    @enderror
                                                                    <div class="ss">
                                                                        <button type="submit"
                                                                            class="btn bg-gradient-primary">บันทึก</button>
                                                                        <button type="button"
                                                                            class="btn bg-gradient-secondary"
                                                                            data-bs-dismiss="modal">ปิด</button>

                                                                    </div>
                                                                </div>
                                                            </form>






                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>

                                    @endforeach
                                
                            </tbody>
                        </table>



                    </div>

                </div>
               
            </div>


        </div>


        <div class="col-xl-4 order-xl-2">
            <div class="card ">
                <div class="card-header">
                    <h4>เพิ่มสินค้า</h4>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <form action="{{route('product_cake_add')}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="name">ชื่อ</label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="image">รูปภาพ</label>
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <input type="submit" value="เพิ่ม" class="btn btn-success "
                                        style="margin-left: 40%">
                                    @error('accessories_number')
                                        <div class="my-2">
                                            <span class="text-danger my-2"> {{ $message }} </span>
                                        </div>
                                    @enderror

                                    @error('accessories_name')
                                        <div class="my-2">
                                            <span class="text-danger my-2"> {{ $message }} </span>
                                        </div>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>
@endsection
