$(function (e) {
	'use strict';

	/*----Hightchat1-----*/
	Highcharts.chart('Highchart1', {
		chart: {
			type: 'area'
		},
		title: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		xAxis: {
			allowDecimals: false,
			labels: {
				formatter: function () {
					return this.value; // clean, unformatted number for year
				}
			}
		},
		yAxis: {
			title: {
				text: 'فروش'
			},
			labels: {
				formatter: function () {
					return this.value / 1000 + 'k';
				}
			}
		},
		tooltip: {
			pointFormat: ''
		},
		plotOptions: {
			area: {
				pointStart: 1940,
				marker: {
					enabled: false,
					symbol: 'circle',
					radius: 2,
					states: {
						hover: {
							enabled: true
						}
					}
				}
			}
		},
		series: [{
			name: 'آمریکا',
			data: [
				null, null, null, null, null, 6, 11, 32, 110, 235,
				369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
				20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
				26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
				24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
				21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
				10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
				5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
			],
			color: '#00c3ed'
		}, {
			name: 'روسیه',
			data: [null, null, null, null, null, null, null, null, null, null,
				5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
				1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
				11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
				30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
				37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
				21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
				12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
			],
			color: '#ffa21d'
		}]
	});

	/*----Hightchat2-----*/
	Highcharts.chart('Highchart2', {
		chart: {
			type: 'areaspline'
		},
		title: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		legend: {
			layout: 'vertical',
			align: 'left',
			verticalAlign: 'top',
			x: 150,
			y: 100,
			floating: true,
			borderWidth: 1,
			backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
		},
		xAxis: {
			categories: ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه'],
			plotBands: [{ // visualize the weekend
				from: 5.5,
				to: 6.5,
				color: 'rgba(68, 170, 213, .2)'
			}]
		},
		yAxis: {
			title: {
				text: 'سود'
			}
		},
		tooltip: {
			shared: true,
			valueSuffix: ' '
		},
		credits: {
			enabled: false
		},
		plotOptions: {
			areaspline: {
				fillOpacity: 0.5
			}
		},
		series: [{
			name: 'Reza',
			data: [3, 4, 3, 5, 4, 10, 12],
			color: '#ffa21d'
		}, {
			name: 'Ali',
			data: [1, 3, 4, 3, 3, 5, 4],
			color: '#00c3ed'
		}]
	});

	/*----Hightchat3-----*/
	Highcharts.chart('Highchart3', {
		chart: {
			type: 'bar'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		xAxis: {
			categories: ['Iran', 'Chin', 'Asia', 'Europe', 'Oceania'],
			title: {
				text: null
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'درآمد',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ' Million'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 80,
			floating: true,
			borderWidth: 1,
			backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
			shadow: true
		},
		credits: {
			enabled: false
		},
		series: [{
			name: '1800',
			data: [107, 31, 635, 203, 2],
			color: '#2bcbba'
		}, {
			name: '1900',
			data: [133, 156, 947, 408, 6],
			color: '#ff5c75'
		}, {
			name: '2000',
			data: [814, 841, 3714, 727, 31],
			color: '#ffa21d'
		}, {
			name: '2016',
			data: [1216, 1001, 4436, 738, 40],
			color: '#00c3ed'
		}]
	});

	/*----Hightchat4-----*/
	Highcharts.chart('Highchart4', {
		chart: {
			type: 'line'
		},
		title: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']
		},
		yAxis: {
			title: {
				text: 'درجه حرارت (°C)'
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: 'تهران',
			data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
			color: '#ffa21d'
		}, {
			name: 'توکیو',
			data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8],
			color: '#00c3ed'
		}]
	});

	/*----Hightchat5-----*/
	function getData(n) {
		var arr = [],
			i,
			x,
			a,
			b,
			c,
			spike;
		for (i = 0, x = Date.UTC(new Date().getUTCFullYear(), 0, 1) - n * 36e5; i < n; i = i + 1, x = x + 36e5) {
			if (i % 100 === 0) {
				a = 2 * Math.random();
			}
			if (i % 1000 === 0) {
				b = 2 * Math.random();
			}
			if (i % 10000 === 0) {
				c = 2 * Math.random();
			}
			if (i % 50000 === 0) {
				spike = 10;
			} else {
				spike = 0;
			}
			arr.push([
				x,
				2 * Math.sin(i / 100) + a + b + c + spike + Math.random()
			]);
		}
		return arr;
	}
	var n = 500000,
		data = getData(n);
	console.time('line');
	Highcharts.chart('Highchart5', {
		chart: {
			zoomType: 'x'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		tooltip: {
			valueDecimals: 2
		},
		xAxis: {
			type: 'datetime'
		},
		series: [{
			data: data,
			lineWidth: 0.5,
			color: '#00c3ed',
			name: ' Meghdar'
		}]
	});

	/*----Hightchat6-----*/
	Highcharts.chart('Highchart6', {
		chart: {
			zoomType: 'xy'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		xAxis: [{
			categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
			crosshair: true
		}],
		yAxis: [{ // Primary yAxis
			labels: {
				format: '{value}°C',
				style: {
					color: Highcharts.getOptions().colors[1]
				}
			},
			title: {
				text: 'درجه حرارت',
				style: {
					color: Highcharts.getOptions().colors[1]
				}
			}
		}, { // Secondary yAxis
			title: {
				text: 'بارانی',
				style: {
					color: Highcharts.getOptions().colors[0]
				}
			},
			labels: {
				format: '{value} mm',
				style: {
					color: Highcharts.getOptions().colors[0]
				}
			},
			opposite: true
		}],
		tooltip: {
			shared: true
		},
		legend: {
			layout: 'vertical',
			align: 'left',
			x: 120,
			verticalAlign: 'top',
			y: 100,
			floating: true,
			backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
		},
		series: [{
			name: 'Barani',
			type: 'column',
			yAxis: 1,
			data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
			color: '#00c3ed',
			tooltip: {
				valueSuffix: ' mm'
			}
		}, {
			name: 'Daraje',
			type: 'spline',
			data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
			color: '#ffa21d',
			tooltip: {
				valueSuffix: '°C'
			}
		}]
	});

	/*----Hightchat7-----*/
	Highcharts.chart('Highchart7', {
		chart: {
			type: 'column'
		},
		title: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		yAxis: [{
			className: 'highcharts-color-0',
			title: {
				text: 'مقدار اول'
			}
		}, {
			className: 'highcharts-color-1',
			opposite: true,
			title: {
				text: 'مقدار دوم'
			}
		}],
		plotOptions: {
			column: {
				borderRadius: 5
			}
		},
		series: [{
			data: [1, 3, 2, 4],
			color: '#ffa21d'
		}, {
			data: [324, 124, 547, 221],
			color: '#00c3ed',
			yAxis: 1
		}]
	});

	/*----Hightchat8-----*/
	Highcharts.chart('Highchart8', {
		title: {
			text: ''
		},
		exporting: {
			enabled: false
		},
		credits: {
			enabled: false
		},
		xAxis: {
			categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']
		},
		series: [{
			type: 'pie',
			allowPointSelect: true,
			keys: ['name', 'y', 'selected', 'sliced'],
			data: [
				['سیب', 99.9, false],
				['گلابی', 71.5, false],
				['پرتقال', 106.4, false],
				['آلو', 129.2, false],
				['موز', 144.0, false],
				['هلو', 176.0, false],
				['شلیل', 135.6, true, true],
				['آووکادو', 148.5, false]
			],
			colors: ['#00c3ed', ' #0b1e70 ', '#ffa21d', '#f94920', '#ed2a00', '#004ced', '#00eda1', '#ed00c3', '#6AF9C4'],
			showInLegend: true
		}]
	});
});