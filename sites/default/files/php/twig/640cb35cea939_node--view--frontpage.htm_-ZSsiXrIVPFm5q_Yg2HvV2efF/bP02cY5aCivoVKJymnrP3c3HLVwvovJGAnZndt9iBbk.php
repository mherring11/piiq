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

/* themes/contrib/electra/templates/node/node--view--frontpage.html.twig */
class __TwigTemplate_a047eac7d8b194952c1ac825855dbdb3 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 75
        echo "
";
        // line 76
        $context["node_has_image"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_image", [], "any", false, false, true, 76), "entity", [], "any", false, false, true, 76), "uri", [], "any", false, false, true, 76), "value", [], "any", false, false, true, 76);
        // line 77
        echo "<article";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 77, $this->source), "html", null, true);
        echo ">
  <div class=\"article-inner-wrapper\">
    ";
        // line 79
        if (($context["node_has_image"] ?? null)) {
            // line 80
            echo "      <div class=\"article-media\">
        ";
            // line 81
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 84
        echo "    <div class=\"article-info\">
      ";
        // line 85
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 85, $this->source), "html", null, true);
        echo "
      ";
        // line 86
        if ( !($context["page"] ?? null)) {
            // line 87
            echo "        <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 87, $this->source), "html", null, true);
            echo ">
          <a href=\"";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 88, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 88, $this->source), "html", null, true);
            echo "</a>
        </h2>
      ";
        }
        // line 91
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 91, $this->source), "html", null, true);
        echo "
      ";
        // line 92
        if ((($context["display_submitted"] ?? null) &&  !($context["page"] ?? null))) {
            // line 93
            echo "        <footer class=\"article-author-info\">
          ";
            // line 94
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 94, $this->source), "html", null, true);
            echo "
          <div";
            // line 95
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_attributes"] ?? null), 95, $this->source), "html", null, true);
            echo ">
            ";
            // line 96
            echo t("by @author_name on @date", array("@author_name" => ($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
            // line 97
            echo "            ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 97, $this->source), "html", null, true);
            echo "
          </div>
        </footer>
      ";
        }
        // line 101
        echo "      <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null), 101, $this->source), "html", null, true);
        echo ">
        ";
        // line 102
        if (($context["node_has_image"] ?? null)) {
            // line 103
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 103, $this->source), "field_image"), "html", null, true);
            echo "
        ";
        } else {
            // line 105
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 105, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 107
        echo "      </div>
    </div>
  </div>
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/electra/templates/node/node--view--frontpage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 107,  124 => 105,  118 => 103,  116 => 102,  111 => 101,  103 => 97,  101 => 96,  97 => 95,  93 => 94,  90 => 93,  88 => 92,  83 => 91,  75 => 88,  70 => 87,  68 => 86,  64 => 85,  61 => 84,  55 => 81,  52 => 80,  50 => 79,  44 => 77,  42 => 76,  39 => 75,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/electra/templates/node/node--view--frontpage.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\electra\\templates\\node\\node--view--frontpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 76, "if" => 79, "trans" => 96);
        static $filters = array("escape" => 77, "without" => 103);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'trans'],
                ['escape', 'without'],
                []
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
