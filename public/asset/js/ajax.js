$(".add-product").click(function(){
	var id = $(".product-id").val();
	var amount = $(".amount").val();
	//alert(id+"-"+amount);
    $.get("/order/addProduct/"+id+"/"+amount, function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
        var dataArray = data.split("-");
        //alert(dataArray[0] + dataArray[1]);
        $(".product-table").append("<tr><td>"+dataArray[0] +"</td><td>"+dataArray[1]+"</td></tr>");
        $(".price").text( parseInt($(".price").text())+(dataArray[1]*amount) );
    });
});