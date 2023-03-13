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

/* @electra/includes/social-icons-empty.html.twig */
class __TwigTemplate_0fccd47fee1852c903188946958f112e extends \Twig\Template
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
        // line 1
        echo "<ul ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["social_attribute"] ?? null), "addClass", [0 => ($context["social_classes"] ?? null)], "method", false, false, true, 1), 1, $this->source), "html", null, true);
        echo " >
  <li>
    <a href=\"#\" class=\"facebook\" target=\"_blank\">
      <i class=\"fab fa-facebook\"></i>
    </a>
  </li>
  <li>
    <a href=\"#\" class=\"google\" target=\"_blank\">
      <i class=\"fab fa-google-plus-g\"></i>
    </a>
  </li>
  <li>
    <a href=\"#\" class=\"linkedin\" target=\"_blank\">
      <i class=\"fab fa-linkedin-in\"></i>
    </a>
  </li>
  <li>
    <a href=\"#\" class=\"twitter\" target=\"_blank\">
      <i class=\"fab fa-twitter\"></i>
    </a>
  </li>
  <li>
    <a href=\"#\" class=\"youtube\" target=\"_blank\">
      <i class=\"fab fa-youtube\"></i>
    </a>
  </li>
</ul>
";
    }

    public function getTemplateName()
    {
        return "@electra/includes/social-icons-empty.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@electra/includes/social-icons-empty.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\electra\\templates\\includes\\social-icons-empty.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
