<?php
/**
 * Page
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\HelloWorld\Model;


class Page extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('AHT\HelloWorld\Model\ResourceModel\Page');
    }
}
