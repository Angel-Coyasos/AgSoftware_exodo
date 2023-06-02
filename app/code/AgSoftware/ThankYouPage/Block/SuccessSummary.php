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
            ];
        }

        return $orderItems;
    }

    protected function getImageUrl($product)
    {
        $image = $this->_imageHelper->init($product, 'product_thumbnail')
            ->setImageFile($product->getFile())
            ->resize(50, 50)
            ->getUrl();

        return $image;
    }
}
