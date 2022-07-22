$(function () {
	'use strict';
	// Message
	$("#but1").on("click", function (e) {
		var message = $("#message").val();
		if (message == "") {
			message = "پیام شما";
		}
		swal(message);
	});
	// With message and title
	$("#but2").on("click", function (e) {
		var message = $("#message").val();
		var title = $("#title").val();
		if (message == "") {
			message = "پیام شما";
		}
		if (title == "") {
			title = "عنوان پیام شما";
		}
		swal(title, message);
	});
	// Show image
	$("#but3").on("click", function (e) {
		var message = $("#message").val();
		var title = $("#title").val();
		if (message == "") {
			message = "پیام شما";
		}
		if (title == "") {
			title = "عنوان پیام شما";
		}
		swal({
			title: title,
			text: message,
			imageUrl: '../../assets/img/faces/male/10.jpg'
		});
	});
	// Timer
	$("#but4").on("click", function (e) {
		var message = $("#message").val();
		var title = $("#title").val();
		if (message == "") {
			message = "پیام شما";
		}
		if (title == "") {
			title = "عنوان پیام شما";
		}
		message += "(بعد از 2 ثانیه بسته خواهد شد)";
		swal({
			title: title,
			text: message,
			timer: 2000,
			showConfirmButton: false
		});
	});
	//
	$("#click").on("click", function (e) {
		var type = $("#type").val();
		swal({
			title: "عنوان",
			text: "پیام شما",
			type: type
		});
	});
	// Prompt
	$("#prompt").on("click", function (e) {
		swal({
			title: "افزودن",
			text: "Enter پیام شما",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			inputPlaceholder: "پیام شما"
		}, function (inputValue) {
			if (inputValue != "") {
				swal("Input", "You have entered : " + inputValue);
			}
		});
	});
	// Confirm
	$("#confirm").on("click", function (e) {
		swal({
			title: "هشدار",
			text: "آیا واقعا می خواهید خارج شوید",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'خروج',
			cancelButtonText: 'ماندن در صفحه'
		});
	});
	$("#click").on("click", function (e) {
		swal('تبریک می گم!', 'پیام شما با موفقیت ثبت شد.', 'success');
	});
	$("#click1").on("click", function (e) {
		swal({
			title: "هشدار",
			text: "هشدار اخطار",
			type: "warning",
			showCancelButton: true,
			confirmButtonText: 'خروج',
			cancelButtonText: 'ماندن در صفحه'
		});
	});
	$("#click2").on("click", function (e) {
		swal({
			title: "هشدار",
			text: "هشدار خطر",
			type: "error",
			showCancelButton: true,
			confirmButtonText: 'خروج',
			cancelButtonText: 'ماندن در صفحه'
		});
	});
	$("#click3").on("click", function (e) {
		swal({
			title: "آیا مطمئن هستید؟",
			text: "بعد از حذف شما قادر به بازگردانی این پرونده نخواهید بود!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "بله حذف شود!",
			closeOnConfirm: false
		}, function () {
			swal("حذف شد!", "پیام شما با موفقیت حذف شد.", "success");
		});
	});
	$("#click4").on("click", function (e) {
		swal({
			title: "آیا مطمئن هستید؟",
			text: "بعد از حذف شما قادر به بازگردانی این پرونده نخواهید بود!",
			type: "warning",
			showCancelButton: true,
			confirmButtonClass: "btn-danger",
			confirmButtonText: "بله، حذف شود!",
			cancelButtonText: "نه، لغو شود!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function (isConfirm) {
			if (isConfirm) {
				swal("حذف شد!", "پیام شما با موفقیت حذف شد.", "success");
			} else {
				swal("لغو شد", "عملیات لغو شد)", "error");
			}
		});
	});
	$("#click5").on("click", function (e) {
		swal({
			title: "هشدار!",
			text: "عکس دلخواه شما",
			imageUrl: '../../assets/img/faces/male/10.jpg'
		});
	});
	$("#click7").on("click", function (e) {
		swal({
			type: 'error',
			title: 'اوپس ...',
			text: 'خطایی رخ داده است!',
			footer: '<a href>Why do I have this issue?</a>'
		})
	});
	$("#click8").on("click", function (e) {
		swal({
			title: '<strong>مثال <u>HTML</u></strong>',
			type: 'info',
			html: 'You can use <b>bold text</b>, ' + '<a href="">links</a> ' + 'and other HTML tags',
			showCloseButton: true,
			showCancelButton: true,
			focusConfirm: false,
			confirmButtonText: ' عالی!',
			confirmButtonAriaLabel: 'Thumbs up, great!',
			cancelButtonText: '',
			cancelButtonAriaLabel: 'Thumbs down',
		})
	});
	$("#click9").on("click", function (e) {
		swal({
			title: 'هشدار',
			text: 'مدال با تصویر دلخواه شما',
			imageUrl: '../../assets/img/faces/male/10.jpg',
			imageWidth: 400,
			imageHeight: 200,
			imageAlt: 'Custom image',
			animation: false
		})
	});
	$("#click10").on("click", function (e) {
		let timerInterval
		swal({
			title: 'هشدار با قابلیت بسته شدن خودکار!',
			html: 'I will close in <strong></strong> seconds.',
			timer: 2000,
			onOpen: () => {
				swal.showLoading()
				timerInterval = setInterval(() => {
					swal.getContent().querySelector('strong').textContent = swal.getTimerLeft()
				}, 100)
			},
			onClose: () => {
				clearInterval(timerInterval)
			}
		})
	});
});