@extends('layouts.app')

@push('css')
    <style>
        .pagination {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            list-style: none;
            border-radius: .25rem;
            float: right;
            padding-right: 33px;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href=""><strong>List Channels</strong></a><a  class="btn btn-sm btn-success float-right" href="{{ route('discussions.create') }}">New Discussion</a></div>

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
                            @if ($discussions->count() > 0)
                                @foreach ($discussions as $key => $discussion)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $discussion->title }}</td>
                                        <td>
                                            <a target="_blank" class="btn btn-sm btn-success" href="{{ route('discussions.show',['slug'=>$discussion->slug]) }}">View</a>
                                        </td>
                                        <td>
                                            <a   class="btn btn-sm btn-info" href="{{ route('discussions.edit',['id'=>$discussion->id]) }}">Edit</a>
                                        </td>
                                        <td>
                                        <form action="{{ route('discussions.destroy',$discussion->id) }}" method="POST" >
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
                <div class="pull-right" >{{ $discussions->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
