@extends('layout')

@section('content')

    <ul class="timeline">
    @foreach($newses as $news)
        <!-- timeline time label -->
        <li class="time-label">

        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> {{ $news->created_at->format('d.m.Y') }}</span>

                <h3 class="timeline-header"><a href="#">Erstellt von {{ $news->creator->username }}</a> </h3>

                <div class="timeline-body">
                    {!!$news->text  !!}
                </div>

                <div class="timeline-footer">
                    @can('manage news')



                            <form action="/news/{{ $news->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> löschen</button>
                                <a href="/news/{{ $news->id }}" class="btn btn-primary">  Bearbeiten</a>
                            </form>


                    @endcan
                </div>
            </div>
        </li>
        <!-- END timeline item -->

        @endforeach
    </ul>
    {{ $newses->links() }}








@endsection
