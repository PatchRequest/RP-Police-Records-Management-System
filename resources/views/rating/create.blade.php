@extends('layout')

@section('content')



    <form method="POST" action="/rating">

        @csrf



            <select name = "receiver" class="selectpicker" title="Kollegen auswählen!"data-show-subtext="true" data-live-search="true">
                @foreach($users as $user)
                    @foreach($user->role as $role)
                        @if($role->sort_order > 0)
                            <option data-subtext="{{ $role->name }}" value="{{ $user->id }}">{{ $user->username }}</option>
                        @endif

                    @endforeach

                @endforeach
            </select>

            <br>
        <br>
        <div class="form-group">
            <label for="reason"> Grund (z.B. auf welche Streife bezogen): </label>
            <input  type="text" name="reason" class="form-control">
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
            <button type="submit" class="btn btn-success"> Erstellen</button>
        </div>



    </form>


@endsection
