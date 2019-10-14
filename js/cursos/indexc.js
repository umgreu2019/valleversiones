var cont=1; // contador global de filas
var arreglo=[];
var tempp=[];
var temp = [];

$(document).ready(function(){

    let num= verifica_localstorage();
    add(num);

    $('.select2').select2({
        width: '100%'
    })

    $('#tablecursos').DataTable({
        "language": {
            "url": "http://localhost/ValleSistema2/js/plugins/lenguaje.json"
        },
        "order" : [[0,"desc"]],
        "paging": true,
    });
    $('#printtable').DataTable({
        "language": {
            "url": "http://localhost/ValleSistema2/js/plugins/lenguaje.json"
        },
        "order" : [[0,"desc"]],
        "paging": true,
    });
    
    //carga de areas
    $.post("http://localhost/ValleSistema2/php/alumno/promover/area.php", function(result){
	    $('#idarea').html(result);
    });

    //carga de grados segun el area
    $('#idarea').change(function(){
        $('#idarea option:selected').each(function(){
            var idarea=$(this).val();
            if(idarea>3){
                var aux = $('#containercarrera').hasClass('d-none');
                if(aux==true){
                    $('#containercarrera').removeClass('d-none');
                }
            }else{
                var aux = $('#containercarrera').hasClass('d-none');
                if(aux==false){
                    $('#containercarrera').addClass('d-none');
                }
            }
            $.post("http://localhost/ValleSistema2/php/alumno/promover/grado.php",{ idarea: idarea,
            }, function(data){ 
                $("#idnivel").html(data);
            });
        });
    });
    //carga de carreras segun el grado
    $('#idnivel').change(function(){
        $('#idnivel option:selected').each(function(){
            var idnivel=$(this).val()
            var idarea =$('#idarea').val()
            $.post("http://localhost/ValleSistema2/php/alumno/promover/carrera.php",{ idnivel: idnivel,
            }, function(data){ 
                if(idarea<=3)
                {
                    let idcarrera=0;
                    $.post("http://localhost/ValleSistema2/php/cursos/tablacursos.php",{idnivel: idnivel, idarea: idarea, idcarrera: idcarrera,
                    }, function(data){
                        $('#table').html(data)
                    })
                }
                $("#idcarrera").html(data);

            });
        });
    });

    //select carreras
    $('#idcarrera').change(function(){
        $('#idcarrera option:selected').each(function(){
            let idcarrera   =$(this).val()
            let idarea      =$('#idarea').val()
            let idnivel     =$('#idnivel').val()
            $.post("http://localhost/ValleSistema2/php/cursos/tablacursos.php",{idnivel: idnivel, idarea: idarea, idcarrera: idcarrera,
            }, function(data){
                $('#table').html(data)
            })
        })
    });

    $('#btnadd').click(function(){
        let aux = $('#conttable').hasClass('d-none')
        let button =$('#btnadd');;
        if(aux)
        {
            button.text('AGREGAR')
            $('#conttable').removeClass('d-none')
            $('#temptable').addClass('d-none')
        }else{
            button.text('VOLVER');
            $('#conttable').addClass('d-none')
            $('#temptable').removeClass('d-none')
        }
    });

    // ** btn guardar ** //

    $('#btnguardar').click(function(){
        guardar()
    })

});


// GUARDAR TABLA TEMP EN BD
function guardar(){
    
    if(localStorage.getItem(0))
    {
        let pos = 0;
        let obj = localStorage.getItem(0)
        let separador = ',';
        let contenedor = obj.split(separador)
        
        for(let i=0;i<contenedor.length;i++)
        {
            pos = parseInt(contenedor[i])
            console.log('contenedor: '+pos)
            temp.push(JSON.parse(localStorage.getItem(pos)))
            // console.log(temp[i])
        }
        // console.log('temp fuera del for: '+temp);
        cont2 = contenedor.length;
        $.ajax
        ({
            type:"POST",
            data:{arreglo: temp, contador: cont2},
            url:"http://localhost/ValleSistema2/php/cursos/ingreso.php", 
            success:function(r)
            {
                // alert(r)
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                })
                  
                Toast.fire({
                type: 'success',
                title: 'Cursos Guardados'
                })
                let idcarrera   =$('#idcarrera').val()
                let idarea      =$('#idarea').val()
                let idnivel     =$('#idnivel').val()
                $.post("../php/cursos/tablacursos.php",{idnivel: idnivel, idarea: idarea, idcarrera: idcarrera,
                }, function(data){
                    $('#table').html(data)
                })
                localStorage.removeItem(0)
                for(let i=0;i<contenedor.length;i++)
                {
                    localStorage.removeItem(contenedor[i])
                    $('#'+contenedor[i]).remove()
                }
                arreglo=[]
                temp=[]
            }
        });
    }
}

//*******************************************************************//
//                  agregar y eliminar filas                         //
function add(id){

    if(cont==1){
        add2()
    }else if(id==0){
        add2()
    }else if(id>=1){
        console.log('entro a id=>1')
        //cambie cont por id // para probar y le quite el menos uno
        let aux     = id;
        let curso   = document.querySelector('#c'+aux).value;
        let descr   = document.querySelector('#d'+aux).value;
        let area    = document.querySelector('#idarea').value;
        let nivel   = document.querySelector('#idnivel').value;
        let car     = document.querySelector('#idcarrera').value;

        let button = document.querySelector('#btnA'+id).value;

        if(button=='Add')
        {
            if(cont>1 && curso.length>=1 && descr.length>=1 && area.length>=1 && nivel.length>=1){
                add2(id);
            }else{
                alert('revise los campos y selectores xxx')
            }
        }else{
            update(id);
        }
    }
}

function delette(tempe){
    $('#'+tempe).val();
    if(tempe.length==0)
    {
        alert('no puede eliminar un elemento vacio')
    }else{
        $('#'+tempe).remove();
        localStorage.removeItem(tempe)
        
        var indice = arreglo.indexOf(tempe);
        console.log(indice)
        if(indice > -1){
            arreglo.splice(indice,1);
        }
        localStorage.removeItem(0)
        localStorage.setItem(0,arreglo)
    }
}

function guardar_localstorage(cont,id){
    let contt = 0;

    let button = document.querySelector('#btnA'+id).value;
    if(button=='Add'){
        //cambie el cont por id para ver como funcina
        mod=id;
    }else{
        if(button='Update')
        {
            mod=id;
        }
    }
    let curso   = document.querySelector('#c'+mod).value;
    let descr   = document.querySelector('#d'+mod).value;
    let area    = document.querySelector('#idarea').value;
    let nivel   = document.querySelector('#idnivel').value;
    let car     = document.querySelector('#idcarrera').value;

    if(curso.length>=1 && descr.length>=1 && area.length>=1 && nivel.length>=1){

        var fila = {
            curso: curso,
            descr: descr,
            area : area,
            nivel: nivel,
            car: car
        }
        if(button=='Add')
        {
            localStorage.setItem(id,JSON.stringify(fila));
            $('#btnA'+id)
            .removeClass('btn-warning')
            .addClass('btn-primary')
            .val('Edit')
            // bloque de inputs
            $('#c'+id).attr('disabled','disabled')
            $('#d'+id).attr('disabled','disabled')
            arreglo.push(id)
            localStorage.setItem(0,arreglo)

        }else{
            if(button=='Update')
            {
                localStorage.setItem(id,JSON.stringify(fila));
                localStorage.setItem(0,arreglo)
                console.log('actulizar')
            }
        }

    }else{
        alert('debe llenar el campo')
    }
}

function update(id){
    
    let button = document.querySelector('#btnA'+id).value;

    if(button=='Edit'){
        $('#btnA'+id)
            .removeClass('btn-primary')
            .addClass('btn-success')
            .val('save')

        $('#c'+id).removeAttr('disabled','disabled')
        $('#d'+id).removeAttr('disabled','disabled')
    }else{
        $('#btnA'+id)
            .removeClass('btn-success')
            .addClass('btn-primary')
            .val('Edit')

        $('#c'+id).attr('disabled','disabled')
        $('#d'+id).attr('disabled','disabled')
        if(cont>1)
        {
            guardar_localstorage(cont-1,id);
        }
    }
}

function add2(id)
{
    fila()

    if(id>=1)
    {
        guardar_localstorage(cont-1,id);
    }
    cont++;
}

function fila()
{
    $('#tablecursos')
    .append
    (
        $('<tr>').addClass('text-center')
        .append
        (
            $('<td>')
            .append
            (
                $('<span>').text(cont)
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type','text').addClass('form-control').attr('id','c'+cont)
            )  
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type','text').addClass('form-control').attr('id','d'+cont)
            )  
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                $('<input>').addClass('btn btn-warning btn-sm').attr('type','button').attr('value','Add').attr('onclick','add('+cont+')').attr('id','btnA'+cont)
            )
            .append
            (
                $('<input>').addClass('btn btn-danger btn-sm').attr('type','button').attr('value','Delete').attr('onclick','delette('+cont+')')
            )
        )
        .attr
        (
            'id' , cont
        )
        
    )
}


function verifica_localstorage()
{
    let existe = 0;
    //console.log(typeof obj)
    if(localStorage.getItem(0))
    {
        let exite =0;
        let pos = 0;
        let obj = localStorage.getItem(0)
        let separador = ',';
        arreglo2 = obj.split(separador)
        console.log(arreglo2.length)
        
        for(let i=0;i<arreglo2.length;i++){

            pos = parseInt(arreglo2[i])
            arreglo.push(pos);
            let temp = JSON.parse(localStorage.getItem(pos))
            // console.log('area: '+temp.area)

            // ** inicio **//
            $('#tablecursos')
            .append
            (
                $('<tr>')
                .append
                (
                    $('<td>')
                    .append
                    (
                        $('<span>').text(pos)
                    )
                )
                .append
                (
                    $('<td>')
                    .append
                    (
                        $('<input>').attr('type','text').addClass('form-control').attr('id','c'+pos).val(temp.curso).attr('disabled','disabled')
                    )  
                )
                .append
                (
                    $('<td>')
                    .append
                    (
                        $('<input>').attr('type','text').addClass('form-control').attr('id','d'+pos).val(temp.descr).attr('disabled','disabled')
                    )  
                )
                .append
                (
                    $('<td>').addClass('text-center')
                    .append
                    (
                        $('<input>').addClass('btn btn-primary btn-sm').attr('type','button').attr('value','Edit').attr('onclick','add('+pos+')').attr('id','btnA'+pos)
                    )
                    .append
                    (
                        $('<input>').addClass('btn btn-danger btn-sm').attr('type','button').attr('value','Delete').attr('onclick','delette('+pos+')')
                    )
                )
                .attr
                (
                    'id' , pos
                )
                
            )
            // ** fin    **//
            
        }//end for
        pos=parseInt(pos);
        cont = pos + 1;
    }

    return existe;
}