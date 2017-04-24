function focusInput(id){
    if(id.value==id.title)
        id.value="";
      
}
function blurInput(id){
    if(id.value=="")
        id.value=id.title;
}

function setPaymentInfo(isChecked)
{
	with (window.document.checkout) {
		if (isChecked) {
			paymentName.value=shippName.value;
            paymentSex.value=shippSex.value;
            paymentAdd.value=shippAdd.value;
            
            paymentEmail.value=shippEmail.value;
            paymentPhone.value=shippPhone.value;
            
            paymentName.readOnly  = true;
            paymentSex.readOnly  = true;
            paymentAdd.readOnly  = true;
           
            paymentEmail.readOnly  = true;
            paymentPhone.readOnly  = true;
            			
		} else {
			paymentName.readOnly  = false;
            paymentSex.readOnly  = false;
            paymentAdd.readOnly  = false;
            /*paymentCMND.readOnly  = false;*/
            paymentEmail.readOnly  = false;
            paymentPhone.readOnly  = false;	
		}
	}
}