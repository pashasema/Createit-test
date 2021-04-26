// Add your JS customizations here

//initialize datepicker
$('.table-inner__date').datepicker({
	orientation: "bottom left",
	clearBtn: true,
	autoclose: true,
	todayHighlight: true,
	format: "dd/mm/yyyy"
})

//update results by all fields
$('.table-inner__form-control--time').change(function () {

	var dateformat = /(\d{2})\/(\d{2})\/(\d{4})/;

	var start = $('.table-inner__form-control--start').val();
	start = start.replace(dateformat,'$3$2$1');

	var end = $('.table-inner__form-control--end').val();
	end = end.replace(dateformat,'$3$2$1');

	var name = $('.nav-tabs .nav-link.active').data('id');
	var search = $('.table-inner__form-search input').val();

	var data = {
		"action": "updatedate",
		"id": name,
		"start": start,
		"end": end,
		"search": search,
	}

	$.ajax({
		type: "POST",
		url: "/wp-admin/admin-ajax.php",
		data: data
	}).done(function (result) {
		$('.table-inner__content').empty();
		$('.table-inner__content').append(result);
		updPagination(name,start,end,search);
	});
})

//check/uncheck all checkboxes
function checkAll(e){
	var selectedVal = "";
	var selected = $('.table-list__head-row .table-list__checkbox:checked');
	if (selected.length > 0) {
		$('.table-list__th--checkbox .table-list__checkbox').prop('checked',true);
	}
	else{
		$('.table-list__th--checkbox .table-list__checkbox').prop('checked',false);
	}
}

//print all data in #divName
function printDiv(divName) {
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = '<table><tbody class="table-list__body" id="print-">'+ printContents + '</tbody></table>';
	window.print();
	document.body.innerHTML = originalContents;
}

//tab changer
$('.nav-tabs .nav-link').on('click', function(){
	$('.nav-tabs .nav-link').removeClass('active');
	$(this).addClass('active');
	$('.table-inner__form-control--time').trigger("change");
})


//search changed
$('.table-inner__form-search input').on('input', function(){
	$('.table-inner__form-control--time').trigger("change");
})

//update pagination
function updPagination(name,start,end,search){
	var data = {
		"action": "updatepage",
		"id": name,
		"start": start,
		"end": end,
		"search": search,
	}

	$.ajax({
		type: "POST",
		url: "/wp-admin/admin-ajax.php",
		data: data
	}).done(function (result) {
		$('.pagination-wrap').empty();
		$('.pagination-wrap').append(result);
	});
}

//change page
function changePage(data){
	if(data=='end'){
		var countOfPosts = $('.pagination .page-item:nth-last-child(2) .page-link').data('id');
	}
	else if(data=='start'){
		var countOfPosts = $('.pagination .page-item:nth-child(2) .page-link').data('id');
	}
	else{
		var countOfPosts = data;
	}

	$('.pagination .page-item').removeClass('active');
	$('.pagination .page-link[data-id='+ countOfPosts + ']').parent().addClass('active');

	var activepage =$('.pagination .page-link[data-id='+ countOfPosts + ']').text();
	$('.pagination__numb span').text(activepage);

	var dateformat = /(\d{2})\/(\d{2})\/(\d{4})/;

	var start = $('.table-inner__form-control--start').val();
	start = start.replace(dateformat,'$3$2$1');

	var end = $('.table-inner__form-control--end').val();
	end = end.replace(dateformat,'$3$2$1');

	var name = $('.nav-tabs .nav-link.active').data('id');
	var search = $('.table-inner__form-search input').val();

	var data = {
		"action": "changepage",
		"id": name,
		"start": start,
		"end": end,
		"search": search,
		"countOfPosts": countOfPosts,
	}

	$.ajax({
		type: "POST",
		url: "/wp-admin/admin-ajax.php",
		data: data
	}).done(function (result) {
		$('.table-inner__content').empty();
		$('.table-inner__content').append(result);
	});
}

//mark as paid all posts which are checked
$('.table-inner__btn').on('click',function(){
	var arrposts = [];
	// $('.table-list__th--checkbox input').data('id');
	$('.table-list__th--checkbox .table-list__checkbox:checked').each(function( index ) {
		var idofpost = $('.table-list__body:nth-of-type(' + (index+1) + ') .table-list__th--checkbox input').data('id');
		arrposts.push(idofpost); 
	})
	var data = {
		"action": "markaspaid",
		"arrposts" : arrposts
	};
		console.log(data);
	$.ajax({
		type: "POST",
		url: "/wp-admin/admin-ajax.php",
		data: data
	}).done(function(result){
		$('.table-inner__form-control--time').trigger("change");
	});
})