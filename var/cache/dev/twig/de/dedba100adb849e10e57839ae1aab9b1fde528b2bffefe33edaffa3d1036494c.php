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

/* emails/account_lock.html.twig */
class __TwigTemplate_fdecb9014bd03e9576f3cd5fd51f8c150df29ada684c91949f27c60e7a50ae72 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/account_lock.html.twig"));

        // line 1
        echo "

<h3>Account Locked!</h3>

Hello ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 5, $this->source); })()), "html", null, true);
        echo "!

<p>
    Your account has been locked<br/>
    to activate it again, please contact us or go to <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 9, $this->source); })()), "html", null, true);
        echo "\">Digitrav</a>. <br/>
</p>
<img style=\"text-align: center;\" src=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["logo"]) || array_key_exists("logo", $context) ? $context["logo"] : (function () { throw new RuntimeError('Variable "logo" does not exist.', 11, $this->source); })()), "html", null, true);
        echo "\">
<p>
    Sincerely,
    The Digitrav Support Team
</p>
<h4 >

    ";
        // line 18
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_converter($this->env, "now"), "Y"), "html", null, true);
        echo " Digitrav Inc All rights reserved<br />
</h4>




";
        // line 25
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "emails/account_lock.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  68 => 18,  58 => 11,  53 => 9,  46 => 5,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

<h3>Account Locked!</h3>

Hello {{ name }}!

<p>
    Your account has been locked<br/>
    to activate it again, please contact us or go to <a href=\"{{ url }}\">Digitrav</a>. <br/>
</p>
<img style=\"text-align: center;\" src=\"{{ logo }}\">
<p>
    Sincerely,
    The Digitrav Support Team
</p>
<h4 >

    {{ date('now')|date(\"Y\") }} Digitrav Inc All rights reserved<br />
</h4>




{# Makes an absolute URL to the /images/logo.png file #}


", "emails/account_lock.html.twig", "/var/www/html/api-dipongo/templates/emails/account_lock.html.twig");
    }
}
