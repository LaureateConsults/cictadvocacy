<?php
/*  Copyright 2012-2015 MG

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class MGWESpaceRemover{


    protected $PluginPath;
    protected $PluginUrl;
    private  $I10n_prefix;
    public static $Admin;
    
    
   /**
    * Contructs the custom admin class
    * Adds actions
    *
    * @author 	MG
    * @since 	1.0
    *
    */
	public function __construct(){

                //require_once MGWE_SPACEREMOVER_ABSPATH . 'classes/mgwe_space_remover_admin_class.php';
              //  MGWESpaceRemoverAdmin::Init();
                
              
                // Set Plugin Path
                $this->PluginPath = dirname(__FILE__);

                // Set Plugin URL
                $this->PluginUrl = WP_PLUGIN_URL . '/space-remover';

                $this->I10n_prefix = 'mgwe_space_remover';
                $this->Admin = new MGWESpaceRemoverAdmin($this->I10n_prefix);
                
                add_action( 'admin_init', array(&$this, 'mgwe_localization_init' ));
		add_action('the_content',array( &$this, 'mgwe_content_filter' ), 999 );
          

        }


   /**
    * Plugin localization
    *
    * @author 	MG
    * @since 	1.0
    *
    *
    */
        public function mgwe_localization_init() {
		load_plugin_textdomain( $this->I10n_prefix, false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
	}


   /**
    * Remove spaces based on admin settings
    *
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_content_filter($content){
            $new_content = $content;

            
            $disabled = ( 'on' == $this->mgwe_get_custom_field('mgwe_single_disable') ) ? true : false;
            

            if(!$disabled){

                if('on' == get_option('remove_all')){

                    $new_content = preg_replace('!(^(\s*<p>(\s|&nbsp;)*</p>\s*)*|(\s*<p>(\s|&nbsp;)*</p>)*\s*\Z)!em', '', $new_content);
					$new_content = trim($new_content);

                }else{

                    if('on' == get_option('remove_leading')){
                        $new_content = preg_replace('!(^(\s*<p>(\s|&nbsp;)*</p>\s*)*)!', '', $new_content);
						$new_content = ltrim($new_content);
                    }

                    if('on' == get_option('remove_trailing')){
                        $new_content = preg_replace('!(^(\s*<p>(\s|&nbsp;)*</p>)*\s*\Z)!em', '', $new_content);
						$new_content = rtrim($new_content);
                    }

                }
                
            }


            return $new_content;

        }


   /**
    * Return custom field value
    *
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_get_custom_field( $value ) {
            global $post;

            $custom_field = get_post_meta( $post->ID, $value, true );
            if ( !empty( $custom_field ) )
                    return is_array( $custom_field ) ? stripslashes_deep( $custom_field ) : stripslashes( wp_kses_decode_entities( $custom_field ) );

            return false;
        }

  

}
