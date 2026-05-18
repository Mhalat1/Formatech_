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

/* Pages_principaux/page_utilisateur_info.html.twig */
class __TwigTemplate_96caec7f7b6fb940659aa5c53b4c35bf extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Pages_principaux/page_utilisateur_info.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t\t<title>Gestion des Associations | FormaTech</title>
\t\t<link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/utilisateurinformations.css"), "html", null, true);
        yield "\">
\t\t<link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap\" rel=\"stylesheet\">
\t\t<link
\t\thref=\"https://fonts.googleapis.com/icon?family=Material+Icons+Round\" rel=\"stylesheet\">
\t\t <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
\t\t<link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\" rel=\"stylesheet\">


\t</head>

\t<body class=\"modern-layout\">


\t\t";
        // line 20
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "Pages_principaux/page_utilisateur_info.html.twig", 20)->unwrap()->yield($context);
        // line 21
        yield "

            <section class=\"form_creations\">
            \t";
        // line 24
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 25
            yield "
                    <h1 class=\"section-title-pricipale\">
                        Partie Administration
                    </h1>
                ";
        }
        // line 30
        yield "            </section>


            <div class=\"form_creations\">
                ";
        // line 34
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 35
            yield "
                    <div class=\"container\">
                        <div class=\"header\">
                            <h1>
                                <i class=\"fas fa-file-pdf\"></i>
                                Gestionnaire Notes & Commentaires
                            </h1>
                        </div>

                        ";
            // line 44
            $context["userId"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 44), "get", ["id"], "method", false, false, false, 44);
            // line 45
            yield "                        <section class=\"data-section\">

                            ";
            // line 47
            if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
                // line 48
                yield "                                <div class=\"section-header\">
                                    <h3 class=\"subsection-title\">
                                        <i class=\"material-icons-round\">settings</i>
                                        Modifier commentaire générale de l'utilisateur</h3>
                                </div>
                                <div class=\"action-buttons\">
                                    <a href=\"";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("utilisateur_modifier", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "id", [], "any", false, false, false, 54)]), "html", null, true);
                yield "\" class=\"action-btn primary\">
                                        <i class=\"material-icons-round\">manage_accounts</i>
                                        Modifier le Commentaire générale
                                    </a>
                                </div>
                            ";
            }
            // line 60
            yield "
                            <div class=\"section-header\">
                                <h2 class=\"section-title\">
                                    <i class=\"material-icons-round\">link</i>
                                    Détails des notes
                                </h2>
                            </div>

                            <div class=\"table-container\">
                                <table class=\"modern-table\">
                                    <thead>
                                        <tr>
                                            <th>Institution</th>
                                            <th>Session</th>
                                            <th>Module</th>
                                            <th>Commentaire</th>
                                            <th>Note</th>
                                            ";
            // line 77
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                // line 78
                yield "                                                <th class=\"text-right\">Actions</th>
                                            ";
            }
            // line 80
            yield "                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
            // line 83
            $context["hasUserModules"] = false;
            // line 84
            yield "                                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 85
                yield "                                            ";
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 85), "id", [], "any", false, false, false, 85) == ($context["userId"] ?? null))) {
                    // line 86
                    yield "                                                ";
                    $context["hasUserModules"] = true;
                    // line 87
                    yield "                                                <tr>
                                                    <td>";
                    // line 88
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 88), "Institution", [], "any", false, false, false, 88), "nom", [], "any", false, false, false, 88), "html", null, true);
                    yield "</td>
                                                    <td>";
                    // line 89
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 89), "Session", [], "any", false, false, false, 89), "nom", [], "any", false, false, false, 89), "html", null, true);
                    yield "</td>
                                                    <td>";
                    // line 90
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 90), "Module", [], "any", false, false, false, 90), "nom", [], "any", false, false, false, 90), "html", null, true);
                    yield "</td>
                                                    <td class=\"comment-cell\">
                                                        ";
                    // line 92
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "CommentaireModule", [], "any", false, false, false, 92)) {
                        // line 93
                        yield "                                                            ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "CommentaireModule", [], "any", false, false, false, 93), "html", null, true);
                        yield "
                                                        ";
                    } else {
                        // line 95
                        yield "                                                            <span class=\"no-comment\">Aucun commentaire</span>
                                                        ";
                    }
                    // line 97
                    yield "                                                    </td>
                                                    <td class=\"note-cell\">
                                                        ";
                    // line 99
                    if ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 99))) {
                        // line 100
                        yield "                                                            ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 100), "html", null, true);
                        yield "/20
                                                        ";
                    } else {
                        // line 102
                        yield "                                                            <span class=\"no-note\">Non noté</span>
                                                        ";
                    }
                    // line 104
                    yield "                                                    </td>
                                                    ";
                    // line 105
                    if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                        // line 106
                        yield "                                                        <td class=\"actions\">
                                                            <a href=\"";
                        // line 107
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("module_commentaire", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 107)]), "html", null, true);
                        yield "\" class=\"icon-btn edit\" title=\"Modifier\">
                                                                <i class=\"material-icons-round\">edit</i>
                                                            </a>
                                                            <form method=\"POST\" action=\"";
                        // line 110
                        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_Session_Module");
                        yield "\" class=\"inline-form\">
                                                                <input type=\"hidden\" name=\"deleteUtilisateurId\" value=\"";
                        // line 111
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 111), "html", null, true);
                        yield "\">
                                                                <button type=\"submit\" class=\"icon-btn delete\" title=\"Supprimer\">
                                                                    <i class=\"material-icons-round\">delete</i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    ";
                    }
                    // line 118
                    yield "                                                </tr>
                                            ";
                }
                // line 120
                yield "                                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            yield "
                                        ";
            // line 122
            if ( !($context["hasUserModules"] ?? null)) {
                // line 123
                yield "                                            <tr>
                                                <td colspan=\"";
                // line 124
                if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                    yield "6";
                } else {
                    yield "5";
                }
                yield "\" class=\"no-data\">
                                                    <i class=\"material-icons-round\">info</i>
                                                    Vous n'êtes associé à aucun module actuellement
                                                </td>
                                            </tr>
                                        ";
            }
            // line 130
            yield "                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>

                    </br>

                    <div class=\"container\">

                    
                        <div class=\"header\">
                            <h1>
                                <i class=\"fas fa-file-pdf\"></i>
                                Gestionnaire PDF & MAILER
                            </h1>
                        </div>





                        <div class=\"body\">

                            <div class=\"form-section individual-section\">
                                <div class=\"section-title\">
                                    <i class=\"fas fa-user\"></i>
                                    Actions pour un utilisateur spécifique
                                </div>
                                <form action=\"";
            // line 159
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_export_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "id", [], "any", false, false, false, 159)]), "html", null, true);
            yield "\" method=\"post\" onsubmit=\"return confirm('Envoyer le PDF à l\\\\'utilisateur ?')\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 160
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("app_export_pdf"), "html", null, true);
            yield "\">
                                    
                                    <button type=\"submit\" name=\"action\" value=\"download\" class=\"btn btn-primary\">
                                        <i class=\"fas fa-download\"></i>
                                        Télécharger le PDF
                                    </button>
                                    
                                    <button type=\"submit\" name=\"action\" value=\"email\" class=\"btn btn-success\">
                                        <i class=\"fas fa-envelope\"></i>
                                        Envoyer le PDF par Email
                                    </button>
                                </form>
                            </div>

                            ";
            // line 174
            if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
                // line 175
                yield "
                                <!-- Section envoi groupé -->
                                <div class=\"form-section bulk-section\">
                                    <div class=\"section-title\">
                                        <i class=\"fas fa-users\"></i>
                                        Envoi groupé à tous les utilisateurs
                                    </div>
                                    <form action=\"";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("send_all_pdfs", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "id", [], "any", false, false, false, 182)]), "html", null, true);
                yield "\" method=\"post\" onsubmit=\"return confirm('Envoyer les PDFs à tous les utilisateurs ?')\">
                                        <input type=\"hidden\" name=\"_token\" value=\"";
                // line 183
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("send_all_pdfs"), "html", null, true);
                yield "\">


                                        <button type=\"submit\" name=\"action\" value=\"download\" class=\"btn btn-primary\">
                                            <i class=\"fas fa-download\"></i>
                                            Télécharger tout les PDF
                                        </button>

                                        <button type=\"submit\" class=\"btn btn-warning btn-lg mb-3\" name=\"action\" value=\"email\" >
                                            <i class=\"fas fa-envelope\"></i>
                                            Envoyer tout les PDF par Email
                                        </button>
                                    </form>
                                </div>
                            ";
            }
            // line 198
            yield "

                            <!-- Section par session -->
                            <div class=\"form-section session-section\">
                                <div class=\"section-title\">
                                    <i class=\"fas fa-calendar-alt\"></i>
                                    Envoi par session
                                </div>
                                <form action=\"";
            // line 206
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("send_session_pdfs", ["id" => CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "id", [], "any", false, false, false, 206)]), "html", null, true);
            yield "\" method=\"post\" onsubmit=\"return confirm('Envoyer les PDFs à tous les utilisateurs de la session sélectionnée ?')\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
            // line 207
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("send_session_pdfs"), "html", null, true);
            yield "\">

                                    <div class=\"form-group\">
                                        <label for=\"session\">Choisir une session :</label>
                                        <select class=\"form-control\" id=\"session\" name=\"session_id\" required>
                                            <option value=\"\">-- Sélectionnez une session --</option>
                                            ";
            // line 213
            if ((array_key_exists("session_liee", $context) &&  !Twig\Extension\CoreExtension::testEmpty(($context["session_liee"] ?? null)))) {
                // line 214
                yield "                                                ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["session_liee"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["session"]) {
                    // line 215
                    yield "                                                    <option value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "id", [], "any", false, false, false, 215), "html", null, true);
                    yield "\">
                                                        ";
                    // line 216
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "nom", [], "any", false, false, false, 216), "html", null, true);
                    yield "
                                                        ";
                    // line 217
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["session"], "dateDebut", [], "any", false, false, false, 217) && CoreExtension::getAttribute($this->env, $this->source, $context["session"], "dateFin", [], "any", false, false, false, 217))) {
                        // line 218
                        yield "                                                            (";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "dateDebut", [], "any", false, false, false, 218), "d/m/Y"), "html", null, true);
                        yield "
                                                            -
                                                            ";
                        // line 220
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["session"], "dateFin", [], "any", false, false, false, 220), "d/m/Y"), "html", null, true);
                        yield ")
                                                        ";
                    }
                    // line 222
                    yield "                                                    </option>
                                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['session'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 224
                yield "                                            ";
            } else {
                // line 225
                yield "                                                <option value=\"\" disabled>Aucune session disponible</option>
                                            ";
            }
            // line 227
            yield "                                        </select>
                                    </div>

                                    
                                    <button type=\"submit\" name=\"action\" value=\"download\" class=\"btn btn-primary\">
                                        <i class=\"fas fa-download\"></i>
                                        Télécharger les PDF de la session
                                    </button>

                                    <button type=\"submit\" class=\"btn btn-success mt-2\" name=\"action\" value=\"email\">
                                        <i class=\"fas fa-envelope\"></i>
                                        Envoyer les PDF de la session par Email
                                    </button>
                                </form>
                            </div>
                        </div>


                        <!-- Affichage des messages flash -->
                        ";
            // line 246
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", [], "any", false, false, false, 246));
            foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
                // line 247
                yield "                            ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 248
                    yield "                                <div class=\"alert alert-";
                    yield ((($context["type"] == "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["type"], "html", null, true)));
                    yield " alert-dismissible fade show mt-3\" role=\"alert\">
                                    ";
                    // line 249
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                    yield "
                                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                </div>
                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 253
                yield "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['type'], $context['messages'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 254
            yield "                    </div>
                ";
        }
        // line 256
        yield "            </div>

\t\t";
        // line 258
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ETUDIANT") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 259
            yield "\t\t\t<section class=\"profile-section\">
\t\t\t\t<div class=\"section-header\">
\t\t\t\t\t<h2 class=\"section-title\">
\t\t\t\t\t\t<i class=\"material-icons-round\">person</i>
\t\t\t\t\t\tUtilisateur
\t\t\t\t\t</h2>
\t\t\t\t</div>
\t\t\t\t<div class=\"profile-grid\">
\t\t\t\t\t<div class=\"profile-card\">
\t\t\t\t\t\t<div class=\"profile-detail\">
\t\t\t\t\t\t\t<span class=\"detail-label\">Nom</span>
\t\t\t\t\t\t\t<span class=\"detail-value\">";
            // line 270
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "nom", [], "any", false, false, false, 270), "html", null, true);
            yield "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"profile-detail\">
\t\t\t\t\t\t\t<span class=\"detail-label\">Prénom</span>
\t\t\t\t\t\t\t<span class=\"detail-value\">";
            // line 274
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", false, false, false, 274), "html", null, true);
            yield "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"profile-detail\">
\t\t\t\t\t\t\t<span class=\"detail-label\">Email</span>
\t\t\t\t\t\t\t<span class=\"detail-value\">";
            // line 278
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "courriel", [], "any", false, false, false, 278), "html", null, true);
            yield "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</section>
\t\t";
        }
        // line 284
        yield "\t</body>
</html></div>";
        // line 285
        $context["userId"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 285), "get", ["id"], "method", false, false, false, 285);
        yield "<section class=\"profile-section\">


<div class=\"section-header\">
\t<h2 class=\"section-title\">
\t\t<i class=\"material-icons-round\">link</i>
\t\tDétails des notes
\t</h2>
</div>

<div class=\"table-container\">
\t<table class=\"modern-table\">
\t\t<thead>
\t\t\t<tr>
\t\t\t\t<th>Institution</th>
\t\t\t\t<th>Session</th>
\t\t\t\t<th>Module</th>
\t\t\t\t<th>Commentaire</th>
\t\t\t\t<th>Note</th>

\t\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t\t";
        // line 308
        $context["hasUserModules"] = false;
        // line 309
        yield "\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 310
            yield "\t\t\t\t";
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 310), "id", [], "any", false, false, false, 310) == ($context["userId"] ?? null))) {
                // line 311
                yield "\t\t\t\t\t";
                $context["hasUserModules"] = true;
                // line 312
                yield "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
                // line 313
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 313), "Institution", [], "any", false, false, false, 313), "nom", [], "any", false, false, false, 313), "html", null, true);
                yield "</td>
\t\t\t\t\t\t<td>";
                // line 314
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 314), "Session", [], "any", false, false, false, 314), "nom", [], "any", false, false, false, 314), "html", null, true);
                yield "</td>
\t\t\t\t\t\t<td>";
                // line 315
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 315), "Module", [], "any", false, false, false, 315), "nom", [], "any", false, false, false, 315), "html", null, true);
                yield "</td>
\t\t\t\t\t\t<td class=\"comment-cell\">
\t\t\t\t\t\t\t";
                // line 317
                if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "CommentaireModule", [], "any", false, false, false, 317)) {
                    // line 318
                    yield "\t\t\t\t\t\t\t\t";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "CommentaireModule", [], "any", false, false, false, 318), "html", null, true);
                    yield "
\t\t\t\t\t\t\t";
                } else {
                    // line 320
                    yield "\t\t\t\t\t\t\t\t<span class=\"no-comment\">Aucun commentaire</span>
\t\t\t\t\t\t\t";
                }
                // line 322
                yield "\t\t\t\t\t\t</td>
\t\t\t\t\t\t<td class=\"note-cell\">
\t\t\t\t\t\t\t";
                // line 324
                if ( !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 324))) {
                    // line 325
                    yield "\t\t\t\t\t\t\t\t";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 325), "html", null, true);
                    yield "/20
\t\t\t\t\t\t\t";
                } else {
                    // line 327
                    yield "\t\t\t\t\t\t\t\t<span class=\"no-note\">Non noté</span>
\t\t\t\t\t\t\t";
                }
                // line 329
                yield "\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t";
            }
            // line 332
            yield "\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 333
        yield "
\t\t\t";
        // line 334
        if ( !($context["hasUserModules"] ?? null)) {
            // line 335
            yield "\t\t\t\t<tr>
\t\t\t\t\t<td colspan=\"";
            // line 336
            if ($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) {
                yield "6";
            } else {
                yield "5";
            }
            yield "\" class=\"no-data\">
\t\t\t\t\t\t<i class=\"material-icons-round\">info</i>
\t\t\t\t\t\tVous n'êtes associé à aucun module actuellement
\t\t\t\t\t</td>
\t\t\t\t</tr>
\t\t\t";
        }
        // line 342
        yield "\t\t</tbody>
\t</table>
</div></section><main class=\"content-container\">
<div class=\"screenPdf\">


\t";
        // line 348
        $context["userId"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 348), "get", ["id"], "method", false, false, false, 348);
        // line 349
        yield "
\t";
        // line 351
        yield "\t";
        $context["chartLabels"] = [];
        // line 352
        yield "\t";
        $context["chartNotes"] = [];
        // line 353
        yield "
\t";
        // line 354
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 355
            yield "\t\t";
            if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "Utilisateur", [], "any", false, false, false, 355), "id", [], "any", false, false, false, 355) == ($context["userId"] ?? null)) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 355)))) {
                // line 356
                yield "\t\t\t";
                $context["chartLabels"] = Twig\Extension\CoreExtension::merge(($context["chartLabels"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 356), "Module", [], "any", false, false, false, 356), "nom", [], "any", false, false, false, 356)]);
                // line 357
                yield "\t\t\t";
                $context["chartNotes"] = Twig\Extension\CoreExtension::merge(($context["chartNotes"] ?? null), [CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 357)]);
                // line 358
                yield "\t\t";
            }
            // line 359
            yield "\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 360
        yield "
\t";
        // line 361
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["chartNotes"] ?? null)) > 0)) {
            // line 362
            yield "\t\t<section class=\"chart-section\">
\t\t\t<div class=\"section-header\">
\t\t\t\t<h3 class=\"subsection-title\">
\t\t\t\t\t<i class=\"material-icons-round\">bar_chart</i>
\t\t\t\t\tNotes par module</h3>

\t\t\t</div>
\t\t\t<div class=\"chart-container\" style=\"max-width: 800px; margin: auto;\">
\t\t\t\t<canvas id=\"notesChart\"></canvas>
\t\t\t</div>

\t\t\t <script>
\t\t\t                        // Initialisation du graphique
\t\t\t                        const ctx = document.getElementById('notesChart').getContext('2d');
\t\t\t                        const currentDate = new Date().toLocaleDateString('fr-FR');
\t\t\t
\t\t\t                        const chart = new Chart(ctx, {
\t\t\t                            type: 'bar',
\t\t\t                            data: {
\t\t\t                                labels: ";
            // line 381
            yield json_encode(($context["chartLabels"] ?? null));
            yield ",
\t\t\t                                datasets: [{
\t\t\t                                    label: 'Note sur 20',
\t\t\t                                    data: ";
            // line 384
            yield json_encode(($context["chartNotes"] ?? null));
            yield ",
\t\t\t                                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
\t\t\t                                    borderColor: 'rgba(54, 162, 235, 1)',
\t\t\t                                    borderWidth: 1
\t\t\t                                }]
\t\t\t                            },
\t\t\t                            options: {
\t\t\t                                responsive: true,
\t\t\t                                plugins: {
\t\t\t                                    title: {
\t\t\t                                        display: true,
\t\t\t                                        text: `Relevées de notes du  (\${currentDate})`,
\t\t\t                                        font: {
\t\t\t                                            size: 16,
\t\t\t                                            weight: 'bold'
\t\t\t                                        }
\t\t\t                                    }
\t\t\t                                }
\t\t\t                            }
\t\t\t                        });
\t\t\t
\t\t\t                    </script>
\t\t</section>
\t";
        }
        // line 408
        yield "</div></main></body></html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Pages_principaux/page_utilisateur_info.html.twig";
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
        return array (  744 => 408,  717 => 384,  711 => 381,  690 => 362,  688 => 361,  685 => 360,  679 => 359,  676 => 358,  673 => 357,  670 => 356,  667 => 355,  663 => 354,  660 => 353,  657 => 352,  654 => 351,  651 => 349,  649 => 348,  641 => 342,  628 => 336,  625 => 335,  623 => 334,  620 => 333,  614 => 332,  609 => 329,  605 => 327,  599 => 325,  597 => 324,  593 => 322,  589 => 320,  583 => 318,  581 => 317,  576 => 315,  572 => 314,  568 => 313,  565 => 312,  562 => 311,  559 => 310,  554 => 309,  552 => 308,  526 => 285,  523 => 284,  514 => 278,  507 => 274,  500 => 270,  487 => 259,  485 => 258,  481 => 256,  477 => 254,  471 => 253,  461 => 249,  456 => 248,  451 => 247,  447 => 246,  426 => 227,  422 => 225,  419 => 224,  412 => 222,  407 => 220,  401 => 218,  399 => 217,  395 => 216,  390 => 215,  385 => 214,  383 => 213,  374 => 207,  370 => 206,  360 => 198,  342 => 183,  338 => 182,  329 => 175,  327 => 174,  310 => 160,  306 => 159,  275 => 130,  262 => 124,  259 => 123,  257 => 122,  254 => 121,  248 => 120,  244 => 118,  234 => 111,  230 => 110,  224 => 107,  221 => 106,  219 => 105,  216 => 104,  212 => 102,  206 => 100,  204 => 99,  200 => 97,  196 => 95,  190 => 93,  188 => 92,  183 => 90,  179 => 89,  175 => 88,  172 => 87,  169 => 86,  166 => 85,  161 => 84,  159 => 83,  154 => 80,  150 => 78,  148 => 77,  129 => 60,  120 => 54,  112 => 48,  110 => 47,  106 => 45,  104 => 44,  93 => 35,  91 => 34,  85 => 30,  78 => 25,  76 => 24,  71 => 21,  69 => 20,  53 => 7,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "Pages_principaux/page_utilisateur_info.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\Pages_principaux\\page_utilisateur_info.html.twig");
    }
}
