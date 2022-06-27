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

/* @PrestaShop/Admin/Common/Grid/grid_panel.html.twig */
class __TwigTemplate_4b258a975ce245a45c8c854117e32e509192debbc7dd5ac81d92dfaa36e7445b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'grid_panel_header' => [$this, 'block_grid_panel_header'],
            'grid_actions_block' => [$this, 'block_grid_actions_block'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return "PrestaShopBundle:Admin/Common/Grid:grid_panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Common/Grid:grid_panel.html.twig", "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", 25);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_grid_panel_header($context, array $blocks = [])
    {
        // line 27
        echo "<div class=\"card-header js-grid-header\">
  <h3 class=\"d-inline-block card-header-title\">
    ";
        // line 29
        if ((array_key_exists("ets_omd_is_viewtrash", $context) && ($context["ets_omd_is_viewtrash"] ?? null))) {
            echo twig_escape_filter($this->env, ($context["Trash_orders_text"] ?? null), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->getAttribute(($context["grid"] ?? null), "name", []), "html", null, true);
        }
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "data", []), "records_total", []), "html", null, true);
        echo ")
  </h3>
  ";
        // line 31
        $this->displayBlock('grid_actions_block', $context, $blocks);
        // line 36
        echo "</div>
";
    }

    // line 31
    public function block_grid_actions_block($context, array $blocks = [])
    {
        // line 32
        echo "    <div class=\"d-inline-block float-right\">
      ";
        // line 33
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/grid_actions.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
    </div>
  ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 33,  68 => 32,  65 => 31,  60 => 36,  58 => 31,  47 => 29,  43 => 27,  40 => 26,  30 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@PrestaShop/Admin/Common/Grid/grid_panel.html.twig", "/var/www/vhosts/dreamsat.online/matar/modules/ets_delete_order/views/PrestaShop/Admin/Common/Grid/grid_panel.html.twig");
    }
}
