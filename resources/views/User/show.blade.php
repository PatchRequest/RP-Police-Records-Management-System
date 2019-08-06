@extends('layout')

@section('content')

    <div>
        <h1>
            {{ $user->username }}
                <span class="badge badge-secondary">{{ $user->role->name }}</span>
        </h1>
    </div>

    <div>
        <h3> Points: {{ $points }}</h3>
        <h4>Eingestellt von: <a href="/user/{{ $user->creator->id }}">{{ $user->creator->username }} </a>  </h4>
    </div>




    <!-- Button -->
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
        User löschen
    </button>

    <!-- Popup -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sicher das du den User löschen möchtest?</h5>
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


@endsection
