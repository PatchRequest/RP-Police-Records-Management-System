@extends('layout')


@section('content')

    <form method="POST" action="/news/{{ $news->id }}">
        @csrf
        @method('PATCH')
        <div>
            <h3> Bearbeite die News</h3>
            <textarea name="text"  class="form-control rounded-0"  rows="10">{{ $news->text }}</textarea>
            <div>

                <button type="submit">Aktualisieren</button>
            </div>
        </div>

    </form>

@endsection
