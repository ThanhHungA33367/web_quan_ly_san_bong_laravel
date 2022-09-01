@extends('layout.master')
@section('content')

    <style>
        #selector:after {
            display: none;
        }
    </style>
@foreach($data as $each )
        <?php
            $first = $each;
        ?>

    @endforeach

    <div class="modal" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div id="detail">
                    </div>
                </div>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-12">
        <a href="{{route('page.index')}}" class="btn btn-secondary btn-xs" style="margin-left: 5px;margin-top: -16px">
                    <span class="glyphicon-arrow-left" >

                    </span>
            Quay lại
        </a>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5">

                        <!-- Product image -->
                        <a href="javascript: void(0);" class="text-center d-block mb-4">
                            <img src="{{asset('/storage/'.$first->image)}}" class="img-fluid" style="max-width: 450px;" alt="Product-img" />
                        </a>

                        <div class="d-lg-flex d-none justify-content-center">
                            <a href="javascript: void(0);">
                                <img src="{{asset('/storage/'.$first->image)}}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                            </a>

                        </div>
                    </div> <!-- end col -->
                    <div class="col-lg-7">
                        <form class="pl-lg-4">
                            <!-- Product title -->
                            <h3 class="mt-0">{{$first->name}} <a href="javascript: void(0);" class="text-muted"></a> </h3>
                            <p class="mb-1">Loại sân : {{$first->type}}</p>
                            <p class="font-16">
                                <span class="text-warning mdi mdi-star"></span>
                                <span class="text-warning mdi mdi-star"></span>
                                <span class="text-warning mdi mdi-star"></span>
                                <span class="text-warning mdi mdi-star"></span>
                                <span class="text-warning mdi mdi-star"></span>
                            </p>

                            <!-- Product stock -->
                            <div class="mt-3">
                                <h4><span class="badge badge-info">{{$first->address}}</span></h4>
                            </div>

                            <!-- Product description -->
                            <div class="mt-4">
                                <h6 class="font-14">Khoảng giá:</h6>
                                <h3>{{$price_min}}.000đ-{{$price_max}}.000đ </h3>
                            </div>

                            <!-- Quantity -->
                            <div class="form-group mb-3">
                                <label for="date_schedule">Date</label>
                                <input class="form-control" id="date_schedule" type="date" name="date_schedule" min="{{date("Y-m-d")}}">
                            </div>
                            <div class="mt-4">
                                <select name="type" class="custom-select mb-3" id="set-schedule">
                                    <option disabled selected>Chọn khung giờ đá  </option>
                                    @foreach($schedule as $each)
                                        <option value="{{$each->id}}" >{{$each->getTimeStart()}}-{{$each->getTimeEnd()}}: {{$each->price}}.000đ</option>
                                    @endforeach

                                </select>
                                <div class="d-flex">
                                    <a  id="btn-set-schedule" onclick="Send()" class="btn btn-danger ml-2" class="dripicons-basketball">Đặt sân</a>
                                </div>
                            </div>



                            <!-- Product description -->
                            <div class="mt-4">
                                <h6 class="font-14">Description:</h6>
                                <p>{{$first->name}} được xây dựng hệ thống nhiều sân, tổ hợp gồm 6 sân 5 người.
                                    Sân bóng có đầy đủ tiện ích, công trình phụ trợ được đầu tư bài bản. Nằm ở khu vực giao thông thuận lợi,
                                    vị trí rộng rãi, thoáng mát.
                                    Nằm ở trung tâm quận {{$first->name}}, {{$first->name}} là địa điểm yêu thích của công đồng bóng đá
                                    phủi quanh khu vực, bên cạnh đó chất lượng mặt cỏ tốt,
                                    thái độ nhân viên và giá thuê đều được đánh giá cao..
                                </p>
                            </div>

                            <!-- Product information -->
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="font-14">Tiêu chuẩn:</h6>
                                        <p class="text-sm lh-150">5 sao</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="font-14">Loại cỏ:</h6>
                                        <p class="text-sm lh-150">3cm</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="font-14">Đèn:</h6>
                                        <p class="text-sm lh-150">Led 5 pha</p>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div> <!-- end col -->
                </div> <!-- end row-->

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-centered mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Tiện ích</th>
                            <th>Giá</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Có chỗ để ô tô, xe máy</td>
                            <td>Miễn phí</td>

                        </tr>
                        <tr>
                            <td>Wifi</td>
                            <td>Miễn phí</td>

                        </tr>
                        <tr>
                            <td>Nước</td>
                            <td>50k/xô</td>

                        </tr>
                        <tr>
                            <td>Thuê bóng</td>
                            <td>50k/quả</td>

                        </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->

<!-- container -->

<!-- content -->
<!-- medium modal -->




    <script>
        function Send() {
            let id_time_schedule = $('#set-schedule').val();
            let date_schedule = $('#date_schedule').val()
            if(id_time_schedule!==null && date_schedule !==""){
                $.ajax({
                    url: `/page/schedule/GetInfo`,
                    method:"get",
                    data:{
                       id_time_schedule:id_time_schedule,
                        date_schedule:date_schedule,
                    },


                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(res) {
                        $("#detail").html(res)
                        $('#mediumModal').modal("show");

                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        // alert("Page " + href + " cannot open. Error:" + error);
                        // $('#loader').hide();
                    },
                    timeout: 8000
                })
            }
            else
            {
                alert('Bạn chưa chọn đủ thông tin');
            }

         }
    </script>


@endsection
