<?php

/* FooBarBundle:Default:index.html.twig */
class __TwigTemplate_80b58ed8d1873d85001d2d7e48e42030 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        $context = array_merge($this->env->getGlobals(), $context);

        // line 1
        echo "Hello ";
        echo twig_escape_filter($this->env, $this->getContext($context, 'name'), "html");
        echo "!
";
    }

    public function getTemplateName()
    {
        return "FooBarBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
