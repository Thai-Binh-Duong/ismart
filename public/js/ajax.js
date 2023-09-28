$(document).ready(function(){
    $('.num-order').change(function(){
        var id = $(this).attr('data-id');
        var num_order= $(this).val();
        var product_price =  $(this).attr('data-product-price');
        var data = {id: id,num_order: num_order,product_price,product_price};
        
        $.ajax({
            url: '?mod=cart&action=update_ajax',//trang xu ly
            method: 'POST',//POST hoa GET
            data: data ,//Du lieu truyen den server
            dataType: 'json',//html,script,text hoac json
            success: function(data ){
                console.log( data );
                $(".sub_total_price_"+id).text(data.sub_total_price);
                $(".total-price-order").text(data.total_price);
                $(".quantity"+id).text(data.num_order);
            },
            error:function(xhr, ajaxOptions,thrownError){
                alert(xhr.status);
                alert(thrownError);
            }
        })
    });
    
});