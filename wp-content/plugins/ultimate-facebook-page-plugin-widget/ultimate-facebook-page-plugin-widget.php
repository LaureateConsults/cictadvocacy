<?php
/**
 * @package Ultimate Facebook Page Plugin Widget
*/
/*
Plugin Name: Ultimate Facebook Page Plugin Widget
Plugin URI: http://www.connexdallas.com/
Description: Facebook Latest Version 2.3 based widget. Thanks for installing Ultimate Facebook Page Plugin Widget.
Version: 1.0
Author: VisualScope
Author URI: http://www.connexdallas.com
*/

class UltimateFacebookPagePlugin extends WP_Widget{
    
    public function __construct() {
        $params = array(
            'description' => 'Facebook Latest Version 2.3 based widget. Thanks for installing Ultimate Facebook Page Plugin Widget.',
            'name' => 'Ultimate Facebook Page Plugin Widget'
        );
        parent::__construct('UltimateFacebookPagePlugin','',$params);
    }
    
    public function form($instance) {
        extract($instance);
        
        ?>
<!-- here will put all widget configuration -->
<p>
    <label for="<?php echo $this->get_field_id('title');?>">Title : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('title');?>"
    name="<?php echo $this->get_field_name('title');?>"
        value="<?php echo !empty($title) ? $title : "Facebook Widget Plus"; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id('name');?>">Name : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('name');?>"
    name="<?php echo $this->get_field_name('name');?>"
        value="<?php echo !empty($name) ? $name : "Facebook"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('href');?>">Facebook Page URL : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('href');?>"
    name="<?php echo $this->get_field_name('href');?>"
        value="<?php echo !empty($href) ? $href : "https://www.facebook.com/FacebookDevelopers"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('width');?>">Width : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('width');?>"
    name="<?php echo $this->get_field_name('width');?>"
        value="<?php echo !empty($width) ? $width : "300"; ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('height');?>">Height : </label>
    <input
    class="widefat"
    id="<?php echo $this->get_field_id('height');?>"
    name="<?php echo $this->get_field_name('height');?>"
        value="<?php echo !empty($height) ? $height : "550"; ?>" />
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'hide_cover' ); ?>">Cover Photo:</label> 
    <select id="<?php echo $this->get_field_id( 'hide_cover' ); ?>"
        name="<?php echo $this->get_field_name( 'hide_cover' ); ?>"
        class="widefat" style="width:100%;">
           <option value="false" <?php if ($hide_cover == 'false') echo 'selected="false"'; ?> >No</option>  
            <option value="true" <?php if ($hide_cover == 'true') echo 'selected="true"'; ?> >Yes</option>
              
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'face' ); ?>">Show Faces:</label> 
    <select id="<?php echo $this->get_field_id( 'face' ); ?>"
        name="<?php echo $this->get_field_name( 'face' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($face == 'true') echo 'selected="true"'; ?> >Yes</option>
            <option value="false" <?php if ($face == 'false') echo 'selected="false"'; ?> >No</option>  
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id( 'header' ); ?>">Show Header:</label> 
    <select id="<?php echo $this->get_field_id( 'header' ); ?>"
        name="<?php echo $this->get_field_name( 'header' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($face == 'header') echo 'selected="header"'; ?> >Yes</option>
            <option value="false" <?php if ($face == 'header') echo 'selected="header"'; ?> >No</option>    
    </select>
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'post' ); ?>">Show Post:</label> 
    <select id="<?php echo $this->get_field_id( 'post' ); ?>"
        name="<?php echo $this->get_field_name( 'post' ); ?>"
        class="widefat" style="width:100%;">
            <option value="true" <?php if ($post == 'true') echo 'selected="true"'; ?> >Yes</option>
            <option value="false" <?php if ($post == 'false') echo 'selected="false"'; ?> >No</option>  
    </select>
</p>

<p>
    <label for="<?php echo $this->get_field_id( 'lang' ); ?>">Language:</label> 
    <select id="<?php echo $this->get_field_id( 'lang' ); ?>"
        name="<?php echo $this->get_field_name( 'lang' ); ?>"
        class="widefat" style="width:100%;">
            <option value="en_US" <?php if ($lang == 'en_US') echo 'selected="en_US"'; ?> >English [US]</option>
            <option value="en_GB" <?php if ($lang == 'en_GB') echo 'selected="en_GB"'; ?> >English (UK)</option>
            <option value="af_ZA" <?php if ($lang == 'af_ZA') echo 'selected="af_ZA"'; ?> >Afrikaans</option>
            <option value="ar_AR" <?php if ($lang == 'ar_AR') echo 'selected="ar_AR"'; ?> >Arabic</option>
            <option value="ay_BO" <?php if ($lang == 'ay_BO') echo 'selected="ay_BO"'; ?> >Aymara</option>
            <option value="az_AZ" <?php if ($lang == 'az_AZ') echo 'selected="az_AZ"'; ?> >Azeri</option>
            <option value="be_BY" <?php if ($lang == 'be_BY') echo 'selected="be_BY"'; ?> >Belarusian</option>
            <option value="bg_BG" <?php if ($lang == 'bg_BG') echo 'selected="bg_BG"'; ?> >Bulgarian</option>
            <option value="bn_IN" <?php if ($lang == 'bn_IN') echo 'selected="bn_IN"'; ?> >Bengali</option>
            <option value="bs_BA" <?php if ($lang == 'bs_BA') echo 'selected="bs_BA"'; ?> >Bosnian</option>
            <option value="ca_ES" <?php if ($lang == 'ca_ES') echo 'selected="ca_ES"'; ?> >Catalan</option>
            <option value="ck_US" <?php if ($lang == 'ck_US') echo 'selected="ck_US"'; ?> >Cherokee</option>
            <option value="cs_CZ" <?php if ($lang == 'cs_CZ') echo 'selected="cs_CZ"'; ?> >Czech</option>
            <option value="cy_GB" <?php if ($lang == 'cy_GB') echo 'selected="cy_GB"'; ?> >Welsh</option>
            <option value="da_DK" <?php if ($lang == 'da_DK') echo 'selected="da_DK"'; ?> >Danish</option>
            <option value="el_GR" <?php if ($lang == 'el_GR') echo 'selected="el_GR"'; ?> >Greek</option>
           



            <option value="en_PI" <?php if ($lang == 'en_PI') echo 'selected="en_PI"'; ?> >English (Pirate)</option>
            <option value="en_UD" <?php if ($lang == 'en_UD') echo 'selected="en_UD"'; ?> >English (Upside Down)</option>
          
            <option value="eo_EO" <?php if ($lang == 'eo_EO') echo 'selected="eo_EO"'; ?> >Esperanto</option>
            <option value="es_CL" <?php if ($lang == 'es_CL') echo 'selected="es_CL"'; ?> >Spanish (Chile)</option>
            <option value="es_CO" <?php if ($lang == 'es_CO') echo 'selected="es_CO"'; ?> >Spanish (Colombia)</option>
            <option value="es_ES" <?php if ($lang == 'es_ES') echo 'selected="es_ES"'; ?> >Spanish (Spain)</option>
            <option value="es_LA" <?php if ($lang == 'es_LA') echo 'selected="es_LA"'; ?> >Spanish</option>
            <option value="es_MX" <?php if ($lang == 'es_MX') echo 'selected="es_MX"'; ?> >Spanish (Mexico)</option>
            <option value="es_VE" <?php if ($lang == 'es_VE') echo 'selected="es_VE"'; ?> >Spanish (Venezuela)</option>
            <option value="et_EE" <?php if ($lang == 'et_EE') echo 'selected="et_EE"'; ?> >Estonian</option>
            <option value="eu_ES" <?php if ($lang == 'eu_ES') echo 'selected="eu_ES"'; ?> >Basque</option>
            <option value="fa_IR" <?php if ($lang == 'fa_IR') echo 'selected="fa_IR"'; ?> >Persian</option>
            <option value="fb_LT" <?php if ($lang == 'fb_LT') echo 'selected="fb_LT"'; ?>>Leet Speak</option>
            <option value="fi_FI" <?php if ($lang == 'fi_FI') echo 'selected="fi_FI"'; ?>>Finnish</option>
            <option value="fo_FO" <?php if ($lang == 'fo_FO') echo 'selected="fo_FO"'; ?>>Faroese</option>
            <option value="fr_CA" <?php if ($lang == 'fr_CA') echo 'selected="fr_CA"'; ?>>French (Canada)</option>
            <option value="fr_FR" <?php if ($lang == 'fr_FR') echo 'selected="fr_FR"'; ?>>French (France)</option>
            <option value="ga_IE" <?php if ($lang == 'ga_IE') echo 'selected="ga_IE"'; ?>>Irish</option>
            <option value="gl_ES" <?php if ($lang == 'gl_ES') echo 'selected="gl_ES"'; ?>>Galician</option>
            <option value="gn_PY" <?php if ($lang == 'gn_PY') echo 'selected="gn_PY"'; ?>>Guarani</option>
            <option value="gu_IN" <?php if ($lang == 'gu_IN') echo 'selected="gu_IN"'; ?>>Gujarati</option>
            <option value="he_IL" <?php if ($lang == 'he_IL') echo 'selected="he_IL"'; ?>>Hebrew</option>
            <option value="hi_IN" <?php if ($lang == 'hi_IN') echo 'selected="hi_IN"'; ?>>Hindi</option>
            <option value="hr_HR" <?php if ($lang == 'hr_HR') echo 'selected="enhr_HR_GB"'; ?>>Croatian</option>
            <option value="hu_HU" <?php if ($lang == 'hu_HU') echo 'selected="hu_HU"'; ?>>Hungarian</option>
            <option value="hy_AM" <?php if ($lang == 'hy_AM') echo 'selected="hy_AM"'; ?>>Armenian</option>
            <option value="id_ID" <?php if ($lang == 'id_ID') echo 'selected="id_ID"'; ?>>Indonesian</option>
            <option value="is_IS" <?php if ($lang == 'is_IS') echo 'selected="is_IS"'; ?>>Icelandic</option>
            <option value="it_IT" <?php if ($lang == 'it_IT') echo 'selected="it_IT"'; ?>>Italian</option>
            <option value="ja_JP" <?php if ($lang == 'ja_JP') echo 'selected="ja_JP"'; ?>>Japanese</option>
            <option value="jv_ID" <?php if ($lang == 'jv_ID') echo 'selected="jv_ID"'; ?>>Javanese</option>
            <option value="ka_GE" <?php if ($lang == 'ka_GE') echo 'selected="ka_GE"'; ?>>Georgian</option>
            <option value="kk_KZ" <?php if ($lang == 'kk_KZ') echo 'selected="kk_KZ"'; ?>>Kazakh</option>
            <option value="km_KH" <?php if ($lang == 'km_KH') echo 'selected="km_KH"'; ?>>Khmer</option>
            <option value="kn_IN" <?php if ($lang == 'kn_IN') echo 'selected="kn_IN"'; ?>>Kannada</option>
            <option value="ko_KR" <?php if ($lang == 'ko_KR') echo 'selected="ko_KR"'; ?>>Korean</option>
            <option value="ku_TR" <?php if ($lang == 'ku_TR') echo 'selected="ku_TR"'; ?>>Kurdish</option>
            <option value="la_VA" <?php if ($lang == 'la_VA') echo 'selected="la_VA"'; ?>>Latin</option>
            <option value="li_NL" <?php if ($lang == 'li_NL') echo 'selected="li_NL"'; ?>>Limburgish</option>
            <option value="lt_LT" <?php if ($lang == 'lt_LT') echo 'selected="lt_LT"'; ?>>Lithuanian</option>
            <option value="lv_LV" <?php if ($lang == 'lv_LV') echo 'selected="lv_LV"'; ?>>Latvian</option>
            <option value="mg_MG" <?php if ($lang == 'mg_MG') echo 'selected="mg_MG"'; ?>>Malagasy</option>
            <option value="mk_MK" <?php if ($lang == 'mk_MK') echo 'selected="mk_MK"'; ?>>Macedonian</option>
            <option value="ml_IN" <?php if ($lang == 'ml_IN') echo 'selected="ml_IN"'; ?>>Malayalam</option>
            <option value="mn_MN" <?php if ($lang == 'mn_MN') echo 'selected="mn_MN"'; ?>>Mongolian</option>
            <option value="mr_IN" <?php if ($lang == 'mr_IN') echo 'selected="mr_IN"'; ?>>Marathi</option>
            <option value="ms_MY" <?php if ($lang == 'ms_MY') echo 'selected="ms_MY"'; ?>>Malay</option>
            <option value="mt_MT" <?php if ($lang == 'mt_MT') echo 'selected="mt_MT"'; ?>>Maltese</option>
            <option value="nb_NO" <?php if ($lang == 'nb_NO') echo 'selected="nb_NO"'; ?>>Norwegian (bokmal)</option>
            <option value="ne_NP" <?php if ($lang == 'ne_NP') echo 'selected="ne_NP"'; ?>>Nepali</option>
            <option value="nl_BE" <?php if ($lang == 'nl_BE') echo 'selected="nl_BE"'; ?>>Dutch (Belgie)</option>
            <option value="nl_NL" <?php if ($lang == 'nl_NL') echo 'selected="nl_NL"'; ?>>Dutch</option>
            <option value="nn_NO" <?php if ($lang == 'nn_NO') echo 'selected="nn_NO"'; ?>>Norwegian (nynorsk)</option>
            <option value="pa_IN" <?php if ($lang == 'pa_IN') echo 'selected="pa_IN"'; ?>>Punjabi</option>
            <option value="pl_PL" <?php if ($lang == 'pl_PL') echo 'selected="pl_PL"'; ?>>Polish</option>
            <option value="ps_AF" <?php if ($lang == 'ps_AF') echo 'selected="ps_AF"'; ?>>Pashto</option>
            <option value="pt_BR" <?php if ($lang == 'pt_BR') echo 'selected="pt_BR"'; ?>>Portuguese (Brazil)</option>
            <option value="pt_PT" <?php if ($lang == 'pt_PT') echo 'selected="pt_PT"'; ?>>Portuguese (Portugal)</option>
            <option value="qu_PE" <?php if ($lang == 'qu_PE') echo 'selected="qu_PE"'; ?>>Quechua</option>
            <option value="rm_CH" <?php if ($lang == 'en_GB') echo 'selected="en_GB"'; ?>>Romansh</option>
            <option value="ro_RO" <?php if ($lang == 'en_GB') echo 'selected="en_GB"'; ?>>Romanian</option>
            <option value="ru_RU" <?php if ($lang == 'ru_RU') echo 'selected="ru_RU"'; ?>>Russian</option>
            <option value="sa_IN" <?php if ($lang == 'sa_IN') echo 'selected="sa_IN"'; ?>>Sanskrit</option>
            <option value="se_NO" <?php if ($lang == 'en_GB') echo 'selected="en_GB"'; ?>> Northern Sami</option>
            <option value="sk_SK" <?php if ($lang == 'sk_SK') echo 'selected="sk_SK"'; ?>>Slovak</option>
            <option value="sl_SI" <?php if ($lang == 'sl_SI') echo 'selected="sl_SI"'; ?>>Slovenian</option>
            <option value="so_SO" <?php if ($lang == 'so_SO') echo 'selected="so_SO"'; ?>>Somali</option>
            <option value="sq_AL" <?php if ($lang == 'sq_AL') echo 'selected="sq_AL"'; ?>>Albanian</option>
            <option value="sr_RS" <?php if ($lang == 'sr_RS') echo 'selected="sr_RS"'; ?>>Serbian</option>
            <option value="sv_SE" <?php if ($lang == 'sv_SE') echo 'selected="sv_SE"'; ?>>Swedish</option>
            <option value="sw_KE" <?php if ($lang == 'sw_KE') echo 'selected="sw_KE"'; ?>>Swahili</option>
            <option value="sy_SY" <?php if ($lang == 'sy_SY') echo 'selected="sy_SY"'; ?>>Syriac</option>
            <option value="ta_IN" <?php if ($lang == 'ta_IN') echo 'selected="ta_IN"'; ?>>Tamil</option>
            <option value="tg_TJ" <?php if ($lang == 'tg_TJ') echo 'selected="tg_TJ"'; ?>>Telugu</option>
            <option value="tg_TJ" <?php if ($lang == 'tg_TJ') echo 'selected="tg_TJ"'; ?>>Tajik</option>
            <option value="th_TH" <?php if ($lang == 'th_TH') echo 'selected="th_TH"'; ?>>Thai</option>

            
            <option value="tl_PH" <?php if ($lang == 'tl_PH') echo 'selected="tl_PH"'; ?>>Filipino</option>
            <option value="tl_ST" <?php if ($lang == 'tl_ST') echo 'selected="tl_ST"'; ?>>Klingon</option>
            <option value="tr_TR" <?php if ($lang == 'tr_TR') echo 'selected="tr_TR"'; ?>>Turkish</option>
            <option value="tt_RU" <?php if ($lang == 'tt_RU') echo 'selected="tt_RU"'; ?>>Tatar</option>
            <option value="uk_UA" <?php if ($lang == 'uk_UA') echo 'selected="uk_UA"'; ?>>Ukrainian</option>
            <option value="ur_PK" <?php if ($lang == 'ur_PK') echo 'selected="ur_PK"'; ?>>Urdu</option>
            <option value="uz_UZ" <?php if ($lang == 'uz_UZ') echo 'selected="uz_UZ"'; ?>>Uzbek</option>
            <option value="vi_VN" <?php if ($lang == 'vi_VN') echo 'selected="vi_VN"'; ?>>Vietnamese</option>
            <option value="xh_ZA" <?php if ($lang == 'xh_ZA') echo 'selected="xh_ZA"'; ?>>Xhosa</option>
            <option value="yi_DE" <?php if ($lang == 'yi_DE') echo 'selected="yi_DE"'; ?>>Yiddish</option>
            <option value="zh_CN" <?php if ($lang == 'zh_CN') echo 'selected="zh_CN"'; ?>>Simplified Chinese (China)</option>
            <option value="zh_HK" <?php if ($lang == 'zh_HK') echo 'selected="zh_HK"'; ?>>Traditional Chinese (Hong Kong)</option>
            <option value="zh_TW" <?php if ($lang == 'zh_TW') echo 'selected="zh_TW"'; ?>>Traditional Chinese (Taiwan)</option>
            <option value="zu_ZA" <?php if ($lang == 'zu_ZA') echo 'selected="zu_ZA"'; ?>>Zulu</option>
          
    </select>
</p>
<?php
    }
    
    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        $title = apply_filters('widget_title', $title);
        $description = apply_filters('widget_description', $description);
    if(empty($title)) $title = "Facebook Widget Plus";
        if(empty($name)) $name = "Facebook";
        if(empty($href)) $href = "http://www.facebook.com/FacebookDevelopers";
        if(empty($width)) $width = "300";
        if(empty($height)) $height = "550";
        if(empty($hide_cover)) $hide_cover = "false";
        if(empty($face)) $face = "true";
        if(empty($header)) $header = "true";
        if(empty($post)) $post = "true";
        if(empty($lang))$lang="en_US";
        echo $before_widget;
            echo $before_title . $title . $after_title;


            
            ?>

    

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo $lang; ?>/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        
    <div class="fb-page" 
      data-href="<?php echo $href; ?>"
      data-width="<?php echo $width; ?>" 
      data-height="<?php echo $height; ?>"
      data-small-header="<?php echo $header; ?>" 
      data-adapt-container-width="<?php echo $adapt_container_width; ?>" 
      data-hide-cover="<?php echo $hide_cover; ?>" 
      data-show-facepile="<?php echo $face; ?>" 
      data-show-posts="<?php echo $post; ?>">
      <div class="fb-xfbml-parse-ignore">
      <blockquote cite="<?php echo $href; ?>">
      <a href="<?php echo $href; ?>"><?php echo $name; ?></a>
      </blockquote>
      </div>
</div>
<div style='font-size: 9px; color: #808080; font-weight: normal; font-family: tahoma,verdana,arial,sans-serif; line-height: 1.28; text-align: right; direction: ltr;'><a href="http://www.novusglassredmond.com/" target="_blank" style="color: #808080;" title="Redmond Novus">Windshield Repair Redmond</a></div>
<?php
        echo $after_widget;
    }
}

add_action('widgets_init','register_UltimateFacebookPagePlugin');
function register_UltimateFacebookPagePlugin(){
    register_widget('UltimateFacebookPagePlugin');
}
