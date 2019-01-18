<?php
/**
*  @author    Dmitry Khlystov <dkhlystov@gmail.com>
*  @copyright 2019 Dmitry Khlystov
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

class CryptExchangeUpdateModuleFrontController extends ModuleFrontController
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
        $host = 'https://pro-api.coinmarketcap.com';

        //data
        $sData = http_build_query(array(
            'CMC_PRO_API_KEY' => Configuration::get('CRYPTEXCHANGE_API_KEY', null),
            'start' => 1,
            'limit' => 200,
            'convert' => 'USD',
        ));
        
        //url
        $sUrl = $host . '/v1/cryptocurrency/listings/latest?' . $sData;

        //get contents
        $contents = @Tools::file_get_contents($sUrl);
        $success = $contents !== false;
        $updateCount = 0;

        //parse json data
        if ($success) {
            $json = json_decode($contents, true);
            if (!isset($json['data']) || !is_array($json['data'])) {
                $success = false;
            }
        }

        //process rates
        if ($success) {
            foreach ($json['data'] as $item) {
                $r = (new PrestaShopCollection('CryptRate'))->where('cmc_id', '=', $item['id'])->getResults();
                $rate = empty($r) ? new CryptRate() : $r[0];
                if ($rate->last_updated == $item['quote']['USD']['last_updated']) {
                    continue;
                }
                $rate->cmc_id = $item['id'];
                $rate->name = $item['name'];
                $rate->symbol = $item['symbol'];
                $rate->price = $item['quote']['USD']['price'];
                $rate->last_updated = $item['quote']['USD']['last_updated'];
                if ($rate->save()) {
                    $updateCount++;
                }
            }
        }

        //render
        echo json_encode(array(
            'success' => $success,
            'count' => $updateCount,
        ));
    }
}
