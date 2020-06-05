@extends('layouts.layout')
    @extends('layouts.navbar')
    @section('content')
    
@section('content')
<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">SI No</th>
                <td>{{ $fishpond->id }}</td>
            </tr>  
            <tr>
                <th scope="row">Applicant Name</th>
                <td>{{ $fishpond->name }}</td>
            </tr> 
            <tr>
                <th scope="row">Applicant Photo</th>
                <td>{{ $fishpond->image }}</td>
            </tr> 
            <tr>
                <th scope="row">Voter ID</th>
                <td>{{ $fishpond->epic_no }}</td>
            </tr> 
            <tr>
                <th scope="row">Father's Name</th>
                <td>{{ $fishpond->fname }}</td>
            </tr>  
            <tr>
                <th scope="row">Address</th>
                <td>{{ $fishpond->address }}</td>
            </tr>  
            <tr>
                <th scope="row">District</th>
                <td>{{ $fishpond->district }}</td>
            </tr>  
            <tr>
                <th scope="row">Pond Location</th>
                <td>{{ $fishpond->location_of_pond }}</td>
            </tr>  
            <tr>
                <th scope="row">Tehsil</th>
                <td>{{ $fishpond->tehsil }}</td>
            </tr> 
            <tr>
                <th scope="row">Area of Pond</th>
                <td>{{ $fishpond->area }}</td>
            </tr> 
            <tr>
                <th scope="row">Schemes</th>
                <td>{{ $fishpond->name_of_scheme }}</td>
            </tr> 
            <tr>
                <th scope="row">Pond Images</th>
                <td>{{ $fishpond->pondImages }}</td>
            </tr>
            <tr>
                <th scope="row">Latitude/Longitude</th>
                <td>{{ $fishpond->lat }}/{{ $fishpond->lng }}</td>
            </tr> 
            <tr>
                <td class="d-flex justify-content-between">
                    {{-- <a class="btn-danger">Reject</a> --}}
                    <form action="/resubmitList/approve/{{ $fishpond->id }}" method="POST" class="p-2">
                        @csrf
                        <button type="submit" class="btn btn-primary">Approve</button>
                    </form>
                    <div class="p-2">
                        <a href="{{ route('resubmitList') }}" class="btn btn-primary" >Back</a>
                    </div>
                    
                    
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection