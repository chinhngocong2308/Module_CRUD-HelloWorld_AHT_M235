<?php
/**
 * Save
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\HelloWorld\Controller\Adminhtml\Page;

use Magento\Backend\App\Action;
use AHT\HelloWorld\Model\PageFactory;

class Save extends \Magento\Backend\App\Action
{
    protected $pageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory
    )
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $id = !empty($data['page_id']) ? $data['page_id'] : null;

        $newData = [
            'name' => $data['name'],
            'status' => $data['status'],
            'page_content' => $data['page_content'],
        ];

        $post = $this->pageFactory->create();
        try {
            $post->addData($newData);
            $post->save();
            return $this->_redirect('aht_helloworld/page/index');
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage(__('Save failed !'));
        }
        if ($id) {
            $post->load($id);
            $this->getMessageManager()->addSuccessMessage(__('Edit Successfully !'));
        } else {
            $this->getMessageManager()->addSuccessMessage(__('Save Successfully.'));
        }
    }
}
