<!DOCTYPE html>
<html>
    <head>
        @include('components.head')
    </head>

    <body class="skin-black">

        <!-- header logo: style can be found in header.less -->
        <header class="header">

            <a href="index.html" class="logo">
                <img src="img/small_logo.png">
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">

                <div class="navbar-right">
                    @include('components.navbar')
                </div>

            </nav>

        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                @include('components.sidebar')
                <!-- /.sidebar -->
            </aside>


            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>Home<small>Posts</small></h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('components.content')
                </section><!-- /.content -->

            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
        {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}
        {{ HTML::script('//code.jquery.com/ui/1.11.1/jquery-ui.min.js') }}
        <!-- datepicker -->
        {{ HTML::script('js/plugins/datepicker/bootstrap-datepicker.js') }}

        <!-- App js -->
        {{ HTML::script('js/app.js') }}
    </body>
</html>
