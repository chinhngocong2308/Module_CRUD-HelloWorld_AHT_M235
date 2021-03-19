<?php
/**
 * Delete
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\Post\Controller\Post;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use AHT\Post\Helper\CacheFlush;
use AHT\Post\Model\PostFactory;


class Delete extends \Magento\Framework\App\Action\Action
{
    protected $cacheFlush;
    protected $postFactory;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CacheFlush $cacheFlush,
        PostFactory $postFactory
    )
    {
        $this->cacheFlush = $cacheFlush;
        $this->postFactory = $postFactory;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $postId = (int)$this->getRequest()->getParam('post_id');
        $deletePost = $this->postFactory->create()->load($postId);
        try {
            $deletePost->delete();
            $this->messageManager->addSuccessMessage(__('Delete successfully !'));
        } catch (LocalizedException $exception) {
            $this->messageManager->addSuccessMessage(__('Delete failed !'));
        }
        $this->cacheFlush->flushCache();
        return $this->_redirect('aht_post_demo/post/index');
    }
}
