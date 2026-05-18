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

/* model_emails/releve_notes_total.html.twig */
class __TwigTemplate_aaeec081d5df193af71b4a8762ffd72e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "model_emails/releve_notes_total.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Votre relevé de notes</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .header { background: #f8f9fa; padding: 20px; text-align: center; }
        .content { padding: 20px; }
        .warning { background: #fff3cd; padding: 10px; border: 1px solid #ffeaa7; margin: 20px 0; border-radius: 5px; }
        .footer { background: #f8f9fa; padding: 15px; text-align: center; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>📄 Relevé de Notes</h1>
    </div>
    
    <div class=\"content\">
        <p>Bonjour <strong>";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "nom", [], "any", false, false, false, 20), "html", null, true);
        yield " ";
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", true, true, false, 20) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", false, false, false, 20)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", false, false, false, 20), "html", null, true)) : (""));
        yield "</strong>,</p>
        
        <p>Veuillez trouver ci-joint votre relevé de notes.</p>
        
        <p>Ce document récapitule l'ensemble de vos résultats et évaluations.</p>
        
        <p><strong>Date de génération :</strong> ";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date_envoi"] ?? null), "d/m/Y à H:i"), "html", null, true);
        yield "</p>
        
        <div class=\"warning\">
            ⚠️ <strong>Email automatique - Ne pas répondre</strong><br>
            Pour toute question concernant vos notes, veuillez contacter directement l'administration.
        </div>
    </div>
    
    <div class=\"footer\">
        <p>Cordialement,<br><strong>L'équipe Formatech</strong></p>
        <p><em>Ce document est confidentiel et destiné uniquement à la personne concernée.</em></p>
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
        return "model_emails/releve_notes_total.html.twig";
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
        return array (  77 => 26,  66 => 20,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "model_emails/releve_notes_total.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\model_emails\\releve_notes_total.html.twig");
    }
}
