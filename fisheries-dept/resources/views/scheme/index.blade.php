@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">SI</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($scheme as $schemes)
                        <tr>
                            <th scope="row">{{ $schemes->id }}</th>
                            <td> {{ $schemes->sname }} </td>
                            <td> 
                                <a class="btn btn-info" href="{{ route('scheme.edit',$schemes) }}">Edit</a>
                                <a class="btn btn-info" href="{{ route('scheme.delete',$schemes) }}">Delete</a>
                            </td>
                            
                        </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
              </div>
              <div class="col-sm">
                <form method="POST" action="/schemes/create">
                    @csrf
                    <div class="form-group">
                      <label>Scheme Name</label>
                      <input type="text" class="form-control" name="sname">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>
              </div>
              
            </div>
          </div>
    </div>
</div>
@endsection
