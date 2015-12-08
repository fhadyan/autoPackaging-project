$(".old-customer-radio").click(function(){
	$(".old-customer").hide();
	$(".new-customer").show();
});

$(".new-customer-radio").click(function(){
	$(".old-customer").show();
	$(".new-customer").hide();
});

$( document ).ready(function(){
    $(".old-customer").show();
	$(".new-customer").hide();
});