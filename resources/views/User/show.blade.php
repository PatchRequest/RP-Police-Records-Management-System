@extends('layout')

@section('content')

@can('revive users')
    @if($user->trashed())

        <div class="alert alert-danger ">
            <h2> Achtung! Dieser User wurde gelöscht!</h2>
            Möchtest du ihn wieder herstellen?

            <form action="/revive/{{$user->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger"> Wiederherstellen</button>
            </form>
        </div>

    @endif
@endcan

    <div>
        <h1>
            {{ $user->username }}
            @foreach($user->role as $role)
                <span class="badge badge-secondary">{{ $role->name }}</span>
            @endforeach
        </h1>
    </div>



    <div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">

                    <span class="info-box-icon bg-red"><i class="fa fa-thumbs-o-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Punkte</span>
                        <span class="info-box-number">{{ $points }}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">

                    <span class="info-box-icon bg-green"><i class="fa fa-tachometer"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Forum</span>
                        <span class="info-box-number"><a href="https://www.zero-one.cc/user/{{ $user->forum_id }}">{{ $user->forum_id }}  </a></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">

                    <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Eingestellt von</span>
                        <span class="info-box-number"><a href="/user/{{ $user->creator->id }}">{{ $user->creator->username }} </a></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">

                    <span class="info-box-icon bg-red"><i class="fa fa-calendar-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Eingestellt am</span>
                        <span class="info-box-number">{{ $user->created_at->format('d.m.Y') }}</span>
                    </div>
                </div>
            </div>

        </div>




    </div>


    <div class="box  box-primary">

        <div class="box-header ">

        </div>

            <div class="box-body">
                <form method="POST" action="/user/password">
                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                    @csrf
                    <br>
                    @if($user->id == auth()->user()->id)



                        <div class="form-group">
                            <input type="password" name="password" placeholder="Neues Passwort" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwordAgain" placeholder="Passwort wiederholen" class="form-control">
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

            </div>
    </div>
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
