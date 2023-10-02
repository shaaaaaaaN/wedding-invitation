@extends('layouts.app')
@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
        </ol>
    </div>
    @endif
    <form method="post">
        @csrf
        <div class="mb-3">
            <label>Relationship name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <input type="submit" value="Add Relationship" class="btn btn-primary">
    </form>
    </br>
    @foreach($relationships as $relationship) <div class="card mb-2">
        <div class="card-body">
            <p class="card-title">{{ $relationship->relationship_name }}</p>
            <div class="card-subtitle mb-2 text-muted small">
                {{ $relationship->created_at->diffForHumans() }}
            </div>
            @if($invites->where('relationship_id', $relationship->id)->isEmpty())
            <a class="btn btn-warning" href="{{ url("/invites/delete/relationship/$relationship->id") }}"> Delete </a>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection