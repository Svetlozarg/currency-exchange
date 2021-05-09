@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">Chart Dashboard</div>
                <div class="panel-body">
                    <canvas id="canvas" height="500" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var currency = <?php echo $currency; ?>;
    var rate = <?php echo $rate; ?>;
    var barChartData = {
        labels: currency,
        datasets: [{
            label: 'Currency',
            backgroundColor: "#3b7bc8",
            data: rate
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#3b7bc8',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Exchange rate chart'
                }
            }
        });
    };
</script>
@endsection
