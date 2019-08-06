@extends('layout')


@section('content')


    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Rolle</th>
            @foreach($allPermissions as $permission)
                <th scope="col">{{ $permission->name }}</th>

            @endforeach

        </tr>
        </thead>
        <tbody>
        @foreach($allRoles as $role)
            <tr>
                <th scope="row">{{ $role->name }}</th>


            </tr>
        @endforeach





        </tbody>
    </table>



@endsection
