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

class MGWESpaceRemoverAdmin extends MGWESpaceRemover{
    
        private  $l10n_prefix;
        public   $allowedPostTypes;
      
    
   /**
    * Contructs the custom admin class
    * Adds actions
    *
    * @author 	MG
    * @since 	1.0
    *
    */
	public function __construct($l10n_prefix){
            
                $this->I10n_prefix = $l10n_prefix;

                             
                
                add_action('admin_init', array( &$this, 'mgwe_admin_register_settings' ), 999 );
                add_action('admin_footer', array( &$this, 'mgwe_admin_js' ), 999 );
                add_action('admin_menu', array( &$this, 'mgwe_admin_actions' ), 999 );
                add_action('admin_menu', array( &$this, 'mgwe_admin_add_meta_box' ), 999 );
                add_action('save_post', array( &$this, 'mgwe_admin_save_meta_box' ), 999 );



        }


   /**
    * Plugin localization
    *
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_admin_add_meta_box(){

             if(get_option('hide_metabox') == 'on') return;

            $this->allowedPostTypes = $this->__mgwe_get_post_types();

            foreach( $this->allowedPostTypes as $type ) {
                  //add_meta_box('featured-meta', 'Feature Me?', 'custom_meta_featured', $type, 'side');
                   add_meta_box( 'mgwe_meta_box', 'Space Remover', array( &$this, 'mgwe_meta_box' ), $type, 'side', 'high' );
            }

        }

        
   /**
    * Show meta boxes
    *
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_meta_box(){

            global $post;

           

            $values = $this->mgwe_get_custom_field('mgwe_single_disable');
            $check = ( $values == 'on' ) ? 'on' : '';

            wp_nonce_field( 'mgwe_meta_box_nonce', 'meta_box_nonce' );


            ?>
            <p>
            <?php if('on' != get_option('remove_leading') &&  'on' != get_option('remove_leading') && 'on' != get_option('remove_all')){ ?>
                    <label for="mgwe_single_disable">
                        <?php _e('The Space Remover is disabled.',$this->I10n_prefix) ?><br/>
                        <a href="<?php echo admin_url( 'options-general.php?page=MGWESpaceRemover' ); ?>"><?php _e('Click here to edit these settings.',$this->I10n_prefix) ?></a>

                    </label>
            <?php  }else{ ?>
                    <input type="checkbox" id="mgwe_single_disable" name="mgwe_single_disable" <?php checked( $check, 'on' ); ?> />
                    <label for="mgwe_single_disable"><?php _e('Disable Space Remover for this page',$this->I10n_prefix) ?></label>
            <?php  } ?>
            </p>
            <?php
        }


  /**
    * Save meta boxes
    *
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_admin_save_meta_box( $post_id ){
            // exit if doing an auto save
            if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

            // if nonce isn't there, or we can't verify it, exit
            if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'mgwe_meta_box_nonce' ) ) return;

            // if current user can't edit this post, exit
            if( !current_user_can( 'edit_posts' ) ) return;


            // Save the data
            $chk = isset( $_POST['mgwe_single_disable'] ) && $_POST['mgwe_single_disable'] ? 'on' : 'off';
            update_post_meta( $post_id, 'mgwe_single_disable', $chk );
        }

  
   /**
    * Register the admin options
    *
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_admin_actions($content){
             add_options_page("MGWE Space Remover", "MGWE Space Remover", "edit_pages", "MGWESpaceRemover", array( &$this, 'mgwe_space_remover_admin' ));
        }


   /**
    * Admin options page
    *
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_space_remover_admin(){
             ?>
            <div class="wrap">
                <h2>MGWE Space Remover</h2>
                <h3>Plugin Options</h3>
                <form method="post" action="options.php">
                    <?php settings_fields( 'mgwe_space_remover_settings' ); ?>
                    <?php $allChecked = (get_option('remove_all') == 'on') ? true : false ?>
                    <?php _e('Either remove all spaces, or specify if you want to remove leading or trailing spaces.', $this->I10n_prefix) ?><br/>
                    <?php _e('This setting can be set separately for individual posts and pages.', $this->I10n_prefix) ?>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row"><?php _e('Remove all leading & trailing spaces', $this->I10n_prefix); ?></th>
                            <td><input type="checkbox" name="remove_all" value="on" class="checkbox general-option" <?php echo ('on' == $allChecked) ? 'checked="checked"' : '';  ?> /></td>
                        </tr>
                        <tr valign="top"><td colspan="2">&nbsp;</td></tr>
                        <tr valign="top">
                            <th scope="row"><?php _e('Remove leading spaces only', $this->I10n_prefix); ?></th>
                            <td><input type="checkbox" name="remove_leading" value="on" class="checkbox single-option" <?php echo ('on' == get_option('remove_leading') && !$allChecked) ? 'checked="checked"' : '';  ?> <?php echo ($allChecked) ? 'disabled="disabled"' : '' ?>  /></td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><?php _e('Remove trailing spaces only', $this->I10n_prefix); ?></th>
                            <td><input type="checkbox" name="remove_trailing" value="on" class="checkbox single-option" <?php echo ('on' == get_option('remove_trailing') && !$allChecked) ? 'checked="checked"' : '';  ?> <?php echo ($allChecked) ? 'disabled="disabled"' : '' ?> /></td>
                        </tr>
                        <tr valign="top"><td colspan="2">&nbsp;</td></tr>
                        <tr valign="top">
                            <th scope="row"><?php _e('Hide "disable" metabox', $this->I10n_prefix); ?></th>
                            <td><input type="checkbox" name="hide_metabox" value="on" class="checkbox single-option" <?php echo ('on' == get_option('hide_metabox')) ? 'checked="checked"' : '';  ?>  /></td>
                        </tr>

                    </table>


                    <?php submit_button(); ?>

                </form>
            </div>

             <?php
        }

   /**
    * Register admin options settings 
    * 
    * @author 	MG
    * @since 	1.0
    *
    */
        public function mgwe_admin_register_settings() {
                
                register_setting( 'mgwe_space_remover_settings', 'remove_leading' );
                register_setting( 'mgwe_space_remover_settings', 'remove_trailing' );
                register_setting( 'mgwe_space_remover_settings', 'remove_all' );
                register_setting( 'mgwe_space_remover_settings', 'hide_metabox' );

        }


        public function mgwe_admin_js(){
            ?>
            <script type="text/javascript">
              var $ = jQuery;
              jQuery(".general-option").change(function() {
                    if(this.checked) {
                        jQuery('.single-option').attr('checked', false);
                        jQuery('.single-option').attr("disabled", true);
                    }else{
                        jQuery('.single-option').removeAttr("disabled");
                    }
                });
            </script>
            <?php
        }
 
    /* Get a list of all the post types
     * @author 	MG
     * @since 	1.1
     */
        private function __mgwe_get_post_types(){

            $args = array(
               'public'   => true,
               '_builtin' => false
            );

            $output = 'names'; // names or objects, note names is the default
            $operator = 'and'; // 'and' or 'or'

            $post_types = get_post_types( $args, $output, $operator );
            $post_types['post'] = 'post';
            $post_types['page'] = 'page';

            return $post_types;
        }


}
