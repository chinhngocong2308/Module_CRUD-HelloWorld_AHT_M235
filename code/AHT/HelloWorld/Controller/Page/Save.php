<?php

namespace AHT\HelloWorld\Controller\Page;

use Magento\Framework\App\Action\Context;
use AHT\HelloWorld\Model\PageFactory;


/**
 * Save
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

class Save extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $model = $this->pageFactory->create();
        $model->setData('name', 'Chinh Ngo Cong');
        $model->setData('page_content', 'Test Model In Magento2 debug');
        $model->setData('status', '1');
        $model->save();
    }
}

