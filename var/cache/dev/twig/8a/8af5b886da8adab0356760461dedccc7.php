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

/* Pages_principaux/page_emploidutemps.html.twig */
class __TwigTemplate_f1674cc25036abe310e111a6aaf87ff0 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Pages_principaux/page_emploidutemps.html.twig"));

        // line 1
        yield "

";
        // line 3
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 45
        yield "
";
        // line 46
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 77
        yield "
";
        // line 78
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        yield "    <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f6f8;
        }

        #calendar {
            max-width: 90%;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .fc .fc-toolbar-title {
            font-size: 1.5rem;
        }

        .fc .fc-button {
            background-color: #3498db;
            border: none;
        }

        .fc-event {
            background-color:rgb(46, 128, 204) !important;
            color: white;
            font-weight: bold;
            font-size: 0.85rem;
            padding: 2px 5px;
        }

        .fc-event:hover {
            background-color:rgb(124, 177, 247) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
    </style>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 46
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 47
        yield "    ";
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "Pages_principaux/page_emploidutemps.html.twig", 47)->unwrap()->yield($context);
        // line 48
        yield "
    <div id=\"calendar\"></div>

    <div class=\"modal fade\" id=\"eventDetailsModal\" tabindex=\"-1\">
        <div class=\"modal-dialog modal-lg modal-dialog-centered\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h5 class=\"modal-title\">Détails du module</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
                </div>
                <div class=\"modal-body\">
                    <p><strong>Module :</strong> <span id=\"modal-moduleNom\"></span></p>
                    <p><strong>Description :</strong> <span id=\"modal-moduleDescription\"></span></p>
                    <p><strong>Dates :</strong> <span id=\"modal-moduleDates\"></span></p>
                    <hr>
                    <p><strong>Session :</strong> <span id=\"modal-sessionNom\"></span></p>
                    <p><strong>Type :</strong> <span id=\"modal-sessionType\"></span></p>
                    <p><strong>Dates :</strong> <span id=\"modal-sessionDates\"></span></p>
                    <p><strong>Description :</strong> <span id=\"modal-sessionDescription\"></span></p>
                    <hr>
                    <p><strong>Institution :</strong> <span id=\"modal-institutionNom\"></span></p>
                    <p><strong>Adresse :</strong> <span id=\"modal-institutionAdresse\"></span></p>
                    <p><strong>Téléphone :</strong> <span id=\"modal-institutionTelephone\"></span></p>
                    <p><strong>Courriel :</strong> <span id=\"modal-institutionCourriel\"></span></p>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 78
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 79
        yield "    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/fr.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'fr',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                eventClick: function(info) {
                    const props = info.event.extendedProps;
                    document.getElementById('modal-moduleNom').textContent = props.module_nom || '';
                    document.getElementById('modal-moduleDescription').textContent = props.module_description || '';
                    document.getElementById('modal-moduleDates').textContent = `\${props.module_date_debut} → \${props.module_date_fin}`;
                    document.getElementById('modal-sessionNom').textContent = props.session_nom || '';
                    document.getElementById('modal-sessionType').textContent = props.session_type || '';
                    document.getElementById('modal-sessionDates').textContent = `\${props.session_date_debut} → \${props.session_date_fin}`;
                    document.getElementById('modal-sessionDescription').textContent = props.session_description || '';
                    document.getElementById('modal-institutionNom').textContent = props.institution_nom || '';
                    document.getElementById('modal-institutionAdresse').textContent = props.institution_adresse || '';
                    document.getElementById('modal-institutionTelephone').textContent = props.institution_telephone || '';
                    document.getElementById('modal-institutionCourriel').textContent = props.institution_courriel || '';
                    new bootstrap.Modal(document.getElementById('eventDetailsModal')).show();
                },
                events: [
                    ";
        // line 111
        $context["dayMap"] = ["Lundi" => 1, "Mardi" => 2, "Mercredi" => 3, "Jeudi" => 4, "Vendredi" => 5, "Samedi" => 6, "Dimanche" => 0];
        // line 120
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["results"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 121
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "horaires", [], "any", false, false, false, 121));
            foreach ($context['_seq'] as $context["_key"] => $context["horaire"]) {
                // line 122
                yield "                            {
                                title: '";
                // line 123
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "module_nom", [], "any", false, false, false, 123), "js"), "html", null, true);
                yield "',
                                ";
                // line 124
                if (CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "date_precise", [], "any", false, false, false, 124)) {
                    // line 125
                    yield "                                    start: '";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "date_precise", [], "any", false, false, false, 125), "html", null, true);
                    yield "T";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "heure_debut", [], "any", false, false, false, 125), "html", null, true);
                    yield "',
                                    end: '";
                    // line 126
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "date_precise", [], "any", false, false, false, 126), "html", null, true);
                    yield "T";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "heure_fin", [], "any", false, false, false, 126), "html", null, true);
                    yield "',
                                ";
                } else {
                    // line 128
                    yield "                                    daysOfWeek: [";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((($_v0 = ($context["dayMap"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "jour", [], "any", false, false, false, 128)] ?? null) : null), "html", null, true);
                    yield "],
                                    startTime: '";
                    // line 129
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "heure_debut", [], "any", false, false, false, 129), "html", null, true);
                    yield "',
                                    endTime: '";
                    // line 130
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["horaire"], "heure_fin", [], "any", false, false, false, 130), "html", null, true);
                    yield "',
                                    startRecur: '";
                    // line 131
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y-m-d"), "html", null, true);
                    yield "',
                                    endRecur: '2030-12-31',
                                ";
                }
                // line 134
                yield "                                allDay: false,
                                extendedProps: ";
                // line 135
                yield json_encode($context["item"]);
                yield "
                            },
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['horaire'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            yield "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 139
        yield "                ]
            });

            calendar.render();
        });
    </script>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Pages_principaux/page_emploidutemps.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  293 => 139,  287 => 138,  278 => 135,  275 => 134,  269 => 131,  265 => 130,  261 => 129,  256 => 128,  249 => 126,  242 => 125,  240 => 124,  236 => 123,  233 => 122,  228 => 121,  223 => 120,  221 => 111,  187 => 79,  177 => 78,  141 => 48,  138 => 47,  128 => 46,  80 => 4,  70 => 3,  62 => 78,  59 => 77,  57 => 46,  54 => 45,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "Pages_principaux/page_emploidutemps.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\Pages_principaux\\page_emploidutemps.html.twig");
    }
}
