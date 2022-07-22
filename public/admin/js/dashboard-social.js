$(function (e) {
	'use strict';
	var ctx = document.getElementById("Chart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["جمعه", "پنج شنبه", "چهارشنبه", "سه شنبه", "دوشنبه", "یکشنبه", "شنبه"],
			datasets: [{
				label: 'بازدید',
				data: [20, 420, 210, 354, 580, 320, 480],
				borderWidth: 2,
				backgroundColor: 'transparent',
				borderColor: '#00c3ed',
				borderWidth: 4,
				pointBackgroundColor: '#ffffff',
				pointRadius: 8
			}]
		},
		options: {
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}],
				yAxes: [{
					display: false,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					}
				}]
			},
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				intersect: false,
			},
			tooltips: {},
			hover: {
				mode: 'nearest',
				intersect: true
			}
		}
	});
	var data = [],
		totalPoints = 1000;

	function getRandomData() {
		if (data.length > 0) data = data.slice(1);
		// Do a random walk
		while (data.length < totalPoints) {
			var prev = data.length > 0 ? data[data.length - 1] : 50,
				y = prev + Math.random() * 10 - 5;
			if (y < 0) {
				y = 0;
			} else if (y > 100) {
				y = 100;
			}
			data.push(y);
		}
		var res = [];
		for (var i = 0; i < data.length; ++i) {
			res.push([i, data[i]])
		}
		return res;
	}
	var updateInterval = 30;
	$("#updateInterval").val(updateInterval).change(function () {
		var v = $(this).val();
		if (v && !isNaN(+v)) {
			updateInterval = +v;
			if (updateInterval < 1) {
				updateInterval = 1;
			} else if (updateInterval > 2000) {
				updateInterval = 2000;
			}
			$(this).val("" + updateInterval);
		}
	});
	var plot = $.plot("#placeholder02", [getRandomData()], {
		series: {
			shadowSize: 0 // Drawing is faster without shadows
		},
		colors: ["#00c3ed"],
		grid: {
			borderColor: 'transparent'
		},
		yaxis: {
			min: 0,
			max: 100,
			tickLength: 0
		},
		xaxis: {
			show: false
		}
	});

	function update() {
		plot.setData([getRandomData()]);
		plot.draw();
		setTimeout(update, updateInterval);
	}
	update();
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
		xAxis: {
			categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']
		},
		yAxis: [{
			className: 'highcharts-color-0',
			title: {
				text: 'لغو عضویت'
			}
		}, {
			className: 'highcharts-color-1',
			opposite: true,
			title: {
				text: 'عضویت'
			}
		}],
		plotOptions: {
			column: {
				borderRadius: 5
			}
		},
		series: [{
			name: 'Laghv Ozviyat',
			data: [1, 3, 2, 4, 6, 2, 5, 5],
			color: '#ffa21d'
		}, {
			name: 'Ozviyat',
			data: [324, 124, 547, 221, 335, 625, 325, 214],
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
			categories: ['jun', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		},
		series: [{
			type: 'pie',
			name: 'Page Visits',
			allowPointSelect: true,
			keys: ['name', 'y', 'selected', 'sliced'],
			data: [
				['تیر', 99.9, false],
				['خرداد', 71.5, false],
				['اردیبهشت', 106.4, false],
				['فروردین', 129.2, false],
				['آبان', 144.0, false],
				['مهر', 176.0, false],
				['شهریور', 135.6, true, true],
				['مرداد', 148.5, false]
			],
			colors: ['#00758e', ' #009cbd', '#00c3ed', '#32cff0', '#66dbf4', '#99e7f7', '#ccf3fb', '#029cbd'],
			showInLegend: true
		}]
	});
});