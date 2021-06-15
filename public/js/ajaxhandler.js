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
              success: function(response){
                                            // console.log(response);
                                            return response;
                                          },
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

function callAjaxPost_Array(dataArray, link_identifier){

    // console.log(api_url[link_identifier]);
    return $.ajax({
              type: 'POST',
              url: curl_base_url + curl_post_url,
              data: {
                        'param' : dataArray,
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

function callAjaxPost_file(buttonClicked){
    var input = {};
    // get ID for identify
    var target_id = buttonClicked.id;

    input =  new FormData();
    var files = $('#'+target_id+'_file')[0].files;

    if(files.length > 0 ){
        input.append(target_id+'_file'  , files[0]);
        input.append('file_var'         , target_id+'_file');
        input.append('url'              , api_url[target_id+'_file']);

        return $.ajax({
                  type: 'POST',
                  url: curl_base_url + curl_file_post_url,
                  contentType: false,
                  processData: false,
                  data: input,
                  success: function(response){
                                                return response;
                                              },
                  error: function (jqXhr, textStatus, errorMessage) { // error callback
                                      console.log('Error: ' + errorMessage);
                                  }
                });
     }else {
       return 'Ajax Post File Failed';
     }

}

function callAjaxPost_file_formdata(formData){

    // ada 3 variable penting yg wajib ada
    // file_var, file yg diupload dan url api.. Contoh :
    // var formData =  new FormData();
    // formData.append('file_var' , target_id+'_file');
    // formData.append(target_id+'_file' , files[0]);
    // formData.append('url' , api_url[target_id+'_file']);
    //
    // target_id adalah variable dinamis (input identifier)
    ///////////////////////////////////////////

    return $.ajax({
              type: 'POST',
              url: curl_base_url + curl_file_post_url,
              contentType: false,
              processData: false,
              data: formData,
              success: function(response){
                                            return response;
                                          },
              error: function (jqXhr, textStatus, errorMessage) { // error callback
                                  console.log('Error: ' + errorMessage);
                              }
            });


}
