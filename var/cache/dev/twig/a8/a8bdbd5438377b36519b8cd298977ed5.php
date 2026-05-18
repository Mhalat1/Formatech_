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

/* payment/success.html.twig */
class __TwigTemplate_e22d41a4f0a8ff190bec658200428fa3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "payment/success.html.twig"));

        // line 1
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 45
        yield "

<style>


.transaction-info p {
    color: red !important;
    font-size: 16px !important;
    background: yellow !important;
}

body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
}

/* Container for centering */
.payment-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to right, #4C6FF2, #1D4ED8);
}

/* Main card style */
.payment-card {
    background-color: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 500px;
    width: 100%;
}

/* Spinner animation */
.payment-spinner {
    width: 64px;
    height: 64px;
    border-top: 4px solid #4CAF50;
    border-bottom: 4px solid #4CAF50;
    border-radius: 50%;
    animation: spin 2s linear infinite;
    margin: 0 auto 20px auto;
}

/* Title and message */
.payment-title {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

.payment-message {
    font-size: 1.1rem;
    color: #555;
    margin-bottom: 30px;
}

/* Transaction details card */
.transaction-details {
    background-color: #D1FAE5;
    padding: 16px;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.transaction-title {
    font-weight: 600;
    font-size: 1.1rem;
    color: #333;
}

.transaction-info p {
    font-size: 1rem;
    color: #555;
    margin: 5px 0;
}

/* Button container */
.return-button-container {
    margin-top: 30px;
}

/* Button style */
.return-button {
    display: inline-block;
    background-color: #1D4ED8;
    color: #fff;
    padding: 12px 30px;
    font-weight: 600;
    border-radius: 50px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-decoration: none;
    transition: transform 0.2s ease, background-color 0.2s ease;
}

.return-button:hover {
    background-color: #2563EB;
    transform: scale(1.05);
}

/* Animation for spinner */
@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

</style>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 1
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 2
        yield "<div class=\"payment-container\">
    <div class=\"payment-card\">
        <div class=\"payment-spinner\"></div>
        <h1 class=\"payment-title\">Paiement réussi !</h1>
        <p class=\"payment-message\">Votre paiement a été traité avec succès. Nous vous remercions pour votre confiance.</p>

        <div class=\"transaction-details\">
            <p class=\"transaction-title\">Détails de la transaction :</p>

                <p><strong>payment_intent:</strong> ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["payment_intent"] ?? null), "html", null, true);
        yield "</p>
                <p><strong>subscription_type:</strong> ";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["subscription_type"] ?? null), "html", null, true);
        yield "</p>
                <p><strong>stripe_public_key:</strong> ";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["stripe_public_key"] ?? null), "html", null, true);
        yield "</p>
                <p><strong>username:</strong> ";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["username"] ?? null), "html", null, true);
        yield "</p>



            <div class=\"transaction-info\">



                ";
        // line 22
        if ((($context["subscription_type"] ?? null) == "basique")) {
            // line 23
            yield "                    <p>vous avez souscrit à l'offre basique</p>
                ";
        } elseif ((        // line 24
($context["subscription_type"] ?? null) == "premium")) {
            // line 25
            yield "                    <p>vous avez souscrit à l'offre premium</p>
                ";
        } else {
            // line 27
            yield "                    <p>err offre inconnue</p>
                ";
        }
        // line 29
        yield "

                <p><strong>Date:</strong> ";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y H:i"), "html", null, true);
        yield "</p>
            </div>
        </div>

        

        <div class=\"return-button-container\">
            <a href=\"";
        // line 38
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"return-button\">
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "payment/success.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  246 => 38,  236 => 31,  232 => 29,  228 => 27,  224 => 25,  222 => 24,  219 => 23,  217 => 22,  206 => 14,  202 => 13,  198 => 12,  194 => 11,  183 => 2,  173 => 1,  48 => 45,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "payment/success.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\payment\\success.html.twig");
    }
}
