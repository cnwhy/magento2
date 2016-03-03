<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Wishlist\Block;

/**
 * Wishlist js plugin initialization block
 */
class AddToWishlist extends \Magento\Framework\View\Element\Template
{
    /**
     * Product types
     *
     * @var array|null
     */
    protected $_productTypes;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Returns wishlist widget options
     *
     * @return array
     */
    public function getWishlistOptions()
    {
        return ['productType' => $this->_getProductTypes()];
    }

    protected function _getProductTypes()
    {

        if($this->_productTypes === null) {
            $this->_productTypes = [];
            $block = $this->getLayout()->getBlock('category.products.list');
            if ($block) {
                $productCollection = $block->getLoadedProductCollection();
                /** @var $product \Magento\Catalog\Model\Product */
                foreach ($productCollection as $product) {
                    $productTypes[] = $product->getTypeId();
                }
                $this->_productTypes = array_unique($productTypes);
            }
        }
        return $this->_productTypes;
    }

    protected function _toHtml()
    {
        if(!$this->_getProductTypes()){
            return '';
        }
        return parent::_toHtml();
    }
}
