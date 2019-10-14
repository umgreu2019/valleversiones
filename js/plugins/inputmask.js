$(document).ready(function(){

$('.dpi').inputmask({ "mask": "9999-99999-9999", 'autoUnmask' : true,'definitions': {
      '9': {
        validator: "[0-9]",
        casing: "lower"
      }
    }})

$(".celular").inputmask({"mask":'+(502)9999-9999','autoUnmask' : true, 'definitions': {
      '9': {
        validator: "[0-9]",
        casing: "lower"
      }
    }})

 $(".email").inputmask({regex: "[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z0-9]{3,4}"})

 $(".cedula").inputmask({"mask":'A-XXXX-XXXXX','autoUnmask' : true, 'definitions': {
      'A': {
        validator: "[a-zA-Z0-9]",
        casing: "lower"
      },
      'X':{
      	validator: "[0-9]",
        casing: "lower"
      }
    }})

// $(".fecha").inputmask({"mask":'dd/mm/yyyy','autoUnmask' : false})
 
// $(".email").blur(function(){
// var dato=$("#FRMPROFE").serialize();
// alert(JSON.stringify(dato));
// })


})