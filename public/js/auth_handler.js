
function doLogin(obj){
  $.when(callAjaxPost(obj)).then(function(response){
    console.log(response);
  });
}

function doJoin(obj){
  $.when(callAjaxPost(obj)).then(function(response){
    console.log(response);
  });
}

function doResetPass(obj){
  $.when(callAjaxPost(obj)).then(function(response){
    console.log(response);
  });
}
