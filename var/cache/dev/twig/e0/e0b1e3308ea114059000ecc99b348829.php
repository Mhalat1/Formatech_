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

/* payment/required.html.twig */
class __TwigTemplate_4d1050fba49a3dc0511e0f55b7f5cca4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "payment/required.html.twig"));

        // line 1
        yield "<!-- Dans votre template payment/required.html.twig -->

<!-- Boutons de paiement -->
<div class=\"subscription-options\">
    <div class=\"plan\">
        <h3>Plan Basique</h3>
        <p>9.90€/mois</p>
        <button id=\"checkout-basique\" class=\"btn btn-primary\">
            S'abonner - Basique
        </button>
    </div>
    
    <div class=\"plan\">
        <h3>Plan Premium</h3>
        <p>19.90€/mois</p>
        <button id=\"checkout-premium\" class=\"btn btn-primary\">
            S'abonner - Premium
        </button>
    </div>
</div>

<!-- Script Stripe -->
<script src=\"https://js.stripe.com/v3/\"></script>
<script>
const stripe = Stripe('";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["stripe_public_key"] ?? null), "html", null, true);
        yield "');

// Fonction pour créer une session de checkout
async function createCheckoutSession(subscriptionType) {
    try {
        const response = await fetch('";
        // line 30
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("create_checkout_session");
        yield "', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                subscription_type: subscriptionType
            })
        });

        const session = await response.json();
        
        if (session.error) {
            alert('Erreur: ' + session.error);
            return;
        }

        // Rediriger vers Stripe Checkout
        const result = await stripe.redirectToCheckout({
            sessionId: session.id
        });

        if (result.error) {
            alert('Erreur: ' + result.error.message);
        }
    } catch (error) {
        alert('Erreur: ' + error.message);
    }
}

// Event listeners pour les boutons
document.getElementById('checkout-basique').addEventListener('click', () => {
    createCheckoutSession('basique');
});

document.getElementById('checkout-premium').addEventListener('click', () => {
    createCheckoutSession('premium');
});
</script>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "payment/required.html.twig";
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
        return array (  79 => 30,  71 => 25,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "payment/required.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\payment\\required.html.twig");
    }
}
