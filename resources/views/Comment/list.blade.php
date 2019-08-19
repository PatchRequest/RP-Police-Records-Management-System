<div>



@can('create comments')
    <br>
        <hr>
        <div class="box box-solid box-primary">

            <div class="box-header">
                <h4 class="box-title">Neues Kommentar erstellen:</h4>
            </div>




            <div class="box-body">
                <form method="POST" action="/comment">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                    <div class="form-group">
                    <input type="text" name="title" placeholder="Titel" class="form-control" required> <br>
                        <textarea name="content" class="textarea" placeholder="Inhalt des Kommentar"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                    </div>


                    <div class="form-group">
                        <label for="karma"> Karma: </label>
                        <select name="karma" class="form-control">
                            <option value="negativ">negativ</option>
                            <option value="neutral" selected>neutral</option>
                            <option value="positiv">positiv</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Erstellen</button>
                    </div>

                </form>
            </div>
        </div>
    @endcan

<br>
@can("view comments")
    <h1> Comments:</h1>
        <hr>
    @foreach($comments as $comment)

            @switch($comment->karma)
                @case('negativ')
                <div class="box box-solid box-danger" >
                @break

                @case('neutral')
                <div class="box box-solid box-info" >
                @break

                 @case('positiv')
                    <div class="box box-solid box-success" >
            @endswitch
            <div class="box-header">
                <div class="box-title">
                    Von {{ $comment->creator->username }}
                </div>
            </div>

            <div class="box-body">
                <h2 >{{ $comment->title }}</h2>
                <p class="card-text">{!!   $comment->content !!}</p>
            </div>
                        <div class="box-footer">
                            Erstellt am : {{ $comment->created_at->format('d.m.Y') }}
                        </div>

        </div>

    @endforeach
    {{ $comments->links() }}
@endcan
</div>
