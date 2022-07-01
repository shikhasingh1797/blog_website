<div>
    <body style="background-color:powderblue  ;">
    <h2 style="color:Maroon ;"> Welcome to dashboard</h2>
    </body>
    
    <hr>
    <table class="table">
        <thead>
            <th>Name</th>
            <th>Password</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->password}}</td>
                <td><a href="logout">Logout</a></td>
            </tr>
        </tbody>
    </table>
    </hr>
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="title" id="new-post" rows="5" placeholder="Your Title"></textarea>
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
</div>