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

/* themes/contrib/electra/templates/node/node.html.twig */
class __TwigTemplate_9a7f5aa1ae128d967fbad6722be04a51 extends \Twig\Template
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
        echo "
<article";
        // line 78
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 78, $this->source), "html", null, true);
        echo ">

  ";
        // line 80
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 80, $this->source), "html", null, true);
        echo "
  ";
        // line 81
        if ( !($context["page"] ?? null)) {
            // line 82
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_attributes"] ?? null), 82, $this->source), "html", null, true);
            echo ">
      <a href=\"";
            // line 83
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 83, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 83, $this->source), "html", null, true);
            echo "</a>
    </h2>
  ";
        }
        // line 86
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 86, $this->source), "html", null, true);
        echo "

  ";
        // line 88
        if ((($context["display_submitted"] ?? null) &&  !($context["page"] ?? null))) {
            // line 89
            echo "    <footer class=\"article-author-info\">
      ";
            // line 90
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 90, $this->source), "html", null, true);
            echo "
      <div";
            // line 91
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_attributes"] ?? null), 91, $this->source), "html", null, true);
            echo ">
        ";
            // line 92
            echo t("by @author_name on @date", array("@author_name" => ($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ));
            // line 93
            echo "        ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 93, $this->source), "html", null, true);
            echo "
      </div>
    </footer>
  ";
        }
        // line 97
        echo "
  <div";
        // line 98
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null), 98, $this->source), "html", null, true);
        echo ">
     ";
        // line 99
        if ((($context["node_has_image"] ?? null) && ((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 99) == "full-size") || (twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "page_header_style", [], "any", false, false, true, 99) == "box-size")))) {
            // line 100
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 100, $this->source), "field_image"), "html", null, true);
            echo "
     ";
        } else {
            // line 102
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 102, $this->source), "html", null, true);
            echo "
     ";
        }
        // line 104
        echo "  </div>
</article>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/electra/templates/node/node.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 104,  115 => 102,  109 => 100,  107 => 99,  103 => 98,  100 => 97,  92 => 93,  90 => 92,  86 => 91,  82 => 90,  79 => 89,  77 => 88,  71 => 86,  63 => 83,  58 => 82,  56 => 81,  52 => 80,  47 => 78,  44 => 77,  42 => 76,  39 => 75,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/electra/templates/node/node.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\electra\\templates\\node\\node.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 76, "if" => 81, "trans" => 92);
        static $filters = array("escape" => 78, "without" => 100);
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
