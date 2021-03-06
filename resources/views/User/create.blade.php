@extends('layout')

@section('content')

    <div class="box">
        <div class="box-body">
            <form method="POST" action="/user">
                @csrf



                <div class="form-group">
                    <label for="username"> Username:</label>
                    <input name="username" placeholder="Username" class="form-control" required >
                </div>

                <div class="form-group">
                    <label for="UID"> UID:</label>
                    <input name="UID" placeholder="UID" class="form-control" required value="{{ old('UID') }}">
                </div>

                <div class="form-group">
                    <label for="forum_id"> Foren-ID:</label>
                    <input name="forum_id" placeholder="Foren-ID" class="form-control" required value="{{old('forum_id')}}">
                </div>

                <div class="form-group">
                    <label for="role_id"> Rang: </label>
                    <select name="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success">Einstellen</button>
                </div>





            </form>
        </div>

    </div>



@endsection
