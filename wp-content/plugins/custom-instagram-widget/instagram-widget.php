<?php
/*
Plugin Name: Custom Instagram Widget
Description: Custom Instagram Widget is very simple widget to showcase your latest instagram images. 
Version: 1.1
Author: priyanshu.mittal,a.ankit,abhipathak
Author URI: http://webriti.com
License: GPLv2 or later
Text Domain: ciw
*/



// Creating the widget 
class custom_instagram_widget extends WP_Widget {

function __construct() {
parent::__construct(
'custom_instagram_widget', 
__('Custom Instagram', 'ciw'), 
array( 'description' => __( 'Custom Instagram Widget', 'ciw' ), ) 
);
}

// Creating widget front-end
public function widget( $args, $instance ) {
$ciw_title = apply_filters( 'widget_title', $instance['ciw_title'] );
$username =  $instance['ciw_username'] ;
$ciw_image_padding =  $instance['ciw_image_padding'] ;
$ciw_image_padding_unit =  $instance['ciw_image_padding_unit'] ;
$ciw_follow_button_text =  $instance['ciw_follow_button_text'] ;

// before and after widget arguments are defined by themes
//echo $args['before_widget'];
//if ( ! empty( $userid ) )
echo $args['before_title'] . $ciw_title . $args['after_title'];

  function cwi_instagram($url){
   $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));
 
   $feed_data = curl_exec($ch);
   curl_close($ch);
   return $feed_data;
  }
  
  $user_data = cwi_instagram("https://api.instagram.com/v1/users/search?q=".$username."&access_token=1631861081.3a81a9f.9d7b2e2bc94f42df935055677efb2c4d");
	$user_data = json_decode($user_data);
	$userid = $user_data->data[0]->id;
	

	
	
  $feed_data = cwi_instagram("https://api.instagram.com/v1/users/".$userid."/media/recent/?access_token=1631861081.3a81a9f.9d7b2e2bc94f42df935055677efb2c4d");
  $feed_data = json_decode($feed_data);
  $usernameshow = $feed_data->data[0]->user->username;
 
  echo "<div class='ciw_feed'>";
  foreach ($feed_data->data as $post) { ?>
        <a class="custom_instagram_widget" target="blank" href="<?php echo $post->link; ?>">
        <img src="<?php echo $post->images->standard_resolution->url; ?>" alt="<?php $post->caption->text ;?> "  style="margin-bottom: <?php echo $ciw_image_padding.''.$ciw_image_padding_unit; ?>; max-width:100%; height:auto;"/>
        </a>

<?php }
echo "</div>";
?>
<input type="button" class="flowbutton" onClick="window.open('https://instagram.com/<?php echo $usernameshow?>','_blank');" value='<?php echo $ciw_follow_button_text; ?>'>

<style type="text/css"> 
.flowbutton {
	font-family:'Helvetica Neue',sans-serif!important;
	font-size:18px;
	line-height:12px;
	border-radius:20px;
	-webkit-border-radius:9px;
	-moz-border-radius:20px;
	font-weight: lighter!important;
	border:0;
	text-shadow:#C17C3A 0 -1px 0;
	height:32px;
	text-transform: none!important;
} 
 
</style>

<?php
}

// Widget Backend 
public function form( $instance ) {
// show default values 
$instance = wp_parse_args((array) $instance,array( 'ciw_title' => __( 'Custom Instagram Widget', 'ciw' ), 'ciw_username' => '', 'ciw_follow_button_text' => __( 'Follow Us', 'ciw' ), 'ciw_image_padding' => 3, 'ciw_image_padding_unit' => __( 'px', 'ciw' ) ));
$ciw_username = $instance[ 'ciw_username' ];
$ciw_title = $instance[ 'ciw_title' ];
$ciw_image_padding = $instance[ 'ciw_image_padding' ];
$ciw_image_padding_unit = $instance[ 'ciw_image_padding_unit' ];
$ciw_follow_button_text = $instance[ 'ciw_follow_button_text' ];

// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'ciw_title' ); ?>"><?php _e( 'Title:','ciw' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'ciw_title' ); ?>" name="<?php echo $this->get_field_name( 'ciw_title' ); ?>" type="text" value="<?php echo esc_attr( $ciw_title ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'ciw_username' ); ?>"><?php _e( 'User Name:','ciw' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'ciw_username' ); ?>" name="<?php echo $this->get_field_name( 'ciw_username' ); ?>" type="text" value="<?php echo esc_attr( $ciw_username ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('ciw_image_padding') ?>"><?php _e('Space between Images:','ciw');?></label>
<input style="width:82%" id="<?php echo $this->get_field_id('ciw_image_padding')?>" name ="<?php echo $this->get_field_name('ciw_image_padding');?>" type="text" value="<?php echo esc_attr($ciw_image_padding); ?>"/>
<select class="ciw_padding_unit" id="<?php echo $this->get_field_id( 'ciw_image_padding_unit' ); ?>" name="<?php echo $this->get_field_name( 'ciw_image_padding_unit' ); ?>">
  <option  <?php if ( 'px' == $ciw_image_padding_unit ) echo 'selected="selected"'; ?> value="px">PX</option>
  <option  <?php if ( '%' == $ciw_image_padding_unit ) echo 'selected="selected"'; ?> value="%">%</option>
  
</select>
</p>


<p>
<label for="<?php echo $this->get_field_id( 'ciw_follow_button_text' ); ?>"><?php _e( 'Follw Button Text:','ciw' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'ciw_follow_button_text' ); ?>" name="<?php echo $this->get_field_name( 'ciw_follow_button_text' ); ?>" type="text" value="<?php echo esc_attr( $ciw_follow_button_text ); ?>" />
</p>


<style type="text/css">
.ciw_padding_unit {
   
    vertical-align: baseline!important;
}              
</style>
<?php 
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['ciw_username'] = ( ! empty( $new_instance['ciw_username'] ) ) ? strip_tags( $new_instance['ciw_username'] ) : '';
$instance['ciw_title'] = ( ! empty( $new_instance['ciw_title'] ) ) ? strip_tags( $new_instance['ciw_title'] ) : '';
$instance['ciw_image_padding'] = ( ! empty( $new_instance['ciw_image_padding'] ) ) ? strip_tags( $new_instance['ciw_image_padding'] ) : '';
$instance['ciw_image_padding_unit'] = ( ! empty( $new_instance['ciw_image_padding_unit'] ) ) ? strip_tags( $new_instance['ciw_image_padding_unit'] ) : '';
$instance['ciw_follow_button_text'] = ( ! empty( $new_instance['ciw_follow_button_text'] ) ) ? strip_tags( $new_instance['ciw_follow_button_text'] ) : '';

return $instance;
}
} // Class custom_instagram_widget ends here

// Register and load the widget
function custom_instagram_load_widget() {
    register_widget( 'custom_instagram_widget' );
}
add_action( 'widgets_init', 'custom_instagram_load_widget' );
?>