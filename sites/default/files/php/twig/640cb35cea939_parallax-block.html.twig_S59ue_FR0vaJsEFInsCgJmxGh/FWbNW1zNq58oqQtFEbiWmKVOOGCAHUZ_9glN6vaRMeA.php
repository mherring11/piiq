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

/* @electra/samples/parallax-block.html.twig */
class __TwigTemplate_4f62a55198ed4b7c0696602b6dfdb327 extends \Twig\Template
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
        echo "<div>
  <div id=\"block-sampleparallaxgradientblock\" class=\"parallax-block parallax-gradient-color\">
    <div class=\"parallax-inner d-flex d-height material\">
      <div class=\"inner-wrapper text-left\">
        <div class=\"container\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"parallax-content text-center\">
                <h2>
                                    <span>Sample</span>
                                    Parallax Block</h2>
                <h4>Two variations with Gradient / Image parallax types
                                </h4>

                ";
        // line 15
        if (($context["logged_in"] ?? null)) {
            // line 16
            echo "                <a href=\"/admin/structure/block/block-content\" class=\"btn btn-outline-light\"> Create new Parallax Block </a>
                ";
        } else {
            // line 18
            echo "                <a href=\"/user/login?destination=/admin/structure/block/block-content\" class=\"btn btn-outline-light\"> Login & Create new Parallax Block </a>
                ";
        }
        // line 20
        echo "
                <p class=\"font-italic mt-5 text-white\"> <small> Note: This is sample block for demo purpose. Disable this from theme settings </small> </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@electra/samples/parallax-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 20,  61 => 18,  57 => 16,  55 => 15,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@electra/samples/parallax-block.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\electra\\templates\\samples\\parallax-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 15);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                [],
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
