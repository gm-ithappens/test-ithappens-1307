<?php

namespace ItHappens\AlissonGomes\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Helper\Image;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Test
 * @package ItHappens\AlissonGomes\Block
 */
class Test extends Template
{

    /**
     * @var ProductRepository
     */
    protected $productRepository;
    /**
     * @var Image
     */
    protected $imageHelper;

    /**
     * Test constructor.
     * @param Context $context
     * @param ProductRepository $productRepository
     * @param Image $imageHelper
     */
    public function __construct(
        Context $context,
        ProductRepository $productRepository,
        Image $imageHelper

    ) {
        parent::__construct($context);
        $this->productRepository = $productRepository;
        $this->imageHelper = $imageHelper;
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function test()
    {
        return __('Alisson Gomes');
    }

    /**
     * @param int|null $id
     * @return \Magento\Catalog\Api\Data\ProductInterface|mixed|string
     */
    public function getProductById(int $id = null)
    {
        try {
            return $this->productRepository->getById($id);
        } catch (NoSuchEntityException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * @param int|null $id
     * @return string
     */
    public function getProductImageUrl(int $id = null)
    {
        $product = $this->getProductById($id);
        return $this->imageHelper->init($product, 'product_base_image')->setImageFile($product->getImage())->getUrl();
    }
    
}
