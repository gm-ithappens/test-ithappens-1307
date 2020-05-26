<?php

namespace ItHappens\ClaudioPablo\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Backend\Block\Template\Context;
use \Magento\Catalog\Api\ProductRepositoryInterface;
use \Magento\CatalogInventory\Model\Stock\StockItemRepository;


class Test extends Template
{

    protected $productRepository;
    protected $stokProduct;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productrepository,
        StockItemRepository $stokproduct,
        array $data = [])
    {
        $this->productRepository = $productrepository;
        $this->stokProduct = $stokproduct;
        parent::__construct($context, $data);
    }

    public function getProductDataUsingSku($sku)
    {
        return $this->productRepository->get($sku);
    }

    public function getProductImage($product)
    {
        return $this->getUrl('pub/media/catalog') . 'product' . $product->getImage();
    }

    public function getProductStock($idProduct)
    {
        return $this->stokProduct->get($idProduct)->getQty();
    }

    public function getMyName()
    {
        return "Claudio Pablo Silva Santos";
    }
}
