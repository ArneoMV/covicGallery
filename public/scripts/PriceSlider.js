
$(document).ready(function() {
    // Put a comma every 3 digits
    function numberWithCommas(x) {
        if (x !== null) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    }
    $(function() {
        //slider range init set
        $( "#slider-range" ).slider({
            range: true,
            min: 100,
            max: 7000,
            values: [ 100, 7000 ],
            slide: function( event, ui ) {
                $( "#price_min" ).html(numberWithCommas(ui.values[ 0 ]) );
                $( "#price_max" ).html(numberWithCommas(ui.values[ 1 ]) );
            }
        });
    });
});

