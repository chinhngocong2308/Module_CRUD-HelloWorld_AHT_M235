<?php
/**
 * Save
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\Post\Controller\Post;


use Magento\Framework\App\Action\Context;
use AHT\Post\Model\PostFactory;
use AHT\Post\Helper\CacheFlush;


class Save extends \Magento\Framework\App\Action\Action
{
    protected $postFactory;
    protected $cacheFlush;

    public function __construct(Context $context, CacheFlush $cacheFlush, PostFactory $postFactory)
    {
        $this->cacheFlush = $cacheFlush;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }


    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $model = $this->postFactory->create();
        $model->addData($data);
        $model->save();
        $this->messageManager->addSuccessMessage(__('Save successfully !'));
        $this->cacheFlush->flushCache();
        $this->_redirect('aht_post_demo/post/index');
    }
}
