@extends('layouts.header')


@section('content')
	<div class="page-header">
	    <h1>Statistik</h1>
	</div>

	<div id="pie-chart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
@endsection

@section('script')
	<script>
	$('#pie-chart').highcharts({	
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Statistik peminjaman alat secara keseluruhan'
	    },
	    tooltip: {
	        pointFormat: '<b>{point.percentage:.1f}%</b>'
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            showInLegend: true,
	            dataLabels: {
	                enabled: true,
	                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	                style: {
	                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                }
	            }
	        }
	    },
	    series: [{
	        name: '',
	        colorByPoint: true,
	        data: [{
	            name: 'Kentang',
	            y: 100,
	        }, {
	            name: 'Wortel',
	            y: 24.03,
	        }, {
	            name: 'Tomat',
	            y: 10.38
	        }, {
	            name: 'Brokoli',
	            y: 4.77
	        }, {
	            name: 'Alpukat',
	            y: 0.91
	        }, {
	            name: 'Mangga',
	            y: 0.2
	        }]
	    }]
	});
	</script>
@endsection