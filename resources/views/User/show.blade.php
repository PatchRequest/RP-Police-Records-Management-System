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
        <h4>Eingestellt von: <a href="/user/{{ $user->creator->id }}">{{ $user->creator->username }} </a></h4>
        <h4> <a> Eingestellt am: {{ $user->created_at }}</a></h4>
    </div>




    <div>
<h4>


        <div>
            Forum: <a href="https://www.zero-one.cc/user/{{ $user->forum_id }}">{{ $user->forum_id }}  </a>
        </div>
</h4>
        <h4>
        <div>
            Gadget: <a href="https://gadget.zero-one.cc/profile/view/{{ $user->UID }}">{{ $user->UID }}  </a>
        </div>

        </h4>
    </div>
    <form method="POST" action="/user/password">
        @csrf
        <br>
        @if($user->id == auth()->user()->id)

            <h4>Password ändern:</h4>

            <div class="form-group">
                <input type="password" name="password" placeholder="Neues Password" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="passwordAgain" placeholder="Password wiederholen" class="form-control">
            </div>
        <button type="submit" class="btn btn-success">Ändern</button>

        @else
            @can('reset password')
            <h4>Password reset:
            <button type="submit" class="btn btn-danger">reset</button>
            </h4>
            @endcan
        @endif
    </form>

@can('edit ranks')
    <br>
    <!-- Button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rankModel">
        Rang ändern
    </button>

    <!-- Popup -->
    <div class="modal fade" id="rankModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Änder den Rang des User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="/role/remove">
                        <input type="hidden" name="user" value="{{$user->id}}">
                        @csrf
                        <select name = "role" class="selectpicker" title="Rang auswählen!"data-show-subtext="true" data-live-search="true">
                            @foreach($user->role as $role)

                                <option value="{{ $role->id }}">{{ $role->name }}</option>


                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger"> Rang entfernen</button>
                    </form>

                    <br>
                    <form method="POST" action="/role/add">
                        <input type="hidden" name="user" value="{{$user->id}}">
                        @csrf
                        <select name = "role" class="selectpicker" title="Rang auswählen!"data-show-subtext="true" data-live-search="true">
                            @foreach(\Spatie\Permission\Models\Role::all() as $role)

                                <option  value="{{ $role->id }}">{{ $role->name }}</option>



                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success"> Rang setzen</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    @endcan

    @can('delete users')
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
    @endcan
    @include('Comment.list')

@endsection
