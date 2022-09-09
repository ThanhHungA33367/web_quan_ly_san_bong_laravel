<select name="ward" class="custom-select mb-3" >
    <option disabled selected>Chọn Huyện</option>
    @foreach($data as $each)
        <option value="{{$each->id}}">{{$each->name}}</option>
    @endforeach
</select>

