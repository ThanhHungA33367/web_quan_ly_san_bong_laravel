<?php
namespace App\Http\Controllers;

?>
<div  id="error"></div>
<form>
        @csrf
        <div class="form-group mb-3">
            <label for="simpleinput">Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>

        <div class="form-group mb-3">
            <label for="example-email">Phone</label>
            <input type="text" name="phone"  class="form-control" id="phone">
        </div>

        <div class="form-group mb-3">
        <label >TÀI KHOẢN NGÂN HÀNG:</label>
        <label > 190018126151321 BIDV Hàng Bài</label>
            <label>VUI LÒNG CHUYỂN KHOẢN TRƯỚC 100k VÀO TÀI KHOẢN NGÂN HÀNG ĐỂ ĐẶT XÁC NHẬN HÓA ĐƠN ,
                VỚI NỘI DUNG: MÃ HÓA ĐƠN, TÊN
            </label>
        </div>

        <div class="form-group mb-3">
            <label >Mã hóa đơn:</label>
            <label id="id_order">{{ substr(md5(mt_rand()), 0, 7)}}</label>
        </div>

        <div class="form-group mb-3">
            <label for="example-password">Date:</label>
            {{date('d-m-Y', strtotime($date_schedule))}}
        </div>

        <div class="form-group mb-3">
            <label for="example-password">Time start:</label>
            {{$object->getTimeStart()}}
        </div>

        <div class="form-group mb-3">
        <label for="example-password">Time End:</label>
            {{$object->getTimeEnd()}}
        </div>

        <div class="form-group mb-3">
            <label for="example-palaceholder">Price:</label>
            {{$object->price}}.000đ
        </div>

        <button type="button" class="btn btn-info" onclick="Save()">Send</button>

</form>
<script>
    function Save() {
        let id_time_schedule = $('#set-schedule').val();
        let date_schedule = $('#date_schedule').val();
        let code_order = document.getElementById('id_order').innerHTML;
        let name = $('#name').val();
        let phone = $('#phone').val();

            $.ajax({
                url: `/page/schedule/create/`,
                type:"post",
                data:{
                    _token: "{{ csrf_token() }}",
                    id_time_schedule:id_time_schedule,
                    date_schedule:date_schedule,
                    name:name,
                    phone:phone,
                    code_order:code_order,
                },

                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function() {
                    alert('Đặt đơn thành công');
                    $('#mediumModal').modal('hide');

                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(xhr, testStatus, error) {
                    $('#error').html('');
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        $('#error').append('<div class="alert alert-danger">'+value+'</div');
                    });
                },
                timeout: 8000
            })


    }
</script>



