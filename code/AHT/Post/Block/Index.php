<?php
/**
 * Index
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\Post\Block;


use Magento\Framework\View\Element\Template;
use AHT\Post\Model\ResourceModel\Post\Collection;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $postCollection;


    public function __construct(
        Template\Context $context,
        array $data = [],
        Collection $postCollection
    )
    {
        $this->postCollection = $postCollection;
        parent::__construct($context, $data);
    }
    public function getAllPosts()
    {
        return $this->postCollection;
    }
}
