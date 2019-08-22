@extends('layout')

@section('content')

    <div class="box">
        <div class="box-body">
            @if($rating->confirmed == 0)
                <form method="POST" action="/rating/{{ $rating->id }}">
                    @method('PATCH')
                    @csrf

                    <div class="box-header">
                        <div class="box-title">
                            Bewertung an: {{ $rating->receiver->username }}
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="points_alg"> Punkte Allgemein: </label>
                        <select name="points_alg" class="form-control">
                            <option value="negativ">-1</option>
                            <option value="neutral" selected>0</option>
                            <option value="positiv">1</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="reason" required>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Abgeben</button>
                    </div>

                </form>
            @endif
        </div>

    </div>


@endsection
