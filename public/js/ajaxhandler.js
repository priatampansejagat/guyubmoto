function callAjaxPost(buttonClicked){

    var input={};
    // get ID for identify
    var target_id = buttonClicked.id;

    $("#"+target_id+"_input").find(':input')
                              .each(function() {
                                if ($(this).is(':checkbox')) {

                                  if($(this).prop("checked") == true){
                                      input[$(this).attr('name')]= 'true';
                                  }else{
                                      input[$(this).attr('name')]= 'false';
                                  }

                                }else if($(this).is(':password')){
                                  if ($(this).val() != '') {
                                    input[$(this).attr('name')]= CryptoJS.MD5($(this).val()).toString();
                                  }else {
                                    input[$(this).attr('name')]= '';
                                  }

                                }else {
                                  input[$(this).attr('name')]= $(this).val();
                                }
                              });

    // console.log('goto : '+ api_url[target_id]);

    return $.ajax({
              type: 'POST',
              url: curl_base_url + curl_post_url,
              data: {
                        'param' : input,
                        'url'   : api_url[target_id]
                      },
              success: function(response){ return response; },
              dataType: 'json',
              error: function (jqXhr, textStatus, errorMessage) { // error callback
                                  console.log('Error: ' + errorMessage);
                              }
            });

}

function callAjaxPost_noparam(link_identifier){

    var input={};
    input['input'] = 'no input';

    return $.ajax({
              type: 'POST',
              url: curl_base_url + curl_post_url,
              data: {
                        'param' : input,
                        'url'   : api_url[link_identifier]
                      },
              success: function(response){
                                          return response;
                                        },
              dataType: 'json',
              error: function (jqXhr, textStatus, errorMessage) { // error callback
                                  console.log('Error: ' + errorMessage);
                              }
            });

}
