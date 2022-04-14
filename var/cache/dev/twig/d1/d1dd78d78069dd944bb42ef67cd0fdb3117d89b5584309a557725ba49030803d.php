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

/* emails/welcome.html.twig */
class __TwigTemplate_ceed263d1fa4213e90621a5ebce3bd603da5a3d66f5f70432454577a5ce95c06 extends Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/welcome.html.twig"));

        // line 1
        echo "

<h3>Bienvenue sur Dipongo</h3>

Hello, ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 5, $this->source); })()), "html", null, true);
        echo " <br/>Tu t'es enregistrés avec succès.

<p>
    Il ne reste plus qu'une étape pour activer ton compte.<br/>
    Cliques sur ce lien <a href=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 9, $this->source); })()), "html", null, true);
        echo "\" >lien</a> ou copies ce lien <br/>
    ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["url"]) || array_key_exists("url", $context) ? $context["url"] : (function () { throw new RuntimeError('Variable "url" does not exist.', 10, $this->source); })()), "html", null, true);
        echo "  dans ton navigateur<br/>
     <br/>
    pour valider ton compte.
</p>
<img style=\"width: 140px;height: 55px\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["logo"]) || array_key_exists("logo", $context) ? $context["logo"] : (function () { throw new RuntimeError('Variable "logo" does not exist.', 14, $this->source); })()), "html", null, true);
        echo "\">
<p>
    Cordialement,<br/>

</p>
<h4 >

    © ";
        // line 21
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_date_converter($this->env, "now"), "Y"), "html", null, true);
        echo " Dipongo Tous droits réservés<br />
</h4>




";
        // line 28
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "emails/welcome.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 28,  74 => 21,  64 => 14,  57 => 10,  53 => 9,  46 => 5,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

<h3>Bienvenue sur Dipongo</h3>

Hello, {{name}} <br/>Tu t'es enregistrés avec succès.

<p>
    Il ne reste plus qu'une étape pour activer ton compte.<br/>
    Cliques sur ce lien <a href=\"{{ url }}\" >lien</a> ou copies ce lien <br/>
    {{ url }}  dans ton navigateur<br/>
     <br/>
    pour valider ton compte.
</p>
<img style=\"width: 140px;height: 55px\" src=\"{{ logo }}\">
<p>
    Cordialement,<br/>

</p>
<h4 >

    © {{ date('now')|date(\"Y\") }} Dipongo Tous droits réservés<br />
</h4>




{# Makes an absolute URL to the /images/logo.png file #}


", "emails/welcome.html.twig", "/var/www/html/api-dipongo/templates/emails/welcome.html.twig");
    }
}
