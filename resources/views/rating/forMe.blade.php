@extends('layout')

@section('content')

    @foreach($openRatings as $rating)
    <div style="padding: 10px;">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Angefragt von: {{ $rating->receiver->username }}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Begründung: {{ $rating->reason }}</li>
            </ul>
            <a href="/rating/{{ $rating->id }}"><button class="btn btn-success">Abgeben!</button></a>
        </div>
    </div>


    @endforeach

@endsection
