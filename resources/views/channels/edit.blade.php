@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard <a  class="btn btn-sm btn-primary float-right" href="{{ route('channels.index') }}"> Go back</a></div>

                <div class="card-body">
                    @include('common.errors')
                    <form action="{{ route('channels.update',['id'=>$channel->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="channels"><strong>Channels</strong></label>
                            <input class="form-control" value="{{ $channel->title }}" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="ok" value="Created Channels">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
