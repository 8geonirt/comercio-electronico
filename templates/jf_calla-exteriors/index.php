<?php
/*------------------------------------------------------------------------
# JF_CALLA-EXTERIORS! - JOOMFREAK.COM JOOMLA 2.5 TEMPLATE 
# June 2013
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2013 JOOMFREAK.COM / KREATIF MULTIMEDIA GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

// No direct access.
defined('_JEXEC') or die;



jimport('joomla.filesystem.file');

JHtml::_('behavior.framework', true);

// get params
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;
$menu				= $app->getMenu();
$sitename           = $app->getCfg('sitename');
$latitude           = (float)$this->params->get( 'latitude', '' );
$longitude          = (float)$this->params->get( 'longitude', '' );
$markerdescription  = $this->params->get('markerdescription', '');

if ($menu->getActive() == $menu->getDefault()) {
	$bodyClass = ' home';
}

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/fonts/stylesheet.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/k2.css', $type = 'text/css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/jw_sigpro.css', $type = 'text/css');

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/scripts/js/respond.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/scripts/js/jquery.slideto.min.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/scripts/js/callaexteriors.js', 'text/javascript');

// Logo file or site title param
if ($this->params->get('logoas') == 1 && $this->params->get('logo'))
{
	$logo = '<img src="'. JURI::root() . $this->params->get('logo') .'" alt="'. $sitename .'" />';
}

elseif ($this->params->get('logoas') == 2 && $this->params->get('sitetitle'))
{
	$logo = '<span class="site-title">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
	$logo = '<span class="site-title">'. $sitename .'</span>';
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">jQuery.noConflict();</script>
<jdoc:include type="head" />

<?php if (JRequest::getVar('option') == 'com_contact' && $this->params->get('map')) : ?>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDqEFJTjKx6L-RpoT-nPiqTi1KJVJimH3I&sensor=false"></script>

<script>
	var map;
	var myCenter=new google.maps.LatLng('<?php echo $latitude ?>', '<?php echo $longitude ?>');
	
	function initialize()
	{
		var mapProp = {
			center:myCenter,
			zoom:13,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};
	
		map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	  
		var marker=new google.maps.Marker({
			position:myCenter
		});
	
		<?php if ($this->params->get('marker')) : ?>
		marker.setMap(map);
		<?php endif; ?>
	
		var infowindow = new google.maps.InfoWindow({
			content:'<?php echo $markerdescription; ?>'
		});
	
		infowindow.open(map,marker);
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php endif; ?>

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 8]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie8only.css" rel="stylesheet" type="text/css" />
<![endif]-->

</head>

<body class="body<?php echo $bodyClass; ?>">
<div id="jf-wrapper">
	<div id="jf-header" class="wrap">
    	<div class="main clearfix">
        	<h1 id="logo">
            	<a href="<?php JURI::base(true) ?>" title="<?php echo $sitename; ?>">
            	<?php echo $logo; ?>
                </a>
            </h1>
			<div id="jf-mainnav">
				<jdoc:include type="modules" name="mainmenu" />
			</div>
			<a href="#" class="gotomenu"></a>
        </div>
    </div>
	<?php
	if ($menu->getActive() == $menu->getDefault()) : ?>
    <div id="jf-slideshow">
		<div class="main clearfix">
			<jdoc:include type="modules" name="slideshow" />			
		</div>
	</div>
	<?php endif; ?>
	
	<div id="jf-body">
		<div id="jf-content">
			<div class="main clearfix">
				<jdoc:include type="message" />
				<jdoc:include type="component" />	
				
				<?php if($this->countModules('testimonial')) : ?>
					<div id="jf-testimonial">
						<div class="testimonial-inner">
							<jdoc:include type="modules" name="testimonial" style="none" />
						</div>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
		
		<?php if(JRequest::getVar('option') == 'com_contact') : ?>
		<div id="jf-map">
			<?php if ($this->params->get('map')) : ?>
				<div id="map">
					<div id="googleMap" style="height: 510px;width:100%;"></div>
				</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		
		<?php if($this->countModules('home-c-l') || $this->countModules('home-c-r')) : ?>
		<div id="jf-home-c">
			<div class="main clearfix">
				<?php if($this->countModules('home-c-l')) : ?>
					<div id="home-c-l" class="colspan2">
						<jdoc:include type="modules" name="home-c-l" style="xhtml" />
					</div>
				<?php endif; ?>
				<?php if($this->countModules('home-c-r')) : ?>
					<div id="home-c-r" class="colspan2">
					<jdoc:include type="modules" name="home-c-r" style="xhtml" />
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php endif; ?>
		<?php if($this->countModules('latest')) : ?>
		<div id="jf-latest">
			<div class="main clearfix">
				<jdoc:include type="modules" name="latest" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		<?php if($this->countModules('news')) : ?>
		<div id="jf-news">
			<div class="main clearfix">
				<jdoc:include type="modules" name="news" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		<?php if($this->countModules('contact')) : ?>
		<div id="jf-contact">
			<div class="main clearfix">
				<jdoc:include type="modules" name="contact" style="xhtml" />
			</div>
		</div>
		<?php endif; ?>
		
		<div id="jf-menu">
			<div class="main clearfix">
				<jdoc:include type="modules" name="mainmenu" />
			</div>
		</div>
		
		<div id="jf-footer">
			<div class="main">
				<div class="main-inner1 clearfix">
					<jdoc:include type="modules" name="footer" style="xhtml" />
					
					<?php if (($this->params->get('social') && ($templateparams->get('facebookicon') || $templateparams->get('flickricon') || $templateparams->get('googleicon') || $templateparams->get('skypelink') || $templateparams->get('twittericon') || $templateparams->get('pinteresticon') || $templateparams->get('youtubeticon')))) : ?>
					<div id="jf-social">
						<ul>
							<?php if ($templateparams->get('facebookicon') && $templateparams->get('facebooklink') != '') : ?>
							<li><a class="button-facebook" href="<?php echo $templateparams->get('facebooklink'); ?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if ($templateparams->get('flickricon') && $templateparams->get('flickrlink') != '') : ?>
							<li><a class="button-flickr" href="<?php echo $templateparams->get('flickrlink'); ?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if ($templateparams->get('googleicon') && $templateparams->get('googlelink') != '') : ?>
							<li><a class="button-google" href="<?php echo $templateparams->get('googlelink'); ?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if ($templateparams->get('skypeicon') && $templateparams->get('skypelink') != '') : ?>
							<li><a class="button-skype" href="<?php echo $templateparams->get('skypelink'); ?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if ($templateparams->get('twittericon') && $templateparams->get('twitterlink') != '') : ?>
							<li><a class="button-twitter" href="<?php echo $templateparams->get('twitterlink'); ?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if ($templateparams->get('pinteresticon') && $templateparams->get('pinterestlink') != '') : ?>
							<li><a class="button-pinterest" href="<?php echo $templateparams->get('pinterestlink'); ?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if ($templateparams->get('youtubeticon') && $templateparams->get('youtubelink') != '') : ?>
							<li><a class="button-youtube" href="<?php echo $templateparams->get('youtubelink'); ?>" target="_blank"></a></li>
							<?php endif; ?>
						</ul>
					</div>
					<?php endif; ?>
					<div class="copyright">
						<p>copyright©</p>
						<a title="joomfreak" target="_blank" href="http://www.joomfreak.com">joomfreak.com</a> &amp; 
						<a title="Tetto Verde Climagruen" target="_blank" href="http://www.climagruen.it/roof-garden/tetti-verdi.html">Tetto Verde Climagruen</a>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
<jdoc:include type="modules" name="debug" />
</body>
</html>
