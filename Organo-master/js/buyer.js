console.log('Buyer portal Started');
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
    banner.innerText='What would you like to Buy?';
    banner.style.opacity = 1;
    },500);

    
}
function load_veg() {
    let choice_container = document.getElementById('choice-wrapper');
    let veg_container = document.getElementById('veg-wrapper');
    let banner = document.getElementById('top-banner');

    choice_container.style.display = 'none';
    veg_container.style.display = 'flex';
    
    banner.style.opacity = 0;
    setTimeout(function(){
    banner.innerText='Select the Vegetable you want to Buy';
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
    banner.innerText='Select the fruit you want to Buy';
    banner.style.opacity = 1;
    },500);
}

function submit_form(arg)
{
    console.log('form');
    let form_sub = document.getElementById('item-form');
    let value_item = document.getElementById('item-type');
    console.log(value_item);
    value_item.value=arg;

    form_sub.submit();
}