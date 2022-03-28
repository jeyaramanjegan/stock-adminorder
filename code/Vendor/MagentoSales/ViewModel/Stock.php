<?php
/**
 * Copyright ©. All rights reserved.
 *
 * @author     Jegan
 * @package    Vendor_MagentoSales
 * @copyright  2022
 */

namespace Vendor\MagentoSales\ViewModel;

use Magento\CatalogInventory\Model\Stock\StockItemRepository;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Stock implements ArgumentInterface
{
    /**
     * @var StockItemRepository
     */
    protected StockItemRepository $_stockItemRepository;

    public function __construct(
        StockItemRepository $stockItemRepository
    ) {
        $this->_stockItemRepository = $stockItemRepository;
    }

    public function getStockItem($productId): \Magento\CatalogInventory\Api\Data\StockItemInterface
    {
        try {
            return $this->_stockItemRepository->get($productId);
        } catch (NoSuchEntityException $e) {
        }
    }
}
