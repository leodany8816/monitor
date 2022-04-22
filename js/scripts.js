var working = false;
$('.login').on('submit', function (e) {
  e.preventDefault();
  var $this = $(this);
  $.ajax({
    type: "POST",
    url: 'acciones/login.php',
    data: {
      usuario: $("#usuario").val(),
      contrasena: $("#contrasena").val()
    },
    beforeSend: function () {
      console.log("enviando");
      $state = $this.find('button > .state');
      $this.addClass('loading');
      $state.html('Validando, espere un momento.');
    },
    success: function (msg) {
      if (msg.includes('listo')) {
        console.log('listo');
        $state = $this.find('button > .state');
        $this.addClass('ok');
        $state.html('Bienvenido!');
        setTimeout(function () {
          location.href = 'monitor.php';
        }, 2000)
      } else {
        $this.addClass('error');
        $state.html('Usuario y Contraseña incorrectas.!');
        setTimeout(function () {
          $state.html('Log in');
          $this.removeClass('ok loading error');
          working = false;
        }, 2000);
      }
    }
  });

  //   if (working) return;
  //   working = true;
  //   var $this = $(this),
  //     $state = $this.find('button > .state');
  //   $this.addClass('loading');
  //   $state.html('Authenticating');
  //   setTimeout(function () {
  //     $this.addClass('ok');
  //     $state.html('Welcome back!');
  //     setTimeout(function () {
  //       $state.html('Log in');
  //       $this.removeClass('ok loading');
  //       working = false;
  //     }, 4000);
  //   }, 3000);
});

$(document).ready(function () {
  $("#dt_cfdis").on('click', '.descargarZip', function(){
    var id = $(this).attr('id');
    console.log('id->'+id);
    $.ajax({
      type: 'post',
      url: 'acciones/crearzip.php',
      data: {id: id},
      // beforeSend: function(){

      // },
      success: function(msg){
        console.log('nombrezip->'+msg);
        window.location.href='archivos/'+msg;
      },
      error:function(xhr){
        alert('Error al descargar el archivo zip');
      }
    })
  })
});