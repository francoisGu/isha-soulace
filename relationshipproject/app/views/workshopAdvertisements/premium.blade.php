@extends ('layouts.main')

@section('main')

<h1>Premium Advertisements</h1>

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
        @foreach ($premiumAds as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->workshop_id }}</td>
            <td>{{ $value->start_date }}</td>
            <td>{{ $value->end_date }}</td>
            <td>{{ $value->type }}</td>
            <td>{{ $value->paid }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('workshops/' . $value->id) }}">Show</a>
                
                <a class="btn btn-small btn-success" href="{{ URL::to('workshops/' . $value->id . '/edit') }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
