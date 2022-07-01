
<html> 
<style>
h2 {text-align: center;}
</style>   
    <body>    
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
            <tr>    
                <td>{{$post->id}}</td>    
                <td>{{$post->title}}</td>    
                <td>Created_at</td>    
                <td>Updated_at</td>    
                <td>Body</td>    
                <td>User_id</td>    
                <td colspan = "2">Action</td>  
            </tr>      
        @endforeach

        </table>    
    </body>    
</html>    