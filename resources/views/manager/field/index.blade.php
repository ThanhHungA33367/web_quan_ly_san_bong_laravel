@extends('manager.master')
@section('content')

    @push('custom-scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
    @endpush
        <div class='card'>
            @if ($errors->any())
                <div class="card-header">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

            <div class='card-body'>
                <form class="float-right form-group form-inline">
                    <label class="mr-2">Search:</label>
                    <input type="search" name="q" value="{{ $search }}" class="form-control">
                </form>

                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Quản lý lịch sân</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                    @foreach ($data as $each)
                        <tr>
                            <td>
                                {{ $each->id }}
                            </td>
                            <td>
                                {{ $each->name }}
                            </td>
                            <td>
                                abc
                            </td>
                            <td>
{{--                                <a  id="mediumButton"  data-attr="{{ route('field.edit', ['field'=>$each->id]) }}" class="btn btn-xs btn-info " >Edit</a>--}}
                                <a  id="mediumButton"  onclick="Edit({{ $each->id }})" class="btn btn-xs btn-info " >Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('field.destroy', $each) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>

                                </form>
                            </td>
                        </tr>

                    @endforeach

                </table>


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

                <nav>
                    <ul class="pagination pagination-rounded mb-0">
                        {{ $data->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    <script>
    function Edit(id){
                    $.ajax({
                        url: `/admin/field/${id}`,
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
    </script>

    @endsection
