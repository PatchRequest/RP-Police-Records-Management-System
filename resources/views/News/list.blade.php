@extends('layout')

@section('content')

    @foreach($newses as $news)


        <div class="card">
            <div class="card-header">
                News von {{ $news->creator->username }}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    {!!$news->text  !!}
                </blockquote>



                <br>
                @can('manage news')
                <div class="btn-group">
                    <a href="/news/{{ $news->id }}" class="btn btn-primary">  Bearbeiten</a> 

                    <form action="/news/{{ $news->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"> delete</button>
                    </form>
                </div>
                @endcan





            </div>
            <div class="card-footer">
                <small class="text-muted">Erstellt am {{ $news->created_at }}</small>
            </div>

        </div>
        <br>
    @endforeach

    {{ $newses->links() }}

@endsection
