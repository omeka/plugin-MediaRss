<?php
define('COOLIRIS_PLUGIN_VERSION', get_plugin_ini('CoolIris', 'version'));

add_filter('define_response_contexts', 'cool_iris_response_context');
add_filter('define_action_contexts', 'cool_iris_action_context');

function cool_iris_action_context($context, $controller)
{
    if ($controller instanceof ItemsController) {
        $context['browse'][] = 'rssm';
    }
    
    return $context;
}

function cool_iris_response_context($context)
{
    $context['rssm'] = array('suffix'  => 'rssm', 
                            'headers' => array('Content-Type' => 'text/xml'));
    
    return $context;
}

function cool_iris_rssm()
{
    $request = Zend_Controller_Front::getInstance()->getRequest();

	if (($request->getControllerName() == 'items' && $request->getActionName() == 'browse') || ($request->getControllerName() == 'index' && $request->getActionName() == 'index')) {
	    return '<link rel="alternate" type="application/rss+xml" title="CoolIris Feed" href="'.items_output_uri('rssm').'" id="gallery"/>' . "\n";
	}
}