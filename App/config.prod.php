<?php return[
    /* -----------------------------------------------------------------
    |
    |                       PRODUCTION ENVIRONMENT
    |
    /* ----------------------------------------------------------------*/

    /* ------------------------------------------------------------------
     *
     *  Database parameters for connection
     *
     * -----------------------------------------------------------------*/

    # [Mysql Default Connection]
    'mysql_connection' => array(
        'type'=>'mysql',
        'host'=>'',
        'sock'=>'',
        'port'=>'',
        'user' => '',
        'password' => '',
        'instance' => ''
    ),

    # [Mysql Custom Connection] for [ $db->useConnection('mysql_userconnection') ]
    'mysql_customconn' => array(
        'type'=>'mysql',
        'host'=>'',
        'sock'=>'',
        'port'=>'',
        'user' => '',
        'password' => '',
        'instance' => ''
    ),


    /* ------------------------------------------------------------------
     *
     *  Parameters Specific for Marketplaces
     *
     * -----------------------------------------------------------------*/


    /* ------------------------------------------------------------------
     *
     *  Application Path parameters
     *
     * -----------------------------------------------------------------*/



];