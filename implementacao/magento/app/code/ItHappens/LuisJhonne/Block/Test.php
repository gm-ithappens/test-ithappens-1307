<?php
namespace ItHappens\LuisJhonne\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use \Magento\Catalog\Model\ProductFactory;
use Magento\CatalogInventory\Model\Stock\StockItemRepository;
use \Magento\Catalog\Helper\Image;

class Test extends Template
{
    protected $_productCollectionFactory;
    protected $_productFactory;
    protected $_stockItemRepository;
    protected $_imageHelper;

    public function __construct(
        Context $context, 
        ProductCollectionFactory $productCollectionFactory,
        ProductFactory $productFactory,
        StockItemRepository $stockItemRepository,
        Image $imageHelper,
        array $data = [])
	{
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_productFactory = $productFactory;
        $this->_stockItemRepository = $stockItemRepository;
        $this->_imageHelper = $imageHelper;
		parent::__construct($context, $data);
    }
    
    public function getMyName()
    {
        return "Luis Jhonne Carvalhal de Melo";
    }

    public function getAllProducts()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addWebsiteFilter();
        $collection->addStoreFilter();
        $collection->setPageSize(3);
        return $collection;
    }
    
    public function getProductDetail()
    {        
        $product = $this->_productFactory->create()->load(1);
        return $product;
    }

    public function getStockProduct($productId = null)
    {
        if (empty($productId))
        {
            return "N/A";
        }
        $stock = $this->_stockItemRepository->get($productId);
        return $stock->getQty();
    }

    public function getUrlImage($product = null)
    {
        if (empty($product))
        {
            return null;
        }
        $url = $this->_imageHelper->init($product, 'product_base_image')->getUrl();
        return $url;
    }
}