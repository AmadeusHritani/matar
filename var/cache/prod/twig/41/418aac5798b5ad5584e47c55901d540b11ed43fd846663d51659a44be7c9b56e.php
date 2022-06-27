<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__5d4d1c2ae666757671cb629ba482b05ec45e55b770893c87fea6d442d0209e7d */
class __TwigTemplate_b807141d382b492054c0e13556e57db20e5e13367bb3950ca3af87c4202097b0 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'extra_stylesheets' => [$this, 'block_extra_stylesheets'],
            'content_header' => [$this, 'block_content_header'],
            'content' => [$this, 'block_content'],
            'content_footer' => [$this, 'block_content_footer'],
            'sidebar_right' => [$this, 'block_sidebar_right'],
            'javascripts' => [$this, 'block_javascripts'],
            'extra_javascripts' => [$this, 'block_extra_javascripts'],
            'translate_javascripts' => [$this, 'block_translate_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/img/app_icon.png\" />

<title>Link List • Matar Nuts</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminLinkWidget';
    var iso_user = 'en';
    var lang_is_rtl = '0';
    var full_language_code = 'en-us';
    var full_cldr_language_code = 'en-US';
    var country_iso_code = 'SE';
    var _PS_VERSION_ = '1.7.8.6';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'A new order has been placed on your shop.';
    var order_number_msg = 'Order number: ';
    var total_msg = 'Total: ';
    var from_msg = 'From: ';
    var see_order_msg = 'View this order';
    var new_customer_msg = 'A new customer registered on your shop.';
    var customer_name_msg = 'Customer name: ';
    var new_msg = 'A new message was posted on your shop.';
    var see_msg = 'Read this message';
    var token = 'f9ae5452a2fb65a4e9e141401e74b34d';
    var token_admin_orders = tokenAdminOrders = '140b50c78ff1ea14429a94fa3d291359';
    var token_admin_customers = '12b6770e24ed2d9e3a1fa900b1ee9006';
    var token_admin_customer_threads = tokenAdminCustomerThreads = 'd7713ea19f9ce9bb42fc38702f68adbb';
    var currentIndex = 'index.php?controller=AdminLinkWidget';
    var employee_token = '4aa95c4b81817d9069c25138ef0a4b67';
    var choose_language_translate = 'Choose language:';
    var default_language = '1';
    var admin_modules_link = '/admin993hceyft/index.php/improve/modules/catalog/recommended?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU';
    var admin_notification_get_link = '/admin993hceyft/index.php/common/notifications?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU';
    var admin_notificati";
        // line 43
        echo "on_push_link = adminNotificationPushLink = '/admin993hceyft/index.php/common/notifications/ack?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU';
    var tab_modules_list = '';
    var update_success_msg = 'Update successful';
    var errorLogin = 'PrestaShop was unable to log in to Addons. Please check your credentials and your Internet connection.';
    var search_product_msg = 'Search for a product';
  </script>

      <link href=\"/admin993hceyft/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/js/jquery/plugins/fancybox/jquery.fancybox.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/blockwishlist/public/backoffice.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/admin993hceyft/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/gamification/views/css/gamification.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ps_facebook/views/css/admin/menu.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/psxmarketingwithgoogle/views/css/admin/menu.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_htmlbox/views/css/admin_all.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_pres2presfree/views/css/admin-icon.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_pres2presfree/views/css/ps1.7.4.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/modules/ets_blog/views/css/admin_all.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/admin993hceyft\\/\";
var baseDir = \"\\/\";
var changeFormLanguageUrl = \"\\/admin993hceyft\\/index.php\\/configure\\/advanced\\/employees\\/change-form-language?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\";
var currency = {\"iso_code\":\"SEK\",\"sign\":\"kr\",\"name\":\"Swedish Krona\",\"format\":null};
var c";
        // line 68
        echo "urrency_specifications = {\"symbol\":[\".\",\",\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"currencyCode\":\"SEK\",\"currencySymbol\":\"kr\",\"numberSymbols\":[\".\",\",\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"\\u00a4#,##0.00\",\"negativePattern\":\"-\\u00a4#,##0.00\",\"maxFractionDigits\":2,\"minFractionDigits\":2,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var host_mode = false;
var is177 = 1;
var number_specifications = {\"symbol\":[\".\",\",\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"numberSymbols\":[\".\",\",\",\";\",\"%\",\"-\",\"+\",\"E\",\"\\u00d7\",\"\\u2030\",\"\\u221e\",\"NaN\"],\"positivePattern\":\"#,##0.###\",\"negativePattern\":\"-#,##0.###\",\"maxFractionDigits\":3,\"minFractionDigits\":0,\"groupingUsed\":true,\"primaryGroupSize\":3,\"secondaryGroupSize\":3};
var prestashop = {\"debug\":false};
var show_new_customers = \"1\";
var show_new_messages = \"1\";
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/admin993hceyft/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/js/jquery/plugins/fancybox/jquery.fancybox.js\"></script>
<script type=\"text/javascript\" src=\"/js/admin.js?v=1.7.8.6\"></script>
<script type=\"text/javascript\" src=\"/admin993hceyft/themes/new-theme/public/cldr.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/js/tools.js?v=1.7.8.6\"></script>
<script type=\"text/javascript\" src=\"/modules/blockwishlist/public/vendors.js\"></script>
<script type=\"text/javascript\" src=\"/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/admin993hceyft/themes/default/js/vendor/nv.d3.min.js\"></script>
<script type=\"text/javascript\" src=\"/modules/gamification/views/js/gamification_bt.js\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_mbo/views/js/recommended-modules.js?v=2.0.1\"></script>
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/favico.js\"></script>";
        // line 88
        echo "
<script type=\"text/javascript\" src=\"/modules/ps_faviconnotificationbo/views/js/ps_faviconnotificationbo.js\"></script>

  <script>
  if (undefined !== ps_faviconnotificationbo) {
    ps_faviconnotificationbo.initialize({
      backgroundColor: '#DF0067',
      textColor: '#FFFFFF',
      notificationGetUrl: '/admin993hceyft/index.php/common/notifications?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU',
      CHECKBOX_ORDER: 1,
      CHECKBOX_CUSTOMER: 1,
      CHECKBOX_MESSAGE: 1,
      timer: 120000, // Refresh every 2 minutes
    });
  }
</script>
<script>
            var admin_gamification_ajax_url = \"https:\\/\\/matar.dreamsat.online\\/admin993hceyft\\/index.php?controller=AdminGamification&token=006e37556c409b818af420d8617f9a1c\";
            var current_id_tab = 129;
        </script><script type=\"text/javascript\">
var ets_blog_link_ajax_comment='https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminEtsBlogComment&token=8f4aa2ee4bbf34c3d3d75e4b7b1e81a3';
\$(document).ready(function(){
    \$.ajax({
        url: ets_blog_link_ajax_comment,
        data: 'action=getCountCommentsNoViewed',
        type: 'post',
        dataType: 'json',                
        success: function(json){ 
            if(parseInt(json.count) >0)
            {
                if(\$('#subtab-AdminEtsBlogComment span').length)
                    \$('#subtab-AdminEtsBlogComment span').append('<span class=\"count_messages \">'+json.count+'</span>'); 
                else
                    \$('#subtab-AdminEtsBlogComment a').append('<span class=\"count_messages \">'+json.count+'</span>');
            }
            else
            {
                if(\$('#subtab-AdminEtsBlogComment span').length)
                    \$('#subtab-AdminEtsBlogComment span').append('<span class=\"count_messages hide\">'+json.count+'</span>'); 
                else
                    \$('#subtab-AdminEtsBlogComment a').append('<span class=\"count_messages hide\">'+json.count+'</span>');
            }
     ";
        // line 130
        echo "                                                         
        },
    });
});
</script>

";
        // line 136
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>";
        echo "

<body
  class=\"lang-en adminlinkwidget\"
  data-base-url=\"/admin993hceyft/index.php\"  data-token=\"wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\">

  <header id=\"header\" class=\"d-print-none\">

    <nav id=\"header_infos\" class=\"main-header\">
      <button class=\"btn btn-primary-reverse onclick btn-lg unbind ajax-spinner\"></button>

            <i class=\"material-icons js-mobile-menu\">menu</i>
      <a id=\"header_logo\" class=\"logo float-left\" href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminDashboard&amp;token=d8dbbb447a51d0661ba47853a04e470d\"></a>
      <span id=\"shop_version\">1.7.8.6</span>

      <div class=\"component\" id=\"quick-access-container\">
        <div class=\"dropdown quick-accesses\">
  <button class=\"btn btn-link btn-sm dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" id=\"quick_select\">
    Quick Access
  </button>
  <div class=\"dropdown-menu\">
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminStats&amp;module=statscheckup&amp;token=337a221ba26263b05b533391296adfe4\"
                 data-item=\"Catalog evaluation\"
      >Catalog evaluation</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://matar.dreamsat.online/admin993hceyft/index.php/improve/modules/manage?token=ba568eeb0423db53e73246d37757520d\"
                 data-item=\"Installed modules\"
      >Installed modules</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://matar.dreamsat.online/admin993hceyft/index.php/sell/catalog/categories/new?token=ba568eeb0423db53e73246d37757520d\"
                 data-item=\"New category\"
      >New category</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://matar.dreamsat.online/admin993hceyft/index.php/sell/catalog/products/new?token=ba568eeb0423db53e73246d37757520d\"
                 data-item=\"New product\"
      >New product</a>
        ";
        // line 173
        echo "  <a class=\"dropdown-item quick-row-link\"
         href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=6311cc86ec06f4e1849e0894bf2bd82e\"
                 data-item=\"New voucher\"
      >New voucher</a>
          <a class=\"dropdown-item quick-row-link\"
         href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminOrders&amp;token=140b50c78ff1ea14429a94fa3d291359\"
                 data-item=\"Orders\"
      >Orders</a>
        <div class=\"dropdown-divider\"></div>
          <a id=\"quick-add-link\"
        class=\"dropdown-item js-quick-link\"
        href=\"#\"
        data-rand=\"170\"
        data-icon=\"icon-AdminParentThemes\"
        data-method=\"add\"
        data-url=\"index.php/modules/link-widget/list?-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\"
        data-post-link=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminQuickAccesses&token=aa8ab6219d2f5824b3e22c9770062e4a\"
        data-prompt-text=\"Please name this shortcut:\"
        data-link=\"Link List - List\"
      >
        <i class=\"material-icons\">add_circle</i>
        Add current page to Quick Access
      </a>
        <a id=\"quick-manage-link\" class=\"dropdown-item\" href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminQuickAccesses&token=aa8ab6219d2f5824b3e22c9770062e4a\">
      <i class=\"material-icons\">settings</i>
      Manage your quick accesses
    </a>
  </div>
</div>
      </div>
      <div class=\"component\" id=\"header-search-container\">
        <form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form collapsed\"
      method=\"post\"
      action=\"/admin993hceyft/index.php?controller=AdminSearch&amp;token=73b1c510b0900e9c39bfd5393e30f643\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input type=\"text\" class=\"form-control js-form-search\" id=\"bo_query\" name=\"bo_query\" ";
        // line 211
        echo "value=\"\" placeholder=\"Search (e.g.: product reference, customer name…)\" aria-label=\"Searchbar\">
    <div class=\"input-group-append\">
      <button type=\"button\" class=\"btn btn-outline-secondary dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        Everywhere
      </button>
      <div class=\"dropdown-menu js-items-list\">
        <a class=\"dropdown-item\" data-item=\"Everywhere\" href=\"#\" data-value=\"0\" data-placeholder=\"What are you looking for?\" data-icon=\"icon-search\"><i class=\"material-icons\">search</i> Everywhere</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" data-item=\"Catalog\" href=\"#\" data-value=\"1\" data-placeholder=\"Product name, reference, etc.\" data-icon=\"icon-book\"><i class=\"material-icons\">store_mall_directory</i> Catalog</a>
        <a class=\"dropdown-item\" data-item=\"Customers by name\" href=\"#\" data-value=\"2\" data-placeholder=\"Name\" data-icon=\"icon-group\"><i class=\"material-icons\">group</i> Customers by name</a>
        <a class=\"dropdown-item\" data-item=\"Customers by ip address\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\"><i class=\"material-icons\">desktop_mac</i> Customers by IP address</a>
        <a class=\"dropdown-item\" data-item=\"Orders\" href=\"#\" data-value=\"3\" data-placeholder=\"Order ID\" data-icon=\"icon-credit-card\"><i class=\"material-icons\">shopping_basket</i> Orders</a>
        <a class=\"dropdown-item\" data-item=\"Invoices\" href=\"#\" data-value=\"4\" data-placeholder=\"Invoice number\" data-icon=\"icon-book\"><i class=\"material-icons\">book</i> Invoices</a>
        <a class=\"dropdown-item\" data-item=\"Carts\" href=\"#\" data-value=\"5\" data-placeholder=\"Cart ID\" data-icon=\"icon-shopping-cart\"><i class=\"material-icons\">shopping_cart</i> Carts</a>
        <a class=\"dropdown-item\" data-item=\"Modules\" href=\"#\" data-value=\"7\" data-placeholder=\"Module name\" data-icon=\"icon-puzzle-piece\"><i class=\"material-icons\">extension</i> Modules</a>
";
        // line 226
        echo "      </div>
      <button class=\"btn btn-primary\" type=\"submit\"><span class=\"d-none\">SEARCH</span><i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
    \$('#bo_query').one('click', function() {
    \$(this).closest('form').removeClass('collapsed');
  });
});
</script>
      </div>

      
      
              <div class=\"component\" id=\"header-shop-list-container\">
            <div class=\"shop-list\">
    <a class=\"link\" id=\"header_shopname\" href=\"https://matar.dreamsat.online/\" target= \"_blank\">
      <i class=\"material-icons\">visibility</i>
      <span>View my shop</span>
    </a>
  </div>
        </div>
                    <div class=\"component header-right-component\" id=\"header-notifications-container\">
          <div id=\"notif\" class=\"notification-center dropdown dropdown-clickable\">
  <button class=\"btn notification js-notification dropdown-toggle\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </button>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Orders<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Customers<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>";
        // line 283
        echo "
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Messages<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              No new order for now :(<br>
              Have you checked your <strong><a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCarts&action=filterOnlyAbandonedCarts&token=823e46454fb5f4c5b3d22b7f3347fed8\">abandoned carts</a></strong>?<br>Your next order could be hiding there!
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              No new customer for now :(<br>
              Are you active on social media these days?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              No new message for now.<br>
              Seems like all your customers are happy :)
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      from <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"float-sm-right\">_total_paid_</s";
        // line 330
        echo "trong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - registered <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
        </div>
      
      <div class=\"component\" id=\"header-employee-container\">
        <div class=\"dropdown employee-dropdown\">
  <div class=\"rounded-circle person\" data-toggle=\"dropdown\">
    <i class=\"material-icons\">account_circle</i>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right\">
    <div class=\"employee-wrapper-avatar\">

      <span class=\"employee-avatar\"><img class=\"avatar rounded-circle\" src=\"https://matar.dreamsat.online/img/pr/default.jpg\" /></span>
      <span class=\"employee_profile\">Welcome back Deus</span>
      <a class=\"dropdown-item employee-link profile-link\" href=\"/admin993hceyft/index.php/configure/advanced/employees/1/edit?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\">
      <i class=\"material-icons\">edit</i>
      <span>Your profile</span>
    </a>
    </div>

    <p class=\"divider\"></p>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/resources/documentations?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=resources-en&amp;utm_content=download17\" target=\"_blank\" rel=\"noreferrer\"><i class=\"material-icons\">book</i> Resources</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/training?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=training-en&amp;utm_content=download17\" target=\"_blank\" rel=\"noreferrer\"><i class=\"material-icons\">school</i> Train";
        // line 368
        echo "ing</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/experts?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=expert-en&amp;utm_content=download17\" target=\"_blank\" rel=\"noreferrer\"><i class=\"material-icons\">person_pin_circle</i> Find an Expert</a>
    <a class=\"dropdown-item\" href=\"https://addons.prestashop.com?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=addons-en&amp;utm_content=download17\" target=\"_blank\" rel=\"noreferrer\"><i class=\"material-icons\">extension</i> PrestaShop Marketplace</a>
    <a class=\"dropdown-item\" href=\"https://www.prestashop.com/en/contact?utm_source=back-office&amp;utm_medium=profile&amp;utm_campaign=help-center-en&amp;utm_content=download17\" target=\"_blank\" rel=\"noreferrer\"><i class=\"material-icons\">help</i> Help Center</a>
    <p class=\"divider\"></p>
    <a class=\"dropdown-item employee-link text-center\" id=\"header_logout\" href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminLogin&amp;logout=1&amp;token=760cfabc33f5a55771658e13772face1\">
      <i class=\"material-icons d-lg-none\">power_settings_new</i>
      <span>Sign out</span>
    </a>
  </div>
</div>
      </div>
          </nav>
  </header>

  <nav class=\"nav-bar d-none d-print-none d-md-block\">
  <span class=\"menu-collapse\" data-toggle-url=\"/admin993hceyft/index.php/configure/advanced/employees/toggle-navigation?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\">
    <i class=\"material-icons\">chevron_left</i>
    <i class=\"material-icons\">chevron_left</i>
  </span>

  <div class=\"nav-bar-overflow\">
      <ul class=\"main-menu\">
              
                    
                    
          
            <li class=\"link-levelone\" data-submenu=\"1\" id=\"tab-AdminDashboard\">
              <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminDashboard&amp;token=d8dbbb447a51d0661ba47853a04e470d\" class=\"link\" >
                <i class=\"material-icons\">trending_up</i> <span>Dashboard</span";
        // line 397
        echo ">
              </a>
            </li>

          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"2\" id=\"tab-SELL\">
                <span class=\"title\">Sell</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"3\" id=\"subtab-AdminParentOrders\">
                    <a href=\"/admin993hceyft/index.php/sell/orders/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-shopping_basket\">shopping_basket</i>
                      <span>
                      Orders
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"4\" id=\"subtab-AdminOrders\">
                                <a href=\"/admin993hceyft/index.php/sell/orders/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Orders
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"5\" id=\"subtab-AdminInvoices\">
                                <a ";
        // line 437
        echo "href=\"/admin993hceyft/index.php/sell/orders/invoices/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Invoices
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"6\" id=\"subtab-AdminSlip\">
                                <a href=\"/admin993hceyft/index.php/sell/orders/credit-slips/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Credit Slips
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"7\" id=\"subtab-AdminDeliverySlip\">
                                <a href=\"/admin993hceyft/index.php/sell/orders/delivery-slips/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Delivery Slips
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"8\" id=\"subtab-AdminCarts\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCarts&amp;token=823e46454fb5f4c5b3d22b7f3347fed8\" class=\"link\"> Shopping Carts
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                              ";
        // line 467
        echo "                
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"9\" id=\"subtab-AdminCatalog\">
                    <a href=\"/admin993hceyft/index.php/sell/catalog/products?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-store\">store</i>
                      <span>
                      Catalog
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"10\" id=\"subtab-AdminProducts\">
                                <a href=\"/admin993hceyft/index.php/sell/catalog/products?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Products
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"11\" id=\"subtab-AdminCategories\">
                                <a href=\"/admin993hceyft/index.php/sell/catalog/categories?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Categories
                                </a>
                              </li>

                                                                                  
         ";
        // line 499
        echo "                     
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"12\" id=\"subtab-AdminTracking\">
                                <a href=\"/admin993hceyft/index.php/sell/catalog/monitoring/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Monitoring
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"13\" id=\"subtab-AdminParentAttributesGroups\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminAttributesGroups&amp;token=d6dede13102052565b4167a4b5c93447\" class=\"link\"> Attributes &amp; Features
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"16\" id=\"subtab-AdminParentManufacturers\">
                                <a href=\"/admin993hceyft/index.php/sell/catalog/brands/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Brands &amp; Suppliers
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"19\" id=\"subtab-AdminAttachments\">
                                <a href=\"/admin993hceyft/index.php/sell/attachments/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Files
                      ";
        // line 527
        echo "          </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"20\" id=\"subtab-AdminParentCartRules\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCartRules&amp;token=6311cc86ec06f4e1849e0894bf2bd82e\" class=\"link\"> Discounts
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"23\" id=\"subtab-AdminStockManagement\">
                                <a href=\"/admin993hceyft/index.php/sell/stocks/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Stock
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"24\" id=\"subtab-AdminParentCustomer\">
                    <a href=\"/admin993hceyft/index.php/sell/customers/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-account_circle\">account_circle</i>
                      <span>
                      Customers
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                    ";
        // line 560
        echo "                                        </i>
                                            </a>
                                              <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"25\" id=\"subtab-AdminCustomers\">
                                <a href=\"/admin993hceyft/index.php/sell/customers/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Customers
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"26\" id=\"subtab-AdminAddresses\">
                                <a href=\"/admin993hceyft/index.php/sell/addresses/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Addresses
                                </a>
                              </li>

                                                                                                                                    </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"28\" id=\"subtab-AdminParentCustomerThreads\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCustomerThreads&amp;token=d7713ea19f9ce9bb42fc38702f68adbb\" class=\"link\">
                      <i class=\"material-icons mi-chat\">chat</i>
                      <span>
                      Customer Service
                      </span>
                                        ";
        // line 591
        echo "            <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"29\" id=\"subtab-AdminCustomerThreads\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCustomerThreads&amp;token=d7713ea19f9ce9bb42fc38702f68adbb\" class=\"link\"> Customer Service
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"30\" id=\"subtab-AdminOrderMessage\">
                                <a href=\"/admin993hceyft/index.php/sell/customer-service/order-messages/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Order Messages
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"31\" id=\"subtab-AdminReturn\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminReturn&amp;token=c84ce821247611afdf2b555b61b20929\" class=\"link\"> Merchandise Returns
                                </a>
                              </li>

                            ";
        // line 620
        echo "                                                  </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"32\" id=\"subtab-AdminStats\">
                    <a href=\"/admin993hceyft/index.php/modules/metrics/legacy/stats?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-assessment\">assessment</i>
                      <span>
                      Stats
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-32\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"144\" id=\"subtab-AdminMetricsLegacyStatsController\">
                                <a href=\"/admin993hceyft/index.php/modules/metrics/legacy/stats?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Stats
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"145\" id=\"subtab-AdminMetricsController\">
                                <a href=\"/admin993hceyft/index.php/modules/metrics?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Prest";
        // line 649
        echo "aShop Metrics
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title link-active\" data-submenu=\"42\" id=\"tab-IMPROVE\">
                <span class=\"title\">Improve</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"43\" id=\"subtab-AdminParentModulesSf\">
                    <a href=\"/admin993hceyft/index.php/improve/modules/manage?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Modules
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"44\" id=\"subtab-AdminModulesSf\">
                                <a href=\"/admin993hceyft/index.php/improve/modules/manage?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Module Manager
                                </a>
                              </li>

                                                        ";
        // line 688
        echo "                          
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"48\" id=\"subtab-AdminParentModulesCatalog\">
                                <a href=\"/admin993hceyft/index.php/modules/addons/modules/catalog?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Module Catalog
                                </a>
                              </li>

                                                                                                                                                                                          </ul>
                                        </li>
                                              
                  
                                                      
                                                          
                  <li class=\"link-levelone has_submenu link-active open ul-open\" data-submenu=\"52\" id=\"subtab-AdminParentThemes\">
                    <a href=\"/admin993hceyft/index.php/improve/design/themes/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-desktop_mac\">desktop_mac</i>
                      <span>
                      Design
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_up
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-52\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"130\" id=\"subtab-AdminThemesParent\">
          ";
        // line 717
        echo "                      <a href=\"/admin993hceyft/index.php/improve/design/themes/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Theme &amp; Logo
                                </a>
                              </li>

                                                                                                                                        
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"140\" id=\"subtab-AdminPsMboTheme\">
                                <a href=\"/admin993hceyft/index.php/modules/addons/themes/catalog?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Theme Catalog
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"55\" id=\"subtab-AdminParentMailTheme\">
                                <a href=\"/admin993hceyft/index.php/improve/design/mail_theme/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Email Theme
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"57\" id=\"subtab-AdminCmsContent\">
                                <a href=\"/admin993hceyft/index.php/improve/design/cms-pages/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Pages
                                </a>
                              </li>

                                                                                  
                              
                   ";
        // line 747
        echo "                                         
                              <li class=\"link-leveltwo\" data-submenu=\"58\" id=\"subtab-AdminModulesPositions\">
                                <a href=\"/admin993hceyft/index.php/improve/design/modules/positions/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Positions
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"59\" id=\"subtab-AdminImages\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminImages&amp;token=3b9e5c21188200ae16b3f6a0186981f5\" class=\"link\"> Image Settings
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo link-active\" data-submenu=\"129\" id=\"subtab-AdminLinkWidget\">
                                <a href=\"/admin993hceyft/index.php/modules/link-widget/list?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Link List
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"60\" id=\"subtab-AdminParentShipping\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCarriers&amp;token=36cd8b2b50fbfbf63e61551f5665c";
        // line 776
        echo "876\" class=\"link\">
                      <i class=\"material-icons mi-local_shipping\">local_shipping</i>
                      <span>
                      Shipping
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-60\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"61\" id=\"subtab-AdminCarriers\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminCarriers&amp;token=36cd8b2b50fbfbf63e61551f5665c876\" class=\"link\"> Carriers
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"62\" id=\"subtab-AdminShipping\">
                                <a href=\"/admin993hceyft/index.php/improve/shipping/preferences/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Preferences
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"154\" id=\"subtab-AdminDhldpManifest\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.ph";
        // line 806
        echo "p?controller=AdminDhldpManifest&amp;token=3ba5919e6daeaec41e62328fee7ab836\" class=\"link\"> DHL
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"63\" id=\"subtab-AdminParentPayment\">
                    <a href=\"/admin993hceyft/index.php/improve/payment/payment_methods?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-payment\">payment</i>
                      <span>
                      Payment
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-63\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"64\" id=\"subtab-AdminPayment\">
                                <a href=\"/admin993hceyft/index.php/improve/payment/payment_methods?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Payment Methods
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"6";
        // line 838
        echo "5\" id=\"subtab-AdminPaymentPreferences\">
                                <a href=\"/admin993hceyft/index.php/improve/payment/preferences?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Preferences
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"66\" id=\"subtab-AdminInternational\">
                    <a href=\"/admin993hceyft/index.php/improve/international/localization/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-language\">language</i>
                      <span>
                      International
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-66\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"67\" id=\"subtab-AdminParentLocalization\">
                                <a href=\"/admin993hceyft/index.php/improve/international/localization/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Localization
                                </a>
                              </li>

                                                                                  
                    ";
        // line 869
        echo "          
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"72\" id=\"subtab-AdminParentCountries\">
                                <a href=\"/admin993hceyft/index.php/improve/international/zones/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Locations
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"76\" id=\"subtab-AdminParentTaxes\">
                                <a href=\"/admin993hceyft/index.php/improve/international/taxes/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Taxes
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"79\" id=\"subtab-AdminTranslations\">
                                <a href=\"/admin993hceyft/index.php/improve/international/translations/settings?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Translations
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"146\" id=\"subtab-Marketing\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminPsxMktgWithGoogleModule&amp;token=3f19d96";
        // line 899
        echo "7b00f271335131ddab6fcafab\" class=\"link\">
                      <i class=\"material-icons mi-campaign\">campaign</i>
                      <span>
                      Marketing
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-146\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"149\" id=\"subtab-AdminPsxMktgWithGoogleModule\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminPsxMktgWithGoogleModule&amp;token=3f19d967b00f271335131ddab6fcafab\" class=\"link\"> Google
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"80\" id=\"tab-CONFIGURE\">
                <span class=\"title\">Configure</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"81\" id=\"subtab-ShopParameters\">
                    <a href=\"/admin993hceyft/index.php/configure/shop/preferences/preferences?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-setti";
        // line 935
        echo "ngs\">settings</i>
                      <span>
                      Shop Parameters
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-81\" class=\"submenu panel-collapse\">
                                                      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"82\" id=\"subtab-AdminParentPreferences\">
                                <a href=\"/admin993hceyft/index.php/configure/shop/preferences/preferences?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> General
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"85\" id=\"subtab-AdminParentOrderPreferences\">
                                <a href=\"/admin993hceyft/index.php/configure/shop/order-preferences/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Order Settings
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"88\" id=\"subtab-AdminPPreferences\">
                                <a href=\"/admin993hceyft/index.php/configure/shop/product-preferences/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU";
        // line 964
        echo "\" class=\"link\"> Product Settings
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"89\" id=\"subtab-AdminParentCustomerPreferences\">
                                <a href=\"/admin993hceyft/index.php/configure/shop/customer-preferences/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Customer Settings
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"93\" id=\"subtab-AdminParentStores\">
                                <a href=\"/admin993hceyft/index.php/configure/shop/contacts/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Contact
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"96\" id=\"subtab-AdminParentMeta\">
                                <a href=\"/admin993hceyft/index.php/configure/shop/seo-urls/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Traffic &amp; SEO
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"100\" id=\"subtab-AdminParentSearchConf\">
     ";
        // line 996
        echo "                           <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminSearchConf&amp;token=cdd6607128ece3d40a554a064c76e31f\" class=\"link\"> Search
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"134\" id=\"subtab-AdminGamification\">
                                <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminGamification&amp;token=006e37556c409b818af420d8617f9a1c\" class=\"link\"> Merchant Expertise
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone has_submenu\" data-submenu=\"103\" id=\"subtab-AdminAdvancedParameters\">
                    <a href=\"/admin993hceyft/index.php/configure/advanced/system-information/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\">
                      <i class=\"material-icons mi-settings_applications\">settings_applications</i>
                      <span>
                      Advanced Parameters
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                              <ul id=\"collapse-103\" class=\"submenu panel-collapse\">
                                                ";
        // line 1025
        echo "      
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"104\" id=\"subtab-AdminInformation\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/system-information/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Information
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"105\" id=\"subtab-AdminPerformance\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/performance/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Performance
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"106\" id=\"subtab-AdminAdminPreferences\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/administration/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Administration
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"107\" id=\"subtab-AdminEmails\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/emails/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> E-mail
                       ";
        // line 1054
        echo "         </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"108\" id=\"subtab-AdminImport\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/import/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Import
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"109\" id=\"subtab-AdminParentEmployees\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/employees/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Team
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"113\" id=\"subtab-AdminParentRequestSql\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/sql-requests/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Database
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"116\" id=\"subtab-AdminLogs\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/logs/?_token=w";
        // line 1085
        echo "NTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Logs
                                </a>
                              </li>

                                                                                  
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"117\" id=\"subtab-AdminWebservice\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/webservice-keys/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Webservice
                                </a>
                              </li>

                                                                                                                                                                                              
                              
                                                            
                              <li class=\"link-leveltwo\" data-submenu=\"120\" id=\"subtab-AdminFeatureFlag\">
                                <a href=\"/admin993hceyft/index.php/configure/advanced/feature-flags/?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" class=\"link\"> Experimental Features
                                </a>
                              </li>

                                                                              </ul>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"157\" id=\"tab-AdminIzettleConnector\">
                <span class=\"title\">Zettle</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"158\" id=\"subtab-AdminIzettleConnectorSettings\">
                    ";
        // line 1122
        echo "<a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminIzettleConnectorSettings&amp;token=bbb99947adcb0283463e7b6fd4e860ce\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Settings
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"159\" id=\"subtab-AdminIzettleConnectorRoot\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminIzettleConnectorRoot&amp;token=4af24ab6845205cd0a9c3e044fc77412\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Sync
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"161\" id=\"subtab-AdminIzettleConnectorProducts\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminIzettleConnectorProducts&amp;token=b499c60cc9ae9864c6486fc42";
        // line 1152
        echo "66c30cb\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      Products
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"162\" id=\"subtab-AdminIzettleConnectorHistory\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminIzettleConnectorHistory&amp;token=78915d5825db1b321aa2084635f24d0e\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
                      History
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"163\" id=\"subtab-AdminIzettleConnectorHelp\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminIzettleConnectorHelp&amp;token=e87b2226d804d954f149e7ff5d563ebb\" class=\"link\">
                      <i class=\"material-icons mi-extension\">extension</i>
                      <span>
            ";
        // line 1185
        echo "          FAQ
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"166\" id=\"tab-AdminPresToPresFree\">
                <span class=\"title\">Presta Migrator - FREE</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"167\" id=\"subtab-AdminPresToPresFreeImport\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminPresToPresFreeImport&amp;token=5af0a2a6aea22f50da787cedfd23f854\" class=\"link\">
                      <i class=\"material-icons mi-icon icon-cloud-upload\">icon icon-cloud-upload</i>
                      <span>
                      Migration
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"168\" id=\"subtab-AdminPresToPresFreeHistory\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminPresToPresFreeHisto";
        // line 1222
        echo "ry&amp;token=d1d5cd6fb8656ce7e8d3380456c203bf\" class=\"link\">
                      <i class=\"material-icons mi-icon icon-history\">icon icon-history</i>
                      <span>
                      History
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"169\" id=\"subtab-AdminPresToPresFreeClean\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminPresToPresFreeClean&amp;token=4b786f8c8533b70f67278ab9c79c2f81\" class=\"link\">
                      <i class=\"material-icons mi-icon icon-eraser\">icon icon-eraser</i>
                      <span>
                      Clean-up
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"170\" id=\"subtab-AdminPresToPresFreeHelp\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminPresToPresFreeHelp&amp;token=89db4d11d214696c4080096a3075e675\" class=\"link\">
                      <i class=\"material-icons mi-icon icon-";
        // line 1253
        echo "question-circle\">icon icon-question-circle</i>
                      <span>
                      Help
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                      
                                          
                    
          
            <li class=\"category-title\" data-submenu=\"172\" id=\"tab-AdminEtsBlog\">
                <span class=\"title\">Blog</span>
            </li>

                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"173\" id=\"subtab-AdminEtsBlogPost\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminEtsBlogPost&amp;token=841addbceae84151bffc6f91c0a94878\" class=\"link\">
                      <i class=\"material-icons mi-icon icon-AdminPriceRule\">icon icon-AdminPriceRule</i>
                      <span>
                      Posts
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"174\" id=\"subtab-AdminEtsBlogCategory\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index";
        // line 1292
        echo ".php?controller=AdminEtsBlogCategory&amp;token=cf60dcf8cfbc4c952152dcbf9ac92015\" class=\"link\">
                      <i class=\"material-icons mi-icon icon-AdminCatalog\">icon icon-AdminCatalog</i>
                      <span>
                      Categories
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"175\" id=\"subtab-AdminEtsBlogComment\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminEtsBlogComment&amp;token=8f4aa2ee4bbf34c3d3d75e4b7b1e81a3\" class=\"link\">
                      <i class=\"material-icons mi-icon icon-comments\">icon icon-comments</i>
                      <span>
                      Comments
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                                              
                  
                                                      
                  
                  <li class=\"link-levelone\" data-submenu=\"176\" id=\"subtab-AdminEtsBlogSetting\">
                    <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminEtsBlogSetting&amp;token=0f775c63cbec11d1d2c24658262b5a0a\" class=\"link\">
                      <i cl";
        // line 1323
        echo "ass=\"material-icons mi-icon icon-AdminAdmin\">icon icon-AdminAdmin</i>
                      <span>
                      Global settings
                      </span>
                                                    <i class=\"material-icons sub-tabs-arrow\">
                                                                    keyboard_arrow_down
                                                            </i>
                                            </a>
                                        </li>
                              
          
                  </ul>
  </div>
  
</nav>


<div class=\"header-toolbar d-print-none\">
    
  <div class=\"container-fluid\">

    
      <nav aria-label=\"Breadcrumb\">
        <ol class=\"breadcrumb\">
                      <li class=\"breadcrumb-item\">Design</li>
          
                      <li class=\"breadcrumb-item active\">
              <a href=\"/admin993hceyft/index.php/modules/link-widget/list?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\" aria-current=\"page\">Link List</a>
            </li>
                  </ol>
      </nav>
    

    <div class=\"title-row\">
      
          <h1 class=\"title\">
            Link List          </h1>
      

      
        <div class=\"toolbar-icons\">
          <div class=\"wrapper\">
            
                                                          <a
                  class=\"btn btn-primary pointer\"                  id=\"page-header-desc-configuration-add\"
                  href=\"/admin993hceyft/index.php/modules/link-widget/create?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\"                  title=\"New block\"                >
                  <i class=\"material-icons\">add_circle_outline</i>                  New block
                </a>
                                      
            
                              <a class=\"btn btn-outline-secondary btn-help btn-sidebar\" href=\"#\"
                   title=\"Help\"
                   data-toggle=\"sidebar\"
                ";
        // line 1376
        echo "   data-target=\"#right-sidebar\"
                   data-url=\"/admin993hceyft/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop.com%252Fen%252Fdoc%252FAdminLinkWidget%253Fversion%253D1.7.8.6%2526country%253Den/Help?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\"
                   id=\"product_form_open_help\"
                >
                  Help
                </a>
                                    </div>
        </div>

      
    </div>
  </div>

  
  
  <div class=\"btn-floating\">
    <button class=\"btn btn-primary collapsed\" data-toggle=\"collapse\" data-target=\".btn-floating-container\" aria-expanded=\"false\">
      <i class=\"material-icons\">add</i>
    </button>
    <div class=\"btn-floating-container collapse\">
      <div class=\"btn-floating-menu\">
        
                              <a
              class=\"btn btn-floating-item  pointer\"              id=\"page-header-desc-floating-configuration-add\"
              href=\"/admin993hceyft/index.php/modules/link-widget/create?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\"              title=\"New block\"            >
              New block
              <i class=\"material-icons\">add_circle_outline</i>            </a>
                  
                              <a class=\"btn btn-floating-item btn-help btn-sidebar\" href=\"#\"
               title=\"Help\"
               data-toggle=\"sidebar\"
               data-target=\"#right-sidebar\"
               data-url=\"/admin993hceyft/index.php/common/sidebar/https%253A%252F%252Fhelp.prestashop.com%252Fen%252Fdoc%252FAdminLinkWidget%253Fversion%253D1.7.8.6%2526country%253Den/Help?_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU\"
            >
              Help
            </a>
                        </div>
    </div>
  </div>
  <script>
  if (undefined !== mbo) {
    mbo.initialize({
      translations: {
        'Recommended Modules and Services': 'Recommended Modules and Services',
        'Close': 'Close',
      },
      recommendedModulesUrl: '/a";
        // line 1422
        echo "dmin993hceyft/index.php/modules/addons/modules/recommended?tabClassName=AdminLinkWidget&_token=wNTvSnX-rfj_HM151iCKpYKyn_H3_ID9Fvj-VxE4HCU',
      shouldAttachRecommendedModulesAfterContent: 0,
      shouldAttachRecommendedModulesButton: 0,
      shouldUseLegacyTheme: 0,
    });
  }
</script>

</div>

<div id=\"main-div\">
          
      <div class=\"content-div  \">

        

                                                        
        <div class=\"row \">
          <div class=\"col-sm-12\">
            <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>


  ";
        // line 1444
        $this->displayBlock('content_header', $context, $blocks);
        $this->displayBlock('content', $context, $blocks);
        $this->displayBlock('content_footer', $context, $blocks);
        $this->displayBlock('sidebar_right', $context, $blocks);
        echo "

            
          </div>
        </div>

      </div>
    </div>

  <div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>Oh no!</h1>
  <p class=\"mt-3\">
    The mobile version of this page is not available yet.
  </p>
  <p class=\"mt-2\">
    Please use a desktop computer to access this page, until is adapted to mobile.
  </p>
  <p class=\"mt-2\">
    Thank you.
  </p>
  <a href=\"https://matar.dreamsat.online/admin993hceyft/index.php?controller=AdminDashboard&amp;token=d8dbbb447a51d0661ba47853a04e470d\" class=\"btn btn-primary py-1 mt-3\">
    <i class=\"material-icons\">arrow_back</i>
    Back
  </a>
</div>
  <div class=\"mobile-layer\"></div>

      <div id=\"footer\" class=\"bootstrap\">
    
</div>
  

      <div class=\"bootstrap\">
      <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"https://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-EN&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/en/login?email=deus.h%40outlook.com&amp;firstname=Deus&amp;lastname=H.&amp;website=http%3A%2F%2Fmatar.dreamsat.online%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/admin993hceyft/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Connect your shop to PrestaShop's marketplace in order to automatically import all your Addons purchases.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"c";
        // line 1494
        echo "ol-md-6\">
\t\t\t\t\t\t<h4>Don't have an account?</h4>
\t\t\t\t\t\t<p class='text-justify'>Discover the Power of PrestaShop Addons! Explore the PrestaShop Official Marketplace and find over 3 500 innovative modules and themes that optimize conversion rates, increase traffic, build customer loyalty and maximize your productivity</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Connect to PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link float-right _blank\" href=\"//addons.prestashop.com/en/forgot-your-password\">I forgot my password</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/en/login?email=deus.h%40outlook.com&amp;firstname=Deus&amp;lastname=H.&amp;website=http%3A%2F%2Fmatar.dreamsat.online%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-EN&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tCreate an Account
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon";
        // line 1533
        echo "-unlock\"></i> Sign in
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    </div>
  
";
        // line 1552
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>";
        echo "
</html>";
    }

    // line 136
    public function block_stylesheets($context, array $blocks = [])
    {
    }

    public function block_extra_stylesheets($context, array $blocks = [])
    {
    }

    // line 1444
    public function block_content_header($context, array $blocks = [])
    {
    }

    public function block_content($context, array $blocks = [])
    {
    }

    public function block_content_footer($context, array $blocks = [])
    {
    }

    public function block_sidebar_right($context, array $blocks = [])
    {
    }

    // line 1552
    public function block_javascripts($context, array $blocks = [])
    {
    }

    public function block_extra_javascripts($context, array $blocks = [])
    {
    }

    public function block_translate_javascripts($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "__string_template__5d4d1c2ae666757671cb629ba482b05ec45e55b770893c87fea6d442d0209e7d";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1726 => 1552,  1709 => 1444,  1700 => 136,  1691 => 1552,  1670 => 1533,  1629 => 1494,  1573 => 1444,  1549 => 1422,  1501 => 1376,  1446 => 1323,  1413 => 1292,  1372 => 1253,  1339 => 1222,  1300 => 1185,  1265 => 1152,  1233 => 1122,  1194 => 1085,  1161 => 1054,  1130 => 1025,  1099 => 996,  1065 => 964,  1034 => 935,  996 => 899,  964 => 869,  931 => 838,  897 => 806,  865 => 776,  834 => 747,  802 => 717,  771 => 688,  730 => 649,  699 => 620,  668 => 591,  635 => 560,  600 => 527,  570 => 499,  536 => 467,  504 => 437,  462 => 397,  431 => 368,  391 => 330,  342 => 283,  283 => 226,  266 => 211,  226 => 173,  184 => 136,  176 => 130,  132 => 88,  110 => 68,  83 => 43,  39 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__5d4d1c2ae666757671cb629ba482b05ec45e55b770893c87fea6d442d0209e7d", "");
    }
}
