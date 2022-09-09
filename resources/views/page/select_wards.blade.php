<label>
    <select id="wards" name="wards" class="form-control">
        <option selected disabled>Chọn phường</option>
        @foreach($data as $each)
            <option value="{{$each->id}}">{{$each->name}}</option>
        @endforeach
    </select>
</label>
