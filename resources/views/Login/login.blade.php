@extends('layout')


@section('content')

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label for="username"> Username:</label>
            <input name="username" placeholder="Username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password"> Passwort:</label>
            <input  type="password" name="password" placeholder="Passwort" class="form-control" type="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success"> login</button>
        </div>
    </form>

@endsection
