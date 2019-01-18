{*
*  @author Dmitry Khlystov <dkhlystov@gmail.com>
*  @copyright 2019 Dmitry Khlystov
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<div>
    <form class="cryptexchange-form" action="{$link->getModuleLink('cryptexchange', 'convert', [], true)|escape:'htmlall'}">

        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="value">
                    <div class="input-group-btn">
                        <select class="form-control" name="from">
                            {foreach $rates as $rate}
                                <option value="{$rate->symbol|escape:'htmlall'}" {if $rate->symbol eq 'BTC'}selected{/if}>{$rate->symbol|escape:'htmlall'}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <input type="text" class="form-control" readonly="true" name="result">
                    <div class="input-group-btn">
                        <select class="form-control" name="to">
                            {foreach $rates as $rate}
                                <option value="{$rate->symbol|escape:'htmlall'}" {if $rate->symbol eq 'ETH'}selected{/if}>{$rate->symbol|escape:'htmlall'}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="row converts">
            <div class="col-sm-6">
                {foreach $converts1 as $c}
                    <div class="item"><a href="#" data-from="{$c->from|escape:'htmlall'}" data-to="{$c->to|escape:'htmlall'}" data-value="{$c->value|escape:'htmlall'}">{$c->value|escape:'htmlall'} {$c->from|escape:'htmlall'} to {$c->to|escape:'htmlall'}</a></div>
                {/foreach}
            </div>
            <div class="col-sm-6">
                {foreach $converts2 as $c}
                    <div class="item"><a href="#" data-from="{$c->from|escape:'htmlall'}" data-to="{$c->to|escape:'htmlall'}" data-value="{$c->value|escape:'htmlall'}">{$c->value|escape:'htmlall'} {$c->from|escape:'htmlall'} to {$c->to|escape:'htmlall'}</a></div>
                {/foreach}
            </div>
        </div>

    </form>
</div>

