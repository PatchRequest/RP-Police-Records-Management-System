@extends('layout')


@section('content')
    <!-- tools box -->
    <div class="pull-right box-tools">
        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
            <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                title="Remove">
            <i class="fa fa-times"></i></button>
    </div>

    <form method="POST" action="/news/{{ $news->id }}">
        @csrf
        @method('PATCH')

        <div class="box">
            @csrf
            <div class="box-header"><h3>Bearbeite die News:</h3></div>
            <div class="box-body pad">

                <div>

                    <textarea name="text" class="textarea" placeholder="Inhalt der News"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $news->text }}</textarea>


                    <br>
                </div>

            </div>
            <div class="box-footer">

                <button type="submit" class="btn btn-success">Aktualisieren</button>
            </div>





        </div>



    </form>

@endsection
