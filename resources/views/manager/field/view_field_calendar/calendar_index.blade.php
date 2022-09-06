@extends('manager.master')
@section('content')

    @push('custom-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
    @endpush

        <select id="field" class="custom-select mb-3 col-5">
            <option disabled selected>Chọn sân</option>
            @foreach($data as $each)
            <option value="{{$each->id}}">{{$each->name}}</option>
            @endforeach
        </select>
        <div class='card-body'>
            <div id="receive_data1"></div>

        </div>
    <script>
        $(document).ready(function (){
            $('#field').on('change',function() {
                let fieldId = $(this).val();
                $.ajax({
                    url: `/admin/field/calendar/index/${fieldId}`,
                    method:"get",
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    success: function(res) {
                        $("#receive_data1").html(res);
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                })
            });
        })
        </script>


@endsection
