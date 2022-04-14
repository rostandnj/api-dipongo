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

/* emails/test.html.twig */
class __TwigTemplate_4e7a6527e371d8e9c95c056f329eccbd7f593993656d8f248a956549368b2ebe extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/test.html.twig"));

        // line 2
        echo "<img style=\"text-align: center;\" src=\"";
        echo twig_escape_filter($this->env, (isset($context["logo"]) || array_key_exists("logo", $context) ? $context["logo"] : (function () { throw new RuntimeError('Variable "logo" does not exist.', 2, $this->source); })()), "html", null, true);
        echo "\">
<h3>Welcome to Digitrav</h3>

Hello ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 5, $this->source); })()), "html", null, true);
        echo "! You're successfully registered.

<p>
    There is only one step left to activate your account.<br/>
    Click this link for validation to take advantage of all digitrav services.
</p>
<h4 >

    2019 Digitrav Inc All rights reserved<br />
</h4>





";
        // line 21
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "emails/test.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 21,  47 => 5,  40 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{# templates/emails/registration.html.twig #}
<img style=\"text-align: center;\" src=\"{{ logo }}\">
<h3>Welcome to Digitrav</h3>

Hello {{ name }}! You're successfully registered.

<p>
    There is only one step left to activate your account.<br/>
    Click this link for validation to take advantage of all digitrav services.
</p>
<h4 >

    2019 Digitrav Inc All rights reserved<br />
</h4>





{# Makes an absolute URL to the /images/logo.png file #}


", "emails/test.html.twig", "/var/www/html/api-dipongo/templates/emails/test.html.twig");
    }
}
