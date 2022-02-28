@extends('layouts.app')
@section('content')
<form method="post" action="/home/submitLogin">
    @csrf
    <div>
     <label>Username</label>
     <input type="text" name="name">
    </div>
     <div>
     <label>Password: </label>
     <input type="password" name="password">
    </div>

    <div class="text-center">
    <button type="submit">Login</button>
    </div>

     <p>Don't have an Account?<a href="/home/register"> Sign Up</a></p>
</form>
@endsection