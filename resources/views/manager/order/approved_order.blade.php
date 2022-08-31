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

        <div class='card-body'>
            <form class="float-right form-group form-inline">
                <label class="mr-2">Search:</label>
                <input type="search" name="q" value="{{ $search }}" class="form-control">
            </form>

            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Code Order</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Field Name</th>
                    <th>Date</th>
                    <th>Time start</th>
                    <th>Time end</th>
                    <th>Price</th>
                </tr>

                @foreach ($data as $each)
                    <tr>
                        <td>
                            {{ $each->id }}
                        </td>
                        <td>
                            {{ $each->code_order }}
                        </td>
                        <td>
                            {{ $each->name }}
                        </td>
                        <td>
                            {{ $each->phone }}
                        </td>
                        <td>
                            {{ $each->fieldname }}
                        </td>
                        <td>
                            {{ $each->getDate() }}
                        </td>
                        <td>
                            {{ $each->getTimeStart() }}
                        </td>
                        <td>
                            {{ $each->getTimeEnd() }}
                        </td>
                        <td>
                            {{ $each->price }}.000đ
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
@endsection
