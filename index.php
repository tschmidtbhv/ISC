<?php
/**
 * Industrieschule Chemnitz
 *
 * HTML5 Boilerplate 3.0 by http://html5boilerplate.com, The Unlicense (aka: public domain)
 * Adapted for Joomla! by Thomas Schmidt / Christian Ziegenrücker
 *
 * Used in: <enter your website name/url/your template name, version>
 *
 */
 
// No direct access
defined('_JEXEC') or die;

// get template name and parameters
$tpn  = $this->template;
$logo = $this->params->get('logo');
$sitename = $this->params->get('sitename');
$tagline = $this->params->get('tagline');
$analytics = $this->params->get('analytics');
$jsframework = $this->params->get('jsframework');
$jqversion = $this->params->get('jqversion');
$pluginsjs = $this->params->get('pluginsjs');
$jqbottom = $this->params->get('jqbottom');
$iskip = $this->params->get('iskip');
$modernizr = $this->params->get('modernizr');
$viewport = $this->params->get('viewport');
$rdebug = $this->params->get('rdebug');

// load Mootools (in head) or JQuery (in head or at the end)
// removes Mootools only if not logged in
// always loaded: /media/system/js/core.js
$user = JFactory::getUser();
if ($user->get('guest') == 1) {
    $head = $this->getHeadData();
	switch ($jsframework) {
		case 'moocm':
			//do nothing, load default Mootools Core+More + caption.js
			break;
		case 'mooc':
		case 'moocjq':
			reset($head['scripts']);
			unset($head['scripts'][$this->baseurl.'/media/system/js/mootools-more.js']);
			$head['script']['text/javascript'] = ''; // removes JTooltips depending on Tips in More
			$this->setHeadData($head);
			break;
		case 'none':
		case 'jq':
			JHtml::_('behavior.keepalive', false);
			reset($head['scripts']);
			unset($head['scripts'][$this->baseurl.'/media/system/js/mootools-core.js']);
			unset($head['scripts'][$this->baseurl.'/media/system/js/mootools-more.js']);
			unset($head['scripts'][$this->baseurl.'/media/system/js/caption.js']);
			$head['script']['text/javascript'] = ''; // removes JTooltips depending on Tips in More
			$this->setHeadData($head);
			break;
	}
}

if (!$jqbottom && ($jsframework == 'jq' || $jsframework == 'moocjq' || $jsframework == 'moocmjq')) {
	$doc = JFactory::getDocument();
	$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/'.$jqversion.'/jquery.min.js', 'text/javascript', false);
	$doc->addScriptDeclaration('window.jQuery || document.write(\'<script src="'.$this->baseurl.'/templates/'.$tpn.'/js/jquery-1.7.1.min.js"><\/script>\');');
	$doc->addScriptDeclaration('window.jQuery && jQuery.noConflict();');
	if ($pluginsjs)
		$doc->addScript($this->baseurl.'/templates/'.$tpn.'/js/plugins.js', 'text/javascript', false);
}

if ($iskip) {
	$doc = JFactory::getDocument();
	$doc->addScriptDeclaration('/mobile/i.test(navigator.userAgent) && !window.location.hash && setTimeout(function () { if (!pageYOffset) window.scrollTo(0, 0); }, 500);');
}

?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <jdoc:include type="head" /> <!-- jdoc include head - meta charset, title, meta descr ... -->

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
        -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <!-- Mobile viewport optimized: h5bp.com/viewport  -->
  <meta name="viewport" content="<?php echo htmlspecialchars($viewport); ?>">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <!-- For iPhone 4 with high-resolution Retina display: -->
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/apple-touch-icon-114x114-precomposed.png">
  <!-- For first-generation iPad: -->
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/apple-touch-icon-72x72-precomposed.png">
  <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
  <link rel="apple-touch-icon-precomposed" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/apple-touch-icon-precomposed.png">

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script (or via Joomla plugin) -->
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/css/template.css">
  <!-- end CSS-->
  <!--[if IE 8]>
            <link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/css/ie8.css">
  <![endif]-->

  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <?php if ($modernizr) { ?>
  <!-- All JavaScript at the bottom, except for Modernizr / Respond.
       Modernizr enables HTML5 elements & feature detects for optimal performance.
       Create your own custom Modernizr build: www.modernizr.com/download/ -->
  <script src="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/js/modernizr-2.5.0.min.js"></script>
  <?php } else { ?>
  <!-- Modernizr not loaded -->
  <?php } ?>
</head>

<body>

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> 
  <a href="http://browsehappy.com/">Upgrade to a different browser</a> or 
  <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> 
  to experience this site.</p><![endif]-->
  <div id="sitebg">
  <div id="sitewrapper">
  <div id="header" class="hbg-1">

    <div id="logo">
      <a href="<?php echo $this->baseurl; ?>" >
        <?php
        if (strlen($logo)>4)
            echo '<img src="'.$this->baseurl.'/'.htmlspecialchars($logo).'" alt="'.htmlspecialchars($sitename).'" />';
        else
            echo htmlspecialchars($sitename); 
        ?>
      </a>
    </div>
    
    <div id="tagline">
        <?php echo htmlspecialchars($tagline); ?>
    </div>

    <?php if ($this->countModules('topmenu') || $this->countModules('position-1')) { ?>
    <div id="topmenu">
		<?php if ($this->countModules('topmenu')) { ?>
			<jdoc:include type="modules" name="topmenu" />
		<?php } ?>
        <!--
		<?php if ($this->countModules('position-1')) { ?>
			<jdoc:include type="modules" name="position-1" />
		<?php } ?>
		-->
    </div>
    <?php } ?>


    <?php if ($this->countModules('banner')) { ?>
    <div id="banner">
        <jdoc:include type="modules" name="banner" />
    </div>
    <?php } ?>
   
  </div><!-- end header -->

  <div id="content">
      <div id="contact-wrap">
          <div id="specialRightBox">
              <?php if ($this->countModules('position-1')) { ?>
              <jdoc:include type="modules" name="position-1" />
              <?php } ?>
          </div>
      </div>

    <div id="listwrapper">
    <?php if ($this->countModules('breadcrumbs') || $this->countModules('position-2')) { ?>
    <div id="breadcrumbs">
      <?php if ($this->countModules('breadcrumbs')) { ?>
        <jdoc:include type="modules" name="breadcrumbs" />
      <?php } ?>
      <?php if ($this->countModules('position-2')) { ?>
        <jdoc:include type="modules" name="position-2" />
      <?php } ?>
    </div>
    <?php } ?>

      <?php if ($this->countModules('search') || $this->countModules('position-0')) { ?>
      <div id="search">
          <jdoc:include type="modules" name="search" />
          <jdoc:include type="modules" name="position-0" />
      </div>
      <?php } ?>
    </div>

      <?php
    
    // for compatibility with Beez templates
    $showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));
    $showLeftColumn	= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));
    $showBottom		= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
    
    $right = ($this->countModules('right') or $showRightColumn);
    $left = ($this->countModules('left') or $showLeftColumn);
    $bottom = ($this->countModules('bottom') or $showBottom);
    
    $centerdiv = 'centerWide';
    $wrapper = false;
    
    if ($left && !$right)
    	$centerdiv = 'centerAndLeft';
        
    if ($right && !$left)
    	$centerdiv = 'centerAndRight';
        
    if ($left && $right)
    {
    	$centerdiv = 'centerNarrow';
    	$wrapper = true;
    }
    ?>

    <?php if ($wrapper) { ?>
    <div id="wrapper">
        <?php if ($left) { ?>
        <div id="left">
            <jdoc:include type="modules" name="left" style="xhtml"/>
            <jdoc:include type="modules" name="position-4" style="xhtml"/>
            <jdoc:include type="modules" name="position-7" style="xhtml"/>
            <jdoc:include type="modules" name="position-5" style="xhtml"/>
        </div>
        <?php } ?>
        <div id="main" class="<?php echo $centerdiv; ?>">
          <jdoc:include type="message" />
          <jdoc:include type="component" />
        </div>

    </div>
    <?php } else { ?>
      <?php if ($left) { ?>
          <div id="left">
              <jdoc:include type="modules" name="left" style="xhtml"/>
              <jdoc:include type="modules" name="position-4" style="xhtml"/>
              <jdoc:include type="modules" name="position-7" style="xhtml"/>
              <jdoc:include type="modules" name="position-5" style="xhtml"/>
          </div>
          <?php } ?>

        <div id="main" class="<?php echo $centerdiv; ?>">
          <jdoc:include type="message" />
          <jdoc:include type="component" />
        </div>
        

    <?php } ?>

    <?php if ($right) { ?>
    <div id="right">
      <jdoc:include type="modules" name="right" style="xhtml"/>
      <jdoc:include type="modules" name="position-3" style="xhtml"/>
      <jdoc:include type="modules" name="position-6" style="xhtml"/>
      <jdoc:include type="modules" name="position-8" style="xhtml"/>
    </div>
    <?php } ?>

  </div><!-- end content -->

  <?php if($bottom) { ?>
    <div id="bottom">
    <jdoc:include type="modules" name="bottom" style="xhtml"/>
	<div class="box"><jdoc:include type="modules" name="position-9" style="xhtml"/></div>
    <div class="box"><jdoc:include type="modules" name="position-10" style="xhtml"/></div>
    <div class="box"><jdoc:include type="modules" name="position-11" style="xhtml"/></div>
    </div>
  <?php } ?>

  <div id="footer">
    <?php if($this->countModules('footer')) { ?>
      <jdoc:include type="modules" name="footer" />
    <?php } ?>

  </div>

  <jdoc:include type="modules" name="debug" />
  
  <?php if ($rdebug) { ?>
  <!-- device information for responsive design -->
  <div id="rdebug">
  Device:
	<span id="rmobile">mobile</span>
	<span id="rnarrow">narrow</span>
	<span id="rwide">wide</span>
	<span id="rmobilehd">mobile hd</span>
	<span id="rie">IE</span>
  | Resolution:
	<span id="rres"></span>
  </div>
  <script>
	function res(){
		return ' w='+document.documentElement.clientWidth+'x'+document.documentElement.clientHeight; // + ' s='+screen.width+'x'+screen.height;
	}

	var rt = setTimeout(function(){
		var r = document.getElementById('rres');
		r.innerHTML = res();
	}, 1000);

	window.onresize = OnResizeDocument;
	function OnResizeDocument () {
		var r = document.getElementById('rres');
		r.innerHTML = res();
	}
  </script>
  <?php } ?>

  <?php if ($jqbottom) { ?>
	<!-- JavaScript at the bottom for fast page loading -->

	<?php if ($jsframework == 'jq' || $jsframework == 'moocjq' || $jsframework == 'moocmjq') { ?>
	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/<?php echo $jqversion; ?>/jquery.min.js"></script>
	<script>
	window.jQuery || document.write('<script src="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/js/jquery-1.7.1.min.js"><\/script>');
	window.jQuery && jQuery.noConflict();
	</script>
	<?php } ?>

	<?php if ($pluginsjs) { ?>
	<!-- scripts concatenated and minified via ant build script-->
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/js/plugins.js"></script>
	<?php } ?>
	<!-- end scripts-->
  <?php }
  else
	echo '<!-- JavaScript loaded at the top of the page -->';
  ?>

  <?php if (strlen($analytics)>4) { ?>
  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
	var _gaq=[['_setAccount','<?php echo htmlspecialchars($analytics); ?>'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
  
  <!-- record outbout links in Google Analytics 
  Usage: <a href="......." onclick="recordOutboundLink('name', 'category', 'what');" > ... -->  
  <script>
	function recordOutboundLink(link, category, action) {
		_gat._getTrackerByName()._trackEvent(category, action);
		setTimeout('document.location = "' + link.href + '"', 500);
	}
  </script>
  <?php } ?>
   <script src="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/js/template.js"></script>
  </div>
  </div>
</body>
</html>
