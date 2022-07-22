! function ($) {
	"use strict";

	var VectorMap = function () {};

	VectorMap.prototype.init = function () {
			//various examples
			$('#world-map-markers').vectorMap({
				map: 'world_mill_en',
				scaleColors: ['#00c3ed', '#ffa21d'],
				normalizeFunction: 'polynomial',
				hoverOpacity: 0.7,
				hoverColor: false,
				regionStyle: {
					initial: {
						fill: '#e0e8f5'
					}
				},
				markerStyle: {
					initial: {
						r: 9,
						'fill': '#00c3ed',
						'fill-opacity': 0.7,
						'stroke': '#fff',
						'stroke-width': 9,
						'stroke-opacity': 0.2
					},

					hover: {
						'stroke': '#fff',
						'fill-opacity': 1,
						'stroke-width': 1.5
					}
				},
				backgroundColor: 'transparent',
				markers: [{
					latLng: [41.90, 12.45],
					name: 'واتیکان'
				}, {
					latLng: [43.73, 7.41],
					name: 'موناکو'
				}, {
					latLng: [-0.52, 166.93],
					name: 'نائورو'
				}, {
					latLng: [-8.51, 179.21],
					name: 'تووالو'
				}, {
					latLng: [43.93, 12.46],
					name: 'سن مارینو'
				}, {
					latLng: [47.14, 9.52],
					name: 'لیختنشتاین'
				}, {
					latLng: [7.11, 171.06],
					name: 'مارشال ایسلند'
				}, {
					latLng: [17.3, -62.73],
					name: 'سنت کیس و نویس'
				}, {
					latLng: [3.2, 73.22],
					name: 'مالدیو'
				}, {
					latLng: [35.88, 14.5],
					name: 'مالتا'
				}, {
					latLng: [12.05, -61.75],
					name: 'گریندا'
				}, {
					latLng: [13.16, -61.23],
					name: 'سنت وینسنت و گرنادین ها'
				}, {
					latLng: [13.16, -59.55],
					name: 'باربادوس'
				}, {
					latLng: [17.11, -61.85],
					name: 'آنتیگوآ و باربودا'
				}, {
					latLng: [-4.61, 55.45],
					name: 'سیشل'
				}, {
					latLng: [7.35, 134.46],
					name: 'پالائو'
				}, {
					latLng: [42.5, 1.51],
					name: 'آندورا'
				}, {
					latLng: [14.01, -60.98],
					name: 'سنت لوسیا'
				}, {
					latLng: [6.91, 158.18],
					name: 'ایالت فدرال میکرونزی'
				}, {
					latLng: [1.3, 103.8],
					name: 'سنگاپور'
				}, {
					latLng: [1.46, 173.03],
					name: 'کیریباتی'
				}, {
					latLng: [-21.13, -175.2],
					name: 'تونگا'
				}, {
					latLng: [15.3, -61.38],
					name: 'دومنیکن'
				}, {
					latLng: [-20.2, 57.5],
					name: 'موریس'
				}, {
					latLng: [26.02, 50.55],
					name: 'بحرین'
				}, {
					latLng: [0.33, 6.73],
					name: 'سائوتومه و پرنسیپ'
				}]
			});

		},
		//init
		$.VectorMap = new VectorMap, $.VectorMap.Constructor =
		VectorMap;
	$.VectorMap.init();
}(window.jQuery);