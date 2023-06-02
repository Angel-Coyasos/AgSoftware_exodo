<?php

namespace AgSoftware\ThankYouPage\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Psr\Log\LoggerInterface;
use Magento\Framework\View\LayoutInterface;

class OrderObserver implements ObserverInterface
{
    protected $logger;
    protected $layout;

    public function __construct(LoggerInterface $logger, LayoutInterface $layout)
    {
        $this->logger = $logger;
        $this->layout = $layout;
    }

    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();

        // Obtener los datos de la orden
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

        // Pasar los datos al bloque de plantilla
        $block = $this->layout->getBlock('success.summary');

        if ($block) {
            $block->setData('product_data', $orderItems);
        }

        // Log de los datos
        $this->logger->debug('Order Items ANGEL:', $orderItems);
    }

    protected function getImageUrl($product)
    {
        // Lógica para obtener la URL de la imagen del producto
        return $product->getImageUrl();
    }
    
}
