<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/contrib/electra/templates/system/page.html.twig */
class __TwigTemplate_da2e525b3cc96046f0c006e138946d7a extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'sidebar_right' => [$this, 'block_sidebar_right'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $context["page_header_attribute"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 2
        $context["node_has_image"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_image", [], "any", false, false, true, 2), "entity", [], "any", false, false, true, 2), "uri", [], "any", false, false, true, 2), "value", [], "any", false, false, true, 2);
        // line 3
        echo "
";
        // line 5
        $context["page_header_classes"] = [0 => "page-header-wrapper", 1 => ((twig_get_attribute($this->env, $this->source,         // line 7
($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 7)) ? (("type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 7), 7, $this->source)))) : ("empty")), 2 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 8
($context["node"] ?? null), "field_image", [], "any", false, false, true, 8), "entity", [], "any", false, false, true, 8), "uri", [], "any", false, false, true, 8), "value", [], "any", false, false, true, 8)) ? (("has-" . "image")) : ("no-image")), 3 => (((twig_get_attribute($this->env, $this->source,         // line 9
($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 9) == "box-size")) ? ("container") : (""))];
        // line 12
        echo "
";
        // line 14
        $context["page_header_styles"] = [0 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 15
($context["node"] ?? null), "field_image", [], "any", false, false, true, 15), "entity", [], "any", false, false, true, 15), "uri", [], "any", false, false, true, 15), "value", [], "any", false, false, true, 15)) ? ((("background-image: url(" . $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_image", [], "any", false, false, true, 15), "entity", [], "any", false, false, true, 15), "uri", [], "any", false, false, true, 15), "value", [], "any", false, false, true, 15), 15, $this->source))) . ");")) : (""))];
        // line 18
        echo "
";
        // line 19
        if ((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "header_position", [], "any", false, false, true, 19) == "header-left")) {
            // line 20
            echo "  <div class=\"main-content-wrapper\">
";
        }
        // line 22
        echo "  ";
        $this->loadTemplate("@electra/includes/header.html.twig", "themes/contrib/electra/templates/system/page.html.twig", 22)->display($context);
        // line 23
        echo "
  <!-- If header position is left then add wrapper div -->
  ";
        // line 25
        if ((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "header_position", [], "any", false, false, true, 25) == "header-left")) {
            // line 26
            echo "    <div class=\"content-right\">
  ";
        }
        // line 28
        echo "
    <!-- If sample blocks enable -->
    ";
        // line 30
        if (twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "display_sample_blocks", [], "any", false, false, true, 30)) {
            // line 31
            echo "      ";
            if (($context["is_front"] ?? null)) {
                // line 32
                echo "        ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_include($this->env, $context, "@electra/samples/parallax-block.html.twig", array(), true, true));
                echo "
      ";
            }
            // line 34
            echo "    ";
        }
        // line 35
        echo "    <!-- end sample blocks enable -->
  ";
        // line 36
        if (((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 36) == "full-size") || (twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 36) == "box-size"))) {
            // line 37
            echo "    <div
      ";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page_header_attribute"] ?? null), "addClass", [0 => ($context["page_header_classes"] ?? null)], "method", false, false, true, 38), 38, $this->source), "html", null, true);
            echo "
      ";
            // line 39
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page_header_attribute"] ?? null), "setAttribute", [0 => "style", 1 => ($context["page_header_styles"] ?? null)], "method", false, false, true, 39), 39, $this->source), "html", null, true);
            echo ">
    ";
        }
        // line 41
        echo "      ";
        if ( !($context["is_front"] ?? null)) {
            // line 42
            echo "        ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_header", [], "any", false, false, true, 42)) {
                // line 43
                echo "          ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_header", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
                echo "
        ";
            }
            // line 45
            echo "      ";
        }
        // line 46
        echo "    ";
        if (((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 46) == "full-size") || (twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 46) == "box-size"))) {
            // line 47
            echo "      </div>
    ";
        }
        // line 49
        echo "
    <!-- top Fluid section -->
    ";
        // line 51
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top_fluid", [], "any", false, false, true, 51)) {
            // line 52
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top_fluid", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 54
        echo "    <!-- end top fluid section -->

    ";
        // line 57
        $context["content_classes"] = [0 => ((twig_get_attribute($this->env, $this->source,         // line 58
($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 58)) ? ("col-md-9") : ("")), 1 => ((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 59
($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 59))) ? ("col-md-12") : (""))];
        // line 62
        echo "
    <section class=\"content-wrapper\">
      <div class=\"container\">
        <div class=\"row\">
          <div ";
        // line 66
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 66), 66, $this->source), "html", null, true);
        echo ">

            <!-- page top section -->
            ";
        // line 69
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top", [], "any", false, false, true, 69)) {
            // line 70
            echo "              ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_top", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
            echo "
            ";
        }
        // line 72
        echo "            <!-- page top section -->

    ";
        // line 74
        if ((($context["node_has_image"] ?? null) && ((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 74) == "full-size") || (twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 74) == "box-size")))) {
            // line 75
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 75), 75, $this->source), "field_image"), "html", null, true);
            echo "
    ";
        } else {
            // line 77
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 77), 77, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 79
        echo "
            <!-- page bottom section -->
            ";
        // line 81
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom", [], "any", false, false, true, 81)) {
            // line 82
            echo "              ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
            echo "
            ";
        }
        // line 84
        echo "            <!-- page bottom section -->

          </div>

          ";
        // line 88
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 88)) {
            // line 89
            echo "            <div class=\"col-md-3 sidebar\">
              ";
            // line 90
            $this->displayBlock('sidebar_right', $context, $blocks);
            // line 95
            echo "            </div>
          ";
        }
        // line 97
        echo "
        </div>
      </div>
    </section>

    <!-- bottom Fluid section -->
    ";
        // line 103
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_fluid", [], "any", false, false, true, 103)) {
            // line 104
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_bottom_fluid", [], "any", false, false, true, 104), 104, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 106
        echo "    <!-- bottom top fluid section -->

    ";
        // line 108
        $this->loadTemplate("@electra/includes/footer.html.twig", "themes/contrib/electra/templates/system/page.html.twig", 108)->display($context);
        // line 109
        echo "
  ";
        // line 110
        if (twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "header_position", [], "any", false, false, true, 110)) {
            // line 111
            echo "    </div>
  ";
        }
        // line 113
        echo "
";
        // line 114
        if ((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "header_position", [], "any", false, false, true, 114) == "header-left")) {
            // line 115
            echo "  </div>
";
        }
    }

    // line 90
    public function block_sidebar_right($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 91
        echo "                <aside role=\"complementary\">
                  ";
        // line 92
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_right", [], "any", false, false, true, 92), 92, $this->source), "html", null, true);
        echo "
                </aside>
              ";
    }

    public function getTemplateName()
    {
        return "themes/contrib/electra/templates/system/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 92,  270 => 91,  266 => 90,  260 => 115,  258 => 114,  255 => 113,  251 => 111,  249 => 110,  246 => 109,  244 => 108,  240 => 106,  234 => 104,  232 => 103,  224 => 97,  220 => 95,  218 => 90,  215 => 89,  213 => 88,  207 => 84,  201 => 82,  199 => 81,  195 => 79,  189 => 77,  183 => 75,  181 => 74,  177 => 72,  171 => 70,  169 => 69,  163 => 66,  157 => 62,  155 => 59,  154 => 58,  153 => 57,  149 => 54,  143 => 52,  141 => 51,  137 => 49,  133 => 47,  130 => 46,  127 => 45,  121 => 43,  118 => 42,  115 => 41,  110 => 39,  106 => 38,  103 => 37,  101 => 36,  98 => 35,  95 => 34,  89 => 32,  86 => 31,  84 => 30,  80 => 28,  76 => 26,  74 => 25,  70 => 23,  67 => 22,  63 => 20,  61 => 19,  58 => 18,  56 => 15,  55 => 14,  52 => 12,  50 => 9,  49 => 8,  48 => 7,  47 => 5,  44 => 3,  42 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/electra/templates/system/page.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\electra\\templates\\system\\page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 1, "if" => 19, "include" => 22, "block" => 90);
        static $filters = array("clean_class" => 7, "escape" => 38, "without" => 75);
        static $functions = array("create_attribute" => 1, "file_url" => 15, "include" => 32);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include', 'block'],
                ['clean_class', 'escape', 'without'],
                ['create_attribute', 'file_url', 'include']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
