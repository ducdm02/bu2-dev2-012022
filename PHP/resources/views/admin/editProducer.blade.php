@extends('admin_page')
@section('content')

<div class="card">
    <div class="card-header">Edit Producer</div>
    <h1>Edit Producer</h1>
    <div class="col-xl-8">
        <form action="{{ route('upload',$producers->producer_id) }}" method="post">
            @csrf
            @method('PUT')
         {{-- @method("PATCH") --}}
          {{-- <label>Producer_id</label></br>
          <input type="text" name="producer_id" id="name" class="form-control"></br> --}}
          <label>Producer_name</label></br>
          {{-- <input type="text" name="producer_name" id="address" class="form-control"></br> --}}
          <input type="text" name="producer_name" id="name" value="{{$producers->producer_name}}" class="form-control"></br>

            <label>Phone_number</label></br>
            {{-- <input type="text" name="producer_name" id="address" class="form-control"></br> --}}
            <input type="number" name="producer_name" id="name" value="{{$producers->phone_number}}" class="form-control"></br>
            <label>Producer_name</label></br>
            {{-- <input type="text" name="producer_name" id="address" class="form-control"></br> --}}
            <input type="text" name="producer_address" id="name" value="{{$producers->address}}" class="form-control"></br>
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
</div>
    </div>
  </div>

@endsection