@extends('layouts.user')


@section('contentuser')
    <div class="row">
        <div class="col-xl-12 order-xl-1">

            @if (session('success'))
                <script>
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'โหลดข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 2500
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
                        title: 'อัพเดทข้อมูลเรียบร้อย',
                        showConfirmButton: false,
                        timer: 1500
                    })
                </script>
            @endif


            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>รายการจองของฉัน</h4>
                </div>
                <br>
                <div class="card-body px-0 pt-0 pb-2">

                    <div class="table-responsive p-0">
                        {{-- id="myTable" --}}
                        <table class="align-items-center mb-0 table">

                            <thead>
                                <tr>
                                    <th class="text-uppercase font-weight-bolder  text-center text-xs">
                                        ลำดับ
                                    </th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        ชื่อรายการ</th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        ชื่อสถานที่</th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">
                                        วันที่ทำรายการจอง</th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">สถานะการจอง </th>
                                    <th class="text-uppercase font-weight-bolder text-center text-xs">จัดการ
                                    </th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($bookingcake as $item)
                                    <tr>
                                        <td class="text-center align-middle">

                                        </td>


                                        <td class="text-center align-middle">
                                            {{ $item->name_cake_admin }}
                                        </td>

                                        <td class="text-center align-middle">

                                        </td>

                                        <td class="text-center align-middle">


                                        </td>
                                        <td class="text-center align-middle">

                                        </td>



                                        <td class="text-center align-middle">



                                            <!-- Button trigger modal -->


                                            <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#TestReq" disabled>

                                            </button>

                                            <button type="button" class="fas fa-edit fa-lg btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target="#TestReq">

                                            </button>






                                            <a href="" class="fas fa-trash-alt fa-lg btn btn-danger"
                                                onclick="return confirm('ยกเลิกการจอง ?')"> </a>

                                            <!-- Modal -->
                                            <!-- ModalReq -->
                                            <div class="modal fade" id="TestReq" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                แก้ไขรายละเอียดการจอง</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="post">
                                                                @csrf

                                                                <div class="row" style="text-align: left">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label"
                                                                                for="location_id">ห้อง
                                                                            </label>

                                                                        </div>
                                                                    </div>

                                                                    <div class=" col-lg-5">
                                                                        <div class="form-group">
                                                                            <label class="form-control-label"
                                                                                for="project_name">ชื่อรายการจอง
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                name="project_name" value="">
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-datetime-local-input"
                                                                                class="form-control-label">เวลาเริ่มต้น</label>
                                                                            <input class="form-control"
                                                                                type="datetime-local" name="start"
                                                                                value=""
                                                                                id="example-datetime-local-input">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="example-datetime-local-input"
                                                                                class="form-control-label">เวลาสิ้นสุด</label>
                                                                            <input class="form-control"
                                                                                type="datetime-local" name="end"
                                                                                value=""
                                                                                id="example-datetime-local-input">
                                                                        </div>
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
                                                                    <button type="button" class="btn bg-gradient-secondary"
                                                                        data-bs-dismiss="modal">ปิด</button>

                                                                </div>
                                                        </div>




                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                    </div>

                    <!-- EndModalReq -->

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



    </div>
@endsection
