<?php
namespace Lime\Sample\Plugin;

use Magento\Framework\Data\Tree\NodeFactory;

class AddHomeToTopmenu
{
    protected $nodeFactory;

    public function __construct(
        NodeFactory $nodeFactory
    ) {
        $this->nodeFactory = $nodeFactory;
    }

    public function beforeGetHtml(
        \Magento\Theme\Block\Html\Topmenu $subject,
        $outermostClass = '',
        $childrenWrapClass = '',
        $limit = 0
    ) {
        $node = $this->nodeFactory->create(
            [
                'data' => [
                    'name' => __('Home'),
                    'id' => 'home',
                    'url' => '/',
                    'is_active' => false
                ],
                'idField' => 'id',
                'tree' => $subject->getMenu()->getTree()
            ]
        );
        $subject->getMenu()->addChild($node);
        return [$outermostClass, $childrenWrapClass, $limit];
    }
}
