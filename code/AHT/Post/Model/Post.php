<?php
/**
 * Post
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\Post\Model;


class Post extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('AHT\Post\Model\ResourceModel\Post');
    }
}
