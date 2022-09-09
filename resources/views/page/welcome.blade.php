@extends('layout.master')
@section('content')

        <main style="padding-top: 63px;">
            <div class="container-fluid py-5 px-lg-5">
                <div class="row ">

                    <div class="col">
                        <div class="row">
                                <form class="row">
                                    <div>
                                    <label>
                                        <select id="provinces" name="provinces" class="form-control">
                                        <option selected disabled>Chọn tỉnh</option>
                                        @foreach($provinces as $each)
                                        <option value="{{$each->id}}">{{$each->name}}</option>
                                        @endforeach
                                        </select>
                                    </label>
                                    </div>
                            <div id="select_district">
                            </div>
                            <div id="select_ward"> </div>
                            <button class="btn-btn-info">Tìm</button>

                                </form>
                        </div>
                        <div class="row">
                            @foreach($data as $each)
                            <div data-marker-id="162" class="col-sm-4 col-xl-3 mb-5">
                                <div class="card h-100 border-0 shadow">
                                    <div style="background-image: url({{asset('/storage/'.$each->image)}}); background-size:cover ; height: 200px " class="card-img-top overflow-hidden dark-overlay bg-cover">
                                        <a href="/san-bong-futsal-nguyen-du" class="tile-link"></a>
                                        <div class="card-img-overlay-bottom z-index-20">

                                            <p class="mb-2 text-xs">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star text-muted"></i>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{route('page.show',$each->id)}}" class="text-lg font-weight-bold"><h4>{{$each->name}}</h4></a>
                                        <p class="text-sm">{{$each->address}}</p>
                                        <p class="text-sm">{{$each->getPriceMin($each->id)}}.000đ-{{$each->getPriceMax($each->id)}}.000đ/trận</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        <!-- Pagination -->
                        <div class="justify-content-center d-flex">

                        </div>
                    </div>
                </div>
            </div>

        </main>
    <script>
        $(document).ready(function (){
            $('#provinces').on('change',function() {
                let provincesId = $(this).val();
                $.ajax({
                    url: `/select/provinces/${provincesId}`,
                    method:"get",
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    success: function(res) {
                        $('#select_district').html(res);
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                })
            });
        })
        // function Search_address() {
        //     let provincesId = $('#provinces').val();
        //     let districtsId = $('#districts').val();
        //     let wardsId = $('#wards').val();
        //     if (provincesId !== null || districtsId !== null || wardsId !== null) {
        //         $.ajax({
        //             url: `/`,
        //             method: "get",
        //             data: {
        //                 provincesId: provincesId,
        //                 districtsId: districtsId,
        //                 wardsId: wardsId,
        //             },
        //             beforeSend: function () {
        //                 $('#loader').show();
        //             },
        //             success: function (res) {
        //
        //             },
        //             complete: function () {
        //                 $('#loader').hide();
        //             },
        //         })
        //     }
        //
        // }

    </script>

@endsection


