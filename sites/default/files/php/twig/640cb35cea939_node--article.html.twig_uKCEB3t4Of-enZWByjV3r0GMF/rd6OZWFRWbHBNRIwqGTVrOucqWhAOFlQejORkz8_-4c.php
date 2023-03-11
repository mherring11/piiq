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

/* themes/contrib/showcase_lite/templates/node--article.html.twig */
class __TwigTemplate_f4ec26d1bbac1932f1d9f37534e2c9fd extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'meta_area' => [$this, 'block_meta_area'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 8
        return "node.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("node.html.twig", "themes/contrib/showcase_lite/templates/node--article.html.twig", 8);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_meta_area($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 10, $this->source), "html", null, true);
        echo "
  ";
        // line 11
        if ( !($context["page"] ?? null)) {
            // line 12
            echo "    <h2";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => "node__title"], "method", false, false, true, 12), 12, $this->source), "html", null, true);
            echo ">
      <a href=\"";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 13, $this->source), "html", null, true);
            echo "\" rel=\"bookmark\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 13, $this->source), "html", null, true);
            echo "</a>
    </h2>
  ";
        }
        // line 16
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 16, $this->source), "html", null, true);
        echo "
  ";
        // line 17
        if (($context["display_submitted"] ?? null)) {
            // line 18
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 18, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 20
        echo "  ";
        if (((($context["display_submitted"] ?? null) || twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "comment", [], "any", false, false, true, 20)) || ((($context["view_mode"] ?? null) == "full") && twig_get_attribute($this->env, $this->source, ($context["mt_setting"] ?? null), "reading_time", [], "any", false, false, true, 20)))) {
            // line 21
            echo "    <div class=\"node__meta\">
       <ul class=\"inline-list\">
          ";
            // line 23
            if ((($context["display_submitted"] ?? null) || (twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "comment", [], "any", false, false, true, 23) && (($context["comment_count"] ?? null) > 0)))) {
                // line 24
                echo "            <li class=\"inline-list__item\">
              ";
                // line 25
                if (($context["display_submitted"] ?? null)) {
                    // line 26
                    echo "                <span";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["author_attributes"] ?? null), "addClass", [0 => "node__submitted-info"], "method", false, false, true, 26), 26, $this->source), "html", null, true);
                    echo ">
                  <span class=\"node__submitted-date\">
                    ";
                    // line 28
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->env->getFilter('format_date')->getCallable()($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "createdtime", [], "any", false, false, true, 28), 28, $this->source), "custom", "F d, Y"), "html", null, true);
                    echo "
                  </span>
                  ";
                    // line 30
                    echo t("<span class=\"node__submitted-info-text\">By</span> @author_name", array("@author_name" => ($context["author_name"] ?? null), ));
                    // line 31
                    echo "                </span>
                ";
                    // line 32
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["metadata"] ?? null), 32, $this->source), "html", null, true);
                    echo "
              ";
                }
                // line 34
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "comment", [], "any", false, false, true, 34) && (($context["comment_count"] ?? null) > 0))) {
                    // line 35
                    echo "                <span class=\"comments-count__counter text--colored\">
                  ";
                    // line 36
                    echo \Drupal::translation()->formatPlural(abs(                    // line 38
($context["comment_count"] ?? null)), "1 comment", "@comment_count comments", array("@comment_count" =>                     // line 39
($context["comment_count"] ?? null), ));
                    // line 41
                    echo "                </span>
              ";
                }
                // line 43
                echo "            </li>
          ";
            }
            // line 45
            echo "        ";
            if (((($context["view_mode"] ?? null) == "full") && twig_get_attribute($this->env, $this->source, ($context["mt_setting"] ?? null), "reading_time", [], "any", false, false, true, 45))) {
                // line 46
                echo "          <li class=\"inline-list__item\">
            ";
                // line 47
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("showcase_lite/reading-time"), "html", null, true);
                echo "
            <span class=\"reading-time\">
              <span class=\"text--dark\">";
                // line 49
                echo t("Time to read", array());
                echo "</span>
              ";
                // line 50
                if ((($context["minutes"] ?? null) < 1)) {
                    // line 51
                    echo "                ";
                    echo t("less than 1 minute", array());
                    // line 52
                    echo "              ";
                } elseif ((($context["minutes"] ?? null) < 2)) {
                    // line 53
                    echo "                ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["minutes"] ?? null), 53, $this->source), "html", null, true);
                    echo " ";
                    echo t("minute", array());
                    // line 54
                    echo "              ";
                } else {
                    // line 55
                    echo "                ";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["minutes"] ?? null), 55, $this->source), "html", null, true);
                    echo " ";
                    echo t("minutes", array());
                    // line 56
                    echo "              ";
                }
                // line 57
                echo "            </span>
          </li>
        ";
            }
            // line 60
            echo "      </ul>
    </div>
  ";
        }
    }

    // line 64
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("showcase_lite/node-article"), "html", null, true);
        echo "
  <div class=\"node__main-content-section\">
    ";
        // line 67
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 67, $this->source), "comment"), "html", null, true);
        echo "
  </div>
  ";
        // line 69
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "comment", [], "any", false, false, true, 69), 69, $this->source), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/showcase_lite/templates/node--article.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 69,  200 => 67,  194 => 65,  190 => 64,  183 => 60,  178 => 57,  175 => 56,  170 => 55,  167 => 54,  162 => 53,  159 => 52,  156 => 51,  154 => 50,  150 => 49,  145 => 47,  142 => 46,  139 => 45,  135 => 43,  131 => 41,  129 => 39,  128 => 38,  127 => 36,  124 => 35,  121 => 34,  116 => 32,  113 => 31,  111 => 30,  106 => 28,  100 => 26,  98 => 25,  95 => 24,  93 => 23,  89 => 21,  86 => 20,  80 => 18,  78 => 17,  73 => 16,  65 => 13,  60 => 12,  58 => 11,  53 => 10,  49 => 9,  38 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/showcase_lite/templates/node--article.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\showcase_lite\\templates\\node--article.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 11, "trans" => 30);
        static $filters = array("escape" => 10, "format_date" => 28, "without" => 67);
        static $functions = array("attach_library" => 47);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                ['escape', 'format_date', 'without'],
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
