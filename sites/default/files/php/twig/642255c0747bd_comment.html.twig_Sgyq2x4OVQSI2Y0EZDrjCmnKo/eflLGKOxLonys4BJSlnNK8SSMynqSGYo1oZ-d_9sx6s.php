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

/* themes/showcaseplus/templates/comment.html.twig */
class __TwigTemplate_c0d1543d5c6d65cf9749ed82c65fb508 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'libraries' => [$this, 'block_libraries'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 67
        $this->displayBlock('libraries', $context, $blocks);
        // line 70
        if (($context["threaded"] ?? null)) {
            // line 71
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("classy/drupal.comment.threaded"), "html", null, true);
            echo "
";
        }
        // line 74
        $context["classes"] = [0 => "comment", 1 => "js-comment", 2 => (((        // line 77
($context["status"] ?? null) != "published")) ? (("comment--" . $this->sandbox->ensureToStringAllowed(($context["status"] ?? null), 77, $this->source))) : ("")), 3 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 78
($context["comment"] ?? null), "owner", [], "any", false, false, true, 78), "anonymous", [], "any", false, false, true, 78)) ? ("by-anonymous") : ("")), 4 => (((        // line 79
($context["author_id"] ?? null) && (($context["author_id"] ?? null) == twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getOwnerId", [], "method", false, false, true, 79)))) ? ((("by-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["commented_entity"] ?? null), "getEntityTypeId", [], "method", false, false, true, 79), 79, $this->source)) . "-author")) : ("")), 5 => "clearfix", 6 => "mt-style-custom-all"];
        // line 84
        echo "<article role=\"article\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 84), 84, $this->source), "role"), "html", null, true);
        echo ">
  ";
        // line 90
        echo "  <span class=\"hidden new-indicator\" data-comment-timestamp=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["new_indicator_timestamp"] ?? null), 90, $this->source), "html", null, true);
        echo "\"></span>

  ";
        // line 92
        if (($context["user_picture"] ?? null)) {
            // line 93
            echo "    <header>
      ";
            // line 94
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 94, $this->source), "html", null, true);
            echo "
    </header>
  ";
        }
        // line 97
        echo "
  <div class=\"comment__content-container\">
    ";
        // line 99
        if (($context["title"] ?? null)) {
            // line 100
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 100, $this->source), "html", null, true);
            echo "
      <h3";
            // line 101
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => "title"], "method", false, false, true, 101), 101, $this->source), "html", null, true);
            echo ">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 101, $this->source), "html", null, true);
            echo "</h3>
      ";
            // line 102
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 102, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 104
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "links", [], "any", false, false, true, 104)) {
            // line 105
            echo "      <nav class=\"comment__links\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "links", [], "any", false, false, true, 105), 105, $this->source), "html", null, true);
            echo "</nav>
    ";
        }
        // line 107
        echo "    <div class=\"comment__meta\">
      <span>";
        // line 108
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author"] ?? null), 108, $this->source), "html", null, true);
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["created"] ?? null), 108, $this->source), "html", null, true);
        echo "</span>
      ";
        // line 109
        if (($context["parent"] ?? null)) {
            // line 110
            echo "        <p class=\"visually-hidden\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["parent"] ?? null), 110, $this->source), "html", null, true);
            echo "</p>
      ";
        }
        // line 112
        echo "    </div>
    <div";
        // line 113
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => "comment__content"], "method", false, false, true, 113), 113, $this->source), "html", null, true);
        echo ">
      ";
        // line 114
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 114, $this->source), "links"), "html", null, true);
        echo "
    </div>
  </div>
</article>
";
    }

    // line 67
    public function block_libraries($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 68
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("showcaseplus/comment"), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/showcaseplus/templates/comment.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 68,  141 => 67,  132 => 114,  128 => 113,  125 => 112,  119 => 110,  117 => 109,  111 => 108,  108 => 107,  102 => 105,  99 => 104,  94 => 102,  88 => 101,  83 => 100,  81 => 99,  77 => 97,  71 => 94,  68 => 93,  66 => 92,  60 => 90,  55 => 84,  53 => 79,  52 => 78,  51 => 77,  50 => 74,  44 => 71,  42 => 70,  40 => 67,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/showcaseplus/templates/comment.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\showcaseplus\\templates\\comment.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 67, "if" => 70, "set" => 74);
        static $filters = array("escape" => 71, "without" => 84);
        static $functions = array("attach_library" => 71);

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if', 'set'],
                ['escape', 'without'],
                ['attach_library']
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
