<?php

namespace AHT\HelloWorld\Block;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
class Index extends \Magento\Framework\View\Element\Template
{
    protected $collectionFactory;
    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

//    public function getProduct()
//    {
//        $productCollection = $this->collectionFactory->create();
//        return $productCollection;
//    }
    public function getTitle()
    {
        return __('HelloWorld!');
    }
}
?>
