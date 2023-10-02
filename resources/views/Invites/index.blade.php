@extends("layouts.app")

@section("content")
<div class="container">
    <h3>Total invited user: {{ $invitesCount; }}</h3>
    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif
    {{ $invites->links() }}
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form id="filterForm" class="form-inline">
                    <div class="form-group mb-2 mr-2">
                        <select class="form-control" id="filterOption" name="filterOption">
                            <option value="all">All Records</option>
                            <option value="user">My Records</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Apply Filter</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($invites as $invite)
            <div class="col-md-4 mb-3 invite-card" data-user-id="{{ $invite->user_id }}">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $invite->name }}</h5>
                        <p class="card-text">
                            {{ $invite->created_at->diffForHumans() }},
                            Relationship: <b>{{ $invite->relationship->relationship_name }}</b>
                        </p>
                        <a class="btn btn-warning" href="{{ url("/invites/delete/$invite->id") }}">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection