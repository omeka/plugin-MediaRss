<?php
define('MEDIARSS_PLUGIN_VERSION', get_plugin_ini('MediaRss', 'version'));

add_filter('define_response_contexts', 'media_rss_response_context');
add_filter('define_action_contexts', 'media_rss_action_context');
add_plugin_hook('public_theme_header', 'media_rss_theme_header');

function media_rss_action_context($context, $controller)
{
    if ($controller instanceof ItemsController) {
        $context['browse'][] = 'rssm';
    }
    
    return $context;
}

function media_rss_response_context($context)
{
    $context['rssm'] = array('suffix'  => 'rssm', 
                            'headers' => array('Content-Type' => 'text/xml'));
    
    return $context;
}

function media_rss_rssm()
{
    $request = Zend_Controller_Front::getInstance()->getRequest();

	if (($request->getControllerName() == 'items' && $request->getActionName() == 'browse') || ($request->getControllerName() == 'index' && $request->getActionName() == 'index')) {
	    return '<link rel="alternate" type="application/rss+xml" title="Media RSS Feed" href="'.items_output_uri('rssm').'" id="gallery"/>' . "\n";
	}
}

/**
 * Echos the Media RSS link, for the 'public_theme_header' hook.
 */
function media_rss_theme_header()
{
    echo media_rss_rssm();
}