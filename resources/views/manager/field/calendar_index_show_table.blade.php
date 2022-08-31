
<table class="table table-striped">
    <tr>
        <th>Time_start</th>
        <th>Time_end</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($data as $each)
        <tr>
            <th>{{$each->getTimeStart()}}</th>
            <th>{{$each->getTimeEnd()}}</th>
            <th>{{$each->price}}</th>
            <th><button class="btn btn-info" onclick="Edit_Calendar({{$each->id}})">Edit</button></th>
            <th><button class="btn btn-info" onclick="Delete_Calendar({{$each->id}},this)">Delete</button></th>
        </tr>
    @endforeach

    <!-- medium modal -->
    <div class="modal" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div id="detail">
                    </div>
                </div>
            </div>
        </div>
    </div>

</table>
<script>
    function Edit_Calendar(id){
        $.ajax({
            url: `/admin/field/calendar/edit/${id}`,
            method:"get",
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(res) {
                $("#detail").html(res)
                $('#mediumModal').modal("show");
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                // alert("Page " + href + " cannot open. Error:" + error);
                // $('#loader').hide();
            },
            timeout: 8000
        })
    }
    function Delete_Calendar(id,_this){
        $.ajax({
            url: `/admin/field/calendar/destroy/${id}`,
            method:"get",
            beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function() {
                var result = confirm("Bạn có muốn xóa không?");
                if (result) {
                    $(_this).closest('tr').remove();
                }
            },
            complete: function() {
                $('#loader').hide();
            },
            error: function(jqXHR, testStatus, error) {
                console.log(error);
                // alert("Page " + href + " cannot open. Error:" + error);
                // $('#loader').hide();
            },
            timeout: 8000
        })
    }
</script>

