@extends('manager.master')
@section('content')
{{--    @if ($errors->any())--}}
{{--        <div class="card-header">--}}
{{--            <div class="alert alert-danger">--}}
{{--                <ul>--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <li>{{ $error }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
    <form id="form_add_field">
        @csrf
        <div id="validation-errors"></div>
        <div class="form-group mb-3">
            <label for="simpleinput">Name</label>
            <input type="text" name="name" class="form-control" >
        </div>

        <div class="form-group mb-3">
            <label for="example-email">Phone</label>
            <input type="text" name="phone"  class="form-control" >
        </div>


        <div class="form-group mb-3">
            <label for="example-password">Type</label>
            <select name="type" class="custom-select mb-3">
                    <option value="Sân 7" selected>Sân 7</option>
                    <option value="Sân 11">Sân 11</option>

            </select>
        </div>
        @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group mb-3">
            <label for="example-password">Address</label>
            <input type="text" name="address" class="form-control" >
        </div>
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group mb-3">
            <label >Địa chỉ</label>
            <select id="provinces" name="province" class="custom-select mb-3">
                <option disabled selected>Chọn thành phố</option>
                @foreach($province as $each)
                    <option value="{{$each->id}}">{{$each->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3" id="districts">

        </div>

        <div class="form-group mb-3" id="wards">

        </div>


        <div class="form-group mb-3">
            <label for="example-palaceholder">Size</label>
            <input type="text" name="size" class="form-control" >
        </div>

        <div class="form-group mb-3">
            <label for="example-readonly">Image</label>
            <input type="file" name="image" class="form-control-file" >
        </div>

        <button class="btn btn-info" id="add_field" >Create</button>
    </form>
<script>
    $(document).ready(function (){
        $('#provinces').on('change',function() {
            let provincesId = $(this).val();
            $.ajax({
                url: `/admin/field/create/select/provinces/${provincesId}`,
                method:"get",
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(res) {
                    $('#districts').html(res);
                },
                complete: function() {
                    $('#loader').hide();
                },
            })
        });
    })
    $('#add_field').on('click',function (e){
        e.preventDefault();
        var form = $('#form_add_field');
        var data = new FormData(form[0]);
        $.ajax({
            url: `/admin/field/create`,
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType : false,
            success: function (res) {
                alert("success!");

            },
            error: function (xhr) {
                $('#validation-errors').html('');
                $.each(xhr.responseJSON.errors, function(key,value) {
                    $('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
                });
            }
        });
    })

</script>

@endsection
