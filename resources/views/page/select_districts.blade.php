<label>
    <select id="districts" name="districts" class="form-control">
        <option selected disabled>Chọn phường</option>
        @foreach($data as $each)
            <option value="{{$each->id}}">{{$each->name}}</option>
        @endforeach
    </select>
</label>

<script>
    $(document).ready(function (){
        $('#districts').on('change',function() {
            let districtsId = $(this).val();

            $.ajax({
                url: `/select/districts/${districtsId}`,
                method:"get",
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(res) {
                    $('#select_ward').html(res);
                },
                complete: function() {
                    $('#loader').hide();
                },
            })
        });
    })


</script>
