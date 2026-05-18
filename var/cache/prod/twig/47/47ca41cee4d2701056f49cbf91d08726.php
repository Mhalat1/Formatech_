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

/* Pages_principaux/page_sessionmodule.html.twig */
class __TwigTemplate_0ed14f7a53c8ca4cae811bb47b7f5cf6 extends Template
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
        yield "<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>Modules et Sessions</title>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/sessionmodule.css"), "html", null, true);
        yield "\">
\t\t<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons+Round\" rel=\"stylesheet\">
\t</head>

\t<body class=\"modern-layout\">

\t\t";
        // line 12
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "Pages_principaux/page_sessionmodule.html.twig", 12)->unwrap()->yield($context);
        // line 13
        yield "

\t\t<section class=\"form_creations\">
\t\t\t";
        // line 16
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 17
            yield "
\t\t\t\t
\t\t\t\t";
            // line 19
            $context["currentUser"] = CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 19);
            // line 20
            yield "\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["utilisateur"]) {
                // line 21
                yield "\t\t\t\t\t";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 21) == CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "id", [], "any", false, false, false, 21))) {
                    // line 22
                    yield "
\t\t\t\t\t\t<div class=\"subscription-message\">
\t\t\t\t\t\t\t<h1 class=\"section-title-pricipale\">
\t\t\t\t\t\t\t\tPartie Administration
\t\t\t\t\t\t\t</h1>

\t\t\t\t\t\t\t<p>Type d'abonnement: 
\t\t\t\t\t\t\t\t<span class=\"subscription-badge ";
                    // line 29
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "subscriptionType", [], "any", false, false, false, 29)), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t";
                    // line 30
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "subscriptionType", [], "any", true, true, false, 30) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "subscriptionType", [], "any", false, false, false, 30)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "subscriptionType", [], "any", false, false, false, 30), "html", null, true)) : ("Aucun"));
                    yield "
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t";
                    // line 33
                    if ((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "subscriptionType", [], "any", false, false, false, 33) == "premium")) {
                        // line 34
                        yield "\t\t\t\t\t\t\t\t<p>Institutions créées: ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "nombreInstitutions", [], "any", false, false, false, 34), "html", null, true);
                        yield "</p>
\t\t\t\t\t\t\t";
                    }
                    // line 36
                    yield "
\t\t\t\t\t\t\t</br>

\t\t\t\t\t\t\t";
                    // line 39
                    if ((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "subscriptionType", [], "any", false, false, false, 39) == "basique")) {
                        // line 40
                        yield "\t\t\t\t\t\t\t\t<p class=\"info-text\">Abonnement basique - Jusqu'à 1 000 utilisateurs</p>
\t\t\t\t\t\t\t";
                    }
                    // line 42
                    yield "\t\t\t\t\t\t\t";
                    if ((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "subscriptionType", [], "any", false, false, false, 42) == "premium")) {
                        // line 43
                        yield "\t\t\t\t\t\t\t\t<p class=\"info-text premium-text\">Abonnement premium - Jusqu'à 10 000 utilisateurs</p>
\t\t\t\t\t\t\t";
                    }
                    // line 45
                    yield "\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"table-container\">
\t\t\t\t\t\t\t<table class=\"table\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>Nom de l'institution</th>
\t\t\t\t\t\t\t\t\t\t<th>Nombre d'utilisateurs</th>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
                    // line 56
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(($context["stats"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["stat"]) {
                        // line 57
                        yield "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                        // line 58
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stat"], "institution_nom", [], "any", false, false, false, 58), "html", null, true);
                        yield "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                        // line 59
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["stat"], "user_count", [], "any", false, false, false, 59), "html", null, true);
                        yield "</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['stat'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 62
                    yield "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 66
                yield "\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['utilisateur'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            yield "\t\t\t";
        }
        // line 68
        yield "\t\t</section>


\t\t<div class=\"form_creations\">

\t\t";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", ["success"], "method", false, false, false, 73));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 74
            yield "\t\t\t<div class=\"alert alert-success\">
\t\t\t\t<i class=\"material-icons-round\">check_circle</i>
\t\t\t\t";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        yield "


\t\t\t";
        // line 82
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 83
            yield "
\t\t\t\t<section class=\"form-section\">

\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t<i class=\"material-icons-round\">group_add</i>
\t\t\t\t\t\tCréer une nouvelle Institution
\t\t\t\t\t</h2>

\t\t\t\t\t\t";
            // line 91
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "subscriptionType", [], "any", false, false, false, 91) == "basique")) {
                // line 92
                yield "\t\t\t\t\t\t\tPassez à un abonnement premium pour créer plusieurs Institutions
\t\t\t\t\t\t";
            } else {
                // line 94
                yield "\t\t\t\t\t\t";
                if ((($context["currentUser"] ?? null) && (CoreExtension::getAttribute($this->env, $this->source, ($context["currentUser"] ?? null), "nombreInstitutions", [], "any", false, false, false, 94) < 5))) {
                    // line 95
                    yield "

\t\t\t\t\t\t\t<div class=\"form-container\">
\t\t\t\t\t\t\t\t";
                    // line 98
                    yield                     $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formInstitution"] ?? null), 'form_start');
                    yield "
\t\t\t\t\t\t\t\t<div class=\"form-grid\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 101
                    yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formInstitution"] ?? null), "nom", [], "any", false, false, false, 101), 'row', ["attr" => ["class" => "form-input"]]);
                    // line 103
                    yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 106
                    yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formInstitution"] ?? null), "adresse", [], "any", false, false, false, 106), 'row', ["attr" => ["class" => "form-input"]]);
                    // line 108
                    yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 111
                    yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formInstitution"] ?? null), "telephone", [], "any", false, false, false, 111), 'row', ["attr" => ["class" => "form-input"]]);
                    // line 113
                    yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
                    // line 116
                    yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formInstitution"] ?? null), "courriel", [], "any", false, false, false, 116), 'row', ["attr" => ["class" => "form-input"]]);
                    // line 118
                    yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-submit\">
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"submit-btn\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">add_circle</i>
\t\t\t\t\t\t\t\t\t\t\tCréer Institution
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t";
                    // line 129
                    yield                     $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formInstitution"] ?? null), 'form_end');
                    yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                } else {
                    // line 132
                    yield "\t\t\t\t\t\t\t<div class=\"alert alert-warning\">
\t\t\t\t\t\t\t\tVous avez atteint la limite de 5 institutions. 
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                }
                // line 136
                yield "\t\t\t\t\t";
            }
            // line 137
            yield "\t\t\t\t\t</section>
\t\t\t\t
\t\t\t";
        }
        // line 140
        yield "

\t\t\t<!-- FORM CREATION SESSION -->

\t\t\t<!-- User Association Form (Admin/Teacher) -->

\t\t\t";
        // line 146
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 147
            yield "\t\t\t\t<section class=\"form-section\">
\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t<i class=\"material-icons-round\">group_add</i>
\t\t\t\t\t\tCréer une nouvelle session
\t\t\t\t\t</h2>
\t\t\t\t\t<div class=\"form-container\">
\t\t\t\t\t\t";
            // line 153
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formSession"] ?? null), 'form_start');
            yield "
\t\t\t\t\t\t<div class=\"form-grid\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 156
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formSession"] ?? null), "nom", [], "any", false, false, false, 156), 'row', ["attr" => ["class" => "form-input"]]);
            // line 158
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 161
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formSession"] ?? null), "type", [], "any", false, false, false, 161), 'row', ["attr" => ["class" => "form-input"]]);
            // line 163
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 166
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formSession"] ?? null), "date_debut", [], "any", false, false, false, 166), 'row', ["attr" => ["class" => "form-input"]]);
            // line 168
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 171
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formSession"] ?? null), "date_fin", [], "any", false, false, false, 171), 'row', ["attr" => ["class" => "form-input"]]);
            // line 173
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 176
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formSession"] ?? null), "description", [], "any", false, false, false, 176), 'row', ["attr" => ["class" => "form-input"]]);
            // line 178
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-submit\">
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"submit-btn\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">add_circle</i>
\t\t\t\t\t\t\t\t\tCréer Session
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t";
            // line 188
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formSession"] ?? null), 'form_end');
            yield "
\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t";
        }
        // line 192
        yield "


\t\t\t";
        // line 195
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 196
            yield "\t\t\t\t<section class=\"form-section\">
\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t<i class=\"material-icons-round\">group_add</i>
\t\t\t\t\t\tCréer un nouveau module
\t\t\t\t\t</h2>
\t\t\t\t\t<div class=\"form-container\">
\t\t\t\t\t\t";
            // line 202
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formModule"] ?? null), 'form_start');
            yield "
\t\t\t\t\t\t<div class=\"form-grid\">
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 205
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formModule"] ?? null), "nom", [], "any", false, false, false, 205), 'row', ["attr" => ["class" => "form-input"]]);
            // line 207
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 210
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formModule"] ?? null), "description", [], "any", false, false, false, 210), 'row', ["attr" => ["class" => "form-input"]]);
            // line 212
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 215
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formModule"] ?? null), "commentaire", [], "any", false, false, false, 215), 'row', ["attr" => ["class" => "form-input"]]);
            // line 217
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 220
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formModule"] ?? null), "date_debut", [], "any", false, false, false, 220), 'row', ["attr" => ["class" => "form-input"]]);
            // line 222
            yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t";
            // line 225
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formModule"] ?? null), "date_fin", [], "any", false, false, false, 225), 'row', ["attr" => ["class" => "form-input"]]);
            // line 227
            yield "
\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t<div class=\"form-submit\">
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"submit-btn\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">add_circle</i>
\t\t\t\t\t\t\t\t\tCréer Module
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t";
            // line 238
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formModule"] ?? null), 'form_end');
            yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>
\t\t\t\t";
        }
        // line 242
        yield "





\t\t\t\t<!-- Formulaire Horaires -->
\t\t\t\t";
        // line 249
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 250
            yield "\t\t\t\t\t<section class=\"form-section\">
\t\t\t\t\t\t<div class=\"section-header\">
\t\t\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">schedule</i>
\t\t\t\t\t\t\t\tDéfinir les horaires du module
\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t<p class=\"section-description\">
\t\t\t\t\t\t\t\tConfigurez les créneaux horaires pour vos sessions de formation
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t</div>

\t\t\t\t\t\t<div class=\"form-container\">
\t\t\t\t\t\t\t";
            // line 262
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formHoraire"] ?? null), 'form_start', ["attr" => ["class" => "horaire-form"]]);
            yield "
\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\tclass=\"form-grid\">
\t\t\t\t\t\t\t\t<!-- Champ Session Module -->
\t\t\t\t\t\t\t\t<div class=\"form-group-row\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
            // line 268
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formHoraire"] ?? null), "UtilisateurInstitutionSessionModule", [], "any", false, false, false, 268), 'row', ["label" => "Session de Module", "attr" => ["class" => "form-control session-module-select", "data-placeholder" => "Sélectionnez une session"], "help" => "Choisissez un module associé à une session de formation"]);
            // line 275
            yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<!-- Jour de la semaine -->
\t\t\t\t\t\t\t\t<div class=\"form-group-row\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
            // line 282
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formHoraire"] ?? null), "jour", [], "any", false, false, false, 282), 'row', ["attr" => ["class" => "form-control"]]);
            // line 284
            yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<!-- Date précise -->
\t\t\t\t\t\t\t\t<div class=\"form-group-row\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
            // line 291
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formHoraire"] ?? null), "datePrecise", [], "any", false, false, false, 291), 'row', ["attr" => ["class" => "form-control datepicker"]]);
            // line 293
            yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<!-- Heures -->
\t\t\t\t\t\t\t\t<div class=\"form-group-row time-inputs\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
            // line 300
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formHoraire"] ?? null), "heureDebut", [], "any", false, false, false, 300), 'row', ["attr" => ["class" => "form-control timepicker"]]);
            // line 302
            yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
            // line 305
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formHoraire"] ?? null), "heureFin", [], "any", false, false, false, 305), 'row', ["attr" => ["class" => "form-control timepicker"]]);
            // line 307
            yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"form-actions\">
\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">save</i>
\t\t\t\t\t\t\t\t\tEnregistrer les horaires
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t<button type=\"reset\" class=\"btn btn-secondary\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">refresh</i>
\t\t\t\t\t\t\t\t\tRéinitialiser
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            // line 322
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formHoraire"] ?? null), 'form_end');
            yield "
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>


\t\t\t\t\t<!-- User Association Form (Admin/Teacher) -->
\t\t\t\t\t";
            // line 328
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 329
                yield "\t\t\t\t\t\t<section class=\"form-section-association\">
\t\t\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">group_add</i>
\t\t\t\t\t\t\t\tAssocier un Module à un Utilisateur

\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t<div class=\"form-container-association\">
\t\t\t\t\t\t\t\t";
                // line 336
                yield                 $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formUtilisateurInstitutionSessionModule"] ?? null), 'form_start');
                yield "
\t\t\t\t\t\t\t\t<div class=\"form-grid-association\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
                // line 339
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formUtilisateurInstitutionSessionModule"] ?? null), "Utilisateur", [], "any", false, false, false, 339), 'row', ["attr" => ["class" => "form-input"]]);
                // line 341
                yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t";
                // line 344
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["formUtilisateurInstitutionSessionModule"] ?? null), "SessionModule", [], "any", false, false, false, 344), 'row', ["attr" => ["class" => "form-input"]]);
                // line 346
                yield "
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-submit\">
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"submit-btn\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">add_circle</i>
\t\t\t\t\t\t\t\t\t\t\tCréer association
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
                // line 355
                yield                 $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["formUtilisateurInstitutionSessionModule"] ?? null), 'form_end');
                yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>
\t\t\t\t\t";
            }
            // line 359
            yield "

\t\t\t\t\t<!-- Existing Associations Table -->
\t\t\t\t\t<section class=\"table-section\">
\t\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t\t<i class=\"material-icons-round\">list_alt</i>
\t\t\t\t\t\t\tModules suivie par Utilisateur
\t\t\t\t\t\t</h2>
\t\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t\t<table class=\"data-table\">
\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<th>Utilisateur</th>
\t\t\t\t\t\t\t\t\t\t<th>Session</th>
\t\t\t\t\t\t\t\t\t\t<th>Module</th>
\t\t\t\t\t\t\t\t\t\t";
            // line 374
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 375
                yield "\t\t\t\t\t\t\t\t\t\t\t<th>Rôles</th>
\t\t\t\t\t\t\t\t\t\t\t<th>Actions</th>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 378
            yield "\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t";
            // line 381
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 382
                yield "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 383
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 383), "nom", [], "any", false, false, false, 383), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 384
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 384), "prenom", [], "any", false, false, false, 384), "html", null, true);
                yield "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 385
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 385), "Session", [], "any", false, false, false, 385), "nom", [], "any", false, false, false, 385), "html", null, true);
                yield "</td>
\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 386
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 386), "Module", [], "any", false, false, false, 386), "nom", [], "any", false, false, false, 386), "html", null, true);
                yield "</td>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 387
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    // line 388
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 388), "roles", [], "any", false, false, false, 388), ", "), "html", null, true);
                    yield "</td>
\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"actions-cell\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 390
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("modifier_utilisateur_institution_session_module", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 390)]), "html", null, true);
                    yield "\" class=\"action-btn edit\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">edit</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<form method=\"POST\" action=\"";
                    // line 393
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_Session_Module");
                    yield "\" class=\"inline-form\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"deleteUtilisateurId\" value=\"";
                    // line 394
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 394), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"action-btn delete\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">delete</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 401
                yield "\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 403
                yield "\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"";
                // line 404
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    yield "5";
                } else {
                    yield "3";
                }
                yield "\" class=\"no-data\">
\t\t\t\t\t\t\t\t\t\t\t\tAucune association trouvée
\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 409
            yield "\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t</div>
\t\t\t\t\t</section>


\t\t\t\t\t<section class=\"management-section\">


\t\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t\t<i class=\"material-icons-round\">school</i>
\t\t\t\t\t\t\tCréation des Associations Institutions Sessions et modules
\t\t\t\t\t\t</h2>

\t\t\t\t\t\t<!-- Add New Session-Module Form -->
\t\t\t\t\t\t";
            // line 424
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 425
                yield "\t\t\t\t\t\t\t<div class=\"session-module-form-container\">
\t\t\t\t\t\t\t\t";
                // line 426
                yield                 $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start');
                yield "

\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t";
                // line 429
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "module", [], "any", false, false, false, 429), 'label', ["label" => "Module"]);
                yield "
\t\t\t\t\t\t\t\t\t";
                // line 430
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "module", [], "any", false, false, false, 430), 'widget');
                yield "
\t\t\t\t\t\t\t\t\t";
                // line 431
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "module", [], "any", false, false, false, 431), 'errors', ["attr" => ["class" => "module-errors"]]);
                // line 433
                yield "

\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t";
                // line 438
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "session", [], "any", false, false, false, 438), 'label', ["label" => "Session"]);
                yield "
\t\t\t\t\t\t\t\t\t";
                // line 439
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "session", [], "any", false, false, false, 439), 'widget');
                yield "
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t";
                // line 443
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "institution", [], "any", false, false, false, 443), 'label', ["label" => "Institution"]);
                yield "
\t\t\t\t\t\t\t\t\t";
                // line 444
                yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "institution", [], "any", false, false, false, 444), 'widget');
                yield "
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"submit-btn\">Enregistrer</button>

\t\t\t\t\t\t\t\t";
                // line 449
                yield                 $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
                yield "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
            }
            // line 452
            yield "
\t\t\t\t\t\t<!-- Session-Module Grid -->
\t\t\t\t\t\t<div class=\"grid-section\"></section>


\t\t\t\t\t\t<section class=\"management-section\">


\t\t\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">list_alt</i>
\t\t\t\t\t\t\t\tListe des Associations existents Institutions Sessions et modules
\t\t\t\t\t\t\t</h2>

\t\t\t\t\t\t\t<div class=\"grid-container\">
\t\t\t\t\t\t\t\t";
            // line 466
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["results"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 467
                yield "
\t\t\t\t\t\t\t\t\t<div class=\"grid-card\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"card-toggle-";
                // line 469
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleId", [], "any", false, false, false, 469), "html", null, true);
                yield "\" class=\"card-toggle\">
\t\t\t\t\t\t\t\t\t\t<label for=\"card-toggle-";
                // line 470
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleId", [], "any", false, false, false, 470), "html", null, true);
                yield "\" class=\"card-header\">
\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">link</i>
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 473
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleNom", [], "any", false, false, false, 473), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 475
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionNom", [], "any", false, false, false, 475), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 477
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionNom", [], "any", false, false, false, 477), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t";
                // line 479
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    // line 480
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-actions\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 481
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("modifier_session_module", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleId", [], "any", false, false, false, 481)]), "html", null, true);
                    yield "\" class=\"action-btn edit\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">edit</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<form action=\"";
                    // line 484
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_Session_Module");
                    yield "\" method=\"get\" class=\"inline-form\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"delete_id\" value=\"";
                    // line 485
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleId", [], "any", false, false, false, 485), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"action-btn delete\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">delete</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 492
                yield "\t\t\t\t\t\t\t\t\t\t\t<span class=\"expand-icon\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">expand_more</i>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"info-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">account_balance</i>
\t\t\t\t\t\t\t\t\t\t\t\t\tInstitution
\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Nom:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 505
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionNom", [], "any", false, false, false, 505), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Adresse:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 508
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionAdresse", [], "any", false, false, false, 508), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Contact:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 511
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionTelephone", [], "any", false, false, false, 511), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t|
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 513
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionCourriel", [], "any", false, false, false, 513), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"info-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">event</i>
\t\t\t\t\t\t\t\t\t\t\t\t\tSession
\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Période:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 523
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionDateDebut", [], "any", false, false, false, 523), "d/m/Y"), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t\t\t\t\tau
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 525
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionDateFin", [], "any", false, false, false, 525), "d/m/Y"), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Type:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 528
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionType", [], "any", false, false, false, 528), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Description:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 531
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionDescription", [], "any", false, false, false, 531), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"info-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">menu_book</i>
\t\t\t\t\t\t\t\t\t\t\t\t\tModule
\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Nom:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 541
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleNom", [], "any", false, false, false, 541), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Description:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 544
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleDescription", [], "any", false, false, false, 544), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Période:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 547
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleDateDebut", [], "any", false, false, false, 547), "d/m/Y"), "html", null, true);
                yield "
\t\t\t\t\t\t\t\t\t\t\t\t\tau
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 549
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleDateFin", [], "any", false, false, false, 549), "d/m/Y"), "html", null, true);
                yield "</p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"info-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">people</i>
\t\t\t\t\t\t\t\t\t\t\t\t\tParticipants
\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"participants-list\">
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 558
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 559
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((((CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleNom", [], "any", false, false, false, 559) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 559), "Module", [], "any", false, false, false, 559), "nom", [], "any", false, false, false, 559)) && (CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionNom", [], "any", false, false, false, 559) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 559), "Session", [], "any", false, false, false, 559), "nom", [], "any", false, false, false, 559))) && (CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionNom", [], "any", false, false, false, 559) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 559), "Institution", [], "any", false, false, false, 559), "nom", [], "any", false, false, false, 559)))) {
                        // line 560
                        yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"participant\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 561
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 561), "prenom", [], "any", false, false, false, 561), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                        // line 562
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 562), "nom", [], "any", false, false, false, 562), "html", null, true);
                        yield "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 565
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 566
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"no-data\">Aucun participant</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 568
                yield "\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['result'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 577
            yield "\t\t\t\t\t\t\t</section>


\t\t\t\t\t\t\t<section class=\"table-section\">
\t\t\t\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">list_alt</i>
\t\t\t\t\t\t\t\t\tListe des Institutions Sessions et modules existants
\t\t\t\t\t\t\t\t</h2>

\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\tclass=\"table-responsive\">
\t\t\t\t\t\t\t\t\t<!-- Tableau des Institutions -->
\t\t\t\t\t\t\t\t\t<div class=\"table-container\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"toggle-institutions\" class=\"table-toggle\">
\t\t\t\t\t\t\t\t\t\t<label for=\"toggle-institutions\" class=\"table-header\">
\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"table-subtitle\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">account_balance</i>
\t\t\t\t\t\t\t\t\t\t\t\tInstitutions
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"expand-icon\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">expand_more</i>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t<div class=\"table-body\">
\t\t\t\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>Nom de l'Institution</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 606
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 607
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th class=\"actions-header\">Actions</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 609
            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 612
            $context["hasInstitutionData"] = false;
            // line 613
            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["institutions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["institution"]) {
                // line 614
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["hasInstitutionData"] = true;
                // line 615
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 616
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "nom", [], "any", false, false, false, 616), "html", null, true);
                yield "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 617
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    // line 618
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"actions-cell\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 619
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("institution_modifier", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "id", [], "any", false, false, false, 619)]), "html", null, true);
                    yield "\" class=\"action-btn edit\" title=\"Modifier\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">edit</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<form method=\"POST\" action=\"";
                    // line 622
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_Session_Module");
                    yield "\" class=\"inline-form\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"delete_Institution_id\" value=\"";
                    // line 623
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "id", [], "any", false, false, false, 623), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"";
                    // line 624
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "id", [], "any", false, false, false, 624))), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"action-btn delete\" title=\"Supprimer\" onclick=\"return confirm(
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Êtes-vous sûr de vouloir supprimer cette institution ?\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            '⚠️ Attention ! Cette action est irréversible.\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Toutes les formations associées seront également supprimées.\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Les utilisateurs inscrits perdront leur accès.\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Cliquez sur OK pour confirmer.'
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                        )\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">delete</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 637
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['institution'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 639
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 640
            if ( !($context["hasInstitutionData"] ?? null)) {
                // line 641
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"";
                // line 642
                yield (((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) ? ("2") : ("1"));
                yield "\" class=\"no-data\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tAucune institution trouvée
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 647
            yield "\t\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Tableau des Sessions -->
\t\t\t\t\t\t\t\t\t<div class=\"table-container\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"toggle-sessions\" class=\"table-toggle\">
\t\t\t\t\t\t\t\t\t\t<label for=\"toggle-sessions\" class=\"table-header\">
\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"table-subtitle\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">event</i>
\t\t\t\t\t\t\t\t\t\t\t\tSessions
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"expand-icon\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">expand_more</i>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t<div class=\"table-body\">
\t\t\t\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>Nom de la Session</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 670
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 671
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th class=\"actions-header\">Actions</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 673
            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 676
            $context["hasSessionData"] = false;
            // line 677
            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["sessions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
                // line 678
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["hasSessionData"] = true;
                // line 679
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 680
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "nom", [], "any", false, false, false, 680), "html", null, true);
                yield "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 681
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    // line 682
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"actions-cell\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 683
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("session_modifier", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["session"], "id", [], "any", false, false, false, 683)]), "html", null, true);
                    yield "\" class=\"action-btn edit\" title=\"Modifier\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">edit</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<form method=\"POST\" action=\"";
                    // line 686
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_Session_Module");
                    yield "\" class=\"inline-form\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"delete_Session_id\" value=\"";
                    // line 687
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "id", [], "any", false, false, false, 687), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"";
                    // line 688
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["session"], "id", [], "any", false, false, false, 688))), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"action-btn delete\" title=\"Supprimer\" onclick=\"return confirm(
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Êtes-vous sûr de vouloir supprimer cette session ?\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            '⚠️ Attention ! Cette action est irréversible.\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Toutes les formations associées seront également supprimées.\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Les utilisateurs inscrits perdront leur accès.\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Cliquez sur OK pour confirmer.'
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                        )\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">delete</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 701
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['session'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 703
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 704
            if ( !($context["hasSessionData"] ?? null)) {
                // line 705
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"";
                // line 706
                yield (((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) ? ("2") : ("1"));
                yield "\" class=\"no-data\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tAucune session trouvée
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 711
            yield "\t\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<!-- Tableau des Modules -->
\t\t\t\t\t\t\t\t\t<div class=\"table-container\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"toggle-modules\" class=\"table-toggle\">
\t\t\t\t\t\t\t\t\t\t<label for=\"toggle-modules\" class=\"table-header\">
\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"table-subtitle\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">menu_book</i>
\t\t\t\t\t\t\t\t\t\t\t\tModules
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"expand-icon\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">expand_more</i>
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t<div class=\"table-body\">
\t\t\t\t\t\t\t\t\t\t\t<table>
\t\t\t\t\t\t\t\t\t\t\t\t<thead>
\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th>Nom du Module</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 734
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 735
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<th class=\"actions-header\">Actions</th>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 737
            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t</thead>
\t\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 740
            $context["hasModuleData"] = false;
            // line 741
            yield "\t\t\t\t\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["modules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 742
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                $context["hasModuleData"] = true;
                // line 743
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td>";
                // line 744
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "nom", [], "any", false, false, false, 744), "html", null, true);
                yield "</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 745
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    // line 746
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"actions-cell\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
                    // line 747
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("module_modifier", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 747)]), "html", null, true);
                    yield "\" class=\"action-btn edit\" title=\"Modifier\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">edit</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<form method=\"POST\" action=\"";
                    // line 750
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_Session_Module");
                    yield "\" class=\"inline-form\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"delete_Module_id\" value=\"";
                    // line 751
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 751), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"_token\" value=\"";
                    // line 752
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["module"], "id", [], "any", false, false, false, 752))), "html", null, true);
                    yield "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"action-btn delete\" title=\"Supprimer\" onclick=\"return confirm(
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Êtes-vous sûr de vouloir supprimer ce module ?\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            '⚠️ Attention ! Cette action est irréversible.\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Toutes les formations associées seront également supprimées.\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Les utilisateurs inscrits perdront leur accès.\\n\\n' +
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                            'Cliquez sur OK pour confirmer.'
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t                                                        )\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">delete</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 765
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['module'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 767
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 768
            if ( !($context["hasModuleData"] ?? null)) {
                // line 769
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td colspan=\"";
                // line 770
                yield (((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) ? ("2") : ("1"));
                yield "\" class=\"no-data\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tAucun module trouvé
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 775
            yield "\t\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</section>


\t\t\t\t\t\t";
        }
        // line 784
        yield "\t\t\t\t\t</div>


\t\t\t\t\t<!-- Main Content -->
\t\t\t\t\t<main class=\"content-container\">

\t\t\t\t\t\t<!-- Mes Modules (Nouvelle section ajoutée) -->

\t\t\t\t\t\t<!-- Mes Modules - Version détaillée -->
\t\t\t\t\t\t\t";
        // line 793
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 793)) {
            // line 794
            yield "\t\t\t\t\t\t\t\t<section class=\"my-modules-detailed-section\"> <h2 class=\"section-title\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">bookmarks</i>
\t\t\t\t\t\t\t\t\tMes Formations
\t\t\t\t\t\t\t\t</h2>

\t\t\t\t\t\t\t\t<div class=\"detailed-modules-container\">
\t\t\t\t\t\t\t\t\t";
            // line 800
            $context["hasModules"] = false;
            // line 801
            yield "\t\t\t\t\t\t\t\t\t";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 802
                yield "\t\t\t\t\t\t\t\t\t\t";
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 802), "id", [], "any", false, false, false, 802) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 802), "id", [], "any", false, false, false, 802))) {
                    // line 803
                    yield "\t\t\t\t\t\t\t\t\t\t\t";
                    $context["hasModules"] = true;
                    // line 804
                    yield "\t\t\t\t\t\t\t\t\t\t\t<div class=\"detailed-module-card\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"module-header\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"module-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">school</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 808
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 808), "Module", [], "any", false, false, false, 808), "nom", [], "any", false, false, false, 808), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t<div
\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"module-grid\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- Colonne Module -->
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"module-info-section\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"info-section-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">menu_book</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tDétails du Module
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Description :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 823
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 823), "Module", [], "any", false, false, false, 823), "description", [], "any", false, false, false, 823), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Période:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 826
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 826), "Module", [], "any", false, false, false, 826), "dateDebut", [], "any", false, false, false, 826), "d/m/Y"), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tau
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 828
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 828), "Module", [], "any", false, false, false, 828), "dateFin", [], "any", false, false, false, 828), "d/m/Y"), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- Colonne Session -->
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"session-info-section\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"info-section-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">event</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tDétails de la Session
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Nom :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 841
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 841), "Session", [], "any", false, false, false, 841), "nom", [], "any", false, false, false, 841), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Période :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tDu
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 845
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 845), "Session", [], "any", false, false, false, 845), "dateDebut", [], "any", false, false, false, 845), "d/m/Y"), "html", null, true);
                    yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tau
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 847
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 847), "Session", [], "any", false, false, false, 847), "dateFin", [], "any", false, false, false, 847), "d/m/Y"), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Type :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 850
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 850), "Session", [], "any", false, false, false, 850), "type", [], "any", false, false, false, 850), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Description :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 853
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 853), "Session", [], "any", false, false, false, 853), "description", [], "any", false, false, false, 853), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t\t\t<!-- Colonne Institution -->
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"institution-info-section\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"info-section-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">account_balance</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tCentre de Formation
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"info-content\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Nom :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 866
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 866), "Institution", [], "any", false, false, false, 866), "nom", [], "any", false, false, false, 866), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Adresse :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 869
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 869), "Institution", [], "any", false, false, false, 869), "adresse", [], "any", false, false, false, 869), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Téléphone :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 872
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 872), "Institution", [], "any", false, false, false, 872), "telephone", [], "any", false, false, false, 872), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Email :</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 875
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 875), "Institution", [], "any", false, false, false, 875), "courriel", [], "any", false, false, false, 875), "html", null, true);
                    yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>


\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
                }
                // line 883
                yield "\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 884
            yield "
\t\t\t\t\t\t\t\t\t";
            // line 885
            if ( !($context["hasModules"] ?? null)) {
                // line 886
                yield "\t\t\t\t\t\t\t\t\t\t<div class=\"no-modules-message\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">info_outline</i>
\t\t\t\t\t\t\t\t\t\t\t<p>Vous n'êtes actuellement inscrit à aucune formation.</p>
\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"browse-link\">Parcourir les formations disponibles</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            // line 892
            yield "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</section>
\t\t\t\t\t\t";
        }
        // line 895
        yield "

\t\t\t\t\t\t<section class=\"associations-section\">
\t\t\t\t\t\t\t<h2 class=\"associations-title\">
\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">link</i>
\t\t\t\t\t\t\t\tListe des Associations existantes Institutions Sessions et modules
\t\t\t\t\t\t\t</h2>

\t\t\t\t\t\t\t<div class=\"associations-grid\">
\t\t\t\t\t\t\t\t";
        // line 904
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["results"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 905
            yield "\t\t\t\t\t\t\t\t\t<div class=\"association-card\">
\t\t\t\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"association-toggle-";
            // line 906
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 906), "html", null, true);
            yield "\" class=\"association-toggle\">
\t\t\t\t\t\t\t\t\t\t<label for=\"association-toggle-";
            // line 907
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 907), "html", null, true);
            yield "\" class=\"association-header\">
\t\t\t\t\t\t\t\t\t\t\t<h3 class=\"association-title\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">link</i>
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 910
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleNom", [], "any", false, false, false, 910), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 912
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionNom", [], "any", false, false, false, 912), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t/
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 914
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionNom", [], "any", false, false, false, 914), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t\t\t</h3>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"association-expand-icon\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">expand_more</i>
\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t</label>

\t\t\t\t\t\t\t\t\t\t<div class=\"association-content\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"institution-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"block-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">account_balance</i>
\t\t\t\t\t\t\t\t\t\t\t\t\tInstitution
\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Nom:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 929
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionNom", [], "any", false, false, false, 929), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Adresse:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 932
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionAdresse", [], "any", false, false, false, 932), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Contact:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 935
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionTelephone", [], "any", false, false, false, 935), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t|
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 937
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionCourriel", [], "any", false, false, false, 937), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"session-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"block-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">event</i>
\t\t\t\t\t\t\t\t\t\t\t\t\tSession
\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Période:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 947
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionDateDebut", [], "any", false, false, false, 947), "d/m/Y"), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t\tau
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 949
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionDateFin", [], "any", false, false, false, 949), "d/m/Y"), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Type:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 952
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionType", [], "any", false, false, false, 952), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Description:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 955
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionDescription", [], "any", false, false, false, 955), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"module-block\">
\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"block-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">menu_book</i>
\t\t\t\t\t\t\t\t\t\t\t\t\tModule
\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Nom:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 965
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleNom", [], "any", false, false, false, 965), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Description:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 968
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleDescription", [], "any", false, false, false, 968), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t\t<p>
\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>Période:</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 971
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleDateDebut", [], "any", false, false, false, 971), "d/m/Y"), "html", null, true);
            yield "
\t\t\t\t\t\t\t\t\t\t\t\t\tau
\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 973
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleDateFin", [], "any", false, false, false, 973), "d/m/Y"), "html", null, true);
            yield "</p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t\t<div class=\"participants-block\">

\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 978
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 979
                yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t<h4 class=\"block-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons-round\">people</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\tParticipants
\t\t\t\t\t\t\t\t\t\t\t\t\t</h4>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"participants-container\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 985
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 986
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    if ((((CoreExtension::getAttribute($this->env, $this->source, $context["result"], "moduleNom", [], "any", false, false, false, 986) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 986), "Module", [], "any", false, false, false, 986), "nom", [], "any", false, false, false, 986)) && (CoreExtension::getAttribute($this->env, $this->source, $context["result"], "sessionNom", [], "any", false, false, false, 986) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 986), "Session", [], "any", false, false, false, 986), "nom", [], "any", false, false, false, 986))) && (CoreExtension::getAttribute($this->env, $this->source, $context["result"], "institutionNom", [], "any", false, false, false, 986) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 986), "Institution", [], "any", false, false, false, 986), "nom", [], "any", false, false, false, 986)))) {
                        // line 987
                        yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"participant-item\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 988
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 988), "prenom", [], "any", false, false, false, 988), "html", null, true);
                        yield "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<strong>";
                        // line 989
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 989), "nom", [], "any", false, false, false, 989), "html", null, true);
                        yield "</strong>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    // line 992
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 993
                    yield "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<p class=\"empty-participants\">Aucun participant</p>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 995
                yield "\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 998
            yield "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1002
        yield "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</section>


\t\t\t\t\t</main>


\t\t\t\t</body>
\t\t\t</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Pages_principaux/page_sessionmodule.html.twig";
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
        return array (  1732 => 1002,  1715 => 998,  1710 => 995,  1703 => 993,  1698 => 992,  1692 => 989,  1688 => 988,  1685 => 987,  1682 => 986,  1677 => 985,  1669 => 979,  1667 => 978,  1659 => 973,  1654 => 971,  1648 => 968,  1642 => 965,  1629 => 955,  1623 => 952,  1617 => 949,  1612 => 947,  1599 => 937,  1594 => 935,  1588 => 932,  1582 => 929,  1564 => 914,  1559 => 912,  1554 => 910,  1548 => 907,  1544 => 906,  1541 => 905,  1524 => 904,  1513 => 895,  1508 => 892,  1500 => 886,  1498 => 885,  1495 => 884,  1489 => 883,  1478 => 875,  1472 => 872,  1466 => 869,  1460 => 866,  1444 => 853,  1438 => 850,  1432 => 847,  1427 => 845,  1420 => 841,  1404 => 828,  1399 => 826,  1393 => 823,  1375 => 808,  1369 => 804,  1366 => 803,  1363 => 802,  1358 => 801,  1356 => 800,  1348 => 794,  1346 => 793,  1335 => 784,  1324 => 775,  1316 => 770,  1313 => 769,  1311 => 768,  1308 => 767,  1301 => 765,  1285 => 752,  1281 => 751,  1277 => 750,  1271 => 747,  1268 => 746,  1266 => 745,  1262 => 744,  1259 => 743,  1256 => 742,  1251 => 741,  1249 => 740,  1244 => 737,  1240 => 735,  1238 => 734,  1213 => 711,  1205 => 706,  1202 => 705,  1200 => 704,  1197 => 703,  1190 => 701,  1174 => 688,  1170 => 687,  1166 => 686,  1160 => 683,  1157 => 682,  1155 => 681,  1151 => 680,  1148 => 679,  1145 => 678,  1140 => 677,  1138 => 676,  1133 => 673,  1129 => 671,  1127 => 670,  1102 => 647,  1094 => 642,  1091 => 641,  1089 => 640,  1086 => 639,  1079 => 637,  1063 => 624,  1059 => 623,  1055 => 622,  1049 => 619,  1046 => 618,  1044 => 617,  1040 => 616,  1037 => 615,  1034 => 614,  1029 => 613,  1027 => 612,  1022 => 609,  1018 => 607,  1016 => 606,  985 => 577,  971 => 568,  964 => 566,  959 => 565,  953 => 562,  949 => 561,  946 => 560,  943 => 559,  938 => 558,  926 => 549,  921 => 547,  915 => 544,  909 => 541,  896 => 531,  890 => 528,  884 => 525,  879 => 523,  866 => 513,  861 => 511,  855 => 508,  849 => 505,  834 => 492,  824 => 485,  820 => 484,  814 => 481,  811 => 480,  809 => 479,  804 => 477,  799 => 475,  794 => 473,  788 => 470,  784 => 469,  780 => 467,  776 => 466,  760 => 452,  754 => 449,  746 => 444,  742 => 443,  735 => 439,  731 => 438,  724 => 433,  722 => 431,  718 => 430,  714 => 429,  708 => 426,  705 => 425,  703 => 424,  686 => 409,  671 => 404,  668 => 403,  662 => 401,  652 => 394,  648 => 393,  642 => 390,  636 => 388,  634 => 387,  630 => 386,  626 => 385,  622 => 384,  618 => 383,  615 => 382,  610 => 381,  605 => 378,  600 => 375,  598 => 374,  581 => 359,  574 => 355,  563 => 346,  561 => 344,  556 => 341,  554 => 339,  548 => 336,  539 => 329,  537 => 328,  528 => 322,  511 => 307,  509 => 305,  504 => 302,  502 => 300,  493 => 293,  491 => 291,  482 => 284,  480 => 282,  471 => 275,  469 => 268,  460 => 262,  446 => 250,  444 => 249,  435 => 242,  428 => 238,  415 => 227,  413 => 225,  408 => 222,  406 => 220,  401 => 217,  399 => 215,  394 => 212,  392 => 210,  387 => 207,  385 => 205,  379 => 202,  371 => 196,  369 => 195,  364 => 192,  357 => 188,  345 => 178,  343 => 176,  338 => 173,  336 => 171,  331 => 168,  329 => 166,  324 => 163,  322 => 161,  317 => 158,  315 => 156,  309 => 153,  301 => 147,  299 => 146,  291 => 140,  286 => 137,  283 => 136,  277 => 132,  271 => 129,  258 => 118,  256 => 116,  251 => 113,  249 => 111,  244 => 108,  242 => 106,  237 => 103,  235 => 101,  229 => 98,  224 => 95,  221 => 94,  217 => 92,  215 => 91,  205 => 83,  203 => 82,  198 => 79,  189 => 76,  185 => 74,  181 => 73,  174 => 68,  171 => 67,  165 => 66,  159 => 62,  150 => 59,  146 => 58,  143 => 57,  139 => 56,  126 => 45,  122 => 43,  119 => 42,  115 => 40,  113 => 39,  108 => 36,  102 => 34,  100 => 33,  94 => 30,  90 => 29,  81 => 22,  78 => 21,  73 => 20,  71 => 19,  67 => 17,  65 => 16,  60 => 13,  58 => 12,  49 => 6,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "Pages_principaux/page_sessionmodule.html.twig", "C:\\Users\\user\\Desktop\\Formatech\\templates\\Pages_principaux\\page_sessionmodule.html.twig");
    }
}
