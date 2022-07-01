<head>
<style>
    

.loginFrm {
  display: flex;
  justify-content: center;
  height: 100vh;
}
.form {
  background-color: pink;
  width: 400px;
  height: 300px;
  border-radius: 8px;
  padding: 20px 40px;
}
.inputContainer {
  position: relative;
  height: 30px;
  width: 90%;
  margin-bottom: 35px;
}
.input {
  position: absolute;
  top: 0px;
  left: 0px;
  height: 100%;
  width: 100%;
  border: 1px solid #DADCE0;
  border-radius: 7px;
  outline: none;
}
.submit {
  display: block;
  padding: 5px 5px;
  border: none;
  background-color: purple;
  color: white;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
}
.input:focus {
  border: 2px solid purple;
}

.title {
  font-size: 50px;
  margin-bottom: 50px;
}
input[type=submit]:hover {
  background-color: #45a049;
  padding: 10px 20px;
  
}
</style>
</head>
<body style="background-color:powderblue;">
<div class="loginFrm">
    <form action="{{route('login-user')}}" method="post" class="form">
        @csrf
      <h1 class="title">Sign in</h1>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="name" name="name" value="{{old('name')}}">
        <label for="" class="label">Name</label>
        <h6 class="" style="color:blue">
            @if($errors->has('name'))
                {{ $errors->first('name')}} 
            @endif
      </div>
      <div class="inputContainer">
        <input type="text" class="input" placeholder="password" name="password">
        <label for="" class="label">Password</label>
        <h6 class="" style="color:blue">
        @if($errors->has('password'))
            {{ $errors->first('password')}} 
        @endif
      </div>

      <input type="submit" class="submit" value="Login">
    </form>
  </div>