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

/* invitation/limit_reached.html.twig */
class __TwigTemplate_ce4d322611b71000ee17c3379582c05c extends Template
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
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'stylesheets' => [$this, 'block_stylesheets'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "invitation/limit_reached.html.twig"));

        // line 1
        yield "
";
        // line 2
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        // line 3
        yield "
";
        // line 4
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 72
        yield "
";
        // line 73
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 2
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Limite d'invitations atteinte ";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 5
        yield "    ";
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "invitation/limit_reached.html.twig", 5)->unwrap()->yield($context);
        // line 6
        yield "    
    <main class=\"limit-reached-container\">
        <div class=\"container mt-4 mt-md-5\">
            <div class=\"row justify-content-center\">
                <div class=\"col-lg-8\">
                    <div class=\"limit-card animate__animated animate__fadeInUp\">
                        <div class=\"limit-card-header\">
                            <div class=\"limit-icon-wrapper\">
                                <i class=\"fas fa-exclamation-triangle shake\"></i>
                            </div>
                            <h1 class=\"limit-title\">Limite d'invitations atteinte</h1>
                        </div>
                        
                        <div class=\"limit-card-body\">
                            <div class=\"limit-alert danger-pulse\">
                                <div class=\"d-flex align-items-center\">
                                    <i class=\"fas fa-ban me-3\"></i>
                                    <p class=\"mb-0\">
                                        <strong>Vous avez atteint votre quota maximum de <span class=\"highlight\">";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["maxInvitations"] ?? null), "html", null, true);
        yield "</span> invitations.</strong>
                                    </p>
                                </div>
                            </div>
                            
                            <div class=\"limit-solutions\">
                                <h2 class=\"solutions-title\">
                                    <i class=\"fas fa-lightbulb me-2\"></i>
                                    Solutions possibles
                                </h2>
                                <ul class=\"solutions-list\">
                                    <li class=\"solution-item\">
                                        <i class=\"fas fa-clock me-2\"></i>
                                        Attendez que certaines invitations expirent (7 jours)
                                    </li>
                                    <li class=\"solution-item\">
                                        <i class=\"fas fa-envelope me-2\"></i>
                                        Contactez l'administrateur pour une augmentation
                                        </br> utilisez le formulaire de contact
                                    </li>
                                    <li class=\"solution-item\">
                                        <i class=\"fas fa-envelope me-2\"></i>
                                        Souscrivez directement à l'offre premium
                                        </br> permet de réaliser plus d'invitations
                                    </li>
                                </ul>
                            </div>
                            
                            <div class=\"limit-actions\">
                                <a href=\"";
        // line 53
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn btn-primary btn-home\">
                                    <i class=\"fas fa-home me-2\"></i>
                                    Retour à l'
                                </a>
                            </div>
                        </div>
                        
                        <div class=\"limit-card-footer\">
                            <small>
                                <i class=\"fas fa-sync-alt me-1\"></i>
                                Actualisé le ";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y à H:i"), "html", null, true);
        yield "
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 73
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 74
        yield "    <style>
        /* Variables CSS */
        :root {
            --danger-color: #e74c3c;
            --info-color: #3498db;
            --primary-color: #2c3e50;
            --highlight-color: #e67e22;
        }
        
        /* Structure principale */
        .limit-reached-container {
            min-height: 70vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
            justify-content: center;
        }
        
        /* Carte principale */
        .limit-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: none;
            transition: transform 0.3s ease;
        }
        
        .limit-card:hover {
            transform: translateY(-5px);
        }
        
        /* En-tête de carte */
        .limit-card-header {
            background: linear-gradient(135deg, var(--danger-color), #c0392b);
            color: white;
            padding: 1.5rem;
            text-align: center;
            position: relative;
        }
        
        .limit-icon-wrapper {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .limit-title {
            font-weight: 700;
            margin: 0;
            font-size: 1.8rem;
        }
        
        /* Corps de carte */
        .limit-card-body {
            padding: 2rem;
        }
        
        /* Alertes */
        .limit-alert {
            padding: 1.25rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            border-left: 5px solid;
            display: flex;
            align-items: center;
        }
        
        .danger-pulse {
            background-color: rgba(231, 76, 60, 0.1);
            border-left-color: var(--danger-color);
            animation: pulse 2s infinite;
        }
        
        /* Section solutions */
        .limit-solutions {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .solutions-title {
            color: var(--primary-color);
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .solutions-list {
            list-style: none;
            padding-left: 0;
        }
        
        .solution-item {
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .solution-item:last-child {
            border-bottom: none;
        }
        
        .solution-item:hover {
            transform: translateX(5px);
            color: var(--primary-color);
        }
        
        /* Pied de carte */
        .limit-card-footer {
            background: #f8f9fa;
            padding: 1rem;
            text-align: center;
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        
        /* Boutons */
        .limit-actions {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .btn-home {
            background: var(--primary-color);
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
            color:white;
            text-decoration:none;
        }
        
        .btn-home:hover {
            background: #1a252f;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        /* Éléments spéciaux */
        .highlight {
            color: var(--highlight-color);
            font-weight: 700;
        }
        
        .shake {
            animation: shake 0.5s ease infinite;
        }
        
        /* Animations */
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(231, 76, 60, 0); }
            100% { box-shadow: 0 0 0 0 rgba(231, 76, 60, 0); }
        }
        
        @keyframes shake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .limit-card-header {
                padding: 1rem;
            }
            
            .limit-title {
                font-size: 1.4rem;
            }
            
            .limit-card-body {
                padding: 1.5rem;
            }
            
            .limit-actions {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "invitation/limit_reached.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  191 => 74,  181 => 73,  164 => 63,  151 => 53,  119 => 24,  99 => 6,  96 => 5,  86 => 4,  69 => 2,  61 => 73,  58 => 72,  56 => 4,  53 => 3,  51 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "invitation/limit_reached.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\invitation\\limit_reached.html.twig");
    }
}
