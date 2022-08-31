<form  id="form_add_calendar" >
    @csrf
    <div class="form-group mb-3"  >
        <label for="simpleinput">Time_start</label>
        <input type="time" step="any" name="time_start" class="form-control" value="{{$object->getTimeStart()}}">
    </div>

    <div class="form-group mb-3">
        <label for="example-email">Time_end</label>
        <input type="time" step="any" name="time_end"  class="form-control" value="{{$object->getTimeEnd()}}">
    </div>
    <input type="hidden" name="id"  class="form-control" value="{{$object->id}}">
    <div class="form-group mb-3">
        <label for="example-password">Price</label>
        <input type="text" name="price" class="form-control" value="{{$object->price}}">
    </div>
    <button class="btn btn-info" id ='update_calendar'>Update</button>

</form>
<script>
    $('#update_calendar').on('click',function (e){
        e.preventDefault();
        var form = $('#form_add_calendar');
        var data = new FormData(form[0]);
        $.ajax({
            url: `/admin/field/calendar/edit/`,
            type: 'POST',
            data: data,
            cache: false,
            processData: false,
            contentType : false,
            success: function (res) {
                alert("success!");
                $("#mediumModal").modal("hide");
                $("#receive_data1").html(res);

            },
            error: function (data) {
                // Android.passParams(url);
            }
        });
    })
</script>
