@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href=""><strong>List Channels</strong></a><a  class="btn btn-sm btn-success float-right" href="{{ route('channels.create') }}">New Channel</a></div>

                <div class="card-body">
                    @include('common.errors')
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Number</th>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @if ($channels->count() > 0)
                                @foreach ($channels as $key => $channel)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $channel->title }}</td>
                                        <td>
                                            <a  class="btn btn-sm btn-info" href="{{ route('channels.edit',['id'=>$channel->id]) }}">Edit</a>
                                        </td>
                                        <td>
                                        <form action="{{ route('channels.destroy',$channel->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm float-right fix">
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="4"><strong>No data</strong></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
