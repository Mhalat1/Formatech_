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

/* Pages_modifications/modifier_institution.html.twig */
class __TwigTemplate_fc1559cbb1a3f387fce12c5c331ebdc2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Pages_modifications/modifier_institution.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\" class=\"h-100\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Modifier l'institution ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["institution"] ?? null), "nom", [], "any", false, false, false, 6), "html", null, true);
        yield " | Formatech</title>
    <link rel=\"stylesheet\" href=\"";
        // line 7
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/modification.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap\">
</head>

<body class=\"bg-light\">
    ";
        // line 12
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 71
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 12
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 13
        yield "        ";
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "Pages_modifications/modifier_institution.html.twig", 13)->unwrap()->yield($context);
        // line 14
        yield "        
        <main class=\"container py-5\">
            <div class=\"card institution-form\">
                <div class=\"card-header\">
                    <h1 class=\"h2 mb-0\">
                        <i class=\"material-icons-round me-2\">school</i>
                        Modifier l'institution : ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["institution"] ?? null), "nom", [], "any", false, false, false, 20), "html", null, true);
        yield "
                    </h1>
                </div>
                
                <div class=\"card-body\">
                    ";
        // line 25
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form_institution"] ?? null), 'form_start', ["attr" => ["novalidate" => "novalidate"]]);
        yield "
                        <div class=\"row g-4\">
                            <div class=\"col-md-6\">
                                ";
        // line 28
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_institution"] ?? null), "nom", [], "any", false, false, false, 28), 'row', ["attr" => ["class" => "form-control-lg"], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 31
        yield "
                            </div>
                            
                            <div class=\"col-md-6\">
                                ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_institution"] ?? null), "courriel", [], "any", false, false, false, 35), 'row', ["attr" => ["class" => "form-control-lg"], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 38
        yield "
                            </div>
                            
                            <div class=\"col-12\">
                                ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_institution"] ?? null), "adresse", [], "any", false, false, false, 42), 'row', ["attr" => ["class" => "form-control-lg", "rows" => 3], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 45
        yield "
                            </div>
                            
                            <div class=\"col-md-6\">
                                ";
        // line 49
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form_institution"] ?? null), "telephone", [], "any", false, false, false, 49), 'row', ["attr" => ["class" => "form-control-lg"], "label_attr" => ["class" => "form-label fw-bold"]]);
        // line 52
        yield "
                            </div>
                        </div>
                        
                        <div class=\"d-flex justify-content-end mt-4 gap-3\">
                            <a href=\"";
        // line 57
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
        // line 66
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form_institution"] ?? null), 'form_end');
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
        return "Pages_modifications/modifier_institution.html.twig";
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
        return array (  156 => 66,  144 => 57,  137 => 52,  135 => 49,  129 => 45,  127 => 42,  121 => 38,  119 => 35,  113 => 31,  111 => 28,  105 => 25,  97 => 20,  89 => 14,  86 => 13,  76 => 12,  67 => 71,  65 => 12,  57 => 7,  53 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "Pages_modifications/modifier_institution.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\Pages_modifications\\modifier_institution.html.twig");
    }
}
