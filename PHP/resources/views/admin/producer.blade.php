@extends('admin_page')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Nhà sản xuất</h1>
            </div>
            
        </div>

        @if (session('flash_message'))
            <div class="alert alert-success">{{ session('flash_message') }}</div>
        @endif
        <a href="{{ url('/producer-create') }}" class="btn btn-success btn-sm" title="Add New Producer    ">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <table class="table" style="margin-left: 0px; ">
          
            <thead>
                <tr style="border-bottom: 2px solid #000;">
                    <th scope="col">STT</th>
                    <th scope="col">Producer_id</th>
                    <th scope="col">Producer_name</th>
                   <th scope="col"> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($producers as $producer)
                    <tr>
                        <td  style="border-bottom: 1px solid #000;">{{++$i}}</td>
                        <td style="border-bottom: 1px solid #000;">{{++$i}}</td>
                        <td style="border-bottom: 1px solid #000;">{{ $producer->id }}</td>
                        <td style="border-bottom: 1px solid #000;">{{ $producer->producer_name }}</td>
                        <td class="btn-table" style="border-bottom: 1px solid #000;"><a
                                href="{{ url('producer-edit/'.$producer->producer_id) }}" title="Edit Producer"><button
                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Edit</button></a>&nbsp;
                            <form method="POST" action="{{url('producer-delete/'.$producer->id)}}"
                                accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {!! $producers->links() !!} 
@endsection
