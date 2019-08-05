@extends('layout')


@section('content')

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label for="username"> Username:</label>
            <input name="username" placeholder="Username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password"> Username:</label>
            <input name="password" placeholder="password" class="form-control" type="password" required>
        </div>

        <div class="form-group">
            <button type="submit"> login</button>
        </div>
    </form>

@endsection
