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

/* @PrestaShop/Admin/Common/Grid/Actions/Row/link.html.twig */
class __TwigTemplate_129367cec5e1afaf30786df410f93f1ec67ea0fb6d6c6d9f55e6dad5749aa010 extends \Twig\Template
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
        echo "
";
        // line 26
        $context["class"] = "btn tooltip-link js-link-row-action";
        // line 27
        echo "
";
        // line 28
        if ($this->getAttribute(($context["attributes"] ?? null), "class", [], "any", true, true)) {
            // line 29
            echo "  ";
            $context["class"] = ((($context["class"] ?? null) . " ") . $this->getAttribute(($context["attributes"] ?? null), "class", []));
        }
        // line 31
        echo "
  ";
        // line 32
        $context["route_params"] = [$this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route_param_name", []) => $this->getAttribute(($context["record"] ?? null), $this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route_param_field", []), [], "array")];
        // line 33
        echo "  ";
        if ($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", [], "any", false, true), "extra_route_params", [], "any", true, true)) {
            // line 34
            echo "      ";
            $context["extra_route_params"] = $this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "extra_route_params", []);
            // line 35
            echo "    
      ";
            // line 36
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["extra_route_params"] ?? null));
            foreach ($context['_seq'] as $context["name"] => $context["field"]) {
                // line 37
                echo "        ";
                $context["route_params"] = twig_array_merge(($context["route_params"] ?? null), [$context["name"] => ((($this->getAttribute(($context["record"] ?? null), $context["field"], [], "array", true, true) &&  !(null === $this->getAttribute(($context["record"] ?? null), $context["field"], [], "array")))) ? ($this->getAttribute(($context["record"] ?? null), $context["field"], [], "array")) : ($context["field"]))]);
                // line 38
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "  ";
        }
        // line 40
        if (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_orders_edit")) {
            // line 41
            echo "    ";
            $context["url_link"] = "#";
        } elseif (($this->getAttribute($this->getAttribute(        // line 42
($context["action"] ?? null), "options", []), "route", []) == "admin_orders_delete")) {
            // line 43
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_delete"] ?? null) . "&id_order=") . $this->getAttribute(($context["route_params"] ?? null), "orderId", []));
        } elseif (($this->getAttribute($this->getAttribute(        // line 44
($context["action"] ?? null), "options", []), "route", []) == "admin_orders_duplicate")) {
            // line 45
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_duplicate"] ?? null) . "&id_order=") . $this->getAttribute(($context["route_params"] ?? null), "orderId", []));
        } elseif (($this->getAttribute($this->getAttribute(        // line 46
($context["action"] ?? null), "options", []), "route", []) == "admin_orders_restore")) {
            // line 47
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_restoreorder"] ?? null) . "&id_order=") . $this->getAttribute(($context["route_params"] ?? null), "orderId", []));
        } elseif (($this->getAttribute($this->getAttribute(        // line 48
($context["action"] ?? null), "options", []), "route", []) == "admin_orders_print_label_delivery")) {
            // line 49
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_print_label_delivery"] ?? null) . "&id_order=") . $this->getAttribute(($context["route_params"] ?? null), "orderId", []));
        } elseif (($this->getAttribute($this->getAttribute(        // line 50
($context["action"] ?? null), "options", []), "route", []) == "admin_orders_login_as_customer")) {
            // line 51
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_login_as_customer"] ?? null) . "&id_order=") . $this->getAttribute(($context["route_params"] ?? null), "orderId", []));
        } elseif (($this->getAttribute($this->getAttribute(        // line 52
($context["action"] ?? null), "options", []), "route", []) == "admin_customers_login_as_customer")) {
            // line 53
            echo "    ";
            $context["url_link"] = ((($context["ets_odm_link_order_login_as_customer"] ?? null) . "&id_customer=") . $this->getAttribute(($context["route_params"] ?? null), "customerId", []));
        } elseif (($this->getAttribute($this->getAttribute(        // line 54
($context["action"] ?? null), "options", []), "route", []) == "admin_customers_activities")) {
            // line 55
            echo "    ";
            $context["url_link"] = ((($context["ets_tc_link_customer_session"] ?? null) . "&id_customer=") . $this->getAttribute(($context["route_params"] ?? null), "customerId", []));
        } elseif (($this->getAttribute($this->getAttribute(        // line 56
($context["action"] ?? null), "options", []), "route", []) == "admin_customers_create_ticket_as_customer")) {
            // line 57
            echo "    ";
            $context["url_link"] = ((($context["ets_lc_link_customer_create_ticket"] ?? null) . "&id_customer=") . $this->getAttribute(($context["route_params"] ?? null), "customerId", []));
        } else {
            // line 59
            echo "    ";
            $context["url_link"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []), ($context["route_params"] ?? null));
        }
        // line 61
        if ((((($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) != "admin_orders_print_label_delivery") || ($this->getAttribute(($context["module_ets_ordermanager"] ?? null), "checkOrderIsVirtual", [0 => $this->getAttribute(($context["route_params"] ?? null), "orderId", [])], "method") != true)) && (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) != "admin_orders_login_as_customer") || ($this->getAttribute(($context["module_ets_ordermanager"] ?? null), "checkOrderIsCustomer", [0 => $this->getAttribute(($context["route_params"] ?? null), "orderId", []), 1 => 0], "method") == true))) && (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) != "admin_customers_login_as_customer") || ($this->getAttribute(($context["module_ets_ordermanager"] ?? null), "checkOrderIsCustomer", [0 => 0, 1 => $this->getAttribute(($context["route_params"] ?? null), "customerId", [])], "method") == true)))) {
            // line 62
            echo "    <a";
            if (((($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_orders_login_as_customer") || ($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_customers_login_as_customer")) || ($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_customers_activities"))) {
                echo " target=\"_blank\"";
            }
            echo " class=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
            if (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_orders_edit")) {
                echo " edit edit_order_inline";
            }
            if (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_orders_duplicate")) {
                echo " duplicate_order_list";
            }
            echo " ";
            if (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_customers_create_ticket_as_customer")) {
                echo " ets_lc_create_ticket";
            }
            echo "\"
       href=\"";
            // line 63
            echo twig_escape_filter($this->env, ($context["url_link"] ?? null), "html", null, true);
            echo "\"
       data-confirm-message=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "confirm_message", []), "html", null, true);
            echo "\"
      ";
            // line 65
            if ($this->getAttribute(($context["attributes"] ?? null), "tooltip_name", [])) {
                // line 66
                echo "        data-toggle=\"pstooltip\"
        data-placement=\"top\"
        data-original-title=\"";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute(($context["action"] ?? null), "name", []), "html", null, true);
                echo "\"
      ";
            }
            // line 70
            echo "      data-clickable-row=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", [], "any", false, true), "clickable_row", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", [], "any", false, true), "clickable_row", []), false)) : (false)), "html", null, true);
            echo "\"
      ";
            // line 71
            if (($this->getAttribute($this->getAttribute(($context["action"] ?? null), "options", []), "route", []) == "admin_customers_create_ticket_as_customer")) {
                echo " data-id_customer=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["route_params"] ?? null), "customerId", []), "html", null, true);
                echo "\"";
            }
            // line 72
            echo "    >
      ";
            // line 73
            if ( !twig_test_empty($this->getAttribute(($context["action"] ?? null), "icon", []))) {
                // line 74
                echo "        <i class=\"material-icons ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["action"] ?? null), "icon", []), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["action"] ?? null), "icon", []), "html", null, true);
                echo "</i>
      ";
            }
            // line 76
            echo "      ";
            if ( !$this->getAttribute(($context["attributes"] ?? null), "tooltip_name", [])) {
                // line 77
                echo "        ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["action"] ?? null), "name", []), "html", null, true);
                echo "
      ";
            }
            // line 79
            echo "    </a>
";
        }
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/Actions/Row/link.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 79,  191 => 77,  188 => 76,  180 => 74,  178 => 73,  175 => 72,  169 => 71,  164 => 70,  159 => 68,  155 => 66,  153 => 65,  149 => 64,  145 => 63,  126 => 62,  124 => 61,  120 => 59,  116 => 57,  114 => 56,  111 => 55,  109 => 54,  106 => 53,  104 => 52,  101 => 51,  99 => 50,  96 => 49,  94 => 48,  91 => 47,  89 => 46,  86 => 45,  84 => 44,  81 => 43,  79 => 42,  76 => 41,  74 => 40,  71 => 39,  65 => 38,  62 => 37,  58 => 36,  55 => 35,  52 => 34,  49 => 33,  47 => 32,  44 => 31,  40 => 29,  38 => 28,  35 => 27,  33 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/Actions/Row/link.html.twig", "/var/www/vhosts/dreamsat.online/matar/modules/ets_delete_order/views/PrestaShop/Admin/Common/Grid/Actions/Row/link.html.twig");
    }
}
