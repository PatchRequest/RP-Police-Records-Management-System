@extends('layout')

@section('content')

    @foreach($newses as $news)


        <div class="card">
            <div class="card-header">
                News von {{ $news->creator->username }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    {{ $news->text }}
                </blockquote>






                <form action="/news/{{ $news->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> delete</button>
                </form>

                <a href="/news/{{ $news->id }}">  <button class="btn btn-primary"> Bearbeiten</button></a>


            </div>

        </div>

    @endforeach

@endsection
