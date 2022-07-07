
<div>
<section class="row new-post">
<body style='background-color:pink'>
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Enter your comment here?</h3></header>
            <form action="/post-comment/{{$id}}" method="post">
                <input type="hidden" value="{{ $id }}" name="post_id">
                <div class="form-group">
                    <textarea class="form-control" name="title" id="new-post" rows="5" placeholder="Your Comment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comment</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
</div>





<html> 
<style>
h2 {text-align: center;}
</style>   
    <body>  
    <body style='background-color:pink'>
        <h2>Comment List</h2>
        <table width = "100%" border = "1" cellspacing = "1" cellpadding = "1">    
            <tr>     
                <td>Id</td>    
                <td>Comment</td>    
                
            </tr>   
            @foreach($allComments as $comment)
            <tr> 
                <!-- if($comment=post_id)  -->
            
                <td>{{$comment->id}}</td>
                <td>{{$comment->comment}}</td>    
                
            </tr>      
        @endforeach



        </table>    
    </body>    
</html>    