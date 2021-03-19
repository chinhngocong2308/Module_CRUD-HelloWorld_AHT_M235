<?php
/**
 * Delete
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\HelloWorld\Controller\Adminhtml\Page;

use Magento\Backend\App\Action;
use AHT\HelloWorld\Model\ResourceModel\Page\CollectionFactory;
use AHT\HelloWorld\Model\PageFactory;
use Magento\Ui\Component\MassAction\Filter;

class Delete extends Action
{
    private $pageFactory;
    private $filter;
    private $collectionFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        Filter $filter,
        CollectionFactory $collectionFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $total = 0;
        $err = 0;
        foreach ($collection->getItems() as $item) {
            $deletePost = $this->pageFactory->create()->load($item->getData('page_id'));
            try {
                $deletePost->delete();
                $total++;
            } catch (LocalizedException $exception) {
                $err++;
            }
        }

        if ($total) {
            $this->messageManager->addSuccessMessage(
                __('A total of %1 record(s) have been deleted.', $total)
            );
        }

        if ($err) {
            $this->messageManager->addErrorMessage(
                __(
                    'A total of %1 record(s) haven\'t been deleted. Please see server logs for more details.',
                    $err
                )
            );
        }
        return $this->_redirect('aht_helloworld/page/index');
    }
}

