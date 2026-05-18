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

/* haut_de_page/haut_de_page.html.twig */
class __TwigTemplate_f01b77b3eac46c23b1c27aafa8337fed extends Template
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
        // line 1
        yield "
    <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons+Round\" rel=\"stylesheet\">
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/dashboard.css"), "html", null, true);
        yield "\">

   




    <header class=\"dashboard-header\">
        <div class=\"header-content\">

            <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"nav-home-btn\">
            <i class=\"fas fa-home\"></i>
            </a>
            <div class=\"brand-section\">

                <h1 class=\"app-title\">FormaTech</h1>
                <div class=\"user-status\">
                    ";
        // line 21
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 21)) {
            // line 22
            yield "                    <span class=\"welcome-msg\">Connecté en tant que <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 22), "userIdentifier", [], "any", false, false, false, 22), "html", null, true);
            yield "</strong></span>
                    ";
        }
        // line 24
        yield "                </div>
            </div>
            
            <nav class=\"main-nav\">
                <a href=\"";
        // line 28
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"nav-button logout\">
                    <i class=\"material-icons-round\">logout</i>
                    Déconnexion
                </a>
            </nav>
        </div>
    </header>


    <!-- Navigation Cards -->
    <div class=\"nav-cards\">
        <a href=\"/infoinstitution\" class=\"nav-card\">
            <div class=\"card-icon\">
                <i class=\"material-icons-round\">business</i>
            </div>
            <h3>Utilisateur</h3>
            <p>Voir et gérer toutes les institutions</p>
        </a>
        
        <a href=\"/infosessionmodule\" class=\"nav-card\">
            <div class=\"card-icon\">
                <i class=\"material-icons-round\">event_note</i>
            </div>
            <h3>Modules</h3>
            <p>Gérer le calendrier et les formations</p>
        </a>
        
        <a href=\"/calendrier/";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 55), "id", [], "any", false, false, false, 55), "html", null, true);
        yield "\" class=\"nav-card\">
            <div class=\"card-icon\">
                <i class=\"material-icons-round\">event_note</i>
            </div>
            <h3>Emploi du temps</h3>
            <p>Gérer le calendrier et les formations</p>
        </a>
    </div>

    <!-- Notifications -->
    ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", ["success"], "method", false, false, false, 65));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 66
            yield "    <div class=\"alert success\">
        <i class=\"material-icons-round\">check_circle</i>
        <div class=\"alert-content\">";
            // line 68
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", ["error"], "method", false, false, false, 71));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 72
            yield "    <div class=\"alert error\">
        <i class=\"material-icons-round\">error</i>
        <div class=\"alert-content\">";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        yield "
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "haut_de_page/haut_de_page.html.twig";
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
        return array (  162 => 77,  153 => 74,  149 => 72,  144 => 71,  135 => 68,  131 => 66,  127 => 65,  114 => 55,  84 => 28,  78 => 24,  72 => 22,  70 => 21,  60 => 14,  47 => 4,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "haut_de_page/haut_de_page.html.twig", "C:\\Users\\user\\Desktop\\Formatech\\templates\\haut_de_page\\haut_de_page.html.twig");
    }
}
