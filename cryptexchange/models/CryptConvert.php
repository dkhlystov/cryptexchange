<?php
/**
*  @author    Dmitry Khlystov <dkhlystov@gmail.com>
*  @copyright 2019 Dmitry Khlystov
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class CryptConvert extends ObjectModel
{

    public $id_convert = null;
    public $date;
    public $from;
    public $to;
    public $value;

    public static $definition = array(
        'table' => 'cryptexchange_convert',
        'primary' => 'id_convert',
        'multilang' => false,
        'fields' => array(
            'date' => array('type' => self::TYPE_DATE),
            'from' => array('type' => self::TYPE_STRING),
            'to' => array('type' => self::TYPE_STRING),
            'value' => array('type' => self::TYPE_FLOAT),
        ),
    );
}
