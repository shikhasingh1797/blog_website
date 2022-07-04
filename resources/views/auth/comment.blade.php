


<div>
<section class="row new-post">
<body style='background-color:pink'>
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Enter your comment here?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="title" id="new-post" rows="5" placeholder="Your Title"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
</div>