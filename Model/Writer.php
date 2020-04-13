<?php
namespace Kaz\BookWriters\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Class Writer
 * @package Kaz\BookWriters\Model
 */
class Writer extends AbstractModel
{
    /**
     * {@inheritDoc}
     */
    protected function _construct()
    {
        $this->_init('Kaz\BookWriters\Model\ResourceModel\Writers');
    }
}
