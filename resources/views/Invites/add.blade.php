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
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Relationship</label>
            <select class="form-select" name="relationship_id">
                @foreach($relationships as $relationship) <option value="{{ $relationship['id'] }}">
                    {{ $relationship['relationship_name'] }} </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Add Invitee" class="btn btn-primary">
    </form>
</div>
@endsection