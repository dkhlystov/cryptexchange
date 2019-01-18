<?php
/**
* 2007-2019 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2019 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

$sql = array();

$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'cryptexchange_rate` (
    `id_rate` int(11) NOT NULL AUTO_INCREMENT,
    `cmc_id` int(11),
    `name` varchar(50),
    `symbol` varchar(50),
    `price` double,
    `last_updated` varchar(50),
    PRIMARY KEY  (`id_rate`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';
$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'cryptexchange_convert` (
    `id_convert` int(11) NOT NULL AUTO_INCREMENT,
    `date` datetime,
    `from` varchar(50),
    `to` varchar(50),
    `value` double,
    PRIMARY KEY  (`id_convert`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

foreach ($sql as $query) {
    if (Db::getInstance()->execute($query) == false) {
        return false;
    }
}
