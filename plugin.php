<?php
define('COOLIRIS_PLUGIN_VERSION', get_plugin_ini('CoolIris', 'version'));

add_plugin_hook('public_theme_header', 'cool_iris_public_header');

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

function cool_iris_public_header()
{
    // add a check to see if using itemsController...
    echo '<link rel="alternate" type="application/rss+xml" title="" href="?output=rssm" /> ';
}