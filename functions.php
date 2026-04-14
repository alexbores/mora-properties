<?php
@ini_set( 'upload_max_size', '500M' );
@ini_set( 'post_max_size',   '500M');
@ini_set( 'max_execution_time', '500' );
@ini_set( 'file_uploads', 'On' );


// general tools and utilities
require_once get_template_directory().'/base/custom-data-manager.php';


//wp configs
require_once get_template_directory().'/inc/main-rules.php';

//wp admin page configs
if (is_admin() ) {
  require_once get_template_directory().'/inc/admin-rules.php';
  
}
