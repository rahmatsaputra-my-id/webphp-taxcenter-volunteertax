<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Breadcrumb class
 *
 * DESCRIPTION : Class to show breadcrumb navigation
 *
 * MODIFICATION HISTORY
 * V1.0 2009-07-03 04:05 PM - R Developper   - Created
 *  2009-07-03 02:32 PM     - R Developper   - change html element to display using <ul>
 *
 * @package    Markeet
 * @author     R Developper
 *
 **/
 
class Breadcrumb
{
 protected $data = array();
 
 /**
  * Class Constructor
  *
  * @return void
  * @author R Developper
  **/
 function __construct() 
 {
 
 }
 
    /**
  * add new crumb element
  *
  * @param  string $title The crumb title
  * @param  string $uri Crumb url path 
  * @return void
  * @author R Developper
  **/
 
 public function add($title, $uri='') 
 {
  $this->data[] = array('title'=>$title, 'uri'=>$uri);
  return $this;
 }
 
 /**
  * Fetch crumb data
  *
  * @return void
  * @author R Developper
  **/
 
 public function fetch() 
 {
  return $this->data;
 }
 
 /**
  * Reset crumb data
  *
  * @return void
  * @author R Developper
  **/
 public function reset() 
 {
  $this->data = array();
 }
 
 
 /**
  * Dislpay all crumb element
  *
  * @param  string $home_site first path title
  * @param  string $id id of ul html
  * @return void
  * @author R Developper
  **/
 public function show($home_site ="Beranda", $id = "crumbs"  ) 
 {
  $ci = &get_instance();
  $site = $home_site;
  $breadcrumbs = $this->data;
  
  $out  = '<ul class="page-breadcrumb breadcrumb">';//<ul id="'.$id.'">
  if ($breadcrumbs && count($breadcrumbs) > 0) {
   $out .= '<li><a href="' . base_url() .'admin'.'"/>'. $site . '</a><i class="fa fa-circle"></i></li>';
   $i=1;
   foreach ($breadcrumbs as $crumb): 
 	
    if ($i != count($breadcrumbs)) {
     $out .= '<li><a href="' .site_url($crumb['uri']).'">'. $crumb['title'] .'</a><i class="fa fa-circle"></i></li>';
    } else {
     $out .= '<li class="active">'. $crumb['title'] .'</li>';
    }
    $i++;
   endforeach;
  } else {
   $out .= '<li class="active">' . $site . '</li>';
  }
  $out .= '</ul>';
  return $out; 
 }
 
}
 
// END  Breadcrumb class
 
/* End of file Breacrumb.php */
/* Location: /Applications/XAMPP/xamppfiles/htdocs/multishop/application/library/Breadcrumb.php  */