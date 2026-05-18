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

/* emails/invitation.html.twig */
class __TwigTemplate_f0eb9606ccf03b129c7ca058c351f104 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/invitation.html.twig"));

        // line 2
        yield "<p>Bonjour,</p>

<p>Vous avez été invité à rejoindre ";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 4), "nom", [], "any", false, false, false, 4), "html", null, true);
        yield " sur notre plateforme.</p>
<p>Vous avez été invité à rejoindre ";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 5), "adresse", [], "any", false, false, false, 5), "html", null, true);
        yield " sur notre plateforme.</p>
<p>Vous avez été invité à rejoindre ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 6), "telephone", [], "any", false, false, false, 6), "html", null, true);
        yield " sur notre plateforme.</p>
<p>Vous avez été invité à rejoindre ";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 7), "courriel", [], "any", false, false, false, 7), "html", null, true);
        yield " sur notre plateforme.</p>

<p>Pour accepter cette invitation, cliquez sur le lien suivant :</p>

<p><a href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_invitation_accept", ["token" => CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "token", [], "any", false, false, false, 11)])), "html", null, true);
        yield "\">Accepter l'invitation</a></p>

<p>Ce lien expirera le ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "expiresAt", [], "any", false, false, false, 13), "d/m/Y"), "html", null, true);
        yield ".</p>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "emails/invitation.html.twig";
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
        return array (  73 => 13,  68 => 11,  61 => 7,  57 => 6,  53 => 5,  49 => 4,  45 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "emails/invitation.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\emails\\invitation.html.twig");
    }
}
