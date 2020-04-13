<?php
namespace Kaz\BookWriters\Model\ResourceModel\BookWriters;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Kaz\BookWriters\Model\ResourceModel\BookWriters
 */
class Collection extends AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            'Kaz\BookWriters\Model\Writer',
            'Kaz\BookWriters\Model\ResourceModel\Writers'
        );
    }
}
