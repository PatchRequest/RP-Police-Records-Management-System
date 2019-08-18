@extends('layout')

@section('content')

    <div class="box">
        <div class="box-header">

            <div class="box-title"> Bewertung anfragen</div>
        </div>
        <div class="box-body">

            <form method="POST" action="{{ url('rating') }}">
                @csrf
                <input type="hidden" name="ask" value="true">




                <select name = "giver" class="form-control select2 select2-hidden-accessible" title="Kollegen auswählen!" data-show-subtext="true" data-live-search="true">
                    @foreach($users as $user)
                        @foreach($user->role as $role)
                            @if($role->sort_order > 0)
                                <option data-subtext="{{ $role->name }}" value="{{ $user->id }}">{{ $user->username }}</option>
                            @endif

                        @endforeach

                    @endforeach
                </select>



                <div class="form-group">
                    <label for="reason"> Grund (z.B. auf welche Streife bezogen): </label>
                    <input  type="text" name="reason" class="form-control">

                </div>


                <button type="submit" class="btn btn-success"> Anfragen </button>
            </form>
        </div>

    </div>



@endsection
