@extends('layout')

@section('content')



    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">UID</th>
            <th scope="col">Name</th>
            <th scope="col">Rang
            <th scope="col">Punkte</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->UID }}</th>
                <td><a href="/user/{{$user->id}}"> {{ $user->username }}</a></td>
                <td>
                 @foreach( $user->role as $role)
                        @if($role->sort_order > 0)
                            <span class="label label-default"> {{ $role->name }}</span>
                        @endif
                    @endforeach
                 </td>
                    <td>{{ $user->getPoints() }}</td>
            </tr>

        @endforeach



        </tbody>
        {{ $users->links() }}
    </table>




@endsection
