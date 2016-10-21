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

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{APPDIR}}">{{APPNAM.' '.APPVER}}</a>
                </div>
                <!-- /.navbar-header -->

                @include('layout.Partials.menu_horizontal_top')
                
                @include('layout.Partials.menu_vertical')

            </nav>
            
            @yield('content')

        </div>
        <!-- /#wrapper -->

        @include('layout.Common.scripts')


    </body>

</html>