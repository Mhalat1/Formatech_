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

/* Pages_principaux/page_utilisateur.html.twig */
class __TwigTemplate_6fbc05141bc2c2afa69678829181b1ba extends Template
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
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Utilisateur et Utilisateurs</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/utilisateurinstitution.css"), "html", null, true);
        yield "\">
    <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons+Round\" rel=\"stylesheet\">
</head>

<body class=\"modern-theme\">
    ";
        // line 12
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 197
        yield "</body>
</html>";
        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 13
        yield "        ";
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "Pages_principaux/page_utilisateur.html.twig", 13)->unwrap()->yield($context);
        // line 14
        yield "
        <!-- Users List Collapsible Section -->
        <section class=\"data-section-admin\">

            ";
        // line 18
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
            // line 19
            yield "                <h1 class=\"section-title-pricipale\">
                    Partie Administration
                </h1>

                
    ";
            // line 25
            yield "    <div class=\"institution-selector\">
        <label for=\"institution-select\">Choisir une institution :</label>
        <select id=\"institution-select\" class=\"form-control\">
            <option value=\"\">-- Toutes les institutions --</option>
            ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["institutions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["institution"]) {
                // line 30
                yield "                <option value=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "id", [], "any", false, false, false, 30), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["institution"], "nom", [], "any", false, false, false, 30), "html", null, true);
                yield "</option>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['institution'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            yield "        </select>
    </div>
            

                <div class=\"table-container\">
                    <input type=\"checkbox\" id=\"toggle-users-table\" class=\"table-toggle\">
                    <label for=\"toggle-users-table\" class=\"table-header\">
                        <h3 class=\"table-title\">
                            <i class=\"material-icons-round\">people</i>
                            Liste des Utilisateurs
                            <span class=\"expand-icon\">
                                <i class=\"material-icons-round\">expand_more</i>
                            </span>
                        </h3>
                    </label>
                    
                    <div class=\"table-content\">
                        <div class=\"table-wrapper\">
                            <table class=\"modern-table\">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        ";
            // line 55
            if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                // line 56
                yield "                                        <th>Contact</th>
                                        <th>Naissance</th>
                                        ";
            }
            // line 59
            yield "                                        ";
            if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
                // line 60
                yield "                                        <th>Rôle</th>
                                        <th>Actions</th>
                                        ";
            }
            // line 63
            yield "                                    </tr>
                                </thead>
                                
                                <tbody>
                                    ";
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurs_liste"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["utilisateur"]) {
                // line 68
                yield "                                    <tr onclick=\"window.location.href='";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("utilisateur_liste", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 68)]), "html", null, true);
                yield "'\" 
                                        class=\"";
                // line 69
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 69) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 69), "id", [], "any", false, false, false, 69))) ? ("highlight") : (""));
                yield "\">
                                        <td>
                                            <div class=\"user-badge\">
                                                <span class=\"user-initials\">";
                // line 72
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "prenom", [], "any", false, false, false, 72))), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "nom", [], "any", false, false, false, 72))), "html", null, true);
                yield "</span>
                                                ";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "nom", [], "any", false, false, false, 73), "html", null, true);
                yield "
                                            </div>
                                        </td>
                                        <td>";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "prenom", [], "any", false, false, false, 76), "html", null, true);
                yield "</td>
                                        
                                        ";
                // line 78
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    // line 79
                    yield "                                        <td>
                                            <div class=\"contact-info\">
                                                <div>";
                    // line 81
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "courriel", [], "any", false, false, false, 81), "html", null, true);
                    yield "</div>
                                                <div class=\"phone\">";
                    // line 82
                    yield ((CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "telephone", [], "any", false, false, false, 82)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("0" . CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "telephone", [], "any", false, false, false, 82)), "html", null, true)) : (""));
                    yield "</div>
                                            </div>
                                        </td>
                                        <td>";
                    // line 85
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "dateNaissance", [], "any", false, false, false, 85), "d/m/Y"), "html", null, true);
                    yield "</td>
                                        ";
                }
                // line 87
                yield "                                        
                                        ";
                // line 88
                if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
                    // line 89
                    yield "                                        <td>
                                            <div class=\"role-tag ";
                    // line 90
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::replace(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "roles", [], "any", false, false, false, 90), " "), ["ROLE_" => ""])), "html", null, true);
                    yield "\">
                                                ";
                    // line 91
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "roles", [], "any", false, false, false, 91), " "), ["ROLE_" => ""]), "html", null, true);
                    yield "
                                            </div>
                                        </td>
                                        <td class=\"action-buttons\">
                                            <a href=\"";
                    // line 95
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("utilisateur_modifier_roles", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 95)]), "html", null, true);
                    yield "\" 
                                            class=\"icon-btn edit\" 
                                            title=\"Modifier les rôles\">
                                                <i class=\"material-icons-round\">manage_accounts</i>
                                            </a>
                                            <a href=\"";
                    // line 100
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("institution_index_ajouter", ["delete_Utilisateur_id" => CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 100)]), "html", null, true);
                    yield "\" 
                                            class=\"icon-btn delete\" 
                                            title=\"Supprimer\"
                                            onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');\">
                                                <i class=\"material-icons-round\">delete</i>
                                            </a>
                                        </td>
                                        ";
                }
                // line 108
                yield "                                    </tr>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['utilisateur'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 110
            yield "                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 116
        yield "        </section>

        <!-- Current User Section -->
        <section class=\"data-section\">
            <div class=\"table-container\">
                <table class=\"modern-table\">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            ";
        // line 126
        if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN"))) {
            // line 127
            yield "                            <th>Contact</th>
                            <th>Naissance</th>
                            ";
        }
        // line 130
        yield "                            ";
        if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
            // line 131
            yield "                            <th>Rôle</th>
                            <th>Actions</th>
                            ";
        }
        // line 134
        yield "                        </tr>
                    </thead>
                    
                    <tbody>
                        ";
        // line 138
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurs_liste"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["utilisateur"]) {
            // line 139
            yield "                            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 139) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 139), "id", [], "any", false, false, false, 139))) {
                // line 140
                yield "                                <tr onclick=\"window.location.href='";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("utilisateur_liste", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 140)]), "html", null, true);
                yield "'\" 
                                    class=\"";
                // line 141
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 141) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "user", [], "any", false, false, false, 141), "id", [], "any", false, false, false, 141))) ? ("highlight") : (""));
                yield "\">
                                    <td>
                                        <div class=\"user-badge\">
                                            <span class=\"user-initials\">";
                // line 144
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "prenom", [], "any", false, false, false, 144))), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "nom", [], "any", false, false, false, 144))), "html", null, true);
                yield "</span>
                                            ";
                // line 145
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "nom", [], "any", false, false, false, 145), "html", null, true);
                yield "
                                        </div>
                                    </td>
                                    <td>";
                // line 148
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "prenom", [], "any", false, false, false, 148), "html", null, true);
                yield "</td>
                                    
                                    ";
                // line 150
                if ((($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ENSEIGNANT"))) {
                    // line 151
                    yield "                                    <td>
                                        <div class=\"contact-info\">
                                            <div>";
                    // line 153
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "courriel", [], "any", false, false, false, 153), "html", null, true);
                    yield "</div>
                                            <div class=\"phone\">";
                    // line 154
                    yield ((CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "telephone", [], "any", false, false, false, 154)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(("0" . CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "telephone", [], "any", false, false, false, 154)), "html", null, true)) : (""));
                    yield "</div>
                                        </div>
                                    </td>
                                    <td>";
                    // line 157
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "dateNaissance", [], "any", false, false, false, 157), "d/m/Y"), "html", null, true);
                    yield "</td>
                                    ";
                }
                // line 159
                yield "                                    
                                    ";
                // line 160
                if (($this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPERADMIN") || $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN"))) {
                    // line 161
                    yield "                                    <td>
                                        <div class=\"role-tag ";
                    // line 162
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::replace(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "roles", [], "any", false, false, false, 162), " "), ["ROLE_" => ""])), "html", null, true);
                    yield "\">
                                            ";
                    // line 163
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(Twig\Extension\CoreExtension::join(CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "roles", [], "any", false, false, false, 163), " "), ["ROLE_" => ""]), "html", null, true);
                    yield "
                                        </div>
                                    </td>
                                    <td class=\"action-buttons\">
                                        <a href=\"";
                    // line 167
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("utilisateur_modifier_roles", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 167)]), "html", null, true);
                    yield "\" 
                                        class=\"icon-btn edit\" 
                                        title=\"Modifier les rôles\">
                                            <i class=\"material-icons-round\">manage_accounts</i>
                                        </a>
                                        <a href=\"";
                    // line 172
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("institution_index_ajouter", ["delete_Utilisateur_id" => CoreExtension::getAttribute($this->env, $this->source, $context["utilisateur"], "id", [], "any", false, false, false, 172)]), "html", null, true);
                    yield "\" 
                                        class=\"icon-btn delete\" 
                                        title=\"Supprimer\"
                                        onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');\">
                                            <i class=\"material-icons-round\">delete</i>
                                        </a>
                                    </td>
                                    ";
                }
                // line 180
                yield "                                </tr>
                            ";
            }
            // line 182
            yield "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['utilisateur'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 183
        yield "                    </tbody>
                </table>
            </div>
        </section>






        
        
    </main>
    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Pages_principaux/page_utilisateur.html.twig";
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
        return array (  400 => 183,  394 => 182,  390 => 180,  379 => 172,  371 => 167,  364 => 163,  360 => 162,  357 => 161,  355 => 160,  352 => 159,  347 => 157,  341 => 154,  337 => 153,  333 => 151,  331 => 150,  326 => 148,  320 => 145,  315 => 144,  309 => 141,  304 => 140,  301 => 139,  297 => 138,  291 => 134,  286 => 131,  283 => 130,  278 => 127,  276 => 126,  264 => 116,  256 => 110,  249 => 108,  238 => 100,  230 => 95,  223 => 91,  219 => 90,  216 => 89,  214 => 88,  211 => 87,  206 => 85,  200 => 82,  196 => 81,  192 => 79,  190 => 78,  185 => 76,  179 => 73,  174 => 72,  168 => 69,  163 => 68,  159 => 67,  153 => 63,  148 => 60,  145 => 59,  140 => 56,  138 => 55,  113 => 32,  102 => 30,  98 => 29,  92 => 25,  85 => 19,  83 => 18,  77 => 14,  74 => 13,  67 => 12,  61 => 197,  59 => 12,  51 => 7,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "Pages_principaux/page_utilisateur.html.twig", "C:\\Users\\user\\Desktop\\Formatech\\templates\\Pages_principaux\\page_utilisateur.html.twig");
    }
}
