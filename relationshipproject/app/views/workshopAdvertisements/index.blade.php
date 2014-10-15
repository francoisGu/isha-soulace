@extends ('layouts.main')

@section('main')

<h1>All Workshop Advertisements</h1>

<p>{{link_to_route('workshopAdvertisements.create', 'Adding new workshop advertisement')}}</p>

<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Workshop</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type</th>
            <th>Paid</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($advertisements as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->workshop_id }}</td>
            <td>{{ $value->start_date }}</td>
            <td>{{ $value->end_date }}</td>
            <td>{{ $value->type }}</td>
            <td>{{ $value->paid }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('workshops/' . $value->id) }}">Show</a>
                
                <a class="btn btn-small btn-success" href="{{ URL::to('workshopAdvertisements/' . $value->id . '/edit') }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $advertisements->links(); }}
</table>

@stop
