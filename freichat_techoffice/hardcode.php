<?php
/* Data base details */
$dsn='mysql:host=localhost;dbname=freichat_techoffice'; //DSN
$db_user='kassabmo'; //DB username 
$db_pass='selfcareapps'; //DB password 
$driver='Custom'; //Integration driver
$db_prefix=''; //prefix used for tables in database
$uid='580dedbdb6a1f'; //Any random unique number

$connected='YES'; //only for custom installation

$PATH = 'freichat_techoffice/'; // Use this only if you have placed the freichat folder somewhere else
$installed=true; //make it false if you want to reinstall freichat
$admin_pswd='techoffice'; //backend password 

$debug = false;
$custom_error_handling='YES'; // used during custom installation

$use_cookie='false';

/* email plugin */
$smtp_username = '';
$smtp_password = '';

$force_load_jquery = 'NO';

/* Custom driver */
$usertable='user_info'; //specifies the name of the table in which your user information is stored.
$row_username='username'; //specifies the name of the field in which the user's name/display name is stored.
$row_userid='userid'; //specifies the name of the field in which the user's id is stored (usually id or userid)


$avatar_table_name='members'; //specifies the table where avatar information is stored
$avatar_column_name='avatar'; //specifies the column name where the avatar url is stored
$avatar_userid='id'; //specifies the userid  to the user to get the user's avatar
$avatar_reference_user='id'; //specifies the reference to the user to get the user's avatar in user table 
$avatar_reference_avatar='id'; //specifies the reference to the user to get the user's avatar in avatar
$avatar_field_name=$avatar_column_name; //to avoid unnecessary file changes , *do not change
