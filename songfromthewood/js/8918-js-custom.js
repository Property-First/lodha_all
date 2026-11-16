$(document).ready(function ($) {
	var swiper = new Swiper('#demo', {
		loop: true,
		effect: 'fade',
		slidesPerView: 1,
		slidesPerGroup: 1,
		autoplay: {
			delay: 4000,
		},
	});
	var telInput = $("#Mobile"),
		errorMsg = $("#error-msg"),
		validMsg = $("#valid-msg");
	telInput.intlTelInput({
		preferredCountries: ["IN", "sg"],
		initialCountry: "IN",
		utilsScript: "js/utils.js"
	});
	var reset = function () {
		telInput.removeClass("error");
		errorMsg.addClass("hide");
		validMsg.addClass("hide");
	};
	telInput.blur(function () {
		reset();
		if ($.trim(telInput.val())) {
			if (telInput.intlTelInput("isValidNumber")) {} else {
				telInput.addClass("error");
				errorMsg.removeClass("hide");
			}
		}
	});
	telInput.on("keyup change", reset);
	$("#Mobile").on('blur', function () {
		$(this).val($("#Mobile").intlTelInput("getNumber"));
		var countryData = $("#Mobile").intlTelInput("getSelectedCountryData");
		$('#CountryCode').val(countryData.dialCode);
		$('#Country').val(countryData.iso2);
	});

	var telInput = $("#Mobile-mob"),
		errorMsg = $("#error-msg"),
		validMsg = $("#valid-msg");
	telInput.intlTelInput({
		preferredCountries: ["IN", "sg"],
		initialCountry: "IN",
		utilsScript: "js/utils.js"
	});
	var reset = function () {
		telInput.removeClass("error");
		errorMsg.addClass("hide");
		validMsg.addClass("hide");
	};
	telInput.blur(function () {
		reset();
		if ($.trim(telInput.val())) {
			if (telInput.intlTelInput("isValidNumber")) {} else {
				telInput.addClass("error");
				errorMsg.removeClass("hide");
			}
		}
	});
	telInput.on("keyup change", reset);
	$("#Mobile-mob").on('blur', function () {
		$(this).val($("#Mobile-mob").intlTelInput("getNumber"));
		var countryData = $("#Mobile-mob").intlTelInput("getSelectedCountryData");
		$('#CountryCode').val(countryData.dialCode);
		$('#Country').val(countryData.iso2);
	});
	$('#primary-menu a,.scroll').click(function (e) {
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top
		}, 1000);
		$('input[name="Name"]').focus();
		e.preventDefault();
	});
});
$(window).scroll(function () {
	if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
		$('#return-to-top').fadeIn(200); // Fade in the arrow
	} else {
		$('#return-to-top').fadeOut(200); // Else fade out the arrow
	}
});
$('#return-to-top').click(function () { // When arrow is clicked
	$('body,html').animate({
		scrollTop: 0 // Scroll to top of body
	}, 500);
});
var amenities = new Swiper("#amenities", {
	// direction: 'vertical',
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	effect: 'fade',
	autoplay: true,
	loop: true,
});
var amenitiesdesktop = new Swiper("#amenitiesdesktop", {
	// direction: 'vertical',
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	effect: 'fade',
	autoplay: true,
	loop: true,
});
var specification = new Swiper("#specification", {
	// direction: 'vertical',
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	effect: 'fade',
	autoplay: true,
	loop: true,
});
var specificationdesktop = new Swiper("#specificationdesktop", {
	// direction: 'vertical',
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	effect: 'fade',
	autoplay: true,
	loop: true,
});
var gallery = new Swiper("#gallery", {
	// direction: 'vertical',
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	effect: 'fade',
	autoplay: true,
	loop: true,
});
var gallerydesktop = new Swiper("#gallerydesktop", {
	// direction: 'vertical',
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	effect: 'fade',
	autoplay: true,
	loop: true,
});
new WOW().init();

function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	}
	return true;
}