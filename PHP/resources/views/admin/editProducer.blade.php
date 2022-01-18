@extends('admin_page')
@section('content')

<div class="card">
    <div class="card-header">Create Producer</div>
    <h1>Edit Producer</h1>
    <div class="card-body">
        
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('producer.index') }}"> Back</a>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



        <form action="{{ route('upload',$producers->id) }}" method="post">
            @csrf
            @method('PUT')
         {{-- @method("PATCH") --}}
          {{-- <label>Producer_id</label></br>
          <input type="text" name="producer_id" id="name" class="form-control"></br> --}}
          <label>Producer_name</label></br>
          {{-- <input type="text" name="producer_name" id="address" class="form-control"></br> --}}
          <input type="text" name="producer_name" id="name" value="{{$producers->name}}" class="form-control"></br>
         
          <input type="submit" value="Save" class="btn btn-success"></br>
      </form>
    



      
    </div>
  </div>

@endsection