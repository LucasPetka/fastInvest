$(document).ready(function(){

    //Page counter for in transactions
    var page_counter_in = 1;
    $( "#page_in" ).html(page_counter_in);

    $( "#up_in" ).click(function() {
        if( $('#in_'+(page_counter_in+1) ).length ){ 
            page_counter_in++;
            $("div[id^='in_']").hide();
            $( "#page_in" ).html(page_counter_in);
            $( "#in_"+page_counter_in  ).show();
        }
    });

    $( "#down_in" ).click(function() {
        if( $('#in_'+(page_counter_in-1) ).length ){ 
            page_counter_in--;
            $("div[id^='in_']").hide();
            $( "#page_in" ).html(page_counter_in);
            $( "#in_"+page_counter_in  ).show();
        }
    });


    //Page counter for out transactions
    var page_counter_out = 1;
    $( "#page_out" ).html(page_counter_out);

    $( "#up_out" ).click(function() {
        if( $('#out_'+(page_counter_out+1) ).length ){
            page_counter_out++;
            $("div[id^='out']").hide();
            $( "#page_out" ).html(page_counter_out);
            $( "#out_"+page_counter_out  ).show();
        }
    });

    $( "#down_out" ).click(function() {
        if( $('#out_'+(page_counter_out-1) ).length ){
            page_counter_out--;
            $("div[id^='out_']").hide();
            $( "#page_out" ).html(page_counter_out);
            $( "#out_"+page_counter_out  ).show();
        }
    });


    //Page counter for transactions list
    var page_counter_out = 1;
    $( "#page_list" ).html(page_counter_out);

    $( "#up_list" ).click(function() {
        if( $('#list_'+(page_counter_out+1) ).length ){
            page_counter_out++;
            $("div[id^='list_']").hide();
            $( "#page_list" ).html(page_counter_out);
            $( "#list_"+page_counter_out  ).show();
        }
    });

    $( "#down_list" ).click(function() {
        if( $('#list_'+(page_counter_out-1) ).length ){
            page_counter_out--;
            $("div[id^='list_']").hide();
            $( "#page_list" ).html(page_counter_out);
            $( "#list_"+page_counter_out  ).show();
        }
    });

});