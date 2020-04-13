<?php

namespace Kaz\BookWriters\Block\Adminhtml\Writers\Edit;

use Kaz\BookWriters\Model\ResourceModel\BookWriters\CollectionFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;

class Form extends Generic
{
    /**
     * @var CollectionFactory
     */
    protected $writerModel;

    /**
     * Form constructor.
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param CollectionFactory $writerModel
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        CollectionFactory $writerModel,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
        $this->writerModel = $writerModel;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form',
                'action' => $this->getData('action'),
                'method' => 'post'
            ]
            ]
        );
        $form->setHtmlIdPrefix('book_writers_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Writer Information'), 'class' => 'fieldset-wide']
        );
        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }

        $fieldset->addField(
            'book_name',
            'text',
            [
                'name' => 'book_name',
                'label' => __('Book Name'),
                'title' => __('Book Name'),
                'id' => 'book_name',
                'class' => 'required-entry',
                'required' => true
            ]
        );

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Writer Name'),
                'title' => __('Writer Name'),
                'id' => 'name',
                'class' => 'required-entry',
                'required' => true
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
