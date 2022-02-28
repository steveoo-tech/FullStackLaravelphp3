@extends('layouts.app')
@section('content')
<form method="post" action="/home/store">
     @csrf
<table>
<tr>
      <td>Role</td><td> 
      <select name="role" id="role">
      <option value="admin">admin</option>
      <option value="staff">staff</option>
      </select>
      </td>
</tr>
<tr>
     <td>Login Name</td><td><input type="text" name="name"></td>
</tr>
<tr>
     <td>FirstName</td><td><input type="text" name="firstName"></td>
</tr>
<tr>
     <td>LastName</td><td><input type="text" name="lastName"></td>
</tr>
<tr>
     <td>Email</td><td><input type="email" name="email"></td>
</tr>
<tr>
    <td>Password</td><td><input type="password" name="password"></td>
</tr>
<tr>
     <td></td><td><button type="submit">Register</button></td>
</tr>

</table>
</form>
@endsection