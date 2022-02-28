<html lang="en">
    <head>
    </head>
    <body> 
        <a href='/'>Home</a> | 
        <!-- Links appear only when not authenticated. -->
        @guest 
            <a href='/home/login'>Login</a> |
            <a href='/home/register'>Register</a>
        
        @endguest
        <!-- Links appear only when authenticated. -->
        @auth 

         
    
            [{{Auth::user()->firstName}}]

        
            @if(Auth::user()->isInRole(['admin']))
            <a href='/home/adminArea'>Admin Area</a> |
            @endif 
            <a href='/home/staffArea'>Staff Area</a>
            <a href='/home/secureArea'>Secure Area</a>
            <a href='/home/profile'>Profile</a>
            <a href='/home/logout'>Logout</a>
           
        @endauth
        @yield('content')
        <!-- Show flash messages -->
        @include('flash-message')
    </body>
</html>