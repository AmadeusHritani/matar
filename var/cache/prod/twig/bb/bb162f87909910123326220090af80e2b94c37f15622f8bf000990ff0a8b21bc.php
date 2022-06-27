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

/* PrestaShopBundle:Admin/Common/Grid:grid_panel.html.twig */
class __TwigTemplate_efe72cc75f347c34fe506980b8fedeab0759f7e0b5e0a45baaec057fa76de619 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'grid_panel_header' => [$this, 'block_grid_panel_header'],
            'grid_actions_block' => [$this, 'block_grid_actions_block'],
            'grid_panel_body' => [$this, 'block_grid_panel_body'],
            'grid_view_block' => [$this, 'block_grid_view_block'],
            'grid_panel_footer' => [$this, 'block_grid_panel_footer'],
            'grid_panel_extra_content' => [$this, 'block_grid_panel_extra_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 25
        $context["displayName"] = true;
        // line 26
        if ($this->getAttribute($this->getAttribute(($context["grid"] ?? null), "view_options", [], "any", false, true), "display_name", [], "any", true, true)) {
            // line 27
            echo "    ";
            $context["displayName"] = $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "view_options", []), "display_name", []);
        }
        // line 29
        echo "
<div class=\"card js-grid-panel\" id=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["grid"] ?? null), "id", []), "html", null, true);
        echo "_grid_panel\">
  ";
        // line 31
        $this->displayBlock('grid_panel_header', $context, $blocks);
        // line 47
        echo "
  ";
        // line 48
        $this->displayBlock('grid_panel_body', $context, $blocks);
        // line 55
        echo "
  ";
        // line 56
        $this->displayBlock('grid_panel_footer', $context, $blocks);
        // line 57
        echo "</div>

";
        // line 59
        $this->displayBlock('grid_panel_extra_content', $context, $blocks);
    }

    // line 31
    public function block_grid_panel_header($context, array $blocks = [])
    {
        // line 32
        echo "    ";
        if (( !(($context["displayName"] ?? null) === false) || (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "actions", []), "grid", [])) > 0))) {
            // line 33
            echo "    <div class=\"card-header js-grid-header\">
      ";
            // line 34
            if ( !(($context["displayName"] ?? null) === false)) {
                // line 35
                echo "        <h3 class=\"d-inline-block card-header-title\">
          ";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute(($context["grid"] ?? null), "name", []), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["grid"] ?? null), "data", []), "records_total", []), "html", null, true);
                echo ")
        </h3>
      ";
            }
            // line 39
            echo "      ";
            $this->displayBlock('grid_actions_block', $context, $blocks);
            // line 44
            echo "    </div>
    ";
        }
        // line 46
        echo "  ";
    }

    // line 39
    public function block_grid_actions_block($context, array $blocks = [])
    {
        // line 40
        echo "        <div class=\"d-inline-block float-right\">
          ";
        // line 41
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/Blocks/grid_actions.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
        </div>
      ";
    }

    // line 48
    public function block_grid_panel_body($context, array $blocks = [])
    {
        // line 49
        echo "    <div class=\"card-body\">
      ";
        // line 50
        $this->displayBlock('grid_view_block', $context, $blocks);
        // line 53
        echo "    </div>
  ";
    }

    // line 50
    public function block_grid_view_block($context, array $blocks = [])
    {
        // line 51
        echo "        ";
        echo twig_include($this->env, $context, "@PrestaShop/Admin/Common/Grid/grid.html.twig", ["grid" => ($context["grid"] ?? null)]);
        echo "
      ";
    }

    // line 56
    public function block_grid_panel_footer($context, array $blocks = [])
    {
    }

    // line 59
    public function block_grid_panel_extra_content($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Common/Grid:grid_panel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 59,  140 => 56,  133 => 51,  130 => 50,  125 => 53,  123 => 50,  120 => 49,  117 => 48,  110 => 41,  107 => 40,  104 => 39,  100 => 46,  96 => 44,  93 => 39,  85 => 36,  82 => 35,  80 => 34,  77 => 33,  74 => 32,  71 => 31,  67 => 59,  63 => 57,  61 => 56,  58 => 55,  56 => 48,  53 => 47,  51 => 31,  47 => 30,  44 => 29,  40 => 27,  38 => 26,  36 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "PrestaShopBundle:Admin/Common/Grid:grid_panel.html.twig", "/var/www/vhosts/dreamsat.online/matar/src/PrestaShopBundle/Resources/views/Admin/Common/Grid/grid_panel.html.twig");
    }
}
