@extends('admin_page')
@section('content')

<div class="card">
    <div class="card-header">Create Producer</div>
    <h1>Create Producer</h1>
    <div class="card-body">
        
        <form action="{{ URL::to('producer-create') }}" method="post">
         @csrf
          {{-- <label>Producer_id</label></br>
          <input type="text" name="producer_id" id="name" class="form-control"></br> --}}
          <label>Producer_name</label></br>
          <input type="text" name="producer_name" id="address" class="form-control"></br>
         
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
    
    </div>
  </div>

@endsection