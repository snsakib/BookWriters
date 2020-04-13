<?php

namespace Kaz\BookWriters\Controller\Adminhtml\Writers;

/**
 * Class Index
 * @package Digired\ComplainManager\Controller\Adminhtml\Source
 */
class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Kaz_BookWriters::bookwriters';

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu(self::ADMIN_RESOURCE);
        $title = __('Book Writers');
        $this->_view->getPage()->getConfig()->getTitle()->prepend($title);
        $this->_addBreadcrumb($title, $title);
        $this->_view->renderLayout();
    }
}
