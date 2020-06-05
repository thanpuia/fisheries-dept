@extends('layouts.layout')
    @extends('layouts.navbar')
    @section('content')
    
@section('content')
<div class="container">
    Resubmit List
</div>
<div class="container">
    <table class="table table-hover">
        <thead class="table-info">
            <tr>
                <th scope="col">SI</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">District</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($resubmit as $application)
        <tr>
            <th scope="row">{{ $application->id }}</th>
            <td>{{ $application->name }}</td>
            <td>{{ $application->address }}</td>
            <td>{{ $application->district }}</td>
            <td>
                <a href="/resubmitList/find/{{ $application->id }}"    
                    name="title">
                    <button type="submit" class="btn-success">View</button>    
                </a>         
            </td>
        </tr>
        </tbody>
    </table>
</div>
@endforeach
@endsection