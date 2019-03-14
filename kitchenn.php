
<script>
    jQuery(document).ready(function(){
        // This button will increment the value
        $('.qtyplus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        $('.qtyplus1').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus1").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        $('.qtyplus2').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $(".qtyminus2").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });

        $('#sendorder').click(function (e) {
            var coffee_without_sugar=$("#coffee-without-sugar").val();
            var coffee_with_halfsugar=$("#coffee-with-halfsugar").val();
            var coffee_with_sugar=$("#coffee-with-sugar").val();

            var tea_without_sugar=$("#tea-without-sugar").val();
            var tea_with_halfsugar=$("#tea-with-halfsugar").val();
            var tea_with_sugar=$("#tea-with-sugar").val();
            var water=$("#water").val();
            var comments=$("#comment_kitchen").val();
            $.ajax({
                type: "get",
                url: "DBS/kitchenorder.php",
                //data: 'coffee='+coffee+'&tea='+tea+'&water='+water+'&comments='+comments+"&user="+<?php echo  $_SESSION['user']['idd'] ;?>,
                data:   'coffee_without_sugar='+coffee_without_sugar+
                        '&coffee_with_halfsugar='+coffee_with_halfsugar+
                        '&coffee_with_sugar='+coffee_with_sugar+
                        '&tea_without_sugar='+tea_without_sugar+
                        '&tea_with_halfsugar='+tea_with_halfsugar+
                        '&tea_with_sugar='+tea_with_sugar+
                        '&water='+water+'&comments='+comments+"&user="+<?php echo  $_SESSION['user']['idd'] ;?>,
                success: function (dataa) {
                    notif({
                        msg:"Your Order has been sent",
                        type: "success"
                    })
                    setTimeout(
                        function()
                        {
                            window.location.href="index.php";
                        }, 2000);
                }
            });
        });
    });
</script>
<style>
    .myform {
        text-align: center;
        padding: 5px;
        margin: 2%;
    }
    .qty {
        width: 40px;
        height: 25px;
        text-align: center;
    }

    .sugar-precision {
        display:inline-block; 
        width:90px;
        text-align: left;
    }

</style>

<br/>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="kitchen-page">

                <div class="choose-request margin-botm-25">
                    <div class="panel panel-default">
                        <div class="panel-heading text-right"> Choose your Order</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="k-requet-tab"><img src="images/k-coffee-img.png"/></div>
                                    <form class='myform' method='POST' action='#'>
                                        <input type='button' value='-' class='btn btn-primary qtyminus'field='quantity-coffee-without-sugar' />
                                        <input type='text'  name='quantity-coffee-without-sugar' id="coffee-without-sugar" value='0' class='qty' />
                                        <input type='button' value='+' class='btn btn-warning qtyplus' field='quantity-coffee-without-sugar' />
                                        <span class="sugar-precision">Without sugar</span>
                                    </form>

                                    <form class='myform' method='POST' action='#'>
                                        <input type='button' value='-' class='btn btn-primary qtyminus' field='quantity-coffee-with-halfsugar' />
                                        <input type='text'  name='quantity-coffee-with-halfsugar' id="coffee-with-halfsugar" value='0' class='qty' />
                                        <input type='button' value='+' class='btn btn-warning qtyplus' field='quantity-coffee-with-halfsugar' />
                                        <span class="sugar-precision">With half sugar</span>
                                    </form>

                                    <form class='myform' method='POST' action='#'>
                                        <input type='button' value='-' class='btn btn-primary qtyminus' field='quantity-coffee-with-sugar' />
                                        <input type='text' name='quantity-coffee-with-sugar' id="coffee-with-sugar" value='0' class='qty' />
                                        <input type='button' value='+' class='btn btn-warning qtyplus' field='quantity-coffee-with-sugar' />
                                        <span class="sugar-precision">With sugar</span>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <div class="k-requet-tab"><img src="images/k-tea-img.png"/></div>
                                    <form class='myform' method='POST' action='#'>
                                        <input type='button' value='-' class='btn btn-primary qtyminus1'  field='quantity-tea-without-sugar' />
                                        <input type='text' name='quantity-tea-without-sugar' value='0' id="tea-without-sugar" class='qty' />
                                        <input type='button' value='+' class='btn btn-warning qtyplus1'  field='quantity-tea-without-sugar' />
                                        <span class="sugar-precision">Without sugar</span>
                                    </form>

                                    <form class='myform' method='POST' action='#'>
                                        <input type='button' value='-' class='btn btn-primary qtyminus1'  field='quantity-tea-with-halfsugar' />
                                        <input type='text' name='quantity-tea-with-halfsugar' value='0' id="tea-with-halfsugar" class='qty' />
                                        <input type='button' value='+' class='btn btn-warning qtyplus1'  field='quantity-tea-with-halfsugar' />
                                        <span class="sugar-precision">With half sugar</span>
                                    </form>

                                    <form class='myform' method='POST' action='#'>
                                        <input type='button' value='-' class='btn btn-primary qtyminus1'  field='quantity-tea-with-sugar' />
                                        <input type='text' name='quantity-tea-with-sugar' value='0' id="tea-with-sugar" class='qty' />
                                        <input type='button' value='+' class='btn btn-warning qtyplus1'  field='quantity-tea-with-sugar' />
                                        <span class="sugar-precision">With sugar</span>
                                    </form>
                                </div>
                                <div class="col-sm-4">
                                    <div class="k-requet-tab"><img src="images/k-water-img.png"/></div>
                                    <form class='myform' method='POST' action='#'>
                                        <input type='button' value='-' class='btn btn-primary qtyminus2'  field='quantity2' />
                                        <input type='text'  name='quantity2' value='0' id="water" class='qty' />
                                        <input type='button' value='+' class='btn btn-warning qtyplus2'  field='quantity2' />
                                    </form>
                                </div>

                            </div>
                            <br/>
                            <div class="form-group">
                                <span class="input-group-addon radius_reversed"  id="basic-addon1"  >Comments</span>
                                <textarea class="form-control" style="direction: ltr;" rows="2" id="comment_kitchen"></textarea>
                            </div>
                            <div class="input-group" style="direction: ltr;" >
                                <input  type="button" class="form-control btn btn-primary" id="sendorder"
                                        value=" Send  "    name="sendorder" style="width: 100px;" autocomplete="off" spellcheck="false" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
