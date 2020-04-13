<?php

namespace Kaz\BookWriters\Controller\Adminhtml\Writers;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Kaz\BookWriters\Model\WriterFactory
     */
    protected $writerFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Kaz\BookWriters\Model\WriterFactory $writerFactory
    ) {
        parent::__construct($context);
        $this->writerFactory = $writerFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        if (!$data) {
            $this->_redirect->getRedirectUrl();
            return;
        }

        try {
            $modelFactory = $this->writerFactory->create();
            if (array_key_exists('id', $data)) {
                $modelFactory->load($data["id"]);
                $modelFactory->setData('name', $data['name']);
                $modelFactory->setData('book_name', $data['book_name']);
                $modelFactory->save();
                $this->messageManager->addSuccess(__('Row data has been Edited successfully.'));
            } else {
                $modelFactory->setData($data);
                $modelFactory->save();
                $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->_redirect($this->_redirect->getRedirectUrl());
    }
}
