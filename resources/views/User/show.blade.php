@extends('layout')

@section('content')

    <div>
        <h1>
            {{ $user->username }}
            @foreach($user->role as $role)
                <span class="badge badge-secondary">{{ $role->name }}</span>
            @endforeach
        </h1>
    </div>

    <div>
        <h3> Points: {{ $points }}</h3>
        <h4>Eingestellt von: <a href="/user/{{ $user->creator->id }}">{{ $user->creator->username }} </a>  </h4>
    </div>





    <form method="POST" action="/user/password">

        <br>
        @if($user->id == auth()->user()->id)

            <h4>Password ändern:</h4>
        @csrf

        <input type="text" name="password">
        <input type="text" name="passwordAgain">

        <button type="submit" class="btn btn-success">Ändern</button>

        @else

            <h4>Password reset:
            <button type="submit" class="btn btn-danger">reset</button>
            </h4>
        @endif
    </form>

    <br>
    <!-- Button -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        User löschen
    </button>

    <!-- Popup -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sicher das du den User löschen möchtest?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>




                <div class="modal-body">

                    <form method="POST" action="/user/{{$user->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete User</button>
                    </form>

                </div>





            </div>
        </div>
    </div>

    @include('Comment.list')

@endsection
