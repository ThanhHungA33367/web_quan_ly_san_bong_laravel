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
    <form action = '{{route('field.store')}}'  method = 'post' enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="simpleinput">Name</label>
            <input type="text" name="name" class="form-control" >
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group mb-3">
            <label for="example-email">Phone</label>
            <input type="text" name="phone"  class="form-control" >
        </div>
        @error('phone')
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
            <label for="example-password">Type</label>
            <select name="type" class="custom-select mb-3">
                    <option value="Sân 7" selected>Sân 7</option>
                    <option value="Sân 11">Sân 11</option>

            </select>
        </div>
        <from>
        <div class="form-group mb-3">
            <label for="example-password">Địa chỉ</label>
            <select id="provinces"name="provinces" class="custom-select mb-3">
                <option disabled selected>Chọn thành phố</option>
                @foreach($province as $each)
                    <option value="{{$each->id}}">{{$each->name}}</option>
                @endforeach
            </select>
        </div>
        </from>
        @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group mb-3">
            <label for="example-palaceholder">Size</label>
            <input type="text" name="size" class="form-control" >
        </div>
        @error('size')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group mb-3">
            <label for="example-readonly">Image</label>
            <input type="file" name="image" class="form-control-file" >
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group mb-3">
            <label for="example-static">Time open</label>
            <input type="time" step="any" class="form-control" name = "time_open">
        </div>
        @error('time_start')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group mb-3">
            <label for="example-static">Time close</label>
            <input type="time" step="any" class="form-control" name = "time_close">
        </div>
        @error('time_end')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-info" >Create</button>

    </form>


@endsection
