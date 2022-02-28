@extends('layouts.app')
@section('content')
<form method="post" action="/home/profile">
     @csrf
<table>
<tr>
    <td>User Name: <b>{{$username}}</b></td>
</tr>
<tr>
     <td>First Name: <b>{{$firstName}}</b> </td>
</tr>
<tr>
     <td>Last Name: <b>{{$lastName}}</b> </td>
</tr>
<tr>
     <td>Email: <b>{{$email}}</b> </td>      
</tr>




</table>
</form>
@endsection