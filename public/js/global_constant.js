/*  GLOBAL URL  */
var base_url  = 'http://localhost/guyubmoto/public/';
var curl_base_url = 'http://localhost/guyubmoto/public/';

var curl_post_url       = 'Curl/Api_handler/post';
var curl_file_post_url  = 'Curl/Api_handler/post_file';
var curl_file_post_url_test  = 'Curl/Api_handler/post_file_test';
var curl_put_url        = 'Curl/Api_handler/put';
var curl_get_url        = 'Curl/Api_handler/get';

/*  GLOBAL URL  */
var api_url = [];

// auth
api_url['loginConfirm']      = 'auth/login_check';
api_url['joinConfirm']       = 'auth/user_register';

// admin
api_url['users_admission']      = 'admin/users/users_admission';
api_url['user_acceptance_true']      = 'admin/users/user_acceptance_true';

/* FAMILY  */
// My work
api_url['myworks_photography_list'] = 'family/myworks/photography/list_photography';
api_url['myworks_photography_count'] = 'family/myworks/photography/count_photography';
api_url['myworks_photography_delete'] = 'family/myworks/photography/delete_photography';
api_url['uploadPhoto'] = 'family/myworks/photography/upload';
api_url['uploadPhoto_file'] = 'family/myworks/photography/upload_file';

// About me
api_url['refreshBio'] = 'family/aboutme/biography/refresh';
api_url['updateBio'] = 'family/aboutme/biography/update';
api_url['updateProfilePic'] = 'family/aboutme/biography/updateProfilePic';


/* PUBLIC */
api_url['landing_photolist'] = 'photography/list_photography';
api_url['get_fams_member'] = 'fams/refresh';
