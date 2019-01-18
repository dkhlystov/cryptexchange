<?php
/**
*  @author    Dmitry Khlystov <dkhlystov@gmail.com>
*  @copyright 2019 Dmitry Khlystov
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class CryptRate extends ObjectModel
{

    public $id_rate = null;
    public $cmc_id;
    public $name;
    public $symbol;
    public $price;
    public $last_updated;

    public static $definition = array(
        'table' => 'cryptexchange_rate',
        'primary' => 'id_rate',
        'multilang' => false,
        'fields' => array(
            'cmc_id' => array('type' => self::TYPE_INT),
            'name' => array('type' => self::TYPE_STRING),
            'symbol' => array('type' => self::TYPE_STRING),
            'price' => array('type' => self::TYPE_FLOAT),
            'last_updated' => array('type' => self::TYPE_STRING),
        ),
    );
}
