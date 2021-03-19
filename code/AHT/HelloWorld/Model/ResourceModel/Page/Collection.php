<?php
/**
 * Collection
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\HelloWorld\Model\ResourceModel\Page;


class Collection extends  \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'page_id';

    protected function _construct()
    {
        $this->_init('AHT\HelloWorld\Model\Page', 'AHT\HelloWorld\Model\ResourceModel\Page');
    }
}
