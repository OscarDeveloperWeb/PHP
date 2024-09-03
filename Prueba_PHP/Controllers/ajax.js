$(document).ready(function() {
    $('#Graficar').click(function() {
        var startYear = $('#inicio').val();
        var endYear = $('#final').val();
       
        $.ajax({
            url: '/PRUEBA_PHP/Controllers/consulta_controller.php',
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
                        text: 'Indice de Pobreza en Peru'
                    },
                    xAxis: {
                        categories: years,
                        title: {
                            text: 'Año'
                        }
                    },
                    yAxis: {
                        title: {
                            text: 'Indice de Pobreza'
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
            error: function(xhr, status, error) {
                console.error('Error:', xhr.responseText); 
                alert('Error al obtener los datos: ' + xhr.status + '-' + xhr.statusText);
            }
        });
    });
});




