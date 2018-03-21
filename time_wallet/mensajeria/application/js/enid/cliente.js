$(document).ready(function(){

        //var socket = io();
         var socket = io.connect('http://localhost:3000');

        $("#formualario_test").submit(function(e){


          mensaje_usuario = $('#m').val();
          //Para todos los usuarios 
          //socket.emit('funcion_prueba', { for : "everyone" ,  mensaje_usuario : mensaje_usuario  });

          /*Para toos menos el que envia  */
          socket.emit( 'funcion_prueba', {mensaje_usuario : mensaje_usuario });
          $('#m').val('');              
          e.preventDefault();
        });

        /**/
        socket.on("funcion_prueba_respuesta" , function(data){
           $('#messages').append($('<li>').text(data.mensaje_usuario));
        });




});
      