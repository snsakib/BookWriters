<?php
namespace Kaz\BookWriters\Ui\Component\DataProvider;

use Kaz\BookWriters\Model\ResourceModel\BookWriters\CollectionFactory;

/**
 * Class Writers
 * @package Kaz\BookWriters\Ui\Component\DataProvider
 */
class Writers extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $writersCollectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $writersCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $writersCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return [];
    }
}
