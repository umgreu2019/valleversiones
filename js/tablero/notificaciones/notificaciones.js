$(document).ready(function(){
$('#defaultCheck1,#defaultCheck2').click(function(){
 var dato=$(this).val();
 $.ajax({
   type:"POST",
   data:{'envio':dato},
   url:"http://localhost/ValleSistema2/php/tablero/notificacion/consulta.php",
   success:function(data){
     
     $("#opsimple").html(data);
   }
   })
}); 

 
 $('#post').click(function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {

   var form_data = $("#comment_form").serialize();
   var fecha=moment().format('MMMM Do YYYY, h:mm a');
   form_data = form_data+"&fecha="+fecha;

   alert(form_data);
   $.ajax({
    url:"http://localhost/ValleSistema2/php/tablero/notificacion/insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {

      alert(data)
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
    alert('Campos Obligatorios');
  }
 });

 
 $('#opsimple').change(function(){
   $('#opsimple option:selected').each(function(){
       var as=$(this).html();
         
         var textohtml="<option value='"+as+"' selected>"+as+"</option>";
         $('#opmultiple').append(textohtml);
       })
    });
 
});

