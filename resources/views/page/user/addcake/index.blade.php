@extends('layouts.user')

@section('contentuser')
    <div class="container-fluid mt--6">
        <div class="row">
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
            @foreach ($products as $item)
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                            <a href="javascript:;" class="d-block blur-shadow-image">
                                <img src="{{ asset($item->image) }}" class="img-fluid border-radius-lg">
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="w-50 mx-auto">

                            </div>
                            <a href="javascript:;" class="card-title h5 d-block text-darker">
                                {{ $item->name }}
                            </a>
                        
                            <h6 class="fas fa-thumbtack"> &nbsp ราคา: <span
                                    class="badge bg-gradient-warning">{{ $item->price }} บาท </span> </h6>
                            <br>
                         

                        </div>

                        <a href="{{ url('/addcakeuser/' . $item->id) }}" class=" btn btn-warning"
                            style="width: 80%;margin-left: 10% "> สั่งเค้ก</a>


                        <!-- Modal -->
                        {{-- {{ $thaiDateHelper->simpleDateFormat($item->created_at) }} --}}
                    </div>
                    <br> 
                </div>
               
                
            @endforeach
            
            {{-- @foreach ($booking as $item)
                <a href="{{ asset($item->file_document) }}" target=" _blank">Open the pdf!</a>
            @endforeach --}}
        @endsection
