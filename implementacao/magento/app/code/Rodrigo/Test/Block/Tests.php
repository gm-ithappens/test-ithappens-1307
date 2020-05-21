<?php
namespace Rodrigo\Test\Block;

class Tests extends \Magento\Framework\View\Element\Template
{
    protected $_productRepository;
		
	public function __construct(
		\Magento\Backend\Block\Template\Context $context,		
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockItemRepository,
		array $data = []
	)
	{
        $this->stockItemRepository = $stockItemRepository;
        $this->_productRepository = $productRepository;
		parent::__construct($context, $data);
	}
	
	public function getProductBySku($sku)
	{
		return $this->_productRepository->get($sku);
    }

    public function getStockItemBySku($sku)
    {
        return $this->stockItemRepository->getStockItemBySku($sku);
    }
}
?>