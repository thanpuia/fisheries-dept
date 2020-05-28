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
                        <th scope="col">tehsil</th>
                        <th scope="col">district</th>
                        <th scope="col">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tehsil as $tehsils)
                        <tr>
                            <th scope="row">{{ $tehsils->id }}</th>
                            <td> {{ $tehsils->tname }} </td>
                            <td>{{ $tehsils->district }}</td>
                            <td> 
                                <a class="btn btn-info">Edit</a>
                                <a class="btn btn-info">Delete</a>
                            </td>
                            
                        </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
              </div>
              <div class="col-sm">
                <form method="POST" action="/tehsils/create">
                    @csrf
                    <div class="form-group">
                      <label>Tehsil Add</label>
                      <input type="text" class="form-control" name="tname">
                    </div>

                    <div class="form-group">
                        <label>Tehsil Add</label>
                        <input type="text" class="form-control" name="district">
                      </div>
                    
                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>
              </div>
              
            </div>
          </div>
    </div>
</div>
@endsection
