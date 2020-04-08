console.log('Seller portal Started');
function load_veg() {
    let choice_container = document.getElementById('choice-wrapper');
    let veg_container = document.getElementById('veg-wrapper');
    let banner = document.getElementById('top-banner');

    choice_container.style.display = 'none';
    veg_container.style.display = 'flex';
    
    banner.style.opacity = 0;
    setTimeout(function(){
    banner.innerText='Select the Vegetable you want to sell';
    banner.style.opacity = 1;
    },500);
}

function load_fruit() {
    let choice_container = document.getElementById('choice-wrapper');
    let fruit_container = document.getElementById('fruit-wrapper');
    let banner = document.getElementById('top-banner');
    choice_container.style.display = 'none';
    fruit_container.style.display = 'flex';

    banner.style.opacity = 0;
    setTimeout(function(){
    banner.innerText='Select the fruit you want to sell';
    banner.style.opacity = 1;
    },500);
}


function back(arg,arg1) {
    let choice_container = document.getElementById('choice-wrapper');
    let fruit_container = document.getElementById('fruit-wrapper');
    let veg_container = document.getElementById('veg-wrapper');
    let suggestedamount = document.getElementById('suggested-price');
    let banner = document.getElementById('top-banner');
    let item_price = document.getElementById('item_price');
    let reg_feilds = document.getElementsByClassName('reg-field');
    let ajax_msg = document.getElementById('ajax-msg');

    if (arg === 'veg' && arg1 === 'none') {
        veg_container.style.display = 'none';
        choice_container.style.display = 'flex';
    }
    else if(arg === 'fruit' && arg1 === 'none'){
        fruit_container.style.display = 'none';
        choice_container.style.display = 'flex';
    }
    else if(arg === 'fruit' && arg1 === 'item'){
        item_price.style.display = 'none';
        fruit_container.style.display = 'flex';
        for(var i=0 ; i<reg_feilds.length ;i++)
        {
            reg_feilds[i].value='';
        }
        suggestedamount.innerHTML='';
        ajax_msg.innerHTML='';
        
    }
    else if(arg === 'veg' && arg1 === 'item'){
        item_price.style.display = 'none';
        veg_container.style.display = 'flex';
        for(var i=0 ; i<reg_feilds.length ;i++)
        {
            reg_feilds[i].value='';
        }
        suggestedamount.innerHTML='';
        ajax_msg.innerHTML='';
        
    }

    banner.style.opacity = 0;
    setTimeout(function(){
    banner.innerText='What would you like to sell?';
    banner.style.opacity = 1;
    },500);

    
}

function input_item(arg1,arg2){
    let fruit_container = document.getElementById('fruit-wrapper');
    let veg_container = document.getElementById('veg-wrapper');
    let item_price = document.getElementById('item_price');
    let banner = document.getElementById('top-banner');
    let price_feild = document.getElementById('price-reg');
    let item_type = document.getElementById('item-type');

    item_type.value=arg1;
    if(arg2==='fruit')
    {
        fruit_container.style.display='none';
    }
    else
    {
        veg_container.style.display='none';
    }
    item_price.style.display='flex';

    banner.style.opacity = 0;
    setTimeout(function(){
    banner.innerText='Enter the details of the sale';
    banner.style.opacity = 1;
    },500);

    $('document').ready(function(){
        $('#form_id').on('submit',function(e){
            e.preventDefault(); //prevent default form submition
            var FormData = $('#form_id').serialize();
        $.ajax({
            
            type : 'post',
            url : '../php/add_item_script.php',
            data : FormData,
            dataTYpe : 'json',
            encode : true,
            beforeSend : function(){

                $('#price-error').html('Sending');
            },
            success : function(response){

                response = JSON.parse(response);

                if(response== "ok"){

                     $('#ajax-msg').html('Item is now listed');
                }else{

                     $('#ajax-msg').html(response);
                }

            }

        });

        });


    });


}
