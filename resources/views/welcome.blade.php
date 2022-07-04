
<html> 
<style>
h2 {text-align: center;}
</style>   
    <body>  
    <body style='background-color:pink'>
        <h2>Posts List</h2>
        <table width = "100%" border = "1" cellspacing = "1" cellpadding = "1">    
            <tr>    
                <td>Id</td>    
                <td>Title</td>    
                <td>Created_at</td>    
                <td>Updated_at</td>    
                <td>Body</td>    
                <td>User_id</td>    
                <td colspan = "2">Action</td>    
            </tr>   

        @foreach($allPosts as $post)
        <!-- <a href="comment">CLICK HERE</a> -->
            <tr>  
            
                <td>{{$post->id}}</td>
    
                <td>{{$post->title}}</a></td>    
                <td>{{$post->created_at}}</td>    
                <td>{{$post->updated_at}}</td>    
                <td>{{$post->body}}</td>    
                <td>{{$post->user_id}}</td>    
                <td colspan="2"><a href="comment">Action</a></td>  
            </a>
                
            </tr>      
        @endforeach

        </table>    
    </body>    
</html>    