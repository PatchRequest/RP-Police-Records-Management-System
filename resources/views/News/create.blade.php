@extends('layout')

@section('content')
    <form method="POST" action="/news">

    <div class="box">
        @csrf
        <div class="box-header"><h3>Erstelle eine Neuigkeit:</h3></div>
        <div class="box-body pad">

            <div>

                <textarea  name="text" placeholder="Username" class="form-control" required > </textarea>
            </div>

        </div>
        <div class="box-footer">

            <button type="submit" class="btn btn-success">Erstellen</button>
        </div>





    </div>




    </form>

@endsection
