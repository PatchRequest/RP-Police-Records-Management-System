@extends('layout')

@section('content')


    @if($rating->confirmed == 0)
        <form method="POST" action="/rating/{{ $rating->id }}">
            @method('PATCH')
            @csrf

            <div>
                Bewertung an: {{ $rating->receiver->username }}
            </div>

            <div class="form-group">
                <label for="points_alg"> Punkte Allgemein: </label>
                <select name="points_alg" class="form-control">
                    <option value="negativ">-1</option>
                    <option value="neutral" selected>0</option>
                    <option value="positiv">1</option>
                </select>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success">Abgeben</button>
            </div>

        </form>
    @endif

@endsection
