$(document).ready(function() {


	$('#chu1').click(function(event) {
		var image = document.getElementById('hinhchinh');
		image.src = "img/product1.jpg";

		var chutren = document.getElementById('chutren');
		chutren.innerHTML = "Coca Cola";
		var chuto = document.getElementById('chuto');
		chuto.innerHTML = "Coca Cola (Made in USA)";

		var giaGiam = document.getElementById('giaGiam');
		giaGiam.innerHTML = "230.000 ₫";
		var giaGoc = document.getElementById('giaGoc');
		giaGoc.innerHTML = "250.000 ₫";

	});	

	$('#chu2').click(function(event) {
		var image = document.getElementById('hinhchinh');
		image.src = "img/beer3.jpg";

		var chutren = document.getElementById('chutren');
		chutren.innerHTML = "Bia";
		var chuto = document.getElementById('chuto');
		chuto.innerHTML = "Bia Heineiken (24 lon)";

		var giaGiam = document.getElementById('giaGiam');
		giaGiam.innerHTML = "272.000 ₫"
		var giaGoc = document.getElementById('giaGoc');
		giaGoc.innerHTML = "299.000 ₫"

	});

	$('#chu3').click(function(event) {
		var image = document.getElementById('hinhchinh');
		image.src = "img/product4.jpg";

		var chutren = document.getElementById('chutren');
		chutren.innerHTML = "Bia";
		var chuto = document.getElementById('chuto');
		chuto.innerHTML = "Bia Budweiser (24 lon)";

		var giaGiam = document.getElementById('giaGiam');
		giaGiam.innerHTML = "360.000 ₫"
		var giaGoc = document.getElementById('giaGoc');
		giaGoc.innerHTML = "399.000 ₫"

	});

	$('#chu4').click(function(event) {
		var image = document.getElementById('hinhchinh');
		image.src = "img/product7.jpg";

		var chutren = document.getElementById('chutren');
		chutren.innerHTML = "Bia";
		var chuto = document.getElementById('chuto');
		chuto.innerHTML = "Tiger Crystal (24 lon)";

		var giaGiam = document.getElementById('giaGiam');
		giaGiam.innerHTML = "380.000 ₫"
		var giaGoc = document.getElementById('giaGoc');
		giaGoc.innerHTML = "399.000 ₫"

	});
	



});