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

    $('#vmap').vectorMap({
        backgroundColor: '#fff',
        color: '#ffffff',
        hoverOpacity: 0.9,
        borderColor: '#fff',
        selectedColor: '#666666',
        regionsSelectable: true,
        enableZoom: false,
        showTooltip: true,
        onLabelShow: function (event, label, code) {
            label[0].innerHTML = label[0].innerHTML + " - The state where I live!!";
        }
    });

    function storeVisitor() {
        if ($('#store-visitor').length) {
            var options = {
                chart: {
                    type: 'bar',
                    fontFamily: "Inter",
                    offsetX: -15,
                    height: 170,
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: 'Visitors',
                    data: [9176, 4185, 8101, 5198, 4187, 7105, 4191]
                }],
                colors: ['#969696'],
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '20%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 5,
                    colors: ['transparent']
                },
                xaxis: {
                    show: false,
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July'],
                },
                legend: {
                    show: false
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#store-visitor"),
                options
            );

            chart.render();
        }
    }

    storeVisitor();

    function activeUsers() {
        if ($('#active-users').length) {
            var options = {
                series: [{
                    data: [142, 153, 175, 180, 121, 156, 173, 151, 182, 142, 153, 175, 180, 121, 156, 173, 151, 182, 142, 153, 175, 180, 121, 156, 173, 151, 182]
                }],
                chart: {
                    type: 'area',
                    height: 100,
                    sparkline: {
                        enabled: true
                    },
                },
                stroke: {
                    curve: 'straight',
                },
                fill: {
                    opacity: 0.3
                },
                colors: [colors.info],
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
                xaxis: {
                    crosshairs: {
                        width: 1
                    },
                },
                yaxis: {
                    min: 0
                }
            }

            var chart = new ApexCharts(document.querySelector("#active-users"), options);
            chart.render();
        }
    }

    activeUsers();

    function trafficChannel() {
        if ($('#traffic-channel').length) {
            var options = {
                series: [2.742, 1.242, 1.742, 1.442],
                chart: {
                    type: 'donut',
                    width: 200,
                    height: 200,
                    sparkline: {
                        enabled: true
                    }
                },
                labels: ['Social Media', 'Organic Search', 'Email', 'Referrals'],
                colors: [colors.success, colors.secondary, colors.info, colors.warning],
                stroke: {
                    width: 0
                },
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                }
            };

            var chart = new ApexCharts(document.querySelector("#traffic-channel"), options);
            chart.render();
        }
    }

    trafficChannel();

});
