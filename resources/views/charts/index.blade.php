@extends('layouts.essential')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')
    <div class="container mt-5">
        <h2>Average Upload and Download Speed in Mbps per Provider</h2>
        <canvas id="averageSpeed" class="rounded shadow"></canvas>
        <select class="custom-select mr-sm-2" name="serviceProviderName" id="serviceProviderName">
            <option selected>Select Provider</option>
            <option value="DITO">DITO</option>
            <option value="SMART">SMART</option>
            <option value="GLOBE">GLOBE</option>
            <option value="PLDT">PLDT</option>
            <option value="CONVERGE">CONVERGE</option>
        </select>
        <input type="text" name="daterange">
        <canvas id="monthSpeed" class="rounded shadow"></canvas>
        
    </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<!-- CHARTS -->
<script>
        async function getBarData(){
            var api_url='<?= url('/api/averageSpeeds'); ?>';
            const response = await fetch(api_url);
            const data = await response.json();
            var ctx = document.getElementById('averageSpeed').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'bar',
                // The data for our dataset
                data: {
                    labels: data.labels,
                    datasets: [
                        {
                            label: "Download",
                            backgroundColor: 'green',
                            data:  data.download,
                        },
                        {
                            label: 'Upload',
                            backgroundColor: 'blue' ,
                            data:  data.upload ,
                        },
                    ]
                },
        // Configuration options go here
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value) {if (value % 1 === 0) {return value;}}
                            },
                            scaleLabel: {
                                display: false
                            }
                        }]
                    },
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: '#122C4B',
                            fontFamily: "'Muli', sans-serif",
                            padding: 25,
                            boxWidth: 25,
                            fontSize: 14,
                        }
                    },
                    layout: {
                        padding: {
                            left: 10,
                            right: 10,
                            top: 0,
                            bottom: 10
                        }
                    }
                }
            });
    }
getBarData();
</script>
<script>
    const actions = [
        {
            name: "Remove Dataset",
            handler(chart) {
            chart.data.datasets.pop();
            chart.update();
            }
        }
        ];
    //lineChart(data);
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            showDropdowns: true,
            minYear: 2020,
            maxYear: 2050,
        }, function(start, end, label) {
            getLineData($('#serviceProviderName').val(),start.format('YYYY-MM-DD'),end.format('YYYY-MM-DD'));
        });
    });
    async function getLineData(serviceProvider,startDate,endDate){
        //serviceProvider, startMonth, endMonth, startYear,endYear
        //customDateSpeed/{serviceProvider},{startMonth},{endMonth},{startYear},{endYear}
        //call async function per data add
        var api_url= '<?= url('/api/customDateSpeed'); ?>' + '/' + serviceProvider + ',' + startDate + ',' + endDate;
        const response = await fetch(api_url);
        const data = await response.json();
        lineChart(data);
    }
    function lineChart(data){
        console.log(data);
        var ctx = document.getElementById('monthSpeed').getContext('2d');
        Chart.pluginService.register({
        afterDraw: function (chart) {
                        if (chart.data.datasets[0].data.length === 0) {
                            // No data is present
                            var ctx = chart.chart.ctx;
                            var width = chart.chart.width;
                            var height = chart.chart.height
                            chart.clear();

                            ctx.save();
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';
                            ctx.font = "20px normal 'Helvetica Nueue'";
                            ctx.fillText('Select Values to Display Data', width / 2, height / 2);
                            ctx.restore();
                        }

                    }
        });
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.labels,
                datasets: [
                    {
                        label: 'Download',
                        fill:'false',
                        backgroundColor: 'green',
                        borderColor:'green',
                        data:  data.download,
                    },
                    {
                        label: 'Upload',
                        fill:'false',
                        backgroundColor: 'blue' ,
                        borderColor:'blue',
                        data:  data.upload,
                    },
                ]
            },
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                }
                }
            },
        });
    }
</script>
@endsection