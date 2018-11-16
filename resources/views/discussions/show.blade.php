@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href=""><strong>View details discussions</strong></a></div>
                    <div class="card-body">
                        @include('common.errors')
                            <div class="panel panel-default">
                                
                                <div class="panel-heading">
                                    @if ($discussion->is_being_watch_by_auth_user())
                                        <a href="{{ route('discussion.unwatch',['id'=>$discussion->id]) }}" class="btn btn-sm btn-danger float-right">Unwath</a>
                                    @else
                                        <a href="{{ route('discussion.watch',['id'=>$discussion->id]) }}" class="btn btn-sm btn-success float-right">Wath</a>
                                    @endif
                                    <img height="50" src="{{ asset('') }}uploads/avatars/{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}">
                                    <span class="text-success"> <strong>{{ $discussion->user->name }} - <small> <strong> (Point : {{ $discussion->user->point }})</strong> </small>  - </strong><small><b>{{ $discussion->created_at->diffForHumans()
                                        }}</b></small></span>
                                    <h6><strong><a target="_blank" class="text-primary" href="{{ route('discussions.show',['slug'=>$discussion->slug]) }}">{{ $discussion->title }}</a></strong></h6>
                                </div>
                            </div>
    
                            <div class="panel panel-body">
                                {{ $discussion->content }}
                            </div>
                            <hr>

                            {{-- replies --}}
                            <div class="card-body">

                                @foreach ($discussion->replies as $replie)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <img height="50" src="{{ asset('') }}uploads/avatars/{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}">
                                            
                                            <a href="{{ route('replies.bestanswer',['id'=>$replie->id]) }}" class="btn btn-sm btn-info float-right">Mark as best answer</a>
                                            
                                            <span class="text-success"> <strong>{{ $replie->user->name }} - <small> <strong> (Point : {{ $replie->user->point }})</strong> </small> - </strong><small><b>{{ $replie->created_at->diffForHumans()
                                                }}</b></small></span>
                                            <h6><strong><a>{{ $replie->title }}</a></strong></h6>
                                        </div>
                                    </div>
            
                                    <div class="panel panel-body">
                                        {{ str_limit($replie->content,300) }}
                                    </div>
                                    <br>
                                    <div class="panel panel-body">
                                        @if ($replie->is_liked_by_auth_user())
                                            <a href="{{ route('reply.unlike',['id'=>$replie->id]) }}" class="btn btn-sm btn-danger">Unlike <span class="badge badge-light">{{ $replie->likes->count() }}</span> </a>
                                        @else
                                            <a href="{{ route('reply.like',['id'=>$replie->id]) }}" class="btn btn-sm btn-success">Like <span class="badge badge-light">{{ $replie->likes->count() }}</span></a>
                                        @endif
                                    </div>
                                    <hr>
                                    
                                @endforeach
                            </div>

                            @if (Auth::check())
                                {{-- replies --}}
                                <div class="card-body">
                                    <form action="{{ route('discussion.reply',['id'=>$discussion->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                                        <div class="form-group">
                                            <textarea  class="form-control" name="content" id="content" cols="30" rows="5"></textarea>
                                        </div>

                                        <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-primary float-right">Reply</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="card-body">
                                    <p><strong>Singin to leave reply!</strong></p>
                                </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
