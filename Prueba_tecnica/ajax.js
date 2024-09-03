$(document).ready(function() {
    $('#Graficar').click(function() {
        var startYear = $('#inicio').val();
        var endYear = $('#final').val();
        $.ajax({
            url: 'pi.php', 
            type: 'GET',
            data: {
                inicio: startYear,
                final: endYear
            },
            dataType: 'json',
            success: function(response) {
                var data = response;
                
                var years = data.map(item => item.year);
                var headcounts = data.map(item => item.headcount);

                Highcharts.chart('container', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Índice de Pobreza en Perú'
                    },
                    xAxis: {
                        categories: years,
                        title: {
                            text: 'Año'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Índice de Pobreza'
                        },
                        labels: {
                            format: '{value}'
                        }
                    },
                    series: [{
                        name: 'Headcount',
                        data: headcounts
                    }]
                });
            },
            error: function() {
                alert('Error al obtener los datos.');
            }
        });
    });
});
