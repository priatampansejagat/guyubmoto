
<div class="container">
  <div id="content">
    <div class="row">

      <div class="container-fluid">

        <div class="d-flex flex-row">
          <div class="table table-responsive">
            <table id="admission_list" class="table table-bordered table-hover" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Portfolio</th>
                        <th>Detail</th>
                        <th>Date</th>
                        <th>Acceptance</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>

            </table>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<script >

  $(document).ready(function() {

      $.when(callAjaxPost_noparam('users_admission')).then(function(response){
        var admission_list=[];

        for (var i = 0; i < response['data']['data_user'].length; i++) {

          admission_list[i] = [];
          var username =response['data']['data_user'][i]['data_login']['username'];
          var login_id =response['data']['data_user'][i]['data_login']['id'];

          var portfolio = '<a href="'+ response['data']['data_user'][i]['data_personal_data']['instagram'] +'" target="_blank" type="button" class="btn btn-warning">Instagram</a> ' +
                          '<a href="'+ response['data']['data_user'][i]['data_personal_data']['portfolio'] +'" target="_blank" type="button" class="btn btn-info">Other</a>';

          var accept_button = '<button onclick="user_acceptance(this)" name="'+login_id+'" id="'+login_id+'" type="button" class="btn btn-info">Accept</button>';

          admission_list[i][0] = response['data']['data_user'][i]['data_login']['id'];
          admission_list[i][1] = response['data']['data_user'][i]['data_login']['username'];
          admission_list[i][2] = response['data']['data_user'][i]['data_personal_data']['first_name'] + ' ' + response['data']['data_user'][i]['data_personal_data']['last_name'];
          admission_list[i][3] = portfolio;
          admission_list[i][4] = 'Link';
          admission_list[i][5] = response['data']['data_user'][i]['data_personal_data']['created_at'];
          admission_list[i][6] = accept_button;

        }

        var table=$('#admission_list').DataTable({
           data: admission_list
        });

      });

  } );

  function user_acceptance(accept_button){

    var dataArray = {};
    dataArray['login_id'] = accept_button.name;

    $.when(callAjaxPost_Array(dataArray, 'user_acceptance_true')).then(function(response){

      if (response['data']['status'] == 'success') {
        accept_button.disabled = true;
        $('#'+accept_button.id).html('Accepted');
      }

    });

  }

</script>
