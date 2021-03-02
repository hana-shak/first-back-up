$(function () {

    var colors = {
        primary: $('.colors .bg-primary').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
        secondary: $('.colors .bg-secondary').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
        info: $('.colors .bg-info').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
        success: $('.colors .bg-success').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
        danger: $('.colors .bg-danger').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
        warning: $('.colors .bg-warning').css('background-color').replace('rgb', '').replace(')', '').replace('(', '').split(','),
    };

    var rgbToHex = function (rgb) {
        var hex = Number(rgb).toString(16);
        if (hex.length < 2) {
            hex = "0" + hex;
        }
        return hex;
    };

    var fullColorHex = function (r, g, b) {
        var red = rgbToHex(r);
        var green = rgbToHex(g);
        var blue = rgbToHex(b);
        return red + green + blue;
    };

    $(window).on('load', function () {
        $('.preloader').fadeOut(300, function () {
            toastr.options = {
                timeOut: 2000,
                progressBar: true,
                showMethod: "slideDown",
                hideMethod: "slideUp",
                showDuration: 200,
                hideDuration: 400,
                positionClass: "toast-top-center",
            };
            // toastr.info('Welcome!');
        });
    });

    colors.primary = '#' + fullColorHex(colors.primary[0], colors.primary[1], colors.primary[2]);
    colors.secondary = '#' + fullColorHex(colors.secondary[0], colors.secondary[1], colors.secondary[2]);
    colors.info = '#' + fullColorHex(colors.info[0], colors.info[1], colors.info[2]);
    colors.success = '#' + fullColorHex(colors.success[0], colors.success[1], colors.success[2]);
    colors.danger = '#' + fullColorHex(colors.danger[0], colors.danger[1], colors.danger[2]);
    colors.warning = '#' + fullColorHex(colors.warning[0], colors.warning[1], colors.warning[2]);

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#dashboard-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $(document).on('click', '#dashboard-daterangepicker', function () {
        return false;
    });

    $('#dashboard-daterangepicker').daterangepicker({
        startDate: start,
        endDate: end,
        opens: $('body').hasClass('rtl') ? 'right' : 'left',
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

    function chartSpark1() {
        if ($('#chart-spark1').length) {
            var options = {
                series: [{
                    name: "Sales",
                    data: [49, 63, 25, 44, 70, 36, 99, 84]
                }],
                chart: {
                    type: 'area',
                    height: 90,
                    sparkline: {
                        enabled: true
                    },
                },
                tooltip: {
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                fill: {
                    opacity: 0.1,
                },
                yaxis: {
                    min: 0
                },
                colors: [colors.success],
                title: {
                    offsetX: 0,
                    style: {
                        fontSize: '24px',
                    }
                },
                subtitle: {
                    offsetX: 0,
                    style: {
                        fontSize: '14px',
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-spark1"), options);
            chart.render();
        }
    }

    chartSpark1();

    function chartSpark2() {
        if ($('#chart-spark2').length) {
            var options = {
                series: [{
                    name: "New Customers",
                    data: [40, 33, 70, 34, 20, 35, 20, 12]
                }],
                chart: {
                    type: 'area',
                    height: 90,
                    sparkline: {
                        enabled: true
                    },
                },
                tooltip: {
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                fill: {
                    opacity: 0.1,
                },
                yaxis: {
                    min: 0
                },
                colors: [colors.danger],
                title: {
                    offsetX: 0,
                    style: {
                        fontSize: '24px',
                    }
                },
                subtitle: {
                    offsetX: 0,
                    style: {
                        fontSize: '14px',
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-spark2"), options);
            chart.render();
        }
    }

    chartSpark2();

    function chartSpark3() {
        if ($('#chart-spark3').length) {
            var options = {
                series: [{
                    name: "Total Revenue",
                    data: [20, 33, 42, 34, 20, 35, 20, 30]
                }],
                chart: {
                    type: 'area',
                    height: 90,
                    sparkline: {
                        enabled: true
                    },
                },
                tooltip: {
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                fill: {
                    opacity: 0.1,
                },
                yaxis: {
                    min: 0
                },
                colors: [colors.warning],
                title: {
                    offsetX: 0,
                    style: {
                        fontSize: '24px',
                    }
                },
                subtitle: {
                    offsetX: 0,
                    style: {
                        fontSize: '14px',
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-spark3"), options);
            chart.render();
        }
    }

    chartSpark3();

    function chartSpark4() {
        if ($('#chart-spark4').length) {
            var options = {
                series: [{
                    data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54]
                }],
                chart: {
                    type: 'line',
                    height: 90,
                    sparkline: {
                        enabled: true
                    },
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                yaxis: {
                    min: 0
                },
                colors: [colors.info],
                title: {
                    offsetX: 0,
                    style: {
                        fontSize: '24px',
                    }
                },
                subtitle: {
                    offsetX: 0,
                    style: {
                        fontSize: '14px',
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-spark4"), options);
            chart.render();
        }
    }

    chartSpark4();

    function chartSpark5() {
        if ($('#chart-spark5').length) {
            var options = {
                series: [{
                    data: [40, 51, 33, 50, 15, 25, 44, 12, 26, 30, 54]
                }],
                chart: {
                    type: 'line',
                    height: 90,
                    sparkline: {
                        enabled: true
                    },
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                yaxis: {
                    min: 0
                },
                colors: [colors.warning],
                title: {
                    offsetX: 0,
                    style: {
                        fontSize: '24px',
                    }
                },
                subtitle: {
                    offsetX: 0,
                    style: {
                        fontSize: '14px',
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-spark5"), options);
            chart.render();
        }
    }

    chartSpark5();

    function chartSpark6() {
        if ($('#chart-spark6').length) {
            var options = {
                series: [{
                    data: [40, 51, 33, 50, 15, 25, 44, 12, 26, 30, 54]
                }],
                chart: {
                    type: 'bar',
                    height: 40,
                    sparkline: {
                        enabled: true
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '30%'
                    }
                },
                stroke: {
                    width: 3,
                    curve: 'straight'
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                yaxis: {
                    min: 0
                },
                colors: [colors.info],
                title: {
                    offsetX: 0,
                    style: {
                        fontSize: '24px',
                    }
                },
                subtitle: {
                    offsetX: 0,
                    style: {
                        fontSize: '14px',
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-spark6"), options);
            chart.render();
        }
    }

    chartSpark6();

    function chartSpark7() {
        if ($('#chart-spark7').length) {
            var options = {
                series: [{
                    data: [20, 30, 41, 33, 25, 44, 12, 26, 30, 54]
                }],
                chart: {
                    type: 'bar',
                    height: 40,
                    sparkline: {
                        enabled: true
                    },
                },
                plotOptions: {
                    bar: {
                        columnWidth: '30%'
                    }
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: false
                    },
                    y: {
                        title: {
                            formatter: function (seriesName) {
                                return ''
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                },
                yaxis: {
                    min: 0
                },
                colors: [colors.success],
                title: {
                    offsetX: 0,
                    style: {
                        fontSize: '24px',
                    }
                },
                subtitle: {
                    offsetX: 0,
                    style: {
                        fontSize: '14px',
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-spark7"), options);
            chart.render();
        }
    }

    chartSpark7();

    function salesProductDetail() {
        if ($('#sales-product-detail').length) {
            var options = {
                series: [30, 40, 10, 20],
                chart: {
                    type: 'donut',
                    fontFamily: "Inter",
                    width: 280
                },
                labels: ['Electronics', 'Furniture', 'Bags & Packages', 'Accessories'],
                colors: [colors.warning, colors.success, colors.secondary, colors.info],
                track: {
                    background: "#cccccc"
                },
                dataLabels: {
                    enabled: false
                },
                grid: {
                    padding: {
                        left: 0,
                        right: 0
                    }
                },
                stroke: {
                    colors: [colors.warning, colors.success, colors.secondary, colors.info],
                },
                plotOptions: {
                    pie: {
                        expandOnClick: true,
                        donut: {
                            labels: {
                                show: true,
                                value: {
                                    formatter: function (val) {
                                        return val + '%';
                                    }
                                }
                            }
                        }
                    }
                },
                tooltip: {
                    shared: false,
                    y: {
                        formatter: function (val) {
                            return val + '%';
                        }
                    }
                },
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(document.querySelector("#sales-product-detail"), options);

            chart.render();
        }
    }

    salesProductDetail();

    function activityChart() {
        if ($('#ecommerce-activity-chart').length) {
            var options = {
                chart: {
                    type: 'bar',
                    fontFamily: "Inter",
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Online Sales',
                    data: [176, 185, 101, 198, 187, 105, 191]
                }, {
                    name: 'Offline Sales',
                    data: [144, 155, 157, 156, 161, 158, 163]
                }],
                colors: [colors.warning, colors.info],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '30%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 10,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July'],
                },
                yaxis: {
                    show: false
                },
                tooltip: {
                    shared: false,
                    y: {
                        formatter: function (val) {
                            return '$' + val;
                        }
                    }
                },
                legend: {
                    show: false
                }
            };

            if ($(window).width() > 992) {
                options.chart.height = 350;
            }

            var chart = new ApexCharts(
                document.querySelector("#ecommerce-activity-chart"),
                options
            );

            chart.render();
        }
    }

    activityChart();

});
