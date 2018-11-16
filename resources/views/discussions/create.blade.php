@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create a new discussion</div>

                <div class="card-body">
                    @include('common.errors')
                    <form action="{{ route('discussions.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="channel">Pick a channel</label>
                            <select name="channel_id" id="channel_id" class="form-control">
                                <option value="" selected>Select channel</option>
                                @foreach ($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="channel">Title ask</label>
                            <input name="title" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="channel">Content ask</label>
                            <textarea class="form-control" name="content" id="content" style="width:100%" rows="8"></textarea>
                        </div>

                        <div class="form-group">
                            
                            <button type="submit" class="btn btn-success float-right">Create discussion</button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
