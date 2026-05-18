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

/* invitation/new.html.twig */
class __TwigTemplate_4904a412ed62f86417b32428af2d24dd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "invitation/new.html.twig"));

        // line 1
        yield from $this->loadTemplate("haut_de_page/haut_de_page.html.twig", "invitation/new.html.twig", 1)->unwrap()->yield($context);
        // line 2
        yield "
";
        // line 3
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 7
        yield "
";
        // line 8
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 167
        yield "
";
        // line 168
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
        yield "    <script src=\"https://cdn.tailwindcss.com\"></script>
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\" rel=\"stylesheet\">
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 9
        yield "<div class=\"bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen\">
    <div class=\"container mx-auto px-4 py-8 max-w-6xl\">
        <!-- Header -->
        <div class=\"mb-8\">
            <h1 class=\"text-4xl font-bold text-gray-900 mb-2 flex items-center\">
                <i class=\"fas fa-paper-plane text-blue-600 mr-4\"></i>
                Gestion des Invitations
            </h1>
            <p class=\"text-gray-600 text-lg\">Envoyez et gérez vos invitations d'accès à la plateforme</p>
        </div>

        <div class=\"grid lg:grid-cols-2 gap-8\">
            <!-- Formulaire d'invitation -->
            <div class=\"bg-white rounded-3xl shadow-2xl p-8 border border-gray-100 hover:shadow-3xl transition-shadow duration-300\">
                ";
        // line 23
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_start', ["attr" => ["class" => "space-y-6"]]);
        yield "
                
                <!-- Email Field -->
                <div class=\"space-y-3\">
                    ";
        // line 27
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 27), 'label', ["label_attr" => ["class" => "block text-sm font-semibold text-gray-700 mb-2"], "label" => "Adresse email du destinataire"]);
        // line 29
        yield "
                    <div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none\">
                            <i class=\"fas fa-envelope text-gray-400\"></i>
                        </div>
                        ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 34), 'widget', ["attr" => ["class" => "w-full pl-12 pr-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 text-lg", "placeholder" => "exemple@email.com"]]);
        // line 39
        yield "
                    </div>
                    ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "email", [], "any", false, false, false, 41), 'errors');
        yield "
                </div>

                <!-- Institution Field -->
                <div class=\"space-y-3\">
                    ";
        // line 46
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "institution", [], "any", false, false, false, 46), 'label', ["label_attr" => ["class" => "block text-sm font-semibold text-gray-700 mb-2"], "label" => "Institution"]);
        // line 48
        yield "
                    <div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none\">
                            <i class=\"fas fa-building text-gray-400\"></i>
                        </div>
                        ";
        // line 53
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "institution", [], "any", false, false, false, 53), 'widget', ["attr" => ["class" => "w-full pl-12 pr-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 text-lg"]]);
        // line 57
        yield "
                    </div>
                    <div class=\"bg-blue-50 border border-blue-200 rounded-xl p-3 mt-2\">
                        <p class=\"text-sm text-blue-700 flex items-center\">
                            <i class=\"fas fa-info-circle mr-2\"></i>
                            L'invitation sera associée à cette institution
                        </p>
                    </div>
                    ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "institution", [], "any", false, false, false, 65), 'errors');
        yield "
                </div>

                <!-- Token Field -->
                <div class=\"space-y-3\">
                    ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "token", [], "any", false, false, false, 70), 'label', ["label_attr" => ["class" => "block text-sm font-semibold text-gray-700 mb-2"], "label" => "Token"]);
        // line 72
        yield "
                    <div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none\">
                            <i class=\"fas fa-key text-gray-400\"></i>
                        </div>
                        ";
        // line 77
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "token", [], "any", false, false, false, 77), 'widget', ["attr" => ["class" => "w-full pl-12 pr-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 text-lg", "readonly" => true]]);
        // line 82
        yield "
                    </div>
                    ";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "token", [], "any", false, false, false, 84), 'errors');
        yield "
                </div>                
                
                <!-- Expiration Date Field -->
                <div class=\"space-y-3\">
                    ";
        // line 89
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "expiresAt", [], "any", false, false, false, 89), 'label', ["label_attr" => ["class" => "block text-sm font-semibold text-gray-700 mb-2"], "label" => "Expire le : "]);
        // line 91
        yield "
                    <div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none\">
                            <i class=\"fas fa-calendar-alt text-gray-400\"></i>
                        </div>
                        ";
        // line 96
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "expiresAt", [], "any", false, false, false, 96), 'widget', ["attr" => ["class" => "w-full pl-12 pr-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 text-lg"]]);
        // line 100
        yield "
                    </div>
                    ";
        // line 102
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 102), "value", [], "any", false, false, false, 102), "expiresAt", [], "any", false, false, false, 102)) {
            // line 103
            yield "                        <p class=\"text-sm text-gray-500 mt-1\">
                            Expiration: ";
            // line 104
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, false, false, 104), "value", [], "any", false, false, false, 104), "expiresAt", [], "any", false, false, false, 104), "d/m/Y H:i"), "html", null, true);
            yield "
                        </p>
                    ";
        }
        // line 107
        yield "                    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "expiresAt", [], "any", false, false, false, 107), 'errors');
        yield "
                </div>                  
                
                <!-- Invited By Field -->
                <div class=\"space-y-3\">
                    ";
        // line 112
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "invitedBy", [], "any", false, false, false, 112), 'label', ["label_attr" => ["class" => "block text-sm font-semibold text-gray-700 mb-2"], "label" => "Invité par : "]);
        // line 114
        yield "
                    <div class=\"relative\">
                        <div class=\"absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none\">
                            <i class=\"fas fa-user text-gray-400\"></i>
                        </div>
                        ";
        // line 119
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "invitedBy", [], "any", false, false, false, 119), 'widget', ["attr" => ["class" => "w-full pl-12 pr-4 py-4 border border-gray-300 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-gray-400 text-lg"]]);
        // line 123
        yield "
                    </div>
                    ";
        // line 125
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "invitedBy", [], "any", false, false, false, 125), 'errors');
        yield "
                </div>

                <!-- Submit Button -->
                <div class=\"pt-4\">
                    <button 
                        type=\"submit\" 
                        class=\"w-full bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-white py-4 px-8 rounded-2xl font-bold text-lg hover:from-blue-700 hover:via-blue-800 hover:to-blue-900 transform hover:scale-[1.02] transition-all duration-300 shadow-xl hover:shadow-2xl flex items-center justify-center\"
                    >
                        <i class=\"fas fa-paper-plane mr-3\"></i>
                        Envoyer l'invitation
                    </button>
                </div>

                ";
        // line 139
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock(($context["form"] ?? null), 'form_end');
        yield "
            </div>
        </div>
    </div>
</div>

";
        // line 145
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", ["success"], "method", false, false, false, 145)) {
            // line 146
            yield "    <div class=\"fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-2xl shadow-lg z-50\" x-data=\"{ show: true }\" x-show=\"show\" x-init=\"setTimeout(() => show = false, 5000)\">
        <div class=\"flex items-center\">
            <i class=\"fas fa-check-circle mr-2\"></i>
            ";
            // line 149
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", ["success"], "method", false, false, false, 149));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 150
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 152
            yield "        </div>
    </div>
";
        }
        // line 155
        yield "
";
        // line 156
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", ["error"], "method", false, false, false, 156)) {
            // line 157
            yield "    <div class=\"fixed top-4 right-4 bg-red-500 text-white px-6 py-4 rounded-2xl shadow-lg z-50\" x-data=\"{ show: true }\" x-show=\"show\" x-init=\"setTimeout(() => show = false, 5000)\">
        <div class=\"flex items-center\">
            <i class=\"fas fa-exclamation-circle mr-2\"></i>
            ";
            // line 160
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "flashes", ["error"], "method", false, false, false, 160));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 161
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 163
            yield "        </div>
    </div>
";
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 168
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 169
        yield "    <script src=\"https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js\" defer></script>
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
                notification.innerHTML = '<i class=\"fas fa-check mr-2\"></i>Token copié !';
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.remove();
                }, 2000);
            });
        }
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
        return "invitation/new.html.twig";
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
        return array (  344 => 169,  334 => 168,  323 => 163,  314 => 161,  310 => 160,  305 => 157,  303 => 156,  300 => 155,  295 => 152,  286 => 150,  282 => 149,  277 => 146,  275 => 145,  266 => 139,  249 => 125,  245 => 123,  243 => 119,  236 => 114,  234 => 112,  225 => 107,  219 => 104,  216 => 103,  214 => 102,  210 => 100,  208 => 96,  201 => 91,  199 => 89,  191 => 84,  187 => 82,  185 => 77,  178 => 72,  176 => 70,  168 => 65,  158 => 57,  156 => 53,  149 => 48,  147 => 46,  139 => 41,  135 => 39,  133 => 34,  126 => 29,  124 => 27,  117 => 23,  101 => 9,  91 => 8,  81 => 4,  71 => 3,  63 => 168,  60 => 167,  58 => 8,  55 => 7,  53 => 3,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "invitation/new.html.twig", "C:\\Users\\halat\\OneDrive\\Desktop\\Formatech_\\templates\\invitation\\new.html.twig");
    }
}
