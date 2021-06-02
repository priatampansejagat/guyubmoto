
function doLogin(obj){
  $.when(callAjaxPost(obj)).then(function(response){

    if (response['data']['status'] == 'success') {
      window.location.replace(base_url+'auth/redirect?redirect=login');
    }

  });
}

function doJoin(obj){
  var obj_id = obj.id;

  var pass = $('#'+obj_id+'_input').find('#password').val();
  var pass_confirm = $('#'+obj_id+'_input').find('#ulangi_password').val();

  if (pass == pass_confirm) {

    obj.disabled = true;
    $('#'+obj.id).html(
          '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );

    $.when(callAjaxPost(obj)).then(function(response){
      if (response['data']['status'] == 'success') {

        window.location.replace(base_url+'auth/login?status=sukses');

      }else{

        var message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"+response['data']['message']+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";

        $('#message').html(message);

        $('#'+obj.id).html('Next');
        obj.disabled = false;
      }

    });

  }else {
    var message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'> Password harus sama <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";

    $('#message').html(message);
  }



}

function doResetPass(obj){
  $.when(callAjaxPost(obj)).then(function(response){
    console.log(response);
  });
}
