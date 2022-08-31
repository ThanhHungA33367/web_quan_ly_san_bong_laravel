<div id="show">
    <table class="table table-hover table-responsive table-sm">
        <tr>
            <th>Time start:</th>
            <th>Time end:</th>
            <th>Price:</th>
        </tr>
        @foreach($object as $each)
            <tr>
                <th>{{$each->getTimeStart()}}</th>
                <th>{{$each->getTimeEnd()}}</th>
                <th>{{$each->price}}</th>
            </tr>
        @endforeach
    </table>


</div>
