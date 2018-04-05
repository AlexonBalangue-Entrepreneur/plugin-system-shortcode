<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	3.9.6
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('fbjdk_sc')) {
	function fbjdk_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'appid' => '', 
				'xfbml' => '', 
				'status' => '', 
				'kiddirectedsite' => '', 
				'version' => '', 
				'debug' => 'debug', 
				'lang' => ''
		 ), $atts));
		 
		$output = ($appid !='') ? 'appId : \''.$appid.'\',' : '\'Use appid="your ID Application"\',';
		$output .= ($xfbml !='') ? 'xfbml : \''.$xfbml.'\',' : 'xfbml : \'true\',';
		$output .= ($status !='') ? 'status : \''.$xfbml.'\',' : '';
		$output .= ($kiddirectedsite !='') ? 'kidDirectedSite : \''.$kiddirectedsite.'\',' : '';
		$output .= ($version !='') ? 'version : \'v'.$version.'\'' : 'version : \'v2.5\'';
		$debugs = ($lang !='') ? $lang : 'sdk';
		$langs = ($lang !='') ? $lang : 'en_US';

		return '<div id="fb-root"></div><script>window.fbAsyncInit = function() { FB.init({'.$output.'}); }; (function(d, s, id){ var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/'.$langs.'/'.$debugs.'.js"; fjs.parentNode.insertBefore(js, fjs); }(document, \'script\', \'facebook-jssdk\'));</script>' . $content;
	}
		
	add_bbcodes( 'facebook-sdk', 'fbjdk_sc' );
}
//likes facebook
if(!function_exists('fblikes_sc')) {

	function fblikes_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array( ), $atts));
		 
		return '<div class="fb-like"></div>' . $content;
	}
		
	add_bbcodes( 'facebook-likes', 'fblikes_sc' );
}
//share FACEBOOK
if(!function_exists('fbshare_sc')) {

	function fbshare_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'protocol' => '',
				'layout' => ''
		 ), $atts));
		 
		$protocols = ($protocol !='') ? $protocol : 'https';
		$layouts = ($layout !='') ? $layout : 'button_count';

		return '<div class="fb-share-button" data-href="'.$protocols.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" data-layout="'.$layouts.'"></div>' . $content;
	}
		
	add_bbcodes( 'facebook-share', 'fbshare_sc' );
}
// SEND FACEBOOK
if(!function_exists('fbsend_sc')) {

	function fbsend_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'protocol' => '',
				'layout' => ''
		 ), $atts));
		 
		$protocols = ($protocol !='') ? $protocol : 'https';
		$layouts = ($layout !='') ? $layout : 'button_count';

		return '<div class="fb-send" data-href="'.$protocols.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" data-layout="'.$layouts.'"></div>' . $content;
	}
		
	add_bbcodes( 'facebook-send', 'fbsend_sc' );
}
// post FACEBOOK
if(!function_exists('fbpost_sc')) {

	function fbpost_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'href' => '',
				'width' => ''
		 ), $atts));
		 
		$option = ($href !='') ? ' data-href="http://'.$href.'"' : ' data-href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"';
		$option .= ($width !='') ? ' data-width="'.$width.'"' : ' data-width="300"';

		return '<div class="fb-send"'.$option.'></div>' . $content;
	}
		
	add_bbcodes( 'facebook-post', 'fbpost_sc' );
}
// comment FACEBOOK
if(!function_exists('fbcomments_sc')) {

	function fbcomments_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'href' => '',
				'width' => '',
				'colorscheme' => '',
				'mobile' => '',
				'numposts' => '',
				'orderby' => ''
		 ), $atts));
		 
		$option = ($href !='') ? ' data-href="'.$href.'"' : ' data-href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'"';
		$option .= ($width !='') ? ' data-width="'.$width.'"' : 'data-width="100%"';
		$option .= ($colorscheme !='') ? ' data-colorscheme="'.$colorscheme.'"' : 'data-colorscheme="light"';
		$option .= ($mobile !='') ? ' data-mobile="'.$mobile.'"' : '';
		$option .= ($numposts !='') ? ' data-numposts="'.$numposts.'"' : 'data-numposts="10"';
		$option .= ($orderby !='') ? ' data-order-by="'.$orderby.'"' : 'data-order-by="social"';

		return '<div class="fb-comments"'.$option.'></div>' . $content;
	}
		
	add_bbcodes( 'facebook-comments', 'fbcomments_sc' );
}
// follow FACEBOOK
if(!function_exists('fbfollow_sc')) {

	function fbfollow_sc( $atts, $content ) {
		extract(bbcodes_atts(array(
				'username' => '',
				'width' => '',
				'colorscheme' => '',
				'kiddirectedsite' => '',
				'layout' => '',
				'showfaces' => ''
		 ), $atts));
		 
		$option = ($username !='') ? ' data-href="https://www.facebook.com/'.$username.'"' : '';
		$option .= ($width !='') ? ' data-width="'.$width.'"' : '';
		$option .= ($colorscheme !='') ? ' data-colorscheme="'.$colorscheme.'"' : 'data-colorscheme="light"';
		$option .= ($kiddirectedsite !='') ? ' data-kid-directed-site="'.$kiddirectedsite.'"' : '';
		$option .= ($layout !='') ? ' data-layout="'.$layout.'"' : ' data-layout="box_count"';
		$option .= ($showfaces !='') ? ' data-show-faces="'.$showfaces.'"' : '';

		return '<div class="fb-follow"'.$option.'></div>' . $content;
	}
		
	add_bbcodes( 'facebook-follow', 'fbfollow_sc' );
}
if(!function_exists('twittersdk_sc')) {

	function twittersdk_sc( $atts, $content="") {
        ob_start(); 
        ?>
			<script src="//platform.twitter.com/widgets.js" charset="utf-8" async defer></script><?php 
				echo $content;
        return ob_get_clean();
	}
		
	add_bbcodes( 'twitter-sdk', 'twittersdk_sc' );
}
// twitter
if(!function_exists('twitter_sc')) {

	function twitter_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'lang' => '',
				'size' => '',
				'related' => '',
				'dnt' => '',
				'showcount' => '',
				'followurl' => '',
				'shareurl' => '',
				'mentionurl' => '',
				'hashtagurl' => '',
				'customtxt' => ''
		 ), $atts));
		 
		$option = ($lang !='') ? ' data-lang="'.$lang.'"' : 'data-lang="en"';
		$option .= ($size !='') ? ' data-size="'.$size.'"' : '';
		$option .= ($related !='') ? ' data-related="'.$related.'"' : '';
		$option .= ($dnt !='') ? ' data-dnt="'.$dnt.'"' : '';
		$option .= ($showcount !='') ? ' data-show-count="'.$showcount.'"' : '';
		$option .= ($class !='') ? ' class="twitter-'.$class.'-button"' : '';
		$option .= ($followurl !='') ? ' href="//twitter.com/'.$followurl.'"' : '';
		$option .= ($shareurl !='') ? ' href="//twitter.com/'.$shareurl.'"' : '';
		$option .= ($mentionurl !='') ? ' href="//twitter.com/intent/tweet?screen_name='.$mentionurl.'"' : '';
		$option .= ($hashtagurl !='') ? ' href="//twitter.com/intent/tweet?button_hashtag='.$hashtagurl.'"' : '';
		$customtxt_output = ($customtxt !='') ? $customtxt : '<i class="fa fa-twitter fa-2x"></i> Follow us';

		return '<a'.$option.'>'.$customtxt_output.'</a>' . $content;
	}
		
	add_bbcodes( 'twitter', 'twitter_sc' );
}

if(!function_exists('goolesdk_sc')) {

	function goolesdk_sc( $atts, $content="") {
        ob_start(); 
        ?>
			<script src="https://apis.google.com/js/platform.js" async defer></script>
		<?php 
			echo $content;
        return ob_get_clean();
	}
		
	add_bbcodes( 'google-sdk', 'goolesdk_sc' );
}// googleplus
if(!function_exists('googleplus_sc')) {

	function googleplus_sc( $atts, $content ) {
		extract(bbcodes_atts(array(
				'tags' => '',//plusone|follow|hangout
				'parsetags' => '',//onload|explicit
				'lang' => '',//en-US|fr|pt-PT|fil
				'pageid' => '',//PageID
				'rel' => '',//author|publisher
				'size' => '',//small|medium|standard|tall
				'annotation' => '',//none|bubble|vertical-bubble
				'width' => '',
				'height' => '',
				'align' => '',//right|left
				'expanto' => '',//top|right|left|bottom
				'count' => '',//none|true|false
				'recommendations' => '',//true|false
				'relationshiptype' => '',//relationshipType
				/*https://developers.google.com/+/hangouts/button#async-defer*/
				'render' => '', //create_hanguver
				'topic' => '', //Topic
				'invites' => '',//[{ id : '2025551212', invite_type : 'PHONE' }]"
				'initial_apps' => '',//app_id : '184219133185', start_data : 'dQw4w9WgXcQ', 'app_type' : 'LOCAL_APP'
				'hangout_type' => '',
				'widget_size' => '',
		 ), $atts));
		 
		$tag = ($tags !='') ? $tags : '';
		$parsetag = ($parsetags !='') ? $parsetags : 'explicit';
		$langs = ($lang !='') ? $lang : 'en-US';
		//Onload method Google +		
		$option_onload = ($pageid !='') ? ' href="'.$pageid.'"' : '';
		$option_onload .= ($rel !='') ? ' rel="'.$rel.'"' : '';
		$option_onload .= ($align !='') ? ' align="'.$align.'"' : '';
		$option_onload .= ($size !='') ? ' size="'.$size.'"' : '';
		$option_onload .= ($annotation !='') ? ' annotation="'.$annotation.'"' : '';
		$option_onload .= ($width !='') ? ' width='.$width.'"' : '';
		$option_onload .= ($height !='') ? ' height='.$height.'"' : '';
		$option_onload .= ($expanto !='') ? ' expanTo="'.$expanto.'"' : '';
		$option_onload .= ($count !='') ? ' count="'.$count.'"' : '';
		$option_onload .= ($recommendations !='') ? ' recommendations="'.$recommendations.'"' : '';
		$option_onload .= ($render !='') ? ' render="'.$render.'"' : '';
		$option_onload .= ($topic !='') ? ' topic="'.$topic.'"' : '';
		$option_onload .= ($invites !='') ? ' invites="[{ '.$invites.' }]"' : '';
		$option_onload .= ($initial_apps !='') ? ' initial_apps="[{ '.$initial_apps.' }]"' : '';
		$option_onload .= ($hangout_type !='') ? ' hangout_type="'.$hangout_type.'"' : '';
		$option_onload .= ($widget_size !='') ? ' widget_size="'.$widget_size.'"' : '';
		//Explicit method Google +		
		$option_explicit = ($pageid !='') ? ' data-href="'.$pageid.'"' : '';
		$option_explicit .= ($rel !='') ? ' data-rel="'.$rel.'"' : '';
		$option_explicit .= ($align !='') ? ' data-align="'.$align.'"' : '';
		$option_explicit .= ($size !='') ? ' data-size="'.$size.'"' : '';
		$option_explicit .= ($annotation !='') ? ' data-annotation="'.$annotation.'"' : '';
		$option_explicit .= ($width !='') ? ' data-width='.$width.'"' : '';
		$option_explicit .= ($height !='') ? ' data-height='.$height.'"' : '';
		$option_explicit .= ($expanto !='') ? ' data-expanTo="'.$expanto.'"' : '';
		$option_explicit .= ($count !='') ? ' data-count="'.$count.'"' : '';
		$option_explicit .= ($recommendations !='') ? ' data-recommendations="'.$recommendations.'"' : '';
		$option_explicit .= ($render !='') ? ' data-render="'.$render.'"' : '';
		$option_explicit .= ($topic !='') ? ' data-topic="'.$topic.'"' : '';
		$option_explicit .= ($invites !='') ? ' data-invites="[{ '.$invites.' }]"' : '';
		$option_explicit .= ($initial_apps !='') ? ' data-initial_apps="[{ '.$initial_apps.' }]"' : '';
		$option_explicit .= ($hangout_type !='') ? ' data-hangout_type="'.$hangout_type.'"' : '';
		$option_explicit .= ($widget_size !='') ? ' data-widget_size="'.$widget_size.'"' : '';
		
		if($parsetag){
			return '<script>window.___gcfg = {lang: \''.$langs.'\',parsetags: \''.$parsetag.'\'}; gapi.follow.go();</script><div class="g-'.$tag.'"'.$option_explicit.'></div>' . $content;
		} else {
			return '<script>window.___gcfg = {lang: \''.$langs.'\',parsetags: \''.$parsetag.'\'};</script><g:'.$tag.$option_onload.'></g:'.$tag.'>' . $content;
		}
		return $content;
	}
		
	add_bbcodes( 'google-plus', 'googleplus_sc' );
}
//linkedin SDK
if(!function_exists('linkedinjdk_sc')) {

	function linkedinjdk_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'api' => '',
				'onload' => '',
				'authorize' => '',
				'lang' => ''
		 ), $atts));
		 
		$option = ($api !='') ? 'api_key: '.$api : '';
		$option .= ($onload !='') ? ', onLoad: '.$onload : '';
		$option .= ($authorize !='') ? ', authorize: '.$authorize : '';
		$option .= ($lang !='') ? ', lang: '.$lang : '';

		return '<script src="//platform.linkedin.com/in.js">'.$option.'</script>' . $content;
	}
		
	add_bbcodes( 'linkedin-sdk', 'linkedinjdk_sc' );
}
//linkedin BTN
if(!function_exists('linkedinbtn_sc')) {

	function linkedinbtn_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'type' => '',//Share|FollowCompany
				'id' => '',//if you use FollowCompany
				'url' => '',//if you use Share
				'counter' => ''//top|right
		 ), $atts));
		 
		$option = ($type !='') ? ' type="IN/'.$type.'"' : ' type="IN/Share"';
		$option .= ($id !='') ? ' data-id="'.$id.'"' : '';
		$option .= ($url !='') ? ' data-url="'.$url.'"' : '';
		$option .= ($counter !='') ? ' data-counter="'.$counter.'"' : '';

		return '<script'.$option.'></script>' . $content;
	}
		
	add_bbcodes( 'linkedin', 'linkedinbtn_sc' );
}
//Viadeo Widget
if(!function_exists('viadeowidget_sc')) {

	function viadeowidget_sc( $atts, $content ) {

		return '<div name="viadeo-widget" class="widget-share" data-share-url="'.JURI::current().'"></div><script src="//www.viadeo.com/vws/widgets/init"></script>' . $content;
	}
		
	add_bbcodes( 'viadeo', 'viadeowidget_sc' );
}
/*----------------BOTTON intermédiaire-----------------*/

if(!function_exists('AddToAny_sc')) {

	function AddToAny_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'size' => '',//32|64
				'color' => '',//unset|lightseagreen|transparent|deeppink|#0166ff|
				'counter' => '',//top|right
				'facebook' => '',
				'twitter' => '',
				'google_plus' => '',
				'pinterest' => '',
				'linkedin' => '',
				'email' => '',
				'reddit' => '',
				'tumblr' => '',
				'stumbleupon' => '',
				'wordpress' => '',
				'google_gmail' => '',
				'whatsapp' => '',
				'app_net' => '',
				'amazon_wish_list' => '',
				'aim' => '',
				'aol_mail' => '',
				'balatarin' => '',
				'baidu' => '',
				'bibsonomy' => '',
				'bitty_browser' => '',
				'blogger_post' => '',
				'blinklist' => '',
				'bookmarks_fr' => '',
				'blogmarks' => '',
				'buddymarks' => '',
				'care2_news' => '',
				'buffer' => '',
				'box_net' => '',
				'citeulike' => '',
				'delicious' => '',
				'diary_ru' => '',
				'design_float' => '',
				'diaspora' => '',
				'digg' => '',
				'diigo' => '',
				'dihitt' => '',
				'dzone' => '',
				'evernote' => '',
				'flipboard' => '',
				'fark' => '',
				'yummly' => '',
				'youmob' => '',
				'yoolink' => '',
				'yahoo_messenger' => '',
				'yahoo_mail' => '',
				'yahoo_bookmarks' => '',
				'xing' => '',
				'webnews' => '',
				'wykop' => '',
				'wanelo' => '',
				'vk' => '',
				'typepad_post' => '',
				'viadeo' => '',
				'twiddla' => '',
				'tuenti' => '',
				'svejo' => '',
				'symbaloo_feeds' => '',
				'stumpedia' => '',
				'slashdot' => '',
				'sitejot' => '',
				'sina_weibo' => '',
				'renren' => '',
				'segnalo' => '',
				'rediff' => '',
				'qzone' => '',
				'protopage_bookmarks' => '',
				'pusha' => '',
				'printfriendly' => '',
				'print' => '',
				'plurk' => '',
				'pocket' => '',
				'pinboard' => '',
				'outlook_com' => '',
				'odnoklassniki' => '',
				'oknotizie' => '',
				'nujij' => '',
				'newsvine' => '',
				'netlog' => '',
				'netvouz' => '',
				'myspace' => '',
				'mixi' => '',
				'mendeley' => '',
				'meneame' => '',
				'mail_ru' => '',
				'livejournal' => '',
				'line' => '',
				'kindle_it' => '',
				'jamespot' => '',
				'hatena' => '',
				'google_bookmarks' => '',
				'folkd' => '',
				'hacker_news' => '',
				'instapaper' => '',
				'kakao' => '',
				'known' => ''
		 ), $atts));
		 //config shortcode
		$sizes = ($size !='') ? $size : '32';
		$colors = ($color !='') ? $color : 'unset';
		if(!empty($counter)): $couters = ' a2a_counter'; else: $couters = ''; endif;
		//output HTML
		ob_start();
		echo '<div class="a2a_kit a2a_kit_size_'.$sizes.' a2a_default_style" data-a2a-icon-color="'.$colors.'" data-a2a-url="'.JURI::current().'" data-a2a-title="'.JFactory::getApplication()->get( 'sitename' ).'">';
?>
<a class="a2a_dd" href="//www.addtoany.com/share<?php echo $couters; ?>"></a>
<?php if($facebook == 'yes'): ?><a class="a2a_button_facebook<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($twitter == 'yes'): ?><a class="a2a_button_twitter<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($google_plus == 'yes'): ?><a class="a2a_button_google_plus<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($pinterest == 'yes'): ?><a class="a2a_button_pinterest<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($linkedin == 'yes'): ?><a class="a2a_button_linkedin<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($email == 'yes'): ?><a class="a2a_button_email<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($reddit == 'yes'): ?><a class="a2a_button_reddit<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($tumblr == 'yes'): ?><a class="a2a_button_tumblr<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($stumbleupon == 'yes'): ?><a class="a2a_button_stumbleupon<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($wordpress == 'yes'): ?><a class="a2a_button_wordpress<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($google_gmail == 'yes'): ?><a class="a2a_button_google_gmail<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($whatsapp == 'yes'): ?><a class="a2a_button_whatsapp<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($app_net == 'yes'): ?><a class="a2a_button_app_net<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($amazon_wish_list == 'yes'): ?><a class="a2a_button_amazon_wish_list<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($aim == 'yes'): ?><a class="a2a_button_aim<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($aol_mail == 'yes'): ?><a class="a2a_button_aol_mail<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($balatarin == 'yes'): ?><a class="a2a_button_balatarin<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($baidu == 'yes'): ?><a class="a2a_button_baidu<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($bibsonomy == 'yes'): ?><a class="a2a_button_bibsonomy<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($bitty_browser == 'yes'): ?><a class="a2a_button_bitty_browser<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($blogger_post == 'yes'): ?><a class="a2a_button_blogger_post<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($blinklist == 'yes'): ?><a class="a2a_button_blinklist<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($bookmarks_fr == 'yes'): ?><a class="a2a_button_bookmarks_fr<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($blogmarks == 'yes'): ?><a class="a2a_button_blogmarks<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($buddymarks == 'yes'): ?><a class="a2a_button_buddymarks<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($care2_news == 'yes'): ?><a class="a2a_button_care2_news<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($buffer == 'yes'): ?><a class="a2a_button_buffer<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($box_net == 'yes'): ?><a class="a2a_button_box_net<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($citeulike == 'yes'): ?><a class="a2a_button_citeulike<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($delicious == 'yes'): ?><a class="a2a_button_delicious<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($diary_ru == 'yes'): ?><a class="a2a_button_diary_ru<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($design_float == 'yes'): ?><a class="a2a_button_design_float<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($diaspora == 'yes'): ?><a class="a2a_button_diaspora<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($digg == 'yes'): ?><a class="a2a_button_digg<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($diigo == 'yes'): ?><a class="a2a_button_diigo<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($dihitt == 'yes'): ?><a class="a2a_button_dihitt<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($dzone == 'yes'): ?><a class="a2a_button_dzone<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($evernote == 'yes'): ?><a class="a2a_button_evernote<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($flipboard == 'yes'): ?><a class="a2a_button_flipboard<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($fark == 'yes'): ?><a class="a2a_button_fark<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($yummly == 'yes'): ?><a class="a2a_button_yummly<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($youmob == 'yes'): ?><a class="a2a_button_youmob<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($yoolink == 'yes'): ?><a class="a2a_button_yoolink<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($yahoo_messenger == 'yes'): ?><a class="a2a_button_yahoo_messenger<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($yahoo_mail == 'yes'): ?><a class="a2a_button_yahoo_mail<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($yahoo_bookmarks == 'yes'): ?><a class="a2a_button_yahoo_bookmarks<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($xing == 'yes'): ?><a class="a2a_button_xing<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($webnews == 'yes'): ?><a class="a2a_button_webnews<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($wykop == 'yes'): ?><a class="a2a_button_wykop<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($wanelo == 'yes'): ?><a class="a2a_button_wanelo<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($vk == 'yes'): ?><a class="a2a_button_vk<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($typepad_post == 'yes'): ?><a class="a2a_button_typepad_post<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($viadeo == 'yes'): ?><a class="a2a_button_viadeo<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($twiddla == 'yes'): ?><a class="a2a_button_twiddla<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($tuenti == 'yes'): ?><a class="a2a_button_tuenti<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($svejo == 'yes'): ?><a class="a2a_button_svejo<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($symbaloo_feeds == 'yes'): ?><a class="a2a_button_symbaloo_feeds<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($stumpedia == 'yes'): ?><a class="a2a_button_stumpedia<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($slashdot == 'yes'): ?><a class="a2a_button_slashdot<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($sitejot == 'yes'): ?><a class="a2a_button_sitejot<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($sina_weibo == 'yes'): ?><a class="a2a_button_sina_weibo<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($renren == 'yes'): ?><a class="a2a_button_renren<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($segnalo == 'yes'): ?><a class="a2a_button_segnalo<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($rediff == 'yes'): ?><a class="a2a_button_rediff<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($qzone == 'yes'): ?><a class="a2a_button_qzone<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($protopage_bookmarks == 'yes'): ?><a class="a2a_button_protopage_bookmarks<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($pusha == 'yes'): ?><a class="a2a_button_pusha<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($printfriendly == 'yes'): ?><a class="a2a_button_printfriendly<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($print == 'yes'): ?><a class="a2a_button_print<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($plurk == 'yes'): ?><a class="a2a_button_plurk<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($pocket == 'yes'): ?><a class="a2a_button_pocket<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($pinboard == 'yes'): ?><a class="a2a_button_pinboard<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($outlook_com == 'yes'): ?><a class="a2a_button_outlook_com<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($odnoklassniki == 'yes'): ?><a class="a2a_button_odnoklassniki<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($oknotizie == 'yes'): ?><a class="a2a_button_oknotizie<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($nujij == 'yes'): ?><a class="a2a_button_nujij<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($newsvine == 'yes'): ?><a class="a2a_button_newsvine<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($netlog == 'yes'): ?><a class="a2a_button_netlog<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($netvouz == 'yes'): ?><a class="a2a_button_netvouz<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($myspace == 'yes'): ?><a class="a2a_button_myspace<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($mixi == 'yes'): ?><a class="a2a_button_mixi<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($mendeley == 'yes'): ?><a class="a2a_button_mendeley<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($meneame == 'yes'): ?><a class="a2a_button_meneame<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($mail_ru == 'yes'): ?><a class="a2a_button_mail_ru<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($livejournal == 'yes'): ?><a class="a2a_button_livejournal<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($line == 'yes'): ?><a class="a2a_button_line<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($kindle_it == 'yes'): ?><a class="a2a_button_kindle_it<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($jamespot == 'yes'): ?><a class="a2a_button_jamespot<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($hatena == 'yes'): ?><a class="a2a_button_hatena<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($google_bookmarks == 'yes'): ?><a class="a2a_button_google_bookmarks<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($folkd == 'yes'): ?><a class="a2a_button_folkd<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($hacker_news == 'yes'): ?><a class="a2a_button_hacker_news<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($instapaper == 'yes'): ?><a class="a2a_button_instapaper<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($kakao == 'yes'): ?><a class="a2a_button_kakao<?php echo $couters; ?>"></a><?php endif; ?>
<?php if($known == 'yes'): ?><a class="a2a_button_known<?php echo $couters; ?>"></a><?php endif; ?>
<?php
		echo '</div><script src="//static.addtoany.com/menu/page.js" async></script>'. $content;
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'addtoany', 'AddToAny_sc' );
}
//Addthis
if(!function_exists('Addthis_sc')) {

	function Addthis_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'pubid' => '',
		 ), $atts));
		 
		$option = ($pubid !='') ? 'ra-'.$pubid : 'ra-';
		//output HTML
		ob_start();
			echo '<script src="//s7.addthis.com/js/300/addthis_widget.js#pubid='.$option.'" async></script>'. $content;
		$data = ob_get_clean();
		return $data;
	}
	add_bbcodes( 'addthis', 'Addthis_sc' );
}
//sharethis.com
if(!function_exists('sharethisjdk_sc')) {

	function sharethisjdk_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'pubkey' => '',
				'donothash' => '',
				'donotcopy' => '',
				'hashaddress' => ''
		 ), $atts));
		 
		$option = ($pubkey !='') ? 'publisher: "'.$pubkey.'"' : '';
		$option .= ($donothash !='') ? 'doNotHash: '.$donothash.',': 'doNotHash: false,';
		$option .= ($donotcopy !='') ? 'doNotCopy: '.$donotcopy.',' : 'doNotCopy: false,';
		$option .= ($hashaddress !='') ? 'hashAddressBar: '.$hashaddress : 'hashAddressBar: false';
		//output HTML
		ob_start();
		JFactory::getDocument()->addCustomTag('<script src="//ws.sharethis.com/button/buttons.js"></script><script>var switchTo5x=true; stLight.options({'.$option.'});</script>'). $content;

		return ob_get_clean();
	}
	add_bbcodes( 'sharethis-sdk', 'sharethisjdk_sc' );
}
if(!function_exists('sharethis_sc')) {

	function sharethis_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'show' => '',
				'size' => '',
				'username' => '',
				'followid' => '',
				'facebook' => '',
				'googleplus' => '',
				'googlereader' => '',
				'foursquare' => '',
				'hatena' => '',
				'google' => '',
				'funp' => '',
				'friendfeed' => '',
				'foodlve' => '',
				'folkd' => '',
				'fashiolista' => '',
				'embedly' => '',
				'flipboard' => '',
				'fark' => '',
				'edmodo' => '',
				'evernote' => '',
				'dzone' => '',
				'diigo' => '',
				'digg' => '',
				'delicious' => '',
				'dealsplus' => '',
				'instapaper' => '',
				'xing' => '',
				'jumptags' => '',
				'kik' => '',
				'kaboodle' => '',
				'mailru' => '',
				'linkagogo' => '',
				'meneame' => '',
				'messenger' => '',
				'misterwong' => '',
				'moshare' => '',
				'myspace' => '',
				'n4g' => '',
				'netlog' => '',
				'netvouz' => '',
				'nujij' => '',
				'newsvine' => '',
				'odnoklassniki' => '',
				'oknotizie' => '',
				'print' => '',
				'pocket' => '',
				'raiseyourvoice' => '',
				'segnalo' => '',
				'reddit' => '',
				'sina' => '',
				'sonico' => '',
				'startaid' => '',
				'startlap' => '',
				'stumbleupon' => '',
				'stumpedia' => '',
				'typepad' => '',
				'tumblr' => '',
				'virb' => '',
				'vkontakte' => '',
				'voxopolis' => '',
				'weheartit' => '',
				'whatsapp' => '',
				'wordpress' => '',
				'xerpi' => '',
				'yammer' => '',
				'yammer' => '',
				'citeulike' => '',
				'chiq' => '',
				'care2' => '',
				'blogger' => '',
				'buffer' => '',
				'buddymarks' => '',
				'blogmarks' => '',
				'blip' => '',
				'adfty' => '',
				'blinklist' => '',
				'arto' => '',
				'att' => '',
				'baidu' => '',
				'amazon' => '',
				'allvoices' => '',
				'twitter' => '',
				'linkedin' => '',
				'pinterest' => '',
				'email' => '',
				'viadeo' => '',
				'livejournal' => '',
				'fresqui' => '',
				'fwisp' => '',
				'sharethis' => '',
				'instagram' => '',
				'youtube' => ''
		 ), $atts));
		 
		$sizes = ($size !='') ? '_'.$size.'"' : '';
		$user = ($username !='') ? ' st_username="'.$username.'"': '';
		$userid = ($followid !='') ? ' st_followId="'.$followid.'"' : '';
		//output HTML
		ob_start();
?>
<?php if($show == 'share'): ?>
	<?php if($facebook == 'yes'): ?><span class="st_facebook<?php echo $sizes; ?>" displayText="Facebook"></span><?php endif; ?>
	<?php if($googleplus == 'yes'): ?><span class="st_googleplus<?php echo $sizes; ?>" displayText="Google +"></span><?php endif; ?>
	<?php if($googlereader == 'yes'): ?><span class="st_google_reader<?php echo $sizes; ?>" displayText="Google Reader"></span><?php endif; ?>
	<?php if($foursquare == 'yes'): ?><span class="st_foursquaresave<?php echo $sizes; ?>" displayText="Foursquare Save"></span><?php endif; ?>
	<?php if($hatena == 'yes'): ?><span class="st_hatena<?php echo $sizes; ?>" displayText="Hatena"></span><?php endif; ?>
	<?php if($google == 'yes'): ?><span class="st_google<?php echo $sizes; ?>" displayText="Google"></span><?php endif; ?>
	<?php if($funp == 'yes'): ?><span class="st_funp<?php echo $sizes; ?>" displayText="Funp"></span><?php endif; ?>
	<?php if($friendfeed == 'yes'): ?><span class="st_friendfeed<?php echo $sizes; ?>" displayText="FriendFeed"></span><?php endif; ?>
	<?php if($foodlve == 'yes'): ?><span class="st_foodlve<?php echo $sizes; ?>" displayText="FoodLve"></span><?php endif; ?>
	<?php if($folkd == 'yes'): ?><span class="st_folkd<?php echo $sizes; ?>" displayText="folkd.com"></span><?php endif; ?>
	<?php if($fashiolista == 'yes'): ?><span class="st_fashiolista<?php echo $sizes; ?>" displayText="Fashiolista"></span><?php endif; ?>
	<?php if($embedly == 'yes'): ?><span class="st_embed_ly<?php echo $sizes; ?>" displayText="Embed.ly"></span><?php endif; ?>
	<?php if($flipboard == 'yes'): ?><span class="st_flipboard<?php echo $sizes; ?>" displayText="Flipboard"></span><?php endif; ?>
	<?php if($fark == 'yes'): ?><span class="st_fark<?php echo $sizes; ?>" displayText="Fark"></span><?php endif; ?>
	<?php if($edmodo == 'yes'): ?><span class="st_edmodo<?php echo $sizes; ?>" displayText="Edmodo"></span><?php endif; ?>
	<?php if($evernote == 'yes'): ?><span class="st_evernote<?php echo $sizes; ?>" displayText="Evernote"></span><?php endif; ?>
	<?php if($dzone == 'yes'): ?><span class="st_dzone<?php echo $sizes; ?>" displayText="DZone"></span><?php endif; ?>
	<?php if($diigo == 'yes'): ?><span class="st_diigo<?php echo $sizes; ?>" displayText="Diigo"></span><?php endif; ?>
	<?php if($digg == 'yes'): ?><span class="st_digg<?php echo $sizes; ?>" displayText="Digg"></span><?php endif; ?>
	<?php if($delicious == 'yes'): ?><span class="st_delicious<?php echo $sizes; ?>" displayText="Delicious"></span><?php endif; ?>
	<?php if($dealsplus == 'yes'): ?><span class="st_dealsplus<?php echo $sizes; ?>" displayText="Dealspl.us"></span><?php endif; ?>
	<?php if($instapaper == 'yes'): ?><span class="st_instapaper<?php echo $sizes; ?>" displayText="Instapaper"></span><?php endif; ?>
	<?php if($xing == 'yes'): ?><span class="st_xing<?php echo $sizes; ?>" displayText="Xing"></span><?php endif; ?>
	<?php if($jumptags == 'yes'): ?><span class="st_jumptags<?php echo $sizes; ?>" displayText="Jumptags"></span><?php endif; ?>
	<?php if($kik == 'yes'): ?><span class="st_kik<?php echo $sizes; ?>" displayText="Kik"></span><?php endif; ?>
	<?php if($kaboodle == 'yes'): ?><span class="st_kaboodle<?php echo $sizes; ?>" displayText="Kaboodle"></span><?php endif; ?>
	<?php if($mailru == 'yes'): ?><span class="st_mail_ru<?php echo $sizes; ?>" displayText="mail.ru"></span><?php endif; ?>
	<?php if($linkagogo == 'yes'): ?><span class="st_linkagogo<?php echo $sizes; ?>" displayText="linkaGoGo"></span><?php endif; ?>
	<?php if($meneame == 'yes'): ?><span class="st_meneame<?php echo $sizes; ?>" displayText="Meneame"></span><?php endif; ?>
	<?php if($messenger == 'yes'): ?><span class="st_messenger<?php echo $sizes; ?>" displayText="Messenger"></span><?php endif; ?>
	<?php if($misterwong == 'yes'): ?><span class="st_mister_wong<?php echo $sizes; ?>" displayText="Mr Wong"></span><?php endif; ?>
	<?php if($moshare == 'yes'): ?><span class="st_moshare<?php echo $sizes; ?>" displayText="moShare"></span><?php endif; ?>
	<?php if($myspace == 'yes'): ?><span class="st_myspace<?php echo $sizes; ?>" displayText="MySpace"></span><?php endif; ?>
	<?php if($n4g == 'yes'): ?><span class="st_n4g<?php echo $sizes; ?>" displayText="N4G"></span><?php endif; ?>
	<?php if($netlog == 'yes'): ?><span class="st_netlog<?php echo $sizes; ?>" displayText="Netlog"></span><?php endif; ?>
	<?php if($netvouz == 'yes'): ?><span class="st_netvouz<?php echo $sizes; ?>" displayText="Netvouz"></span><?php endif; ?>
	<?php if($nujij == 'yes'): ?><span class="st_nujij<?php echo $sizes; ?>" displayText="NUjij"></span><?php endif; ?>
	<?php if($newsvine == 'yes'): ?><span class="st_newsvine<?php echo $sizes; ?>" displayText="Newsvine"></span><?php endif; ?>
	<?php if($odnoklassniki == 'yes'): ?><span class="st_odnoklassniki<?php echo $sizes; ?>" displayText="Odnoklassniki"></span><?php endif; ?>
	<?php if($oknotizie == 'yes'): ?><span class="st_oknotizie<?php echo $sizes; ?>" displayText="Oknotizie"></span><?php endif; ?>
	<?php if($print == 'yes'): ?><span class="st_print<?php echo $sizes; ?>" displayText="Print"></span><?php endif; ?>
	<?php if($pocket == 'yes'): ?><span class="st_pocket<?php echo $sizes; ?>" displayText="Pocket"></span><?php endif; ?>
	<?php if($raiseyourvoice == 'yes'): ?><span class="st_raise_your_voice<?php echo $sizes; ?>" displayText="Raise Your Voice"></span><?php endif; ?>
	<?php if($segnalo == 'yes'): ?><span class="st_segnalo<?php echo $sizes; ?>" displayText="Segnalo"></span><?php endif; ?>
	<?php if($reddit == 'yes'): ?><span class="st_reddit<?php echo $sizes; ?>" displayText="Reddit"></span><?php endif; ?>
	<?php if($sina == 'yes'): ?><span class="st_sina<?php echo $sizes; ?>" displayText="Sina"></span><?php endif; ?>
	<?php if($sonico == 'yes'): ?><span class="st_sonico<?php echo $sizes; ?>" displayText="Sonico"></span><?php endif; ?>
	<?php if($startaid == 'yes'): ?><span class="st_startaid<?php echo $sizes; ?>" displayText="Startaid"></span><?php endif; ?>
	<?php if($startlap == 'yes'): ?><span class="st_startlap<?php echo $sizes; ?>" displayText="Startlap"></span><?php endif; ?>
	<?php if($stumbleupon == 'yes'): ?><span class="st_stumbleupon<?php echo $sizes; ?>" displayText="StumbleUpon"></span><?php endif; ?>
	<?php if($stumpedia == 'yes'): ?><span class="st_stumpedia<?php echo $sizes; ?>" displayText="Stumpedia"></span><?php endif; ?>
	<?php if($typepad == 'yes'): ?><span class="st_typepad<?php echo $sizes; ?>" displayText="TypePad"></span><?php endif; ?>
	<?php if($tumblr == 'yes'): ?><span class="st_tumblr<?php echo $sizes; ?>" displayText="Tumblr"></span><?php endif; ?>
	<?php if($virb == 'yes'): ?><span class="st_virb<?php echo $sizes; ?>" displayText="Virb"></span><?php endif; ?>
	<?php if($vkontakte == 'yes'): ?><span class="st_vkontakte<?php echo $sizes; ?>" displayText="Vkontakte"></span><?php endif; ?>
	<?php if($voxopolis == 'yes'): ?><span class="st_voxopolis<?php echo $sizes; ?>" displayText="VOXopolis"></span><?php endif; ?>
	<?php if($weheartit == 'yes'): ?><span class="st_weheartit<?php echo $sizes; ?>" displayText="We Heart It"></span><?php endif; ?>
	<?php if($whatsapp == 'yes'): ?><span class="st_whatsapp<?php echo $sizes; ?>" displayText="WhatsApp"></span><?php endif; ?>
	<?php if($wordpress == 'yes'): ?><span class="st_wordpress<?php echo $sizes; ?>" displayText="WordPress"></span><?php endif; ?>
	<?php if($xerpi == 'yes'): ?><span class="st_xerpi<?php echo $sizes; ?>" displayText="Xerpi"></span><?php endif; ?>
	<?php if($yammer == 'yes'): ?><span class="st_yammer<?php echo $sizes; ?>" displayText="Yammer"></span><?php endif; ?>
	<?php if($yammer == 'yes'): ?><span class="st_corkboard<?php echo $sizes; ?>" displayText="Corkboard"></span><?php endif; ?>
	<?php if($citeulike == 'yes'): ?><span class="st_citeulike<?php echo $sizes; ?>" displayText="CiteULike"></span><?php endif; ?>
	<?php if($chiq == 'yes'): ?><span class="st_chiq<?php echo $sizes; ?>" displayText="chiq"></span><?php endif; ?>
	<?php if($care2 == 'yes'): ?><span class="st_care2<?php echo $sizes; ?>" displayText="Care2"></span><?php endif; ?>
	<?php if($blogger == 'yes'): ?><span class="st_blogger<?php echo $sizes; ?>" displayText="Blogger"></span><?php endif; ?>
	<?php if($buffer == 'yes'): ?><span class="st_buffer<?php echo $sizes; ?>" displayText="Buffer"></span><?php endif; ?>
	<?php if($buddymarks == 'yes'): ?><span class="st_buddymarks<?php echo $sizes; ?>" displayText="BuddyMarks"></span><?php endif; ?>
	<?php if($blogmarks == 'yes'): ?><span class="st_blogmarks<?php echo $sizes; ?>" displayText="Blogmarks"></span><?php endif; ?>
	<?php if($blip == 'yes'): ?><span class="st_blip<?php echo $sizes; ?>" displayText="Blip"></span><?php endif; ?>
	<?php if($adfty == 'yes'): ?><span class="st_adfty<?php echo $sizes; ?>" displayText="Adfty"></span><?php endif; ?>
	<?php if($blinklist == 'yes'): ?><span class="st_blinklist<?php echo $sizes; ?>" displayText="Blinklist"></span><?php endif; ?>
	<?php if($arto == 'yes'): ?><span class="st_arto<?php echo $sizes; ?>" displayText="Arto"></span><?php endif; ?>
	<?php if($att == 'yes'): ?><span class="st_att<?php echo $sizes; ?>" displayText="AT&T"></span><?php endif; ?>
	<?php if($baidu == 'yes'): ?><span class="st_baidu<?php echo $sizes; ?>" displayText="Baidu"></span><?php endif; ?>
	<?php if($amazon == 'yes'): ?><span class="st_amazon_wishlist<?php echo $sizes; ?>" displayText="Amazon Wishlist"></span><?php endif; ?>
	<?php if($allvoices == 'yes'): ?><span class="st_allvoices<?php echo $sizes; ?>" displayText="Allvoices"></span><?php endif; ?>
	<?php if($twitter == 'yes'): ?><span class="st_twitter<?php echo $sizes; ?>" displayText="Tweet"></span><?php endif; ?>
	<?php if($linkedin == 'yes'): ?><span class="st_linkedin<?php echo $sizes; ?>" displayText="LinkedIn"></span><?php endif; ?>
	<?php if($pinterest == 'yes'): ?><span class="st_pinterest<?php echo $sizes; ?>" displayText="Pinterest"></span><?php endif; ?>
	<?php if($email == 'yes'): ?><span class="st_email<?php echo $sizes; ?>" displayText="Email"></span><?php endif; ?>
	<?php if($viadeo == 'yes'): ?><span class="st_viadeo<?php echo $sizes; ?>" displayText="Viadeo"></span><?php endif; ?>
	<?php if($livejournal == 'yes'): ?><span class="st_livejournal<?php echo $sizes; ?>" displayText="LiveJournal"></span><?php endif; ?>
	<?php if($fresqui == 'yes'): ?><span class="st_fresqui<?php echo $sizes; ?>" displayText="Fresqui"></span><?php endif; ?>
	<?php if($fwisp == 'yes'): ?><span class="st_fwisp<?php echo $sizes; ?>" displayText="fwisp"></span><?php endif; ?>
	<?php if($sharethis == 'yes'): ?><span class="st_sharethis<?php echo $sizes; ?>" displayText="ShareThis"></span><?php endif; ?>
<?php elseif($show == 'follow'): ?>
	<?php if($twitter == 'yes'): ?><span class="st_twitterfollow<?php echo $sizes; ?>" displayText="Twitter Follow"<?php echo $user; ?>></span><?php endif; ?>
	<?php if($facebook == 'yes'): ?><span class="st_fbsub<?php echo $sizes; ?>" displayText="Facebook Subscribe"<?php echo $user; ?>></span><?php endif; ?>
	<?php if($foursquare == 'yes'): ?><span class="st_foursquarefollow<?php echo $sizes; ?>" displayText="Foursquare Follow"<?php echo $user; ?>></span><?php endif; ?>
	<?php if($instagram == 'yes'): ?><span class="st_instagram<?php echo $sizes; ?>" displayText="Instagram Badge"<?php echo $user; ?>></span><?php endif; ?>
	<?php if($pinterest == 'yes'): ?><span class="st_pinterestfollow<?php echo $sizes; ?>" displayText="Pinterest Follow"<?php echo $user; ?>></span><?php endif; ?>
	<?php if($youtube == 'yes'): ?><span class="st_youtube<?php echo $sizes; ?>" displayText="Youtube Subscribe"<?php echo $user; ?>></span><?php endif; ?>
<?php endif; ?>
<?php
		return ob_get_clean();
	}
	add_bbcodes( 'sharethis', 'sharethis_sc' );
}