@extends('layout')

@section('content')

    <form method="POST" action="/news">
        @csrf

        <div class="form-group">
            <label for="text"> <h3>Erstelle eine Neuigkeit:</h3></label>
            <textarea  name="text" placeholder="Username" class="form-control" required > </textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Erstellen</button>
        </div>

    </form>

@endsection
