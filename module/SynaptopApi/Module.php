<?php
/**
 * Synaptop Assignment Api 
 *
 * @link
 * @copyright
 * @license
 * @author	Raymond Fu
 */


namespace SynaptopApi;
$GLOBALS['api_key'] = 'synaptop';

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
 
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}


