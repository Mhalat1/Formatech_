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

/* model_emails/releve_notes_unique.html.twig */
class __TwigTemplate_69572efb4d7cbe034293e16964550457 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "model_emails/releve_notes_unique.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Votre relevé de notes</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 25px; }
        .logo { max-height: 60px; }
        .content { padding: 15px 0; }
        .footer { margin-top: 30px; padding-top: 15px; border-top: 1px solid #eee; 
                 font-size: 0.9em; color: #777; text-align: center; }
        .btn {
            display: inline-block; padding: 10px 20px; margin: 15px 0;
            background-color: #0066cc; color: white !important;
            text-decoration: none; border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class=\"container\">
        <div class=\"header\">
            <h2>Votre relevé de notes</h2>
        </div>
        
        <div class=\"content\">
            <p>Bonjour ";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", false, false, false, 28), "html", null, true);
        yield ",</p>
            
            <p>Veuillez trouver ci-joint votre relevé de notes en date du ";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date_envoi"] ?? null), "d/m/Y"), "html", null, true);
        yield ".</p>
            
            <p>Ce document est également disponible dans votre espace personnel.</p>
            
            <p>Cordialement,<br>
            L'équipe pédagogique</p>
        </div>
        
        <div class=\"footer\">
            <div style=\"background: #fff3cd; padding: 10px; border: 1px solid #ffeaa7; margin: 20px 0;\">
                ⚠️ <strong>Email automatique - Ne pas répondre</strong><br>
                Pour toute question, contactez l'administration avec le formulaire de contact en page d'.
            </div>
            <p>© ";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Formatech - Tous droits réservés</p>
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
        return "model_emails/releve_notes_unique.html.twig";
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
        return array (  95 => 43,  79 => 30,  74 => 28,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "model_emails/releve_notes_unique.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\model_emails\\releve_notes_unique.html.twig");
    }
}
