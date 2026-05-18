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

/* model_emails/releve_notes_session.html.twig */
class __TwigTemplate_95bd25cf0604aa7873b5fc2e59b67492 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "model_emails/releve_notes_session.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <title>Relevé de notes</title>
</head>
<body>
    <h2>Bonjour ";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "nom", [], "any", false, false, false, 8), "html", null, true);
        yield ",</h2>
    
    <p>Veuillez trouver ci-joint votre relevé de notes pour la session ";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["sessionId"] ?? null), "html", null, true);
        yield ".</p>
    
            <p>Cordialement,<br>
            L'équipe pédagogique</p>

    </br>
    
    <div style=\"background: #fff3cd; padding: 10px; border: 1px solid #ffeaa7; margin: 20px 0;\">
        ⚠️ <strong>Email automatique - Ne pas répondre</strong><br>
        Pour toute question, contactez l'administration avec le formulaire de contact en page d'.
        <p>© ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Formatech - Tous droits réservés</p>
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
        return "model_emails/releve_notes_session.html.twig";
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
        return array (  72 => 20,  59 => 10,  54 => 8,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "model_emails/releve_notes_session.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\model_emails\\releve_notes_session.html.twig");
    }
}
