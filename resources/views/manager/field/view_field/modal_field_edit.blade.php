<?php
namespace App\Http\Controllers;
use App\Models\Field;
?>
<form action = '{{route('field.update',$object->id)}}'  method = 'post' enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group mb-3">
        <label for="simpleinput">Name</label>
        <input type="text" name="name" class="form-control" value="{{$object->name}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Phone</label>
        <input type="text" name="phone"  class="form-control" value="{{$object->phone}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-password">Address</label>
        <input type="text" name="address" class="form-control" value="{{$object->address}}">
    </div>




    <div class="form-group mb-3">
        <label for="example-password">Type</label>
        <select name="type" class="custom-select mb-3">
            @if ($object->type ==='Sân 7')
                <option value="Sân 7" selected>Sân 7</option>
                <option value="Sân 11">Sân 11</option>
            @else
                <option value="Sân 7" >Sân 7</option>
                <option value="Sân 11" selected>Sân 11</option>
            @endif
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="example-palaceholder">Size</label>
        <input type="text" name="size" class="form-control" value="{{$object->size}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-readonly">Ảnh cũ:</label>
         <img src="{{asset('/storage/'.$object->image)}}" height="200">
        <br>
        <label for="example-readonly">Thay ảnh mới:</label>
        <input type="file" name="image" class="form-control-file" value="{{$object->image}}">
    </div>


    <div class="form-group mb-3">
        <label for="example-static">Time open</label>
        <input type="time" step="any" class="form-control" name ="time_open" value="{{$object->getTimeOpen()}}">
    </div>
    <div class="form-group mb-3">
        <label for="example-static">Time close</label>
        <input type="time" step="any" class="form-control" name ="time_close" value="{{$object->getTimeClose()}}">
    </div>
    <button class="btn btn-info" >Update</button>

</form>

