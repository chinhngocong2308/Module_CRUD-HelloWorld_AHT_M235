<?php
/**
 * Create
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\Post\Controller\Post;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Create extends \Magento\Framework\App\Action\Action
{
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute() {
        $resultPage = $this->pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Create Demo Page '));
        return $resultPage;
    }
}
