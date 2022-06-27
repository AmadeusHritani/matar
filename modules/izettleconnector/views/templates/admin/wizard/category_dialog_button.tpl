{**
 *  2020 iZettle Prestashop Connector
 *  @author    : iZettle
 *  @copyright : 2020 iZettle
 *  @license   : MIT
 *  @contact   : prestashop.com
 *  @homepage  : izettle.com
*}

<div class="col-lg-12 izettle">
    <div class="col-lg-6"></div>
    <div class="col-lg-6" style="text-align: right">
        <a style="text-decoration: underline; cursor: pointer; color: black; font-size: 14px" onclick="global_wizard_category_id = -1; closeCategorySelector(); return true;">{l s='Cancel' mod='izettleconnector'}</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button style="font-size: 14px" class="btn btn-primary" onclick="processCategoryDialog(); closeCategorySelector();">{l s='OK' mod='izettleconnector'}</button></div>

</div>
<!--<script>$('#expand-all-categories-tree').click()</script>-->