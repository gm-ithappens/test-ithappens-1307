<?php
namespace ItHappens\LuisJhonne\Block;

use \Magento\Framework\View\Element\Template;

class Test extends Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
    }
    
    public function getMeuNome()
    {
        return "Luis Jhonne Carvalhal de Melo";
    }
}