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

/* themes/contrib/electra/templates/menu/menu.html.twig */
class __TwigTemplate_1a76533e22bb400e6c243b8d27b90886 extends \Twig\Template
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
        $macros["_self"] = $this->macros["_self"] = $this;
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        echo "
        ";
        // line 60
        echo "        ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["_self"], "macro_menu_links", [($context["items"] ?? null), ($context["attributes"] ?? null), 0, ((($context["classes"] ?? null)) ? (($context["classes"] ?? null)) : ([0 => "menu", 1 => ("menu--" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["menu_name"] ?? null), 60, $this->source))), 2 => "navbar-nav"]))], 60, $context, $this->getSourceContext()));
        echo "
";
    }

    // line 20
    public function macro_menu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, $__classes__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "classes" => $__classes__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 21
            echo "    ";
            if (($context["items"] ?? null)) {
                // line 22
                echo "        <ul";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => (((($context["menu_level"] ?? null) == 0)) ? (($context["classes"] ?? null)) : ("dropdown-menu dropdown-list"))], "method", false, false, true, 22), 22, $this->source), "html", null, true);
                echo ">
            ";
                // line 23
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 24
                    echo "                ";
                    // line 25
                    $context["item_classes"] = [0 => (((                    // line 26
($context["menu_level"] ?? null) == 0)) ? ("nav-item") : ("")), 1 => ((((twig_get_attribute($this->env, $this->source,                     // line 27
$context["item"], "is_expanded", [], "any", false, false, true, 27) && (($context["menu_level"] ?? null) > 0)) && twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 27))) ? ("dropdown dropdown-submenu") : ("")), 2 => ((((twig_get_attribute($this->env, $this->source,                     // line 28
$context["item"], "is_expanded", [], "any", false, false, true, 28) && (($context["menu_level"] ?? null) == 0)) && twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 28))) ? ("dropdown") : ("")), 3 => ((twig_get_attribute($this->env, $this->source,                     // line 29
$context["item"], "in_active_trail", [], "any", false, false, true, 29)) ? ("active") : (""))];
                    // line 32
                    echo "                ";
                    if ((((($context["menu_level"] ?? null) == 0) && twig_get_attribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 32)) && twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 32))) {
                        // line 33
                        echo "                    <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 33), "addClass", [0 => ($context["item_classes"] ?? null)], "method", false, false, true, 33), 33, $this->source), "html", null, true);
                        echo ">
                        <a href=\"";
                        // line 34
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
                        echo "\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
                        echo "
                        </a>
                        <span class=\"fa fa-caret-down\"></span>
                    ";
                    } elseif ((((                    // line 37
($context["menu_level"] ?? null) == 0) &&  !twig_get_attribute($this->env, $this->source, $context["item"], "is_expanded", [], "any", false, false, true, 37)) &&  !twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 37))) {
                        // line 38
                        echo "                        <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 38), "addClass", [0 => ($context["item_classes"] ?? null)], "method", false, false, true, 38), 38, $this->source), "html", null, true);
                        echo ">
                            <a href=\"";
                        // line 39
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
                        echo "\" class=\"nav-link\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
                        echo "
                            </a>
                        ";
                    } else {
                        // line 42
                        echo "                            <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 42), "addClass", [0 => ($context["item_classes"] ?? null)], "method", false, false, true, 42), 42, $this->source), "html", null, true);
                        echo ">
                            <a href=\"";
                        // line 43
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
                        echo "\" class=\"dropdown-item\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
                        echo "
                            </a>
                            ";
                    }
                    // line 46
                    echo "                            ";
                    if (twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 46)) {
                        // line 47
                        echo "                                ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["_self"], "macro_menu_links", [twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 47), twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "removeClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 47), (($context["menu_level"] ?? null) + 1), ($context["classes"] ?? null)], 47, $context, $this->getSourceContext()));
                        echo "
                            ";
                    }
                    // line 49
                    echo "                        </li>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 51
                echo "                </ul>
            ";
            }
            // line 53
            echo "        ";

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/electra/templates/menu/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 53,  146 => 51,  139 => 49,  133 => 47,  130 => 46,  122 => 43,  117 => 42,  109 => 39,  104 => 38,  102 => 37,  94 => 34,  89 => 33,  86 => 32,  84 => 29,  83 => 28,  82 => 27,  81 => 26,  80 => 25,  78 => 24,  74 => 23,  69 => 22,  66 => 21,  50 => 20,  43 => 60,  40 => 54,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/electra/templates/menu/menu.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\electra\\templates\\menu\\menu.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("macro" => 20, "if" => 21, "for" => 23, "set" => 25);
        static $filters = array("clean_class" => 60, "escape" => 22);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['macro', 'if', 'for', 'set', 'import'],
                ['clean_class', 'escape'],
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
