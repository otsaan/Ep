@extends('master')

@section('topScript')
{{ HTML::style('css/semantic/semantic.min.css') }}
{{ HTML::script('js/Chart.min.js') }}
@stop

@section('feed')
    @include('flash::message')

    <div>
        <h3>Nombre d'utilisateurs: {{ User::count() }} &nbsp;&nbsp;|&nbsp;&nbsp; Nombre de professeurs: {{ Professor::count() }}</h3>
        <h3>Nombre d'étudiants: {{ Student::count() }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp; Nombre de lauréats: {{ Graduate::count() }}</h3>
        <?php 
            $barChartData = json_encode(Functs::plotLastWeek());
            $lineChartData = json_encode(Functs::plotLastYear());
            $usrChartData = json_encode(Functs::plotNewUsers());
        ?>
        <h2>Posts de la dernière semaine</h2>
        <canvas id="myChart" width="400" height="400"></canvas>
        
        <h2>Posts par mois</h2>
        <canvas id="yrChart" width="400" height="400"></canvas>
        
        <h2>Nouveaux utilisateurs</h2>
        <canvas id="usersChart" width="400" height="400"></canvas>

    </div>
@stop

@section('bottom-script')

<script type="text/javascript">

        var ctx = document.getElementById("myChart").getContext("2d");
        var myArray = <?php echo $barChartData; ?>; 
        var myNewChart = new Chart(ctx).Bar(myArray);
        
        var yrctx = document.getElementById("yrChart").getContext("2d");
        var myLine = <?php echo $lineChartData; ?>; 
        var myNewChart = new Chart(yrctx).Line(myLine);

        var usrctx = document.getElementById("usersChart").getContext("2d");
        var myLine = <?php echo $usrChartData; ?>; 
        var myNewChart = new Chart(usrctx).Line(myLine);
    </script>

    {{ HTML::script('js/semantic.min.js') }}
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js') }}
{{ HTML::script('js/channels.js') }}
@stop

@section('right')
    @include('components.adminbar')
@stop
