<?php
/**
 * Copyright © N/A All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AgSoftware\PageFoteerV1\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchRevertableInterface;

class Bloques implements DataPatchInterface, PatchRevertableInterface 
{

    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * Constructor
     *
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct (
        ModuleDataSetupInterface $moduleDataSetup,
        \Magento\Cms\Model\BlockFactory $cmsBlock,
        \Magento\Cms\Api\BlockRepositoryInterface $cmsRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->cmsBlock = $cmsBlock;
        $this->cmsRepository = $cmsRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function apply()
    {
        
        $this->moduleDataSetup->getConnection()->startSetup();

        /**
         * @var \Magento\Cms\Model\Block $cmsBlock
         */
        
        $data = [];
        $data[ 'agile-development' ] = [
            "title" => "agile development",
            "identifier" => "agile-development",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/agileDevelopment.html'),
            "is_active" => "1"
        ];
        $data[ 'footer-weltpixel' ] = [
            "title" => "awesome extencsions",
            "identifier" => "awesome-extencsions",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/awesomeExtencions.html'),
            "is_active" => "1"
        ];
        $data[ 'awesome-extencsions' ] = [
            "title" => "build growth",
            "identifier" => "build-growth",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/buildGrowth.html'),
            "is_active" => "1"
        ];
        $data[ 'customer-development' ] = [
            "title" => "customer development",
            "identifier" => "customer-development",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/customerDevelopmen.html'),
            "is_active" => "1"
        ];
        $data[ 'customer-support' ] = [
            "title" => "customer support",
            "identifier" => "customer-support",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/customerSupport.html'),
            "is_active" => "1"
        ];
        $data[ 'google-analytics-4' ] = [
            "title" => "google analytics 4",
            "identifier" => "google-analytics-4",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/googleAnalytics4.html'),
            "is_active" => "1"
        ];
        $data[ 'industry-partners' ] = [
            "title" => "industry partners",
            "identifier" => "industry-partners",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/industryPartnes.html'),
            "is_active" => "1"
        ];
        $data[ 'marketing-merchandising' ] = [
            "title" => "marketing merchandising",
            "identifier" => "marketing-merchandising",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/marketingMerchandising.html'),
            "is_active" => "1"
        ];
        $data[ 'overflow-hidden' ] = [
            "title" => "overflow hidden",
            "identifier" => "overflow-hidden",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/overflowhidden.html'),
            "is_active" => "1"
        ];
        $data[ 'post-list' ] = [
            "title" => "post list",
            "identifier" => "post-list",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/postList.html'),
            "is_active" => "1"
        ];
        $data[ 'quote-2' ] = [
            "title" => "quote 2",
            "identifier" => "quote-2",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/quote2.html'),
            "is_active" => "1"
        ];
        $data[ 'support-documentation' ] = [
            "title" => "support documentation",
            "identifier" => "support-documentation",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/quote2.html'),
            "is_active" => "1"
        ];
        $data[ 'themes-and-extencions' ] = [
            "title" => "themes and extencions",
            "identifier" => "themes-and-extencions",
            "store_id" => "All Store Views",
            "content" => file_get_contents(__DIR__.'/html/themesAndExtencions.html'),
            "is_active" => "1"
        ];

        foreach ( $data as $item) {

            $cmsBlockFooter = $this->cmsBlock->create();

            $cmsBlockFooter->addData($item);

            $this->cmsRepository->save($cmsBlockFooter);

        }

        $this->moduleDataSetup->getConnection()->endSetup();

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
        return [

        ];
    }
    
}