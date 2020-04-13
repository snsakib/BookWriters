<?php
namespace Kaz\BookWriters\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Writers
 * @package Kaz\BookWriters\Model\ResourceModel
 */
class Writers extends AbstractDb
{
    /**
     * {@inheritDoc}
     */
    protected function _construct()
    {
        $this->_init('book_writers','id'); //Table name, Primary Field name
    }
}
