@extends('layout')

@section('content')
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
            <label for="rank_id"> Rang: </label>
            <select name="rank_id" class="form-control">
                @foreach($ranks as $rank)
                    <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Erstellen</button>
        </div>





    </form>

@endsection
