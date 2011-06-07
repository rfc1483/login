<?php

/* AcmeLoginBundle:Default:public.html.twig */
class __TwigTemplate_0f74c5f9b33dbce6bc3802b1b6df274b extends Twig_Template
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

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>This is a public zone.</h1>
";
    }

    public function getTemplateName()
    {
        return "AcmeLoginBundle:Default:public.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
