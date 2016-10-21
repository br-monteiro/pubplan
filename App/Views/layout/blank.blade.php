<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bruno Monteiro">

    <title>@yield('title') :: {{APPNAM}} {{APPVER}} ::</title>

    @include('layout.Common.styles')

</head>

<body>

    @yield('content')

    @include('layout.Common.scripts')


</body>

</html>

