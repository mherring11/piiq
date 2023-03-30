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

/* page.html.twig */
class __TwigTemplate_ab83d59972d06a03db293019921f930e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'to_top' => [$this, 'block_to_top'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 83
        return "@baseplus/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@baseplus/page.html.twig", "page.html.twig", 83);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 84
    public function block_to_top($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 85
        echo "  ";
        if (($context["scroll_to_top_display"] ?? null)) {
            // line 86
            echo "  ";
            // line 87
            echo "  <div class=\"to-top-container\">
    <div class=\"to-top show to-top--static\"><i class=\"fas ";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["scroll_to_top_icon"] ?? null), 88, $this->source), "html", null, true);
            echo "\"></i></div>
  </div>
  ";
            // line 91
            echo "  ";
        }
    }

    public function getTemplateName()
    {
        return "page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 91,  60 => 88,  57 => 87,  55 => 86,  52 => 85,  48 => 84,  37 => 83,);
    }

    public function getSourceContext()
    {
        return new Source("", "page.html.twig", "themes/showcaseplus/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 85);
        static $filters = array("escape" => 88);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
