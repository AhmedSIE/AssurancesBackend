@extends('voyager::master')

@section('content')
    <div class="page-content">
        @include('voyager::alerts')

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

            {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"> --}}
            <script src="https://kit.fontawesome.com/d038f356df.js"></script>
            <style>
                .navbar {
                    display: initial;
                }
                .card-body.d-flex.align-items-center {
                    display: flex;
                }
                .app-container.expanded .app-footer {
                    left: auto;
                }
                .card.rounded-0.h-100.moncardlg {
                    margin-left: 1rem;
                }
                .text-center.w-100 {
                    margin-left: 1rem;
                }
            </style>
        <div class="row mt-4 ml-0">
            <div class="col-lg-8">
                <div class="card rounded-0 h-100 moncardlg">
                    <div class="card-header">Graphiques comparatifs</div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-12">
                                <canvas id="barCanvas"></canvas>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
        <div class="card  rounded-0 h-100">
            <div class="card-header">Bilan circulaire</div>
            <div class="card-body d-flex align-items-center">
            <canvas class="chart-item"></canvas>
            </div>
        </div>

            </div>
        </section>


        <div class="container-fluid my-4 main">

            <!-- JavaScript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
            <script>
                $(function () {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
            </script>
            <script>
                window.chartColors = {
                    red: 'rgb(255, 99, 132)',
                    orange: 'rgb(255, 159, 64)',
                    yellow: 'rgb(255, 205, 86)',
                    green: 'rgb(75, 192, 192)',
                    blue: 'rgb(54, 162, 235)',
                    purple: 'rgb(153, 102, 255)',
                    grey: 'rgb(201, 203, 207)'
                };

                var randomScalingFactor = function () {
                    return Math.round(Math.random() * 100);
                };

                var config = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [
                                randomScalingFactor(),
                                randomScalingFactor(),
                                randomScalingFactor(),
                                randomScalingFactor(),
                            ],
                            backgroundColor: [
                                window.chartColors.red,
                                window.chartColors.orange,
                                window.chartColors.yellow,
                                window.chartColors.green,
                            ],
                            label: 'Dataset 1'
                        }],
                        labels: [
                            "Factures",
                            "Utilisateurs",
                            "Tickets",
                            "Courriers",
                        ]
                    },
                    options: {
                        responsive: true
                    }
                };


                // bar
                var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var colors = Chart.helpers.color;
                var barChartData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [{
                        label: 'Factures',
                        backgroundColor: colors(window.chartColors.red).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.red,
                        borderWidth: 1,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    }, {
                        label: 'Utilisateurs',
                        backgroundColor: colors(window.chartColors.orange).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.orange,
                        borderWidth: 1,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    },
                    {
                        label: 'Tickets',
                        backgroundColor: colors(window.chartColors.yellow).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.yellow,
                        borderWidth: 1,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    },
                    {
                        label: 'Courriers',
                        backgroundColor: colors(window.chartColors.green).alpha(0.5).rgbString(),
                        borderColor: window.chartColors.green,
                        borderWidth: 1,
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor()
                        ]
                    }
                    ]

                };

                window.onload = function () {
                    // pie
                    document.querySelectorAll('.chart-item').forEach(function (item) {
                        config.data.datasets.forEach(function (dataset) {
                            dataset.data = dataset.data.map(function () {
                                return randomScalingFactor();
                            });
                        });
                        var ctx = item.getContext("2d");
                        window.myPie = new Chart(ctx, config);
                    })


                    // bar
                    var barCtx = document.getElementById("barCanvas").getContext("2d");
                    window.myBar = new Chart(barCtx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Etudes comparatifs'
                            }
                        }
                    });

                };
            </script>

    </div>
    </div>
@stop
