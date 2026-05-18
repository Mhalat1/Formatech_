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

/* Pages_modifications/modifier_session.html.twig */
class __TwigTemplate_f7fff074f0423eb615fa16a821f78857 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Pages_modifications/modifier_session.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\" class=\"h-100\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Modifier ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "nom", [], "any", false, false, false, 6), "html", null, true);
        yield " | Formatech</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/modification.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap\">
    <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons+Round\" rel=\"stylesheet\">
</head>

<body class=\"bg-light\">
    ";
        // line 13
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 79
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 13
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 14
        yield "        ";
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "Pages_modifications/modifier_session.html.twig", 14)->unwrap()->yield($context);
        // line 15
        yield "        
        <main class=\"container py-5\">
            <div class=\"card institution-form\">
                <div class=\"card-header\">
                    <h1 class=\"h2 mb-0\">
                        <i class=\"material-icons-round me-2\">event</i>
                        Modifier la session : ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["session"] ?? null), "nom", [], "any", false, false, false, 21), "html", null, true);
        yield "
                    </h1>
                </div>
                
                <div class=\"card-body\">
                    ";
        // line 26
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form_session_modifier"] ?? null), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "
                        <div class=\"row g-4\">
                            <div class=\"col-md-6\">
                                ";
        // line 29
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_session_modifier"] ?? null), "nom", [], "any", false, false, false, 29), 'row', ["attr" => ["class" => "form-control-lg"], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 32
        yield "
                            </div>
                            
                            <div class=\"col-md-6\">
                                ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_session_modifier"] ?? null), "type", [], "any", false, false, false, 36), 'row', ["attr" => ["class" => "form-control-lg"], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 39
        yield "
                            </div>
                            
                            <div class=\"col-md-6\">
                                ";
        // line 43
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_session_modifier"] ?? null), "date_debut", [], "any", false, false, false, 43), 'row', ["attr" => ["class" => "form-control-lg"], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 46
        yield "
                            </div>
                            
                            <div class=\"col-md-6\">
                                ";
        // line 50
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_session_modifier"] ?? null), "date_fin", [], "any", false, false, false, 50), 'row', ["attr" => ["class" => "form-control-lg"], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 53
        yield "
                            </div>
                            
                            <div class=\"col-12\">
                                ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_session_modifier"] ?? null), "description", [], "any", false, false, false, 57), 'row', ["attr" => ["class" => "form-control-lg", "rows" => 3], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 60
        yield "
                            </div>
                        </div>
                        
                        <div class=\"d-flex justify-content-end mt-4 gap-3\">
                            <a href=\"";
        // line 65
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_Session_Module");
        yield "\" class=\"btn btn-outline-secondary\">
                                <i class=\"material-icons-round me-1\">arrow_back</i>
                                Annuler
                            </a>
                            <button type=\"submit\" class=\"btn btn-primary\">
                                <i class=\"material-icons-round me-1\">save</i>
                                Mettre à jour
                            </button>
                        </div>
                    ";
        // line 74
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form_session_modifier"] ?? null), 'form_end');
        yield "
                </div>
            </div>
        </main>
    ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Pages_modifications/modifier_session.html.twig";
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
        return array (  165 => 74,  153 => 65,  146 => 60,  144 => 57,  138 => 53,  136 => 50,  130 => 46,  128 => 43,  122 => 39,  120 => 36,  114 => 32,  112 => 29,  106 => 26,  98 => 21,  90 => 15,  87 => 14,  77 => 13,  68 => 79,  66 => 13,  57 => 7,  53 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "Pages_modifications/modifier_session.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\Pages_modifications\\modifier_session.html.twig");
    }
}
