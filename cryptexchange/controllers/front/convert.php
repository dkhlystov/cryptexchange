<?php
/**
*  @author    Dmitry Khlystov <dkhlystov@gmail.com>
*  @copyright 2019 Dmitry Khlystov
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class CryptExchangeConvertModuleFrontController extends ModuleFrontController
{

    public function __construct($response = array())
    {
        parent::__construct($response);
        $this->display_header = false;
        $this->display_header_javascript = false;
        $this->display_footer = false;
    }

    public function postProcess()
    {
        //form
        $r = (new PrestaShopCollection('CryptRate'))->where('symbol', '=', Tools::getValue('from'))->getResults();
        $from = empty($r) ? null : $r[0];

        //to
        $r = (new PrestaShopCollection('CryptRate'))->where('symbol', '=', Tools::getValue('to'))->getResults();
        $to = empty($r) ? null : $r[0];

        //value
        $value = (float) Tools::getValue('value');

        //convert
        $result = $from && $to && $to->price && $value >= 0 ? $value * $from->price / $to->price : false;

        //save
        if ($result !== false) {
            $item = new CryptConvert();
            $item->date = gmdate('Y-m-d H:i:s');
            $item->from = $from->symbol;
            $item->to = $to->symbol;
            $item->value = $value;
            $item->save();
        }

        echo json_encode($result);
    }
}
