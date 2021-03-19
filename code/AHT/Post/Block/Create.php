<?php
/**
 * Create
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\Post\Block;

use Magento\Framework\View\Element\Template;

class Create extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}
