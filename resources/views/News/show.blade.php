@extends('layout')


@section('content')

    <form method="POST" action="/news/{{ $news->id }}">
        @csrf
        @method('PATCH')

        <div class="box">
            @csrf
            <div class="box-header"><h3>Bearbeite die News:</h3></div>
            <div class="box-body pad">

                <div>

                    <textarea name="text"  class="form-control rounded-0"  rows="10">{{ $news->text }}</textarea>
                    <br>
                </div>

            </div>
            <div class="box-footer">

                <button type="submit" class="btn btn-success">Aktualisieren</button>
            </div>





        </div>



    </form>

@endsection
