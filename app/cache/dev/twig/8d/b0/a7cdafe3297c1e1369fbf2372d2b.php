<?php

/* AcmeLoginBundle:Secured:index.html.twig */
class __TwigTemplate_8db0a7cdafe3297c1e1369fbf2372d2b extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    public function getParent(array $context)
    {
        if (null === $this->parent) {
            $this->parent = $this->env->loadTemplate("AcmeLoginBundle:Secured:layout.html.twig");
        }

        return $this->parent;
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <h1>This is AAA secured!</h1>
";
    }

    public function getTemplateName()
    {
        return "AcmeLoginBundle:Secured:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
