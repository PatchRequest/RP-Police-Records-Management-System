<div>



@can('create comments')
        <hr>
    <h4> Neues Kommentar erstellen:</h4>

    <form method="POST" action="/comment">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">

        <div class="form-group">
        <input type="text" name="title" placeholder="Titel" class="form-control"> <br>

        <textarea name="content" class="form-control"> </textarea>
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
    @endcan

<br>
@can("view comments")
        <hr>
    @foreach($comments as $comment)

        <div class="card">
            <div class="card-header">
                Von {{ $comment->creator->username }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $comment->title }}</h5>
                <p class="card-text">{{ $comment->content }}</p>
            </div>
        </div>

    @endforeach
    {{ $comments->links() }}
@endcan
</div>
