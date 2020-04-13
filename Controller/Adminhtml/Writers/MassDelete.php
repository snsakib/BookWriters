<?php

namespace Kaz\BookWriters\Controller\Adminhtml\Writers;

use Magento\Backend\App\Action\Context;

/**
 * Class MassDelete
 * @package Kaz\BookWriters\Controller\Adminhtml\Writers
 */
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var \Kaz\BookWriters\Model\Writer
     */
    protected $writers;

    /**
     * MassDelete constructor.
     * @param Context $context
     * @param \Kaz\BookWriters\Model\Writer $writers
     */
    public function __construct(
        Context $context,
        \Kaz\BookWriters\Model\Writer $writers
    ) {
        $this->writers= $writers;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            $this->_redirect->getRedirectUrl();
            return;
        }

        try {
            foreach ($data as $allData) {
                $RequestData = $this->writers->load($allData);
                $RequestData->delete();
            }
            $this->messageManager->addSuccess(__('Data deleted successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->_redirect($this->_redirect->getRedirectUrl());
    }

    /**
     * Check delete Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Kaz_BookWriters::bookwriters');
    }
}
