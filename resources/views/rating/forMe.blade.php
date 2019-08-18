@extends('layout')

@section('content')

        @if($openRatings->isEmpty())
            Keine Bewertungen offen :D
        @endif


        @foreach($openRatings as $rating)

                <div class="box" >
                    <div class="box-header">
                        <div class="box-title">
                            Angefragt von: {{ $rating->receiver->username }}
                        </div>
                    </div>
                    <div class="box-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Begründung: {{ $rating->reason }}</li>
                        </ul>
                        <a href="/rating/{{ $rating->id }}"><button class="btn btn-success">Abgeben!</button></a>
                    </div>

                </div>



        @endforeach




@endsection
