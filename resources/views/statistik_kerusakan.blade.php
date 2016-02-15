@extends('layouts.header')


@section('content')
	<ul class="nav nav-tabs">
	  <li role="presentation"><a href="{{ url('statistik') }}">Statistik Alat</a></li>
	  <li role="presentation" class="active"><a href="{{ url('statistik/kerusakan') }}">Statistik Kerusakan</a></li>
	  <li role="presentation"><a href="{{ url('statistik/user/select') }}">Statistik Pengguna</a></li>
	</ul>

	<div class="page-header">
	    <h1>Statistik Kerusakan</h1>
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
	        text: 'Statistik kerusakan alat secara keseluruhan'
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
	        data: <?php echo $statistik_all; ?>
	    }]
	});
	</script>
@endsection