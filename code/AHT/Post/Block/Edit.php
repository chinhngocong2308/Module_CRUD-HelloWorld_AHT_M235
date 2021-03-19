<?php
/**
 * Edit
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\Post\Block;


use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Result\PageFactory;
use AHT\Post\Model\PostFactory;
use Magento\Framework\Data\Form\FormKey;

class Edit extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Template\Context $context,
        array $data = [],
        PageFactory $pageFactory,
        PostFactory $postFactory,
        FormKey $formKey
    )
    {
        $this->formKey = $formKey;
        $this->postFactory = $postFactory;
        $this->pageFactory = $pageFactory;
        parent::__construct($context, $data);
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    public function getPost()
    {
        $postId = (int)$this->getRequest()->getParam('post_id');
        $post = $this->postFactory->create()->load($postId);
        return $post;
    }
}
