@extends('manager.master')
@section('content')
    @push('custom-style')
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
        <link rel='stylesheet' type='text/css' href='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/css/dataTables.checkboxes.css'>

    @endpush

            <table class="table table-striped" id="billTable">

                <thead>
                <tr>
                    <th>#</th>
                    <th>Code Order</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Field Name</th>
                    <th>Field Type</th>
                    <th>Date</th>
                    <th>Time start</th>
                    <th>Time end</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Code Order</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Field Name</th>
                    <th>Field Type</th>
                    <th>Date</th>
                    <th>Time start</th>
                    <th>Time end</th>
                    <th>Price</th>
                </tr>
                </tfoot>

            </table>


            @push('custom-scripts')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
                <script type='text/javascript' src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
                <script type='text/javascript' src='https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js'></script>
                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js'></script>
                <script type='text/javascript' src='https://cdn.datatables.net/plug-ins/1.10.24/dataRender/datetime.js'></script>
                <script type='text/javascript' src='https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js'></script>

    <script>



        $(function() {

           $('#billTable').DataTable({
                dom: 'lifrtBp',
                processing: true,
                serverSide: true,
                ajax: '{!! route('bill.getData') !!}',
                method:"post",
                columnDefs: [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    }
                ],
                select: {
                    'style': 'multi'
                },

                columns: [
                    { data: 'id', name: 'bills.id' },
                    { data: 'code_order', name: 'bills.code_order' },
                    { data: 'name', name: 'bills.name' },
                    { data: 'phone', name: 'bills.phone' },
                    { data: 'fieldname', name: 'fields.name'},
                    { data: 'fieldtype', name: 'fields.type'},
                    { data: 'time_start', name: 'bills.time_start',
                        "render": function (data) {
                            if (data == null) return "";
                            var date = new Date(data);
                            var month = date.getMonth() + 1;
                            return date.getDate() + "/" + (month.toString().length > 1 ? month : "0" + month) + "/" + date.getFullYear();
                        }
                    },
                    { data: 'time_start', name: 'bills.time_end' ,
                        "render": function (data) {
                            if (data == null) return "";
                            var date = new Date(data);
                            var hours = date.getHours();
                            var minutes = date.getMinutes();
                            return hours + ":" + (minutes.toString().length > 1 ? minutes : "0" + minutes) ;
                        }

                    },
                    { data: 'time_end', name: 'bills.time_end',
                        "render": function (data) {
                            if (data == null) return "";
                            var date = new Date(data);
                            var hours = date.getHours();
                            var minutes = date.getMinutes();
                            return hours + ":" + (minutes.toString().length > 1 ? minutes : "0" + minutes) ;
                        }

                    },
                    { data: 'price', name: 'bills.price' },
                ],


            });
        });

    </script>
            @endpush
@endsection

