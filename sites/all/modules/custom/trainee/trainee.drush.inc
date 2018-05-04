<?php

/*
*
* Implementing Drush Command
*
*/




function trainee_drush_command(){

  $items['drush-trainee-command'] = array(
    'description' => 'demo for drush command',
    
    'arguments' => array(
      'start_date' => 'The date you want to start fetching users.',
      'days_before' => 'Number of days you want to go back from the start date to fetch users in between.',    
    ),

    'aliases' => array('dtc'),
  );


	$items['drush-active-node'] = array(
		'description' => 'Demonstrate how Drush commands work.',
    'arguments' => array(
      'status' => 'We want to get only published nodes.',
      ),
    'options' => array(
      'per-batch' => 'The number of records to be fetched in a batch. Defaults to 5.',
      'file-path' => 'The path for saving the file created using drush command.',
     ),
    'aliases' => array('dan'),	
    'callback' => 'drush_trainee_drush_active_node',
	);
 return $items;
}



/**
 *
 * Implements hook_drush_help().
 *
 */

function trainee_drush_help($section) {
  switch ($section) {
    case 'drush:dtc':
      return dt("This command will fetch all the logged in users within the specified date range and write into a csv file.");
  }
}


function drush_trainee_drush_trainee_command($start_date, $days_before){

  $start_date = DateTime::createFromFormat('Y-m-d', $start_date, new DateTimeZone('UTC'));
  if (!$start_date) {
    drush_log(dt('Date string is not correct.'), 'error');
    return;
  }

  $start_date->setTime(23, 59, 59);
  $before_date = clone $start_date;
  $before_date->sub(DateInterval::createFromDateString("$days_before days"));
  $start_date_timestamp = $start_date->getTimestamp();
  $before_date_timestamp = $before_date->getTimestamp();
  //$total_users = db_query("select count(1) from {users} WHERE login > '%d' and login <= '%d'", $before_date_timestamp, $start_date_timestamp)->execute();

  $result = db_select('users', 'u')
            ->fields('u')
            ->execute();
  $total_users = $result->rowCount();

  // Check we have some users available to fetch.

  if ($total_users == 0) {
    drush_log(dt('User list is empty.'), 'ok');
    return;
  }
  _trainee_drush_fetch_user($start_date_timestamp, $before_date_timestamp);
  
  /*drupal_set_message($total_users);*/
}


function _trainee_drush_fetch_user($start_date_timestamp, $before_date_timestamp){
 
  $file_path = drush_get_option('file-path');
  $todays_date = date('Y-m-d', time());
  $file_name = 'trainee-' . $todays_date . '.csv';
  $file_location = !empty($file_path) ? $file_path : '';

  if (empty($file_location)) {

    $path = $file_name;

  }
  else {

    $path = $file_location . '/' . $file_name;

  }

  
  $sql_result = db_select('users','u')->fields('u', array('uid','login'))->condition('login', $before_date_timestamp,'>')->condition('login', $start_date_timestamp,'<=')-> execute();
 
 /* foreach($sql_result as $data){
  
     //print $data->login;
     //print $data->uid;
  }
 */
 
  $file_exists = file_exists($path);
  $file_handler = fopen($path, "a");
  if ($file_handler !== FALSE) {

    if (!$file_exists) {

      fwrite($file_handler, "'LAST LOGIN', 'GUID'\n");

    }

    foreach($sql_result as $data){

      $last_login = date("Y-m-d H:i:s", $data->login);
      $guid = $data->uid;
      $params = "'" . $last_login . "', '" . $guid . "'\n";
      fwrite($file_handler, $params);

    }

  }

  fclose($file_handler); 
  //drupal_set_message(t("hytjhtyj5"));
  //drupal_set_message(date("Y-m-d H:i:s", "1433996944"));
}



function drush_trainee_drush_active_node($status)
{

  $limit = drush_get_option('per-batch', 5);
  $file_path = drush_get_option('file-path', 'sites/all/modules/custom/trainee');

  if(empty($status)){
    drupal_set_message(t('Please provide node status argument')); 
  }
  if($status == 1 || strtolower($status) == 'publish' || strtolower($status) == 'published'){
    $status = 1;
  }
  else{
    $status = 0;
  }
  
  $sql = db_select('node', 'n')
            ->fields('n')
            ->execute();
  $result = $sql->rowCount();
  //print $result;
  
  if ($result == 0) {
    drush_log(dt('Node list is empty.'), 'ok');
    return;
  }
    
  if (_drush_node_batch_set($result, $limit, $status, $file_path)) {

    // Configure the batch.
    $batch =& batch_get();
    $batch['progressive'] = FALSE;
    // Process the batch.
    drush_backend_batch_process();

  }

  else {

    drush_log(dt('Problem setting the batch. Please try running again.'), 'error');

  }
  
  drupal_set_message(t('Hello user'));
}

function _drush_node_batch_set($result, $limit, $status, $file_path){


  drupal_set_message(t('Hello user*****'));
  for ($i = 0; $i < ceil($result / $limit); $i++) {

    $operations[] = array(
      '_trainee_drush_fetch_node',

      array(
        ($i * $limit),
        ($limit - 1),
        $status,
        $file_path,
      ),

    );

  }

 

  $batch = array(

    'operations' => $operations,
    'finished' => '_rml_login_drush_batch_finished',
    'title' => t('Processing request.'),
    'init_message' => t('Fetching nodes from database is starting.'),
    'error_message' => t('Fetching nodes from database encountered an error.'),

  );
  
  batch_set($batch);
  
  return TRUE;
  
}

function _trainee_drush_fetch_node($offset, $limit, $status, $file_path){

  $file_path = drush_get_option('file-path');
  $todays_date = date('Y-m-d', time());
  $file_name = 'node-' . $todays_date . '.csv';
  $file_location = !empty($file_path) ? $file_path : '';

  if (empty($file_location)) {

    $path = $file_name;

  }
  else {

    $path = $file_location . '/' . $file_name;

  }

  
  //$sql_result = db_select('users','u')->fields('u', array('uid','login'))->condition('login', $before_date_timestamp,'>')->condition('login', $start_date_timestamp,'<=')-> execute();
  
    //$result = db_query("SELECT n.nid, n.title, n.uid, n.status from {node} n WHERE n.status = '%d' LIMIT '%d', '%d'", $status, $offset, $limit);
    $result = db_select('node','n')->fields('n', array('nid','title','uid','status'))->condition('status', $status,'=')->range($offset, $limit)-> execute();
    //var_dump($result);
 /* foreach($sql_result as $data){
  
     //print $data->login;
     //print $data->uid;
  }
 */
 
  $file_exists = file_exists($path);
  $file_handler = fopen($path, "a");
  if ($file_handler !== FALSE) {

    if (!$file_exists) {

      fwrite($file_handler, "'NID', 'TITLE', 'UID', 'STATUS'\n");

    }
    foreach($result as $record){
    //while ($record = db_fetch_object($result)){
      //$data = unserialize($record->data);
      $nid = $record->nid;
      $title = $record->title;
      $uid = $record->uid;
      $status = $record->status;
      $params = "'" . $nid . "', '" . $title . "', '" . $uid . "', '" . $status . "'\n";
      fwrite($file_handler, $params);

    }

  }

  fclose($file_handler); 



  drupal_set_message(t('Hello user***** sneha'));
}



?>