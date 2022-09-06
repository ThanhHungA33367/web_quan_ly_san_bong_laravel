<label>
    <select>
        @foreach($data as $each)
            <option value="{{$each->id}}">{{$each->name}}</option>
        @endforeach
    </select>
</label>
