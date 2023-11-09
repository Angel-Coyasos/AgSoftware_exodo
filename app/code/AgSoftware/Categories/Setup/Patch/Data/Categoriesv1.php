<?php

declare(strict_types=1);

namespace AgSoftware\Categories\Setup\Patch\Data;

use Magento\Catalog\Model\CategoryRepository;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Store\Model\StoreManagerInterface;

class Categoriesv1 implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @var CategoryFactory
     */
    private $categoryFactory;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param CategoryFactory $categoryFactory
     * @param CategoryRepository $categoryRepository
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        CategoryFactory $categoryFactory,
        CategoryRepository $categoryRepository,
        StoreManagerInterface $storeManager
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->categoryFactory = $categoryFactory;
        $this->categoryRepository = $categoryRepository;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        $rootCategoryId = $this->getRootCategoryId();

        // Create a new category
        $categoryData = [
            [
                'parent_id' => $rootCategoryId,
                'name' => 'GOOGLE ANALYTICS 4',
                'stores' => [0], // You can adjust the store ID as needed
                'is_active' => 1,
            ],
            [
                'parent_id' => $rootCategoryId,
                'name' => 'PEARL THEME',
                'stores' => [0], // You can adjust the store ID as needed
                'is_active' => 1,
            ],
            [
                'parent_id' => $rootCategoryId,
                'name' => 'MAGENTO 2 Extensions',
                'stores' => [0], // You can adjust the store ID as needed
                'is_active' => 1,
            ],
            [
                'parent_id' => $rootCategoryId,
                'name' => 'EXTENSION BUNDLE',
                'stores' => [0], // You can adjust the store ID as needed
                'is_active' => 1,
            ],
            [
                'parent_id' => $rootCategoryId,
                'name' => 'TRACKING & RETURNS',
                'stores' => [0], // You can adjust the store ID as needed
                'is_active' => 1,
            ],
        ];


        foreach ($categoryData as $item) {

            $category = $this->categoryFactory->create();
            $category->addData($item);
            $this->categoryRepository->save($category);
        }



        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * Get the root category ID for the current store.
     *
     * @return int
     */
    private function getRootCategoryId()
    {
        return $this->storeManager->getStore()->getRootCategoryId();
    }

    /**
     * {@inheritdoc}
     */
    public function revert()
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies()
    {
        return [];
    }
}
