@extends('admin_page')
@section('content')

<div class="card">
    <div class="card-header">Edit Producer</div>
    <h1>Edit Producer</h1>

        <form action="{{ route('upload',$producers->producer_id) }}" method="post">
            @csrf
            @method('PUT')
         {{-- @method("PATCH") --}}
          {{-- <label>Producer_id</label></br>
          <input type="text" name="producer_id" id="name" class="form-control"></br> --}}
          <label>Producer_name</label></br>
          {{-- <input type="text" name="producer_name" id="address" class="form-control"></br> --}}
          <input type="text" name="producer_name" id="name" value="{{$producers->producer_name}}" class="form-control"></br>
         
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
          
    </div>
  </div>

@endsection