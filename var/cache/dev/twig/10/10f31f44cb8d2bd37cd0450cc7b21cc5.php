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

/* inscription/inscription.html.twig */
class __TwigTemplate_c01fc4046cf12a4e7ac2c84ccb9c9935 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "inscription/inscription.html.twig"));

        // line 1
        yield "<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Register</title>
    <link rel=\"stylesheet\" href=\"";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/inscription.css"), "html", null, true);
        yield "\">
</head>

<body class=\"bg-gray-100 font-sans flex items-center justify-center min-h-screen\">
    ";
        // line 10
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 166
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 11
        yield "        <div class=\"container\">
            ";
        // line 12
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["registrationForm"] ?? null), 'form_start', ["attr" => ["class" => "form-container"]]);
        yield "

            <div class=\"header\">
                <div class=\"header-nav\">
                    <a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"btn-home\">
                        <svg width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\">
                            <path d=\"M8 0C3.58 0 0 3.58 0 8s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zM7 12l-4-4 4-4v3h5v2H7v3z\"/>
                        </svg>
                        Retour à l'
                    </a>
                </div>
                <div class=\"header-content\">
                    <h1>Créez votre compte</h1>
                    <p>Démarrez avec notre solution de gestion</p>
                </div>
            </div>

            <div class=\"form-container\">
                ";
        // line 30
        if (($context["invitation"] ?? null)) {
            // line 31
            yield "                <div class=\"invitation-notice bg-blue-100 border-l-4 border-blue-500 p-4 mb-6\">
                    <h3 class=\"font-bold text-blue-800\">Invitation à rejoindre une institution</h3>
                    <div class=\"institution-info mt-2\">
                        <p class=\"font-semibold\">nom : ";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 34), "nom", [], "any", false, false, false, 34), "html", null, true);
            yield "</p>
                        <p>adresse : ";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 35), "adresse", [], "any", false, false, false, 35), "html", null, true);
            yield "</p>
                        <p>Téléphone: ";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 36), "telephone", [], "any", false, false, false, 36), "html", null, true);
            yield "</p>
                        <p>Email: ";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 37), "courriel", [], "any", false, false, false, 37), "html", null, true);
            yield "</p>
                    </div>
                    <input type=\"hidden\" name=\"invitation_token\" value=\"";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "token", [], "any", false, false, false, 39), "html", null, true);
            yield "\">
                </div>
                ";
        }
        // line 42
        yield "
                <div class=\"section\">
                    <div class=\"section-header\">
                        <div class=\"section-number\">1</div>
                        <h2 class=\"section-title\">Informations de l'institution</h2>
                    </div>
                    
                    ";
        // line 49
        if ( !($context["invitation"] ?? null)) {
            // line 50
            yield "                    <div class=\"form-group\">
                        ";
            // line 51
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionNom", [], "any", false, false, false, 51), 'label');
            yield "
                        ";
            // line 52
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionNom", [], "any", false, false, false, 52), 'widget', ["attr" => ["class" => "form-control"]]);
            yield "
                        ";
            // line 53
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionNom", [], "any", false, false, false, 53), 'errors');
            yield "
                    </div>
                    <div class=\"form-group\">
                        ";
            // line 56
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionAdresse", [], "any", false, false, false, 56), 'label');
            yield "
                        ";
            // line 57
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionAdresse", [], "any", false, false, false, 57), 'widget', ["attr" => ["class" => "form-control"]]);
            yield "
                        ";
            // line 58
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionAdresse", [], "any", false, false, false, 58), 'errors');
            yield "
                    </div>
                    <div class=\"form-group\">
                        ";
            // line 61
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionTelephone", [], "any", false, false, false, 61), 'label');
            yield "
                        ";
            // line 62
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionTelephone", [], "any", false, false, false, 62), 'widget', ["attr" => ["class" => "form-control"]]);
            yield "
                        ";
            // line 63
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionTelephone", [], "any", false, false, false, 63), 'errors');
            yield "
                    </div>
                    <div class=\"form-group\">
                        ";
            // line 66
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionCourriel", [], "any", false, false, false, 66), 'label');
            yield "
                        ";
            // line 67
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionCourriel", [], "any", false, false, false, 67), 'widget', ["attr" => ["class" => "form-control"]]);
            yield "
                        ";
            // line 68
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionCourriel", [], "any", false, false, false, 68), 'errors');
            yield "
                    </div>
                    ";
        } else {
            // line 71
            yield "                    <div class=\"bg-gray-50 p-4 rounded\">
                        <p class=\"text-gray-600\">Les informations de l'institution sont pré-remplies selon votre invitation.</p>
                        <div class=\"mt-2 grid grid-cols-2 gap-4\">
                            <div>
                                <label class=\"block text-sm font-medium text-gray-700\">Nom de l'institution</label>
                                <div class=\"mt-1 p-2 bg-gray-100 rounded\">";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 76), "nom", [], "any", false, false, false, 76), "html", null, true);
            yield "</div>
                            </div>
                            <div>
                                <label class=\"block text-sm font-medium text-gray-700\">Adresse</label>
                                <div class=\"mt-1 p-2 bg-gray-100 rounded\">";
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 80), "adresse", [], "any", false, false, false, 80), "html", null, true);
            yield "</div>
                            </div>
                            <div>
                                <label class=\"block text-sm font-medium text-gray-700\">Téléphone</label>
                                <div class=\"mt-1 p-2 bg-gray-100 rounded\">";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 84), "telephone", [], "any", false, false, false, 84), "html", null, true);
            yield "</div>
                            </div>
                            <div>
                                <label class=\"block text-sm font-medium text-gray-700\">Email</label>
                                <div class=\"mt-1 p-2 bg-gray-100 rounded\">";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "institution", [], "any", false, false, false, 88), "courriel", [], "any", false, false, false, 88), "html", null, true);
            yield "</div>
                            </div>
                        </div>
                    </div>
                    ";
        }
        // line 93
        yield "                </div>

                <div class=\"section\">
                    <div class=\"section-header\">
                        <div class=\"section-number\">2</div>
                        <h2 class=\"section-title\">Informations personnelles</h2>
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 101
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "prenom", [], "any", false, false, false, 101), 'label');
        yield "
                        ";
        // line 102
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "prenom", [], "any", false, false, false, 102), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 103
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "prenom", [], "any", false, false, false, 103), 'errors');
        yield "
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 106
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "nom", [], "any", false, false, false, 106), 'label');
        yield "
                        ";
        // line 107
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "nom", [], "any", false, false, false, 107), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 108
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "nom", [], "any", false, false, false, 108), 'errors');
        yield "
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 111
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "courriel", [], "any", false, false, false, 111), 'label');
        yield "
                        ";
        // line 112
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "courriel", [], "any", false, false, false, 112), 'widget', ["attr" => ["class" => "form-control", "value" => ((        // line 115
($context["invitation"] ?? null)) ? (CoreExtension::getAttribute($this->env, $this->source, ($context["invitation"] ?? null), "email", [], "any", false, false, false, 115)) : (""))]]);
        // line 117
        yield "
                        ";
        // line 118
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "courriel", [], "any", false, false, false, 118), 'errors');
        yield "
                    </div>
                    <div class=\"form-group\">
                        ";
        // line 121
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "telephone", [], "any", false, false, false, 121), 'label');
        yield "
                        ";
        // line 122
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "telephone", [], "any", false, false, false, 122), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 123
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "telephone", [], "any", false, false, false, 123), 'errors');
        yield "
                    </div>
                    

                    <div class=\"form-group\">
                        ";
        // line 128
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "dateNaissance", [], "any", false, false, false, 128), 'label');
        yield "
                        ";
        // line 129
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "dateNaissance", [], "any", false, false, false, 129), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 130
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "dateNaissance", [], "any", false, false, false, 130), 'errors');
        yield "
                    </div>
                    
                    
                    <div class=\"form-group\">
                        ";
        // line 135
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "plainPassword", [], "any", false, false, false, 135), 'label');
        yield "
                        ";
        // line 136
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "plainPassword", [], "any", false, false, false, 136), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 137
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "plainPassword", [], "any", false, false, false, 137), 'errors');
        yield "
                    </div>
                    <div class=\"agree-terms\">
                        ";
        // line 140
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "agreeTerms", [], "any", false, false, false, 140), 'label');
        yield "
                        ";
        // line 141
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "agreeTerms", [], "any", false, false, false, 141), 'widget', ["attr" => ["class" => "form-control"]]);
        yield "
                        ";
        // line 142
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "agreeTerms", [], "any", false, false, false, 142), 'errors');
        yield "
                    </div>
                    <div class=\"submit-area\">
                        ";
        // line 145
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "save", [], "any", false, false, false, 145), 'widget');
        yield "
                    </div>
                </div>
            </div>

            ";
        // line 151
        yield "            ";
        if (($context["invitation"] ?? null)) {
            // line 152
            yield "                ";
            // line 153
            yield "                ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionNom", [], "any", false, false, false, 153), 'widget', ["attr" => ["style" => "display: none;"]]);
            yield "
                ";
            // line 154
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionAdresse", [], "any", false, false, false, 154), 'widget', ["attr" => ["style" => "display: none;"]]);
            yield "
                ";
            // line 155
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionTelephone", [], "any", false, false, false, 155), 'widget', ["attr" => ["style" => "display: none;"]]);
            yield "
                ";
            // line 156
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["registrationForm"] ?? null), "institutionCourriel", [], "any", false, false, false, 156), 'widget', ["attr" => ["style" => "display: none;"]]);
            yield "
            ";
        }
        // line 158
        yield "            

            ";
        // line 161
        yield "            ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(($context["registrationForm"] ?? null), 'rest', ["render" => false]);
        yield "

            ";
        // line 163
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["registrationForm"] ?? null), 'form_end');
        yield "
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
        return "inscription/inscription.html.twig";
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
        return array (  399 => 163,  393 => 161,  389 => 158,  384 => 156,  380 => 155,  376 => 154,  371 => 153,  369 => 152,  366 => 151,  358 => 145,  352 => 142,  348 => 141,  344 => 140,  338 => 137,  334 => 136,  330 => 135,  322 => 130,  318 => 129,  314 => 128,  306 => 123,  302 => 122,  298 => 121,  292 => 118,  289 => 117,  287 => 115,  286 => 112,  282 => 111,  276 => 108,  272 => 107,  268 => 106,  262 => 103,  258 => 102,  254 => 101,  244 => 93,  236 => 88,  229 => 84,  222 => 80,  215 => 76,  208 => 71,  202 => 68,  198 => 67,  194 => 66,  188 => 63,  184 => 62,  180 => 61,  174 => 58,  170 => 57,  166 => 56,  160 => 53,  156 => 52,  152 => 51,  149 => 50,  147 => 49,  138 => 42,  132 => 39,  127 => 37,  123 => 36,  119 => 35,  115 => 34,  110 => 31,  108 => 30,  91 => 16,  84 => 12,  81 => 11,  71 => 10,  62 => 166,  60 => 10,  53 => 6,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "inscription/inscription.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\inscription\\inscription.html.twig");
    }
}
