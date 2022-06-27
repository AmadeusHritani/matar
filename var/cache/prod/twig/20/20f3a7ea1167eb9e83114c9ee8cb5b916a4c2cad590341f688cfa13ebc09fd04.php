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

/* @PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig */
class __TwigTemplate_b535c262aae7fb4e7974f7eec9f290ae09e6541ba154c3e4f0555b9adfaaff45 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        if (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "submit_route", []) == "admin_order_bulk_delete")) {
            // line 26
            echo "    ";
            if (($context["ets_omd_is_viewtrash"] ?? null)) {
                // line 27
                echo "        ";
                if (($context["ets_odm_can_delete_order"] ?? null)) {
                    // line 28
                    echo "            <button id=\"order_grid_bulk_action_delete_selected\" class=\"dropdown-item js-bulk-action-submit-btn\" type=\"button\" data-form-url=\"";
                    echo twig_escape_filter($this->env, ($context["ets_odm_link_list_orders"] ?? null), "html", null, true);
                    echo "&delete_all_order=1&viewtrash=1\" data-form-method=\"POST\" data-confirm-message=\"\"> ";
                    echo twig_escape_filter($this->env, ($context["Delete_selected_orders_text"] ?? null), "html", null, true);
                    echo " </button>
        ";
                }
                // line 30
                echo "        <button id=\"order_grid_bulk_action_restore_selected\" class=\"dropdown-item js-bulk-action-submit-btn\" type=\"button\" data-form-url=\"";
                echo twig_escape_filter($this->env, ($context["ets_odm_link_list_orders"] ?? null), "html", null, true);
                echo "&restore_all_order=1&viewtrash=1\" data-form-method=\"POST\" data-confirm-message=\"\"> ";
                echo twig_escape_filter($this->env, ($context["Restore_selected_orders_text"] ?? null), "html", null, true);
                echo " </button>
    ";
            } else {
                // line 32
                echo "        ";
                if (($context["ets_odm_can_delete_order"] ?? null)) {
                    // line 33
                    echo "            <button id=\"order_grid_bulk_action_delete_selected\" class=\"dropdown-item js-bulk-action-submit-btn\" type=\"button\" data-form-url=\"";
                    echo twig_escape_filter($this->env, ($context["ets_odm_link_list_orders"] ?? null), "html", null, true);
                    echo "&delete_all_order\" data-form-method=\"POST\" data-confirm-message=\"\"> ";
                    echo twig_escape_filter($this->env, ($context["Delete_selected_orders_text"] ?? null), "html", null, true);
                    echo " </button>
        ";
                }
                // line 35
                echo "    ";
            }
        } else {
            // line 37
            echo "    ";
            $this->loadTemplate("PrestaShopBundle:Admin/Common/Grid/Actions/Bulk:submit.html.twig", "@PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig", 37)->display($context);
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 37,  65 => 35,  57 => 33,  54 => 32,  46 => 30,  38 => 28,  35 => 27,  32 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig", "/var/www/vhosts/dreamsat.online/matar/modules/ets_delete_order/views/PrestaShop/Admin/Common/Grid/Actions/Bulk/submit.html.twig");
    }
}
