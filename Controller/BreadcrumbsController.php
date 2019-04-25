<?php

namespace Monolith\Module\Breadcrumbs\Controller;

use Monolith\Bundle\CMSBundle\Annotation\NodePropertiesForm;
use Monolith\Bundle\CMSBundle\Entity\Node;
use Smart\CoreBundle\Controller\Controller;
use Monolith\Bundle\CMSBundle\Module\NodeTrait;
use Symfony\Component\HttpFoundation\Response;

class BreadcrumbsController extends Controller
{
    use NodeTrait;

    /**
     * @param Node   $node
     * @param string $delimiter
     * @param bool   $hide_if_only_home      Скрыть "хлебные крошки", если выбрана корневая папка.
     * @param null   $css_class
     *
     * @return Response
     *
     * @NodePropertiesForm("NodePropertiesFormType")
     */
    public function indexAction(Node $node, $delimiter = '&raquo;', $hide_if_only_home = false, $css_class = null): Response
    {
        return $this->render('@BreadcrumbsModule/breadcrumbs.html.php', [
            'css_class' => $css_class,
            'delimiter' => $delimiter,
            'items'     => $this->get('cms.breadcrumbs'),
            'hide_if_only_home' => $hide_if_only_home,
        ]);
    }
}
