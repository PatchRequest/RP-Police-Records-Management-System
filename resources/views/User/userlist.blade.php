@extends('layout')

@section('content')

    @foreach($users as $user)
        {{ $user->username }}
    @endforeach
    {{ $users->links() }}
@endsection
