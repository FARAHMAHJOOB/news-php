$(function (e) {
	'use strict';
	var ctx = document.getElementById("sales-chart");
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنج شنبه", "جمعه"],
			defaultFontFamily: 'iransans',
			datasets: [{
				label: "بازدید صفحه",
				data: [10235, 12325, 12326, 15632, 14325, 10324, 14215],
				backgroundColor: '#00c3ed',
				borderColor: '#00c3ed',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: '#00c3ed',
				pointBackgroundColor: '#00c3ed',
			}, {
				label: "بازدید",
				data: [15326, 16325, 14256, 17852, 14256, 12364, 14587],
				backgroundColor: '#ffa21d',
				borderColor: '#ffa21d',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: '#ffa21d',
				pointBackgroundColor: '#ffa21d',
			}, {
				label: "کاربر",
				data: [5326, 7325, 9256, 7852, 8256, 9364, 7587],
				backgroundColor: '#0b1e70',
				borderColor: '#0b1e70',
				borderWidth: 3,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: '#0b1e70',
				pointBackgroundColor: '#0b1e70',
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				titleFontFamily: 'iransans',
				bodyFontFamily: 'iransans',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: false,
				labels: {
					usePointStyle: true,
					fontFamily: 'iransans',
				},
			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					},
					scaleLabel: {
						display: false,
						labelString: ''
					}
				}],
				yAxes: [{
					display: true,
					gridLines: {
						display: false,
						drawBorder: true
					},
					scaleLabel: {
						display: true,
						labelString: 'کاربران'
					}
				}]
			},
			title: {
				display: false,
				text: 'Normal Legend'
			}
		}
	});
	//Team chart
	var ctx = document.getElementById("team-chart");
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["1394", "1395", "1396", "1397", "1398", "1399", "1400"],
			type: 'line',
			defaultFontFamily: 'iransans',
			datasets: [{
				data: [10235, 12325, 12326, 15632, 14325, 10324, 14215],
				label: "بازدید",
				backgroundColor: 'rgba(255,162,29, 0.7)',
				borderColor: '#ffa21d',
				borderWidth: 3.5,
				pointStyle: 'circle',
				pointRadius: 5,
				pointBorderColor: 'transparent',
				pointBackgroundColor: '#ffa21d',
			}, ]
		},
		options: {
			responsive: true,
			maintainAspectRatio: false,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#000',
				bodyFontColor: '#000',
				backgroundColor: '#fff',
				titleFontFamily: 'iransans',
				bodyFontFamily: 'iransans',
				cornerRadius: 3,
				intersect: false,
			},
			legend: {
				display: false,
				position: 'top',
				labels: {
					usePointStyle: true,
					fontFamily: 'iransans',
				},
			},
			scales: {
				xAxes: [{
					display: true,
					gridLines: {
						color: 'rgba(0,0,0,0.061)'
					},
					scaleLabel: {
						display: false,
						labelString: 'ماه'
					}
				}],
				yAxes: [{
					display: true,
					gridLines: {
						display: false,
						drawBorder: false
					},
					scaleLabel: {
						display: true,
						labelString: 'بازدید'
					}
				}]
			},
			title: {
				display: false,
			}
		}
	});
});