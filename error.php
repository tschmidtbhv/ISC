<?php
/**
 * H5BP4J
 *
 * HTML5 Boilerplate 3.0 by http://html5boilerplate.com, The Unlicense (aka: public domain)
 * Adapted for Joomla! by Konrad Gretkiewicz, http://www.kgretk.com
 *
 * Used in: <enter your website name/url/your template name, version>
 * Error page
 */
 
// No direct access
defined('_JEXEC') or die;
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

// get template name and parameters
$tpn  = $this->template;
$params	=  JFactory::getApplication()->getTemplate(true)->params;
	//$app = JFactory::getApplication();
	
	$logo = $params->get('logo');
	$sitename = $params->get('sitename');
	$tagline= $params->get('tagline');
	$analytics = $params->get('analytics');
	$iskip = $params->get('iskip');
	$viewport = $params->get('viewport');

if ($iskip) {
    $doc = JFactory::getDocument();
    $doc->addScriptDeclaration('/mobile/i.test(navigator.userAgent) && !window.location.hash && setTimeout(function () { if (!pageYOffset) window.scrollTo(0, 0); }, 500);');
}

// send correct HTTP status code
if ($this->error->getCode() == 404 ) {
	header("HTTP/1.0 404 Not Found");
}

?>
<!doctype html>
<!--
 * H5BP4J
 *
 * HTML5 Boilerplate 3.0 by http://html5boilerplate.com, The Unlicense (aka: public domain)
 * Adapted for Joomla! by KG, http://www.kgretk.com
 * ERROR PAGE
 -->

<head>
  <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>

  <meta name="viewport" content="<?php echo htmlspecialchars($viewport); ?>">

  <!-- CSS: implied media=all -->
  <!-- CSS concatenated and minified via ant build script (or via Joomla plugin) -->
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $tpn ?>/css/template.css">
  <!-- end CSS-->
  
</head>

<body>

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
   
  </div>

  <div id="content">

	<div class="error">
		<div id="outline">
		<div id="errorboxoutline">
			<div id="errorboxheader"><?php echo $this->error->getCode(); ?> - <?php echo $this->error->getMessage(); ?></div>
			<div id="errorboxbody">
			<p><strong><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></strong></p>
				<ol>
					<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND'); ?></li>
					<li><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></li>
				</ol>
			<p><strong><?php echo JText::_('JERROR_LAYOUT_PLEASE_TRY_ONE_OF_THE_FOLLOWING_PAGES'); ?></strong></p>

				<ul>
					<li><a href="<?php echo $this->baseurl; ?>/index.php" title="<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></li>
					<li><a href="<?php echo $this->baseurl; ?>/index.php?option=com_search" title="<?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?>"><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></a></li>

				</ul>

			<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?>.</p>
			<div id="techinfo">
			<p><?php echo $this->error->getMessage(); ?></p>
			<p>
				<?php if ($this->debug) :
					echo $this->renderBacktrace();
				endif; ?>
			</p>
			</div>
			</div>
		</div>
		</div>
	</div>
	
    <script>
      var GOOG_FIXURL_LANG = (navigator.language || '').slice(0,2),GOOG_FIXURL_SITE = location.host;
    </script>
    <script src="http://linkhelp.clients.google.com/tbproxy/lh/wm/fixurl.js"></script>

  </div>

  <div id="footer">
    <jdoc:include type="modules" name="footer" />
  </div>  

  <?php if (strlen($analytics)>4) { ?>
  <!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
       mathiasbynens.be/notes/async-analytics-snippet -->
  <script>
    var _gaq=[['_setAccount','<?php echo htmlspecialchars($analytics); ?>'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
  <?php } ?>
    
</body>
</html>