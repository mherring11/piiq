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

/* @electra/includes/footer.html.twig */
class __TwigTemplate_fd69b5fabb3ba53f390fb8f661169d06 extends \Twig\Template
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
        echo "<!-- =============================== footer ===============================-->

";
        // line 3
        $context["social_attribute"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
        // line 5
        $context["social_classes"] = [0 => "social-icons", 1 => "brand-bg-icons", 2 => "icon-sm", 3 => ((twig_get_attribute($this->env, $this->source,         // line 9
($context["electra"] ?? null), "display_social_round_icons", [], "any", false, false, true, 9)) ? ("round-icons") : (""))];
        // line 12
        echo "
";
        // line 13
        if ((twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "header_position", [], "any", false, false, true, 13) == "header-left")) {
            // line 14
            echo "  <footer class=\"page-footer bg-light container\">
";
        } else {
            // line 16
            echo "  <footer class=\"page-footer bg-light\">
";
        }
        // line 18
        echo "
  ";
        // line 19
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 19)) {
            // line 20
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 22
        echo "
  ";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_middle", [], "any", false, false, true, 23)) {
            // line 24
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_middle", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "
  ";
        }
        // line 26
        echo "
  <div class=\"footer-bottom mt-3\">
    <div class=\"container\">
      <div class=\"row\">

        <!-- end of col-md-7 -->
        <div class=\"col-md-7 d-flex\">
          <div class=\"copyright\">
            <p>";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "copyright_text", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
        echo "
              ";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "theme_credits", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
        echo "</p>
          </div>
          <!-- end of copyright -->
        </div>
        <!-- end of col-md-7 -->
        <div class=\"col-md-5 d-flex justify-content-end\">

          ";
        // line 42
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["electra"] ?? null), "social_profiles", [], "any", false, false, true, 42)) > 0)) {
            // line 43
            echo "            ";
            $this->loadTemplate("@electra/includes/social-icons.html.twig", "@electra/includes/footer.html.twig", 43)->display($context);
            // line 44
            echo "          ";
        } else {
            // line 45
            echo "            ";
            $this->loadTemplate("@electra/includes/social-icons-empty.html.twig", "@electra/includes/footer.html.twig", 45)->display($context);
            // line 46
            echo "          ";
        }
        // line 47
        echo "
          <!-- end of social-icons -->
        </div>
        <!-- end of col-md-3 -->
      </div>
      <!-- end of row -->
    </div>
    <!-- end of container -->
  </div>
  <!-- end of footer Bottom -->
</footer>
<!-- end of page-footer -->
";
    }

    public function getTemplateName()
    {
        return "@electra/includes/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 47,  118 => 46,  115 => 45,  112 => 44,  109 => 43,  107 => 42,  97 => 35,  93 => 34,  83 => 26,  77 => 24,  75 => 23,  72 => 22,  66 => 20,  64 => 19,  61 => 18,  57 => 16,  53 => 14,  51 => 13,  48 => 12,  46 => 9,  45 => 5,  43 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@electra/includes/footer.html.twig", "C:\\xampp\\htdocs\\piiq\\themes\\contrib\\electra\\templates\\includes\\footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 3, "if" => 13, "include" => 43);
        static $filters = array("escape" => 20, "length" => 42);
        static $functions = array("create_attribute" => 3);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'include'],
                ['escape', 'length'],
                ['create_attribute']
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
