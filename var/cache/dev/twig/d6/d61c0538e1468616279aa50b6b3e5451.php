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

/* pdf/export.html.twig */
class __TwigTemplate_c488869929a8b25dec538ab53852f77e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/export.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <style>
        @page {
            size: A4;
            margin: 15mm;
        }
        
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.3;
            margin: 0;
            padding: 0;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 15px;
        }
        
        .header h1 {
            margin: 0 0 10px 0;
            font-size: 24px;
            color: #2c3e50;
            text-transform: uppercase;
        }
        
        .student-info {
            background: #f8f9fa;
            padding: 10px;
            margin: 15px 0;
            border-left: 4px solid #3498db;
        }
        
        .student-info h2 {
            margin: 0 0 5px 0;
            font-size: 16px;
            color: #2c3e50;
        }
        
        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 11px;
        }
        
        .grades-table th {
            background: #34495e;
            color: white;
            padding: 8px 6px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #2c3e50;
        }
        
        .grades-table td {
            padding: 6px;
            border: 1px solid #bdc3c7;
            vertical-align: top;
        }
        
        .grades-table tr:nth-child(even) {
            background: #f8f9fa;
        }
        
        .grades-table tr:hover {
            background: #e8f4fd;
        }
        
        .note-cell {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }
        
        .note-excellent { color: #27ae60; }
        .note-good { color: #f39c12; }
        .note-average { color: #e67e22; }
        .note-poor { color: #e74c3c; }
        
        .institution-cell {
            font-size: 10px;
            color: #7f8c8d;
        }
        
        .session-cell {
            font-size: 10px;
            color: #7f8c8d;
        }
        
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #7f8c8d;
            border-top: 1px solid #bdc3c7;
            padding-top: 10px;
        }
        
        .summary {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
            background: #ecf0f1;
            padding: 10px;
            border-radius: 5px;
        }
        
        .summary-item {
            text-align: center;
        }
        
        .summary-item strong {
            display: block;
            font-size: 16px;
            color: #2c3e50;
        }
        
        .no-modules {
            text-align: center;
            padding: 40px;
            color: #7f8c8d;
            font-style: italic;
        }

        .error-message {
            color: #e74c3c;
            border: 1px solid #e74c3c;
            padding: 10px;
            margin: 10px 0;
            background: #fadbd8;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>Relevé de Notes Officiel</h1>
    </div>

    ";
        // line 147
        if ((array_key_exists("utilisateur", $context) &&  !(null === ($context["utilisateur"] ?? null)))) {
            // line 148
            yield "    <div class=\"student-info\">
        <h2>";
            // line 149
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", true, true, false, 149) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", false, false, false, 149)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "prenom", [], "any", false, false, false, 149), "html", null, true)) : (""));
            yield " ";
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "nom", [], "any", true, true, false, 149) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "nom", [], "any", false, false, false, 149)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "nom", [], "any", false, false, false, 149), "html", null, true)) : (""));
            yield "</h2>
        <p><strong>Email:</strong> ";
            // line 150
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "courriel", [], "any", true, true, false, 150) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "courriel", [], "any", false, false, false, 150)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["utilisateur"] ?? null), "courriel", [], "any", false, false, false, 150), "html", null, true)) : ("Non renseigné"));
            yield "</p>
    </div>
    ";
        } else {
            // line 153
            yield "    <div class=\"error-message\">
        Informations utilisateur non disponibles
    </div>
    ";
        }
        // line 157
        yield "
    ";
        // line 158
        $context["hasModules"] = false;
        // line 159
        yield "    ";
        $context["totalNotes"] = 0;
        // line 160
        yield "    ";
        $context["noteCount"] = 0;
        // line 161
        yield "    
    ";
        // line 162
        if ((array_key_exists("utilisateurInstitutionSessionModules", $context) &&  !Twig\Extension\CoreExtension::testEmpty(($context["utilisateurInstitutionSessionModules"] ?? null)))) {
            // line 163
            yield "    <table class=\"grades-table\">
        <thead>
            <tr>
                <th style=\"width: 25%;\">Module</th>
                <th style=\"width: 10%;\">Note</th>
                <th style=\"width: 20%;\">Session</th>
                <th style=\"width: 25%;\">Institution</th>
                <th style=\"width: 20%;\">Période</th>
            </tr>
        </thead>
        <tbody>
            ";
            // line 174
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["utilisateurInstitutionSessionModules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 175
                yield "                ";
                $context["hasModules"] = true;
                // line 176
                yield "                <tr>
                    <td>
                        <strong>";
                // line 178
                yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 178), "Module", [], "any", false, true, false, 178), "nom", [], "any", true, true, false, 178) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 178), "Module", [], "any", false, true, false, 178), "nom", [], "any", false, false, false, 178)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 178), "Module", [], "any", false, true, false, 178), "nom", [], "any", false, false, false, 178), "html", null, true)) : ("Module inconnu"));
                yield "</strong>
                        ";
                // line 179
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 179), "Module", [], "any", false, true, false, 179), "description", [], "any", true, true, false, 179) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 179), "Module", [], "any", false, false, false, 179), "description", [], "any", false, false, false, 179))) {
                    // line 180
                    yield "                            <br><small style=\"color: #7f8c8d;\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 180), "Module", [], "any", false, false, false, 180), "description", [], "any", false, false, false, 180), 0, 80), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 180), "Module", [], "any", false, false, false, 180), "description", [], "any", false, false, false, 180)) > 80)) {
                        yield "...";
                    }
                    yield "</small>
                        ";
                }
                // line 182
                yield "                    </td>
                    <td class=\"note-cell\">
                        ";
                // line 184
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", true, true, false, 184) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 184)))) {
                    // line 185
                    yield "                            ";
                    $context["note"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "NoteModule", [], "any", false, false, false, 185);
                    // line 186
                    yield "                            ";
                    $context["totalNotes"] = (($context["totalNotes"] ?? null) + ($context["note"] ?? null));
                    // line 187
                    yield "                            ";
                    $context["noteCount"] = (($context["noteCount"] ?? null) + 1);
                    // line 188
                    yield "                            <span class=\"";
                    if ((($context["note"] ?? null) >= 16)) {
                        yield "note-excellent";
                    } elseif ((($context["note"] ?? null) >= 14)) {
                        yield "note-good";
                    } elseif ((($context["note"] ?? null) >= 10)) {
                        yield "note-average";
                    } else {
                        yield "note-poor";
                    }
                    yield "\">
                                ";
                    // line 189
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["note"] ?? null), "html", null, true);
                    yield "/20
                            </span>
                        ";
                } else {
                    // line 192
                    yield "                            <span style=\"color: #95a5a6;\">N/A</span>
                        ";
                }
                // line 194
                yield "                    </td>
                    <td class=\"session-cell\">
                        ";
                // line 196
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 196), "Session", [], "any", true, true, false, 196) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 196), "Session", [], "any", false, false, false, 196))) {
                    // line 197
                    yield "                            <strong>";
                    yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 197), "Session", [], "any", false, true, false, 197), "nom", [], "any", true, true, false, 197) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 197), "Session", [], "any", false, true, false, 197), "nom", [], "any", false, false, false, 197)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 197), "Session", [], "any", false, true, false, 197), "nom", [], "any", false, false, false, 197), "html", null, true)) : ("Session inconnue"));
                    yield "</strong>
                            ";
                    // line 198
                    if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 198), "Session", [], "any", false, true, false, 198), "type", [], "any", true, true, false, 198)) {
                        // line 199
                        yield "                                <br><small>";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 199), "Session", [], "any", false, false, false, 199), "type", [], "any", false, false, false, 199), "html", null, true);
                        yield "</small>
                            ";
                    }
                    // line 201
                    yield "                        ";
                } else {
                    // line 202
                    yield "                            <span style=\"color: #95a5a6;\">Non renseigné</span>
                        ";
                }
                // line 204
                yield "                    </td>
                    <td class=\"institution-cell\">
                        ";
                // line 206
                if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 206), "Institution", [], "any", true, true, false, 206) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 206), "Institution", [], "any", false, false, false, 206))) {
                    // line 207
                    yield "                            <strong>";
                    yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 207), "Institution", [], "any", false, true, false, 207), "nom", [], "any", true, true, false, 207) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 207), "Institution", [], "any", false, true, false, 207), "nom", [], "any", false, false, false, 207)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 207), "Institution", [], "any", false, true, false, 207), "nom", [], "any", false, false, false, 207), "html", null, true)) : ("Inconnu"));
                    yield "</strong>
                            ";
                    // line 208
                    if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 208), "Institution", [], "any", false, true, false, 208), "adresse", [], "any", true, true, false, 208)) {
                        // line 209
                        yield "                                <br><small>";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 209), "Institution", [], "any", false, false, false, 209), "adresse", [], "any", false, false, false, 209), "html", null, true);
                        yield "</small>
                            ";
                    }
                    // line 211
                    yield "                        ";
                } else {
                    // line 212
                    yield "                            <span style=\"color: #95a5a6;\">Non renseigné</span>
                        ";
                }
                // line 214
                yield "                    </td>
                    <td class=\"session-cell\">
                        ";
                // line 216
                if (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, true, false, 216), "Session", [], "any", true, true, false, 216) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 217
$context["item"], "SessionModule", [], "any", false, true, false, 217), "Session", [], "any", false, true, false, 217), "dateDebut", [], "any", true, true, false, 217)) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,                 // line 218
$context["item"], "SessionModule", [], "any", false, true, false, 218), "Session", [], "any", false, true, false, 218), "dateFin", [], "any", true, true, false, 218))) {
                    // line 219
                    yield "                            ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 219), "Session", [], "any", false, false, false, 219), "dateDebut", [], "any", false, false, false, 219), "d/m/Y"), "html", null, true);
                    yield "
                            <br>au<br>
                            ";
                    // line 221
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "SessionModule", [], "any", false, false, false, 221), "Session", [], "any", false, false, false, 221), "dateFin", [], "any", false, false, false, 221), "d/m/Y"), "html", null, true);
                    yield "
                        ";
                } else {
                    // line 223
                    yield "                            <span style=\"color: #95a5a6;\">Non définie</span>
                        ";
                }
                // line 225
                yield "                    </td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 228
            yield "        </tbody>
    </table>
    ";
        }
        // line 231
        yield "
    ";
        // line 232
        if ( !($context["hasModules"] ?? null)) {
            // line 233
            yield "        <div class=\"no-modules\">
            <p>Aucun module trouvé pour cet utilisateur.</p>
        </div>
    ";
        }
        // line 237
        yield "
    ";
        // line 238
        if ((($context["hasModules"] ?? null) && (($context["noteCount"] ?? null) > 0))) {
            // line 239
            yield "        <div class=\"summary\">
            <div class=\"summary-item\">
                <strong>";
            // line 241
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["noteCount"] ?? null), "html", null, true);
            yield "</strong>
                <small>Modules évalués</small>
            </div>
            <div class=\"summary-item\">
                <strong>";
            // line 245
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((($context["totalNotes"] ?? null) / ($context["noteCount"] ?? null)), 2), "html", null, true);
            yield "/20</strong>
                <small>Moyenne générale</small>
            </div>
            <div class=\"summary-item\">
                <strong>
                    ";
            // line 250
            $context["moyenne"] = (($context["totalNotes"] ?? null) / ($context["noteCount"] ?? null));
            // line 251
            yield "                    ";
            if ((($context["moyenne"] ?? null) >= 16)) {
                yield "Excellent
                    ";
            } elseif ((            // line 252
($context["moyenne"] ?? null) >= 14)) {
                yield "Bien
                    ";
            } elseif ((            // line 253
($context["moyenne"] ?? null) >= 12)) {
                yield "Assez Bien
                    ";
            } elseif ((            // line 254
($context["moyenne"] ?? null) >= 10)) {
                yield "Passable
                    ";
            } else {
                // line 255
                yield "Insuffisant
                    ";
            }
            // line 257
            yield "                </strong>
                <small>Appréciation</small>
            </div>
        </div>
    ";
        }
        // line 262
        yield "
    <div class=\"footer\">
        <p>Document généré le ";
        // line 264
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["date"] ?? null), "d/m/Y à H:i"), "html", null, true);
        yield "</p>
        <p>Ce document est un relevé de notes officiel</p>
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
        return "pdf/export.html.twig";
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
        return array (  467 => 264,  463 => 262,  456 => 257,  452 => 255,  447 => 254,  443 => 253,  439 => 252,  434 => 251,  432 => 250,  424 => 245,  417 => 241,  413 => 239,  411 => 238,  408 => 237,  402 => 233,  400 => 232,  397 => 231,  392 => 228,  384 => 225,  380 => 223,  375 => 221,  369 => 219,  367 => 218,  366 => 217,  365 => 216,  361 => 214,  357 => 212,  354 => 211,  348 => 209,  346 => 208,  341 => 207,  339 => 206,  335 => 204,  331 => 202,  328 => 201,  322 => 199,  320 => 198,  315 => 197,  313 => 196,  309 => 194,  305 => 192,  299 => 189,  286 => 188,  283 => 187,  280 => 186,  277 => 185,  275 => 184,  271 => 182,  262 => 180,  260 => 179,  256 => 178,  252 => 176,  249 => 175,  245 => 174,  232 => 163,  230 => 162,  227 => 161,  224 => 160,  221 => 159,  219 => 158,  216 => 157,  210 => 153,  204 => 150,  198 => 149,  195 => 148,  193 => 147,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "pdf/export.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\pdf\\export.html.twig");
    }
}
