@extends('layout')

@section('content')

    <form method="POST" action="/document">
        @csrf

        <div class="form-group">
            <label for="name"> Dokumenten Überschrift:</label>
            <input name="name" type="text" placeholder="Überschrift" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="url"> Dokumenten-Link:</label>
            <input name="url" type="text" placeholder="Link" class="form-control" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Absenden</button>
        </div>

    </form>





        <table class="table">
            <thead>
            <tr>

                <th scope="col">Überschrift</th>
                <th scope="col">Link</th>
                <th scope="col">Löschen</th>

            </tr>
            </thead>
            <tbody>
            @foreach($documents as $document)
            <tr>

                <td>{{ $document->name }}</td>
                <td>{{ $document->url }}</td>
                <td><form method="POSt" action="/document/{{$document->id}}"> @method('DELETE') @csrf <button class="btn btn-danger" type="submit">Löschen</button></form></td>
            </tr>
            @endforeach
            </tbody>
        </table>





@endsection
