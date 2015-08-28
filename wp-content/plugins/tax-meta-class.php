<?php
/*
Plugin Name: Tax meta class
Plugin URI: http://en.bainternet.info
Description: Tax meta class usage demo
Version: 1.9.9
Author: Bainternet, Ohad Raz
Author URI: http://en.bainternet.info
Also: https://github.com/bainternet/Tax-Meta-Class/wiki
*/

//include the main class file
require_once("Tax-meta-class/Tax-meta-class.php");
 
/*
* configure taxonomy custom fields
*/
$config = array(
   'id' => 'demo_meta_box',                         // meta box id, unique per meta box
   'title' => 'Demo Meta Box',                      // meta box title
   'pages' => array('department', 'location'),                    // taxonomy name, accept categories, post_tag and custom taxonomies
   'context' => 'normal',                           // where the meta box appear: normal (default), advanced, side; optional
   'fields' => array(),                             // list of meta fields (can be added by field arrays)
   'local_images' => false,                         // Use local or hosted images (meta box images for add/remove)
   'use_with_theme' => false                        //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
);
 
/*
* Initiate your taxonomy custom fields
*/
 
$my_meta = new Tax_Meta_Class($config);
 
 
/*
* Add fields 
*/
 
//text field
$my_meta->addText('extra_links_header', array('name'=> 'Extra Links Header'));

//Image field
$my_meta->addImage('display_image', array('name'=> 'Feature Image'));
//wysiwyg field
$my_meta->addWysiwyg('section_links', array('name'=> 'Section Links '));
 
/*
* To Create a reapeater Block first create an array of fields
* use the same functions as above but add true as a last param
*/
 
$repeater_fields[] = $my_meta->addText('re_text_field_id',array('name'=> 'My Text '),true);
$repeater_fields[] = $my_meta->addTextarea('re_textarea_field_id',array('name'=> 'My Textarea '),true);
$repeater_fields[] = $my_meta->addCheckbox('re_checkbox_field_id',array('name'=> 'My Checkbox '),true);
$repeater_fields[] = $my_meta->addImage('image_field_id',array('name'=> 'My Image '),true);
 
/*
* Then just add the fields to the repeater block
*/
 
//repeater block
//$my_meta->addRepeaterBlock('re_',array('inline' => true, 'name' => 'This is a Repeater Block','fields' => $repeater_fields));
 
/*
* Don't Forget to Close up the meta box deceleration
*/
//Finish Taxonomy Extra fields Deceleration
$my_meta->Finish();