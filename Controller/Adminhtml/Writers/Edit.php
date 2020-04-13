<?php
namespace Kaz\BookWriters\Controller\Adminhtml\Writers;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

class Edit extends Action
{
    const ADMIN_RESOURCE = 'Kaz_BookWriters::post';

    /**
     * @var \Kaz\BookWriters\Model\Writer
     */
    private $writerDetails;

    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Edit constructor.
     * @param Context $context
     * @param Registry $coreRegistry
     * @param \Kaz\BookWriters\Model\Writer $writerDetails
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        \Kaz\BookWriters\Model\Writer $writerDetails
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->writerDetails = $writerDetails;
    }

    /**
     * @return {@inheritDoc}
     */
    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');
        if ($rowId) {
            $this->writerDetails = $this->writerDetails->load($rowId);
            $rowTitle = $this->writerDetails->getTitle();
            if (!$this->writerDetails->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('bookwriters/writers/index');
                return;
            }
        }

        $this->coreRegistry->register('row_data', $this->writerDetails);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit Writer') . $rowTitle : __('Add Writer');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
