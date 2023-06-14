<?php

namespace AgSoftware\ThankYouPage\Block;

use Magento\Framework\View\Element\Template;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Catalog\Helper\Image as ImageHelper;

class SuccessSummary extends Template
{
    protected $_checkoutSession;
    protected $_imageHelper;

    public function __construct(
        Template\Context $context,
        CheckoutSession $checkoutSession,
        ImageHelper $imageHelper,
        array $data = []
    ) {
        $this->_checkoutSession = $checkoutSession;
        $this->_imageHelper = $imageHelper;
        parent::__construct($context, $data);
    }

    public function getOrderData()
    {
        $order = $this->_checkoutSession->getLastRealOrder();
        $orderItems = [];

        foreach ($order->getAllVisibleItems() as $item) {
            $product = $item->getProduct();
            $orderItems[] = [
                'product_url' => $product->getProductUrl(),
                'name' => $product->getName(),
                'sku' => $product->getSku(),
                'price' => $item->getPrice(),
                'qty' => $item->getQtyOrdered(),
                'subtotal' => $item->getRowTotal(),
                'image_url' => $this->getImageUrl($product),
                'version' => $product->getData('version'),
                'type' => $product->getTypeId(),
            ];
        }

        return $orderItems;
    }

    public function getOrderSubtotal()
    {
        $order = $this->_checkoutSession->getLastRealOrder();
        return $order->getSubtotal();
    }

    public function getOrderTotal()
    {
        $order = $this->_checkoutSession->getLastRealOrder();
        return $order->getGrandTotal();
    }

    public function getOrderNumber()
    {
        $order = $this->_checkoutSession->getLastRealOrder();
        $orderNumber = $order->getIncrementId();
        return ltrim($orderNumber, '0');
    }

    public function getShippingCost()
    {
        $order = $this->_checkoutSession->getLastRealOrder();
        return $order->getShippingAmount();
    }

    protected function getImageUrl($product)
    {
        $image = $product->getImage();
        if ($image) {
            $imageUrl = $this->_imageHelper->init($product, 'product_thumbnail')
                ->setImageFile($image)
                ->resize(165, 165)
                ->getUrl();
            return $imageUrl;
        } else {
            return $this->getViewFileUrl('Magento_Catalog::images/product/placeholder/thumbnail.jpg');

        }
    }
}
