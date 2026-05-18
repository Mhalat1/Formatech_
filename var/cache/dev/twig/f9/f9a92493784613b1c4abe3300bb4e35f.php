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

/* Pages_principaux/page_accueil.html.twig */
class __TwigTemplate_5beeeb21478d39262436c37d2b7302f0 extends Template
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
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Pages_principaux/page_accueil.html.twig"));

        // line 2
        yield "<head>
\t<meta charset=\"UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t<title>FORMATECH - Plateforme éducative</title>
\t<link rel=\"stylesheet\" href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/home.css"), "html", null, true);
        yield "\">
\t<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons+Round\" rel=\"stylesheet\">
\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css\"/>
\t<link rel=\"icon\" href=\"/favicon.ico\" type=\"image/x-icon\">
</head>
";
        // line 11
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 35
        yield "
";
        // line 36
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 12
        yield "\t<section class=\"hero-section\">
\t\t<div class=\"hero-overlay\"></div>
\t\t<div class=\"container\">
\t\t\t<header class=\"hero-header animate__animated animate__fadeIn\">
\t\t\t\t<h1 class=\"hero-title\">FORMATECH</h1>
\t\t\t\t<p class=\"hero-subtitle\">La plateforme intelligente pour la gestion des institutions éducatives</p>
\t\t\t\t<div class=\"hero-cta\">
\t\t\t\t\t";
        // line 19
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 19)) {
            // line 20
            yield "\t\t\t\t\t\t<a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("institution_index_ajouter");
            yield "\" class=\"btn btn-primary btn-lg me-3\">Vous êtes déjà connecté</a>
\t\t\t\t\t";
        } else {
            // line 22
            yield "\t\t\t\t\t\t<a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"btn btn-primary btn-lg me-3\">Connexion</a>
\t\t\t\t\t\t<a href=\"";
            // line 23
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
            yield "\" class=\"btn btn-outline-light btn-lg\">
\t\t\t\t\t\t\tInscription\t\t\t
\t\t\t\t\t\t</a>
\t\t\t\t\t";
        }
        // line 27
        yield "\t\t\t\t</div>


\t\t\t</header>
\t\t</div>
\t</section>

";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 36
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 37
        yield "

\t";
        // line 39
        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 39) && array_key_exists("trial_status", $context)) &&  !(null === ($context["trial_status"] ?? null)))) {
            // line 40
            yield "\t\t<div class=\"trial-notification\" onclick=\"this.style.display = 'none'\">
\t\t\t";
            // line 41
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["trial_status"] ?? null), "active", [], "any", false, false, false, 41)) {
                // line 42
                yield "\t\t\t\t<div class=\"alert alert-success fade show\" role=\"alert\">
\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t<i class=\"fas fa-gift me-3\"></i>


\t\t\t\t\t\t<div class=\"trial-status\">
\t\t\t\t\t\t\t";
                // line 49
                yield "\t\t\t\t\t\t\t";
                $context["now"] = $this->extensions['Twig\Extension\CoreExtension']->convertDate();
                // line 50
                yield "\t\t\t\t\t\t\t";
                $context["ends_at"] = CoreExtension::getAttribute($this->env, $this->source, ($context["trial_status"] ?? null), "ends_at", [], "any", false, false, false, 50);
                // line 51
                yield "\t\t\t\t\t\t\t";
                $context["difference"] = CoreExtension::getAttribute($this->env, $this->source, ($context["ends_at"] ?? null), "diff", [($context["now"] ?? null)], "method", false, false, false, 51);
                // line 52
                yield "\t\t\t\t\t\t\t";
                $context["days_remaining"] = CoreExtension::getAttribute($this->env, $this->source, ($context["difference"] ?? null), "days", [], "any", false, false, false, 52);
                // line 53
                yield "\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                // line 55
                yield "\t\t\t\t\t\t\t<strong>Période d'essai active</strong>
\t\t\t\t\t\t\t<p class=\"mb-0\">Valable jusqu'au ";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["ends_at"] ?? null), "d/m/Y"), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t";
                // line 59
                yield "\t\t\t\t\t\t\t<p class=\"mb-0\">
\t\t\t\t\t\t\t\t";
                // line 60
                if ((($context["days_remaining"] ?? null) > 0)) {
                    // line 61
                    yield "\t\t\t\t\t\t\t\t\t";
                    if ((($context["days_remaining"] ?? null) == 1)) {
                        // line 62
                        yield "\t\t\t\t\t\t\t\t\t\t<span class=\"badge bg-warning text-dark\">1 jour restant</span>
\t\t\t\t\t\t\t\t\t";
                    } else {
                        // line 64
                        yield "\t\t\t\t\t\t\t\t\t\t<span class=\"badge bg-warning text-dark\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["days_remaining"] ?? null), "html", null, true);
                        yield " jours restants</span>
\t\t\t\t\t\t\t\t\t";
                    }
                    // line 66
                    yield "\t\t\t\t\t\t\t\t";
                } elseif ((($context["days_remaining"] ?? null) == 0)) {
                    // line 67
                    yield "\t\t\t\t\t\t\t\t\t<span class=\"badge bg-danger\">Dernier jour</span>
\t\t\t\t\t\t\t\t";
                } else {
                    // line 69
                    yield "\t\t\t\t\t\t\t\t\t<span class=\"badge bg-secondary\">Période expirée</span>
\t\t\t\t\t\t\t\t";
                }
                // line 71
                yield "\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>


\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            } else {
                // line 78
                yield "\t\t\t\t<div class=\"alert alert-danger fade show\" role=\"alert\" style=\"border-left: 5px solid #dc3545;\">
\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t<i class=\"fas fa-exclamation-triangle me-3\"></i>
\t\t\t\t\t\t<div>
\t\t\t\t\t\t\t<strong>Période d'essai terminée</strong>
\t\t\t\t\t\t\t<p class=\"mb-0\">Votre accès sera limité sans abonnement</p>
\t\t\t\t\t\t\t<a href=\"";
                // line 84
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("payment_required");
                yield "\" class=\"btn btn-sm btn-outline-light mt-2\">
\t\t\t\t\t\t\t\t<i class=\"fas fa-credit-card me-1\"></i>
\t\t\t\t\t\t\t\tSouscrire un abonnement
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
            }
            // line 92
            yield "\t\t</div>

\t\t<style>
\t\t\t.trial-notification {
\t\t\t\tcursor: pointer;
\t\t\t\ttransition: opacity 0.3s ease;
\t\t\t}
\t\t\t.trial-notification:hover {
\t\t\t\topacity: 0.9;
\t\t\t}
\t\t\t.trial-notification .alert {
\t\t\t\tborder-radius: 8px;
\t\t\t\tbox-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
\t\t\t\tmargin-bottom: 0;
\t\t\t}
\t\t\t#trial-expired-alert {
\t\t\t\tbackground-color: #f8d7da;
\t\t\t\tcolor: #721c24;
\t\t\t}
\t\t\t#trial-expired-alert a.btn {
\t\t\t\ttransition: all 0.3s ease;
\t\t\t}
\t\t\t#trial-expired-alert a.btn:hover {
\t\t\t\tbackground-color: #dc3545;
\t\t\t\tcolor: white;
\t\t\t}
\t\t</style>
\t";
        }
        // line 120
        yield "

\t<div class=\"main-container\">
\t\t<section class=\"features-section py-5\">
\t\t\t<div class=\"container\">
\t\t\t\t<h2 class=\"section-title text-center mb-5\">Nos fonctionnalités principales</h2>
\t\t\t\t<div class=\"row g-4\">
\t\t\t\t\t<div class=\" col-md-3\">
\t\t\t\t\t\t<div class=\"feature-card\">
\t\t\t\t\t\t\t<div class=\"feature-icon bg-primary\">
\t\t\t\t\t\t\t\t<span class=\"material-icons-round\">school</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h3>Gestion des institutions</h3>
\t\t\t\t\t\t\t<p>Administrez facilement plusieurs institutions avec des outils complets de gestion.</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\" col-md-3\">
\t\t\t\t\t\t<div class=\"feature-card\">
\t\t\t\t\t\t\t<div class=\"feature-icon bg-success\">
\t\t\t\t\t\t\t\t<span class=\"material-icons-round\">event</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h3>Calendrier des sessions</h3>
\t\t\t\t\t\t\t<p>Planifiez et gérez les sessions de formation avec un calendrier interactif.</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\" col-md-3\">
\t\t\t\t\t\t<div class=\"feature-card\">
\t\t\t\t\t\t\t<div class=\"feature-icon bg-info\">
\t\t\t\t\t\t\t\t<span class=\"material-icons-round\">menu_book</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<h3>Modules pédagogiques</h3>
\t\t\t\t\t\t\t<p>Créez et organisez vos modules d'apprentissage avec des outils avancés.</p>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"institutions-section py-5 bg-light\">
\t\t\t<div class=\"container\">
\t\t\t\t<div class=\"d-flex justify-content-between align-items-center mb-5\">
\t\t\t\t\t<h2 class=\"section-title\">Nos institutions partenaires</h2>
\t\t\t\t</div>

\t\t\t\t<div class=\"institutions-grid\">
\t\t\t\t\t";
        // line 165
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["institutions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["institution"]) {
            // line 166
            yield "\t\t\t\t\t\t<div class=\"institution-item\">
\t\t\t\t\t\t\t<div class=\"institution-card\">
\t\t\t\t\t\t\t\t";
            // line 168
            $context["institution_images"] = ["img/institution/inst1.jpg", "img/institution/inst2.jpg", "img/institution/inst3.jpg"];
            // line 173
            yield "\t\t\t\t\t\t\t\t<div class=\"institution-image\">
\t\t\t\t\t\t\t\t\t<img src=\"";
            // line 174
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((($_v0 = ($context["institution_images"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[Twig\Extension\CoreExtension::random($this->env->getCharset(), (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["institution_images"] ?? null)) - 1))] ?? null) : null)), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "nom", [], "any", false, false, false, 174), "html", null, true);
            yield "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"institution-body\">
\t\t\t\t\t\t\t\t\t<h3 class=\"institution-name\">";
            // line 177
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "nom", [], "any", false, false, false, 177), "html", null, true);
            yield "</h3>
\t\t\t\t\t\t\t\t\t<p class=\"institution-location\">";
            // line 178
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "localisation", [], "any", true, true, false, 178) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "localisation", [], "any", false, false, false, 178)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "localisation", [], "any", false, false, false, 178), "html", null, true)) : ("Localisation non spécifiée"));
            yield "</p>
\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-sm btn-outline-primary\">Voir les sessions</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['institution'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 184
        yield "\t\t\t\t</div>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"sessions-section py-5\">
\t\t\t<div class=\"container\">
\t\t\t\t<h2 class=\"section-title text-center mb-5\">Prochaines sessions</h2>

\t\t\t\t<div class=\"row g-4\">
\t\t\t\t\t";
        // line 193
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["sessions"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
            // line 194
            yield "\t\t\t\t\t\t<div class=\" col-md-3\">
\t\t\t\t\t\t\t<div class=\"session-card\">
\t\t\t\t\t\t\t\t<div class=\"session-badge\">";
            // line 196
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "dateDebut", [], "any", false, false, false, 196), "d M"), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t-
\t\t\t\t\t\t\t\t\t";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "dateFin", [], "any", false, false, false, 198), "d M"), "html", null, true);
            yield "</div>
\t\t\t\t\t\t\t\t";
            // line 199
            $context["session_images"] = ["img/module/mod1.jpg", "img/module/mod2.jpg", "img/module/mod3.jpg"];
            // line 204
            yield "\t\t\t\t\t\t\t\t<div class=\"session-image\">
\t\t\t\t\t\t\t\t\t<img src=\"";
            // line 205
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((($_v1 = ($context["session_images"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess ? ($_v1[Twig\Extension\CoreExtension::random($this->env->getCharset(), (Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["session_images"] ?? null)) - 1))] ?? null) : null)), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "nom", [], "any", false, false, false, 205), "html", null, true);
            yield "\">
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"session-body\">
\t\t\t\t\t\t\t\t\t<h3 class=\"session-title\">";
            // line 208
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "nom", [], "any", false, false, false, 208), "html", null, true);
            yield "</h3>
\t\t\t\t\t\t\t\t\t<p class=\"session-institution\">";
            // line 209
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["session"], "institution", [], "any", false, true, false, 209), "nom", [], "any", true, true, false, 209) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["session"], "institution", [], "any", false, true, false, 209), "nom", [], "any", false, false, false, 209)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["session"], "institution", [], "any", false, true, false, 209), "nom", [], "any", false, false, false, 209), "html", null, true)) : ("Institution non spécifiée"));
            yield "</p>
\t\t\t\t\t\t\t\t\t<div class=\"session-meta\">
\t\t\t\t\t\t\t\t\t\t<span class=\"material-icons-round\">location_on</span>
\t\t\t\t\t\t\t\t\t\t<span>";
            // line 212
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["session"], "lieu", [], "any", true, true, false, 212) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["session"], "lieu", [], "any", false, false, false, 212)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "lieu", [], "any", false, false, false, 212), "html", null, true)) : ("En ligne"));
            yield "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-primary btn-sm mt-3\">S'inscrire</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['session'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 219
        yield "\t\t\t\t</div>
\t\t\t</div>
\t\t</section>

\t\t<section class=\"modules-section py-5 bg-light\">
\t\t\t<div class=\"container\">
\t\t\t\t<h2 class=\"section-title text-center mb-5\">Modules disponibles</h2>

\t\t\t\t<div class=\"row g-4\">
\t\t\t\t\t";
        // line 228
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 229
            yield "\t\t\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t\t\t<div class=\"module-card\">
\t\t\t\t\t\t\t\t<div class=\"module-icon\">
\t\t\t\t\t\t\t\t\t<span class=\"material-icons-round\">book</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<h3 class=\"module-title\">";
            // line 234
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "nom", [], "any", false, false, false, 234), "html", null, true);
            yield "</h3>
\t\t\t\t\t\t\t\t<p class=\"module-desc\">";
            // line 235
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["module"], "description", [], "any", true, true, false, 235)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "description", [], "any", false, false, false, 235), "Description non disponible")) : ("Description non disponible")), 0, 80), "html", null, true);
            yield "...</p>
\t\t\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-link btn-sm\">En savoir plus →</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 240
        yield "\t\t\t\t</div>
\t\t\t</div>
\t\t</section>

\t\t

\t\t<section class=\"subscription-section py-5 bg-primary text-white\">
\t\t\t<h2 class=\"section-title mb-3\">Prêt à gérer votre institution ?</h2>


\t\t<div class=\"offre-card mx-auto\">
\t\t\t";
        // line 251
        if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
            // line 252
            yield "
\t\t\t\t<a href=\"";
            // line 253
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("payment_required");
            yield "\" class=\"btn btn-premium\">
\t\t\t\t\tChoisissez une Offre
\t\t\t\t</a>
\t\t\t";
        }
        // line 257
        yield "\t\t</div>

\t\t\t<div class=\"bas-page\">

\t\t\t\t<div class=\"pricing-card mx-auto\">
\t\t\t\t\t<div class=\"pricing-header\">
\t\t\t\t\t\t<h3>Offre Basic</h3>
\t\t\t\t\t\t<div class=\"price\">9€<span>/mois</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<ul class=\"pricing-features\">
\t\t\t\t\t\t<li>Gestion simultané de plusieurs institutions</li>
\t\t\t\t\t\t<li>Nombre illimité d'utilisateurs</li>
\t\t\t\t\t\t<li>Support technique prioritaire</li>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>

\t\t\t\t\t<h2>Profitez d'un essaie gratuit de 3 mois pour toute nouvelle inscription</h2>




\t\t\t\t</div>




\t\t\t\t<div class=\"pricing-card mx-auto\">
\t\t\t\t\t<div class=\"pricing-header\">
\t\t\t\t\t\t<h3>Offre Premium</h3>
\t\t\t\t\t\t<div class=\"price\">19€<span>/mois</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<ul class=\"pricing-features\">
\t\t\t\t\t\t<li>Gestion simultané de plusieurs institutions</li>
\t\t\t\t\t\t<li>Nombre illimité d'utilisateurs</li>
\t\t\t\t\t\t<li>Support technique prioritaire</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>


\t\t\t\t
\t\t\t\t<!-- Formulaire moderne et user-friendly -->
<div class=\"form-container\">
    <h2>💬 Contactez-nous pour tout renseignement  </h2>
    
    ";
        // line 303
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', ["attr" => ["class" => "contact-form", "onsubmit" => "return confirm(\"Êtes-vous sûr de vouloir envoyer ce message ?\")"]]);
        // line 308
        yield "

    <!-- Informations personnelles -->
    <div class=\"form-section\">
        <div class=\"form-row\">
            <div class=\"form-group ";
        // line 313
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Prenom", [], "any", false, false, false, 313), 'errors')) ? ("has-error") : (""));
        yield "\">
                ";
        // line 314
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Prenom", [], "any", false, false, false, 314), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " ", "autocomplete" => "given-name"]]);
        // line 320
        yield "
                ";
        // line 321
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Prenom", [], "any", false, false, false, 321), 'label', ["label" => "Prénom"]);
        yield "
                ";
        // line 322
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Prenom", [], "any", false, false, false, 322), 'errors')) {
            // line 323
            yield "                    <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Prenom", [], "any", false, false, false, 323), 'errors');
            yield "</div>
                ";
        }
        // line 325
        yield "            </div>

            <div class=\"form-group ";
        // line 327
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Nom", [], "any", false, false, false, 327), 'errors')) ? ("has-error") : (""));
        yield "\">
                ";
        // line 328
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Nom", [], "any", false, false, false, 328), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " ", "autocomplete" => "family-name"]]);
        // line 334
        yield "
                ";
        // line 335
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Nom", [], "any", false, false, false, 335), 'label', ["label" => "Nom de famille"]);
        yield "
                ";
        // line 336
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Nom", [], "any", false, false, false, 336), 'errors')) {
            // line 337
            yield "                    <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Nom", [], "any", false, false, false, 337), 'errors');
            yield "</div>
                ";
        }
        // line 339
        yield "            </div>
        </div>

        <!-- Email (champ complet) -->
        <div class=\"form-group ";
        // line 343
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Email", [], "any", false, false, false, 343), 'errors')) ? ("has-error") : (""));
        yield "\">
            ";
        // line 344
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Email", [], "any", false, false, false, 344), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " ", "autocomplete" => "email"]]);
        // line 350
        yield "
            ";
        // line 351
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Email", [], "any", false, false, false, 351), 'label', ["label" => "📧 Adresse email"]);
        yield "
            ";
        // line 352
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Email", [], "any", false, false, false, 352), 'errors')) {
            // line 353
            yield "                <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Email", [], "any", false, false, false, 353), 'errors');
            yield "</div>
            ";
        }
        // line 355
        yield "        </div>
    </div>

    <!-- Informations de formation -->
    <div class=\"form-section\">
        <div class=\"form-row\">
            <div class=\"form-group ";
        // line 361
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomInstitution", [], "any", false, false, false, 361), 'errors')) ? ("has-error") : (""));
        yield "\">
                ";
        // line 362
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomInstitution", [], "any", false, false, false, 362), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        // line 367
        yield "
                ";
        // line 368
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomInstitution", [], "any", false, false, false, 368), 'label', ["label" => "🏛️ Institution *"]);
        yield "
                ";
        // line 369
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomInstitution", [], "any", false, false, false, 369), 'errors')) {
            // line 370
            yield "                    <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomInstitution", [], "any", false, false, false, 370), 'errors');
            yield "</div>
                ";
        }
        // line 372
        yield "            </div>

            <div class=\"form-group ";
        // line 374
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomSession", [], "any", false, false, false, 374), 'errors')) ? ("has-error") : (""));
        yield "\">
                ";
        // line 375
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomSession", [], "any", false, false, false, 375), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        // line 380
        yield "
                ";
        // line 381
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomSession", [], "any", false, false, false, 381), 'label', ["label" => "📚 Session de formation *"]);
        yield "
                ";
        // line 382
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomSession", [], "any", false, false, false, 382), 'errors')) {
            // line 383
            yield "                    <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomSession", [], "any", false, false, false, 383), 'errors');
            yield "</div>
                ";
        }
        // line 385
        yield "            </div>
        </div>

        <div class=\"form-row\">
            <div class=\"form-group ";
        // line 389
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomModule", [], "any", false, false, false, 389), 'errors')) ? ("has-error") : (""));
        yield "\">
                ";
        // line 390
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomModule", [], "any", false, false, false, 390), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        // line 395
        yield "
                ";
        // line 396
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomModule", [], "any", false, false, false, 396), 'label', ["label" => "📖 Module spécifique *"]);
        yield "
                ";
        // line 397
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomModule", [], "any", false, false, false, 397), 'errors')) {
            // line 398
            yield "                    <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "NomModule", [], "any", false, false, false, 398), 'errors');
            yield "</div>
                ";
        }
        // line 400
        yield "            </div>

            <div class=\"form-group ";
        // line 402
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Dates", [], "any", false, false, false, 402), 'errors')) ? ("has-error") : (""));
        yield "\">
                ";
        // line 403
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Dates", [], "any", false, false, false, 403), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        // line 408
        yield "
                ";
        // line 409
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Dates", [], "any", false, false, false, 409), 'label', ["label" => "📅 Dates souhaitées *"]);
        yield "
                ";
        // line 410
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Dates", [], "any", false, false, false, 410), 'errors')) {
            // line 411
            yield "                    <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Dates", [], "any", false, false, false, 411), 'errors');
            yield "</div>
                ";
        }
        // line 413
        yield "            </div>
        </div>

        <!-- Offre (champ complet) -->
        <div class=\"form-group ";
        // line 417
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Offre", [], "any", false, false, false, 417), 'errors')) ? ("has-error") : (""));
        yield "\">
            ";
        // line 418
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Offre", [], "any", false, false, false, 418), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " "]]);
        // line 423
        yield "
            ";
        // line 424
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Offre", [], "any", false, false, false, 424), 'label', ["label" => "💎 Type d'offre souhaitée"]);
        yield "
            ";
        // line 425
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Offre", [], "any", false, false, false, 425), 'errors')) {
            // line 426
            yield "                <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Offre", [], "any", false, false, false, 426), 'errors');
            yield "</div>
            ";
        }
        // line 428
        yield "        </div>
    </div>

    <!-- Message -->
    <div class=\"form-group ";
        // line 432
        yield (($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Message", [], "any", false, false, false, 432), 'errors')) ? ("has-error") : (""));
        yield "\">
        ";
        // line 433
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Message", [], "any", false, false, false, 433), 'widget', ["attr" => ["class" => "form-control", "placeholder" => " ", "rows" => 5]]);
        // line 439
        yield "
        ";
        // line 440
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Message", [], "any", false, false, false, 440), 'label', ["label" => "💬 Votre message"]);
        yield "
        ";
        // line 441
        if ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Message", [], "any", false, false, false, 441), 'errors')) {
            // line 442
            yield "            <div class=\"form-error\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "Message", [], "any", false, false, false, 442), 'errors');
            yield "</div>
        ";
        }
        // line 444
        yield "    </div>

    <!-- Actions -->
    <div class=\"form-actions\">
        <button type=\"submit\" name=\"action\" value=\"email\" class=\"btn btn-primary\">
            <span>✉️ Envoyer le message</span>
        </button>
    </div>

    <p>💡 Les champs marqués d'un * sont facultatifs</p>

    ";
        // line 455
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        yield "
</div>


\t\t\t</div>


\t\t</div>

\t</section>
</div>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Pages_principaux/page_accueil.html.twig";
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
        return array (  780 => 455,  767 => 444,  761 => 442,  759 => 441,  755 => 440,  752 => 439,  750 => 433,  746 => 432,  740 => 428,  734 => 426,  732 => 425,  728 => 424,  725 => 423,  723 => 418,  719 => 417,  713 => 413,  707 => 411,  705 => 410,  701 => 409,  698 => 408,  696 => 403,  692 => 402,  688 => 400,  682 => 398,  680 => 397,  676 => 396,  673 => 395,  671 => 390,  667 => 389,  661 => 385,  655 => 383,  653 => 382,  649 => 381,  646 => 380,  644 => 375,  640 => 374,  636 => 372,  630 => 370,  628 => 369,  624 => 368,  621 => 367,  619 => 362,  615 => 361,  607 => 355,  601 => 353,  599 => 352,  595 => 351,  592 => 350,  590 => 344,  586 => 343,  580 => 339,  574 => 337,  572 => 336,  568 => 335,  565 => 334,  563 => 328,  559 => 327,  555 => 325,  549 => 323,  547 => 322,  543 => 321,  540 => 320,  538 => 314,  534 => 313,  527 => 308,  525 => 303,  477 => 257,  470 => 253,  467 => 252,  465 => 251,  452 => 240,  441 => 235,  437 => 234,  430 => 229,  426 => 228,  415 => 219,  402 => 212,  396 => 209,  392 => 208,  384 => 205,  381 => 204,  379 => 199,  375 => 198,  370 => 196,  366 => 194,  362 => 193,  351 => 184,  339 => 178,  335 => 177,  327 => 174,  324 => 173,  322 => 168,  318 => 166,  314 => 165,  267 => 120,  237 => 92,  226 => 84,  218 => 78,  209 => 71,  205 => 69,  201 => 67,  198 => 66,  192 => 64,  188 => 62,  185 => 61,  183 => 60,  180 => 59,  175 => 56,  172 => 55,  169 => 53,  166 => 52,  163 => 51,  160 => 50,  157 => 49,  149 => 42,  147 => 41,  144 => 40,  142 => 39,  138 => 37,  128 => 36,  113 => 27,  106 => 23,  101 => 22,  95 => 20,  93 => 19,  84 => 12,  74 => 11,  66 => 36,  63 => 35,  61 => 11,  53 => 6,  47 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "Pages_principaux/page_accueil.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\Pages_principaux\\page_accueil.html.twig");
    }
}
