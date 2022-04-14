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

/* emails/reset_password.html.twig */
class __TwigTemplate_0c9083846d8d8408705de1df93fae25d730d2d37ceeb80c6ec5c378caa2d5156 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/reset_password.html.twig"));

        // line 1
        echo "

<h3>Nouveau mot de passe généré!</h3>

Hello, ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 5, $this->source); })()), "html", null, true);
        echo "

<p>
    Vous avez récemment demandé un nouveau mot de passe,<br/>
    le nouveau mot de passe généré est : <span>";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["password"]) || array_key_exists("password", $context) ? $context["password"] : (function () { throw new RuntimeError('Variable "password" does not exist.', 9, $this->source); })()), "html", null, true);
        echo "</span> <br/>
    Si cette action n'a pas été demandée par vous, pas de souci, vous pouvez vous connecter à <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 10, $this->source); })()), "html", null, true);
        echo "\">dipongo.com</a> avec votre mot de passe actuel. <br/>
</p>
<img style=\"width: 140px;height: 55px\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["logo"]) || array_key_exists("logo", $context) ? $context["logo"] : (function () { throw new RuntimeError('Variable "logo" does not exist.', 12, $this->source); })()), "html", null, true);
        echo "\">
<p>
    Cordialement,<br/>
    L'équipe d'assistance
</p>
<h4 >

    © ";
        // line 19
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_converter($this->env, "now"), "Y"), "html", null, true);
        echo "<br />
</h4>





";
        // line 27
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "emails/reset_password.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 27,  72 => 19,  62 => 12,  57 => 10,  53 => 9,  46 => 5,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

<h3>Nouveau mot de passe généré!</h3>

Hello, {{ name }}

<p>
    Vous avez récemment demandé un nouveau mot de passe,<br/>
    le nouveau mot de passe généré est : <span>{{ password }}</span> <br/>
    Si cette action n'a pas été demandée par vous, pas de souci, vous pouvez vous connecter à <a href=\"{{ url }}\">dipongo.com</a> avec votre mot de passe actuel. <br/>
</p>
<img style=\"width: 140px;height: 55px\" src=\"{{ logo }}\">
<p>
    Cordialement,<br/>
    L'équipe d'assistance
</p>
<h4 >

    © {{ date('now')|date(\"Y\") }}<br />
</h4>





{# Makes an absolute URL to the /images/logo.png file #}


", "emails/reset_password.html.twig", "/var/www/html/api-dipongo/templates/emails/reset_password.html.twig");
    }
}
