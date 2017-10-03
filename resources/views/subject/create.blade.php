@extends( 'app.shell' )

@section( 'title-bar' )
    <div id="title_bar" class="col-md-12">
        <h3 class="title_bar">Create a thread for {{ $subject->title }}!</h3>
    </div>
@endsection

@section( 'content' )
    <form action="{{ route( 'subject.store' ) }}" method="POST">
        {{ csrf_field() }}
        <div class="align_center post_thread">
            <input type="hidden" id="subject_id" name="subject_id" value="{{ $subject->id }}">
            <input type="hidden" id="author_id" name="author_id" value="{{ Auth::user()->id }}">
            <label for="thread_title">
                <input type="text" id="thread_title" name="thread_title">
            </label><br>
            <label for="thread_description">
                <textarea id="thread_description" name="thread_description"></textarea>
            </label><br>
            <button id="thread_post_button" class="btn btn-success">Post Thread</button>
        </div>
    </form>
@endsection
