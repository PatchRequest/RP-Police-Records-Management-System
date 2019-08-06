@extends('layout')

@section('content')

    <form method="POST" action="{{ url('rating') }}">
        @csrf
        <input type="hidden" name="ask" value="true">

        <select name = "giver" class="selectpicker" title="Kollegen auswählen!"data-show-subtext="true" data-live-search="true">
            @foreach($users as $user)

                <option data-subtext="{{ $user->rank->name }}" value="{{ $user->id }}">{{ $user->username }}</option>
            @endforeach
        </select>


        <div class="form-group">
            <label for="reason"> Grund (z.B. auf welche Streife bezogen): </label>
            <input  type="text" name="reason" class="form-control">

        </div>


        <button type="submit" class="btn btn-success"> Anfragen </button>
    </form>


@endsection
