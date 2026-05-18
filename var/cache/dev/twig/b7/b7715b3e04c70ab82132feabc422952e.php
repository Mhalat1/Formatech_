<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* model_emails/new_contact.html.twig */
class __TwigTemplate_b0577d2c46cb78226541d4fa4bdc7b1d extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "model_emails/new_contact.html.twig"));

        // line 1
        yield "<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Nouveau contact client</title>
    <style>
        /* ... (votre CSS existant) ... */
    </style>
</head>
<body>
    <div class=\"container\">
        <div class=\"header\">
            <h2>Nouvelle demande de contact</h2>
            <p>Reçue le ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y à H:i"), "html", null, true);
        yield "</p>
        </div>
        
        <div class=\"content\">
            <div class=\"detail\">
                <span class=\"label\">Client:</span> ";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Prenom", [], "any", false, false, false, 18), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Nom", [], "any", false, false, false, 18), "html", null, true);
        yield "
            </div>
            <div class=\"detail\">
                <span class=\"label\">Email:</span> <a href=\"mailto:";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Email", [], "any", false, false, false, 21), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Email", [], "any", false, false, false, 21), "html", null, true);
        yield "</a>
            </div>
            <div class=\"detail\">
                <span class=\"label\">Institution:</span> ";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "NomInstitution", [], "any", false, false, false, 24), "html", null, true);
        yield "
            </div>
            <div class=\"detail\">
                <span class=\"label\">Session:</span> ";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "NomSession", [], "any", false, false, false, 27), "html", null, true);
        yield "
            </div>
            <div class=\"detail\">
                <span class=\"label\">Module:</span> ";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "NomModule", [], "any", false, false, false, 30), "html", null, true);
        yield "
            </div>
            <div class=\"detail\">
                <span class=\"label\">Dates:</span> 
                ";
        // line 34
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Dates", [], "any", false, false, false, 34))) {
            // line 35
            yield "                    ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Dates", [], "any", false, false, false, 35), "d/m/Y"), "html", null, true);
            yield "
                ";
        } else {
            // line 37
            yield "                    Non spécifié
                ";
        }
        // line 39
        yield "            </div>
            <div class=\"detail\">
                <span class=\"label\">Offre choisie:</span> ";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Offre", [], "any", false, false, false, 41)), "html", null, true);
        yield "
            </div>
            ";
        // line 43
        if ( !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Message", [], "any", false, false, false, 43))) {
            // line 44
            yield "            <div class=\"detail\">
                <span class=\"label\">Message:</span>
                <div style=\"margin-top: 10px; padding: 10px; background-color: #f8f9fa; border-radius: 4px;\">
                    ";
            // line 47
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["form_data"] ?? null), "Message", [], "any", false, false, false, 47), "html", null, true));
            yield "
                </div>
            </div>
            ";
        }
        // line 51
        yield "        </div>
        
        <div class=\"footer\">
            <p>Cet email a été envoyé automatiquement depuis le formulaire de contact.</p>
        </div>
    </div>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "model_emails/new_contact.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  137 => 51,  130 => 47,  125 => 44,  123 => 43,  118 => 41,  114 => 39,  110 => 37,  104 => 35,  102 => 34,  95 => 30,  89 => 27,  83 => 24,  75 => 21,  67 => 18,  59 => 13,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "model_emails/new_contact.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\model_emails\\new_contact.html.twig");
    }
}
