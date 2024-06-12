$(function () {
    'use strict';

    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    };

    var mode = 'index';
    var intersect = true;

    var $salesChart = $('#sales-chart');
    var ctx = $salesChart[0].getContext('2d');

    var labels = ['Laki-laki', 'Perempuan']; // Label sumbu x
    var dataLaki = $salesChart.data('datalaki');
    var dataPerempuan = $salesChart.data('dataperempuan');

    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Jumlah',
                    backgroundColor: ['#007bff', '#28a745'], // Warna untuk Laki-laki dan Perempuan
                    borderColor: ['#007bff', '#28a745'],
                    borderWidth: 1,
                    data: [dataLaki, dataPerempuan] // Data jumlah Laki-laki dan Perempuan
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: true,
                        lineWidth: '4px',
                        color: 'rgba(0, 0, 0, .2)',
                        zeroLineColor: 'transparent'
                    },
                    ticks: $.extend({
                        beginAtZero: true,
                        callback: function (value) {
                            if (value >= 1000) {
                                value /= 1000;
                                value += 'k';
                            }
                            return value;
                        }
                    }, ticksStyle)
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: ticksStyle
                }]
            }
        }
    });
});
