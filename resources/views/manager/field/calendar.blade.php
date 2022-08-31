@extends('manager.master')
@section('content')

    <form id="form_add_calendar" >
        @csrf
        <div class="form-group mb-3">
            <label>Sân</label>
            <br>
            <select id="field" class="custom-select mb-3 col-5" name="id_field">
                <option disabled selected>Chọn sân </option>
                @foreach($data as $each)
                <option value="{{$each->id}}" > {{$each->name}} </option>
                @endforeach
            </select>
        </div>
        <div id="receive_data">

        </div>

        <div class="form-group mb-3 col-6">
            <label> Time start</label>
            <input type="time" step="any"name="time_start" class="form-control" >
        </div>

        <div class="form-group mb-3 col-6">
            <label>Time end</label>
            <input type="time" step="any"name="time_end" class="form-control" >
        </div>
        <div class="form-group mb-3 col-6">
            <label> Price:</label>
            <input type="number" min="0" step="1" name="price" class="form-control" placeholder="Vd:500">
        </div>

        <button class="btn btn-info" id ='add_calendar'>Create</button>

    </form>
    <script>
        $(document).ready(function (){
            $('#field').on('change',function() {
                let fieldId = $(this).val();
                $.ajax({
                    url: `/admin/field/create/calendar/${fieldId}`,
                    method:"get",
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    success: function(res) {
                        $("#receive_data").html(res);
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                })
            });
        })
        $('#add_calendar').on('click',function (e){
            e.preventDefault();
            var form = $('#form_add_calendar');
            var data = new FormData(form[0]);
            $.ajax({
                url: `/admin/field/create/calendar`,
                type: 'POST',
                data: data,
                cache: false,
                processData: false,
                contentType : false,
                success: function (res) {
                    alert("success!");
                    $("#receive_data").html(res);
                },
                error: function (data) {
                    // Android.passParams(url);
                }
            });
        })

    </script>

@endsection

