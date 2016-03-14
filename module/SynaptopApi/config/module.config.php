<?php
/**
 * 
 *
 * @link
 * @copyright
 * @license
 * @author: Raymond Fu
 */

#namespace SynaptopApi\Controller;

return array(
    'controllers' => array(
        'invokables' => array(
            'SynaptopApi\Controller\Transactions' => 'SynaptopApi\Controller\TransactionsController',
            'SynaptopApi\Controller\Timestamp' => 'SynaptopApi\Controller\TimestampController',
            'SynaptopApi\Controller\SynaptopApi' => 'SynaptopApi\Controller\SynaptopApiController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'timestamp' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/Timestamp',
                    'constraints' => array(
                       
                    ),
                    'defaults' => array(
                        'controller' => 'SynaptopApi\Controller\Timestamp',
                    ),
                ),
            ),
            'transactions' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/Transactions',
                    'constraints' => array(
                       
                    ),
                    'defaults' => array(
                        'controller' => 'SynaptopApi\Controller\Transactions',
                    ),
                ),
            ),
            'synaptop-rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/User[/:id]/Transactions',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'SynaptopApi\Controller\UserTransactions',
                    ),
                ),
            ),
        ),
    ),
 

    'view_manager' => array(
		'strategies' => array(
			'ViewJsonStrategy',
		),

    ),
);



