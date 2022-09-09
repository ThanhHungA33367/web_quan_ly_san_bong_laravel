
<select id="district" name="district" class="custom-select mb-3" >
    <option disabled selected>Chọn Quận</option>
    @foreach($data as $each)
        <option value="{{$each->id}}"> {{$each->name}}</option>
    @endforeach
</select>

<script>
    $(document).ready(function (){
        $('#district').on('change',function() {
            let districtsId = $(this).val();
            $.ajax({
                url: `/admin/field/create/select/districts/${districtsId}`,
                method:"get",
                beforeSend: function() {
                    $('#loader').show();
                },
                success: function(res) {
                    $('#wards').html(res);
                },
                complete: function() {
                    $('#loader').hide();
                },
            })
        });
    })

</script>
