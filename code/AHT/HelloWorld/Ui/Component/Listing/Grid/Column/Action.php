<?php
/**
 * Action
 *
 * @copyright Copyright © 2021 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace AHT\HelloWorld\Ui\Component\Listing\Grid\Column;

use Magento\Ui\Component\Listing\Columns\Column;

class Action extends Column
{
    public function prepareDataSource(array $dataSource)
    {
        $obj = \Magento\Framework\App\ObjectManager::getInstance();
        $store = $obj->create('\Magento\Store\Model\StoreManagerInterface');
        $url = $store->getStore()->getBaseUrl();
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')] = [
                    'edit' => [
                        'href' => $url.'admin/aht_helloworld/page/add/id/'.$item["page_id"],
                        'label' => __('Edit')
                    ]
                ];
            }
        }

        return $dataSource;
    }

}
