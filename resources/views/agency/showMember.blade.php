@extends('layouts.datatables')

@section('content')
    <table class="table table-bordered" id="trips-table">
        <thead>
            <tr>
               
               
               <th>trips_name</th>
               <th>trip_nday</th>
               <th>trip_nnight</th>
              
               <th>trip_description</th>
               
              
               
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#trips-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'trips_name', name: 'trips_name' },
            { data: 'trip_nday', name: 'trip_nday' },
            { data: 'trip_nnight', name: 'trip_nnight' },
            { data: 'trip_description', name: 'trip_description' },
        ]
    });
});

</script>
@endpush