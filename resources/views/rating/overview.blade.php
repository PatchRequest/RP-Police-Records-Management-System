@extends('layout')

@section('content')


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">An</th>
            <th scope="col">Von</th>
            <th scope="col">Punkte</th>
            <th scope="col">Bestätigt</th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>
        @foreach($ratings as $rating)

            <tr>
                <th scope="row">{{$rating->id}}</th>
                <td>{{ $rating->receiver->username }}</td>
                <td>{{ $rating->giver->username }}</td>
                <td>{{ $rating->points_alg }}</td>
                <td>{{   ($rating->confirmed) ? 'Ja' : 'Nein' }}</td>
                <td>
                    <form action="/rating/{{$rating->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"> Löschen</button>
                    </form>
                </td>
            </tr>

        @endforeach



        </tbody>
    </table>


@endsection
