function errorCode(event) {
	iziToast.error({
		title: "Error",
		message: event.status + " " + event.statusText,
		position: "topRight"
	}), console.log(event)
}

function toastInfo(msg, title = "Info") {
	iziToast.info({
		title: title,
		message: msg.replace("'", ""),
		position: "topRight"
	})
}

function toastSuccess(msg, title = "Success") {
	iziToast.success({
		title: title,
		message: msg.replace("'", ""),
		position: "topRight"
	})
}

function toastWarning(msg, title = "Warning") {
	iziToast.warning({
		title: title,
		message: msg.replace("'", ""),
		position: "topRight"
	})
}

function toastError(msg, title = "Error") {
	iziToast.error({
		title: title,
		message: msg,
		position: "topRight"
	})
}

function msgSweetError(pesan, options = {
	title: "Error",
	timer: 3000
}) {
	return Swal.fire({
		icon: "error",
		html: pesan,
		title: options.title,
		timer: options.timer,
		timerProgressBar: !0
	})
}

function msgSweetSuccess(pesan, options = {
	title: "Sukses",
	timer: 3000
}) {
	return Swal.fire({
		icon: "success",
		html: pesan,
		title: options.title,
		timer: options.timer,
		timerProgressBar: !0
	})
}

function msgSweetWarning(pesan, options = {
	title: "Peringatan",
	timer: 3000
}) {
	return Swal.fire({
		icon: "warning",
		html: pesan,
		title: options.title,
		timer: options.timer,
		timerProgressBar: !0
	})
}

function msgSweetInfo(pesan, options = {
	title: "Informasi",
	timer: 3000
}) {
	return Swal.fire({
		icon: "info",
		html: pesan,
		title: options.title,
		timer: options.timer,
		timerProgressBar: !0
	})
}

function confirmSweet(pesan, options = {
	title: "Konfirmasi",
	confirmBtn: "Ya",
	cancelBtn: "Tidak"
}) {
	return Swal.fire({
		icon: "warning",
		title: options.title,
		html: pesan,
		showCancelButton: !0,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: options.confirmBtn,
		cancelButtonText: options.cancelBtn
	})
}

function isConfirmed(sweetResult) {
	return sweetResult.isConfirmed == true ? true : false
}

