@extends('layout')

@section('content')



    <form method="POST" action="/rating">

        @csrf



            <select name = "receiver" class="selectpicker" title="Kollegen auswählen!"data-show-subtext="true" data-live-search="true">
                @foreach($users as $user)

                <option data-subtext="{{ $user->rank->name }}" value="{{ $user->id }}">{{ $user->username }}</option>
                @endforeach
            </select>




        <div class="form-group">
            <label for="points_alg"> Punkte Allgemein: </label>
            <select name="points_alg" class="form-control">
                <option value="negativ">-1</option>
                <option value="neutral" selected>0</option>
                <option value="positiv">1</option>
            </select>
        </div>




        <div class="form-group">
            <button type="submit"> Erstellen</button>
        </div>



    </form>


@endsection