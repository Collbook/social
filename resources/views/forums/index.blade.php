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
                <div class="card-header"><a href=""><strong>List Discussions</strong></a><a  class="btn btn-sm btn-success float-right" href="{{ route('discussions.create') }}">New Discussion</a></div>

                <div class="card-body">
                    @include('common.errors')
                    @foreach ($discussions as $discussion)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <img height="50" src="uploads/avatars/{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}">
                                <span class="text-success"> <strong>{{ $discussion->user->name }} - </strong><small><b>{{ date('d-m-Y', strtotime($discussion->created_at))
                                    }}</b></small></span>
                                
                                @if ($discussion->hasBestAnswer())
                                    <a target="_blank" class="btn btn-sm btn-success float-right" style="margin-left:8px" href="#">Close </a>
                                @else
                                    <a target="_blank" class="btn btn-sm btn-danger float-right" style="margin-left:8px" href="#">Open </a>
                                @endif

                                <a target="_blank" class="btn btn-sm btn-primary float-right" href="{{ route('discussions.show',['slug'=>$discussion->slug]) }}">View <span class="badge badge-light"> {{ $discussion->replies->count() }} replies</small> </span> </a>

                                <h6><strong><a target="_blank" class="text-primary" href="{{ route('discussions.show',['slug'=>$discussion->slug]) }}">{{ $discussion->title }}</a></strong></h6>
                            </div>
                        </div>

                        <div class="panel panel-body">
                            {{ str_limit($discussion->content,300) }}
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="pull-right" >{{ $discussions->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
