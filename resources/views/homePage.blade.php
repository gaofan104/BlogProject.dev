<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Welcome to our Blog</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    @include('partials.nav')
    <div class="content">
        <p>{!! Auth::user() !!}</p>
        <div class="title">You have successfully log into our Blog</div>
        <a href = "/">Click here to direct to Welcome Page</a></br>
        <a href = "/logout">Click here to log out</a></br>
        <a href = "/blogPage">Click here to go to our Blog Application</a></br>
        @if (Auth::user()->type == 'admin')
        <a href = "/manageUser">Click here to manage users -- admins only </a>
        @endif
    </div>
    </div>
</body>
</html>
