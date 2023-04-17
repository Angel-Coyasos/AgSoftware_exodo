<?php
/**
 * Copyright © N/A All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace AgSoftware\Home\Setup\Patch\Data;

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
        $data[ 'themes-and-extencions' ] = [
            "title" => "themes and extencions",
            "identifier" => "themes-and-extencions",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/themesAndExtencions.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'vide-Home' ] = [
            "title" => "vide Home",
            "identifier" => "vide-Home",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/videHome.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'google-analytics-4' ] = [
            "title" => "google analytics 4",
            "identifier" => "google-analytics-4",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/googleAnalytics4.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'overflow-hidden' ] = [
            "title" => "overflow hidden",
            "identifier" => "overflow-hidden",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/overflowhidden.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'build-growth' ] = [
            "title" => "build growth",
            "identifier" => "build-growth",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/buildGrowth.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'support-documentation' ] = [
            "title" => "support documentation",
            "identifier" => "support-documentation",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/supportDocumentation.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        /* Reservado para BLOQU slider */
        $data[ 'quote-2' ] = [
            "title" => "quote 2",
            "identifier" => "quote-2",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/quote2.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'overflow-auto' ] = [
            "title" => "overflow auto",
            "identifier" => "overflow-auto",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/overflowauto.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'industry-partners' ] = [
            "title" => "industry partners",
            "identifier" => "industry-partners",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/industryPartnes.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'no-padding' ] = [
            "title" => "no padding",
            "identifier" => "no-padding",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/nopadding.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'cont-Wp2' ] = [
            "title" => "cont Wp2",
            "identifier" => "cont-Wp2",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/contWp2.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'customer-development' ] = [
            "title" => "customer development",
            "identifier" => "customer-development",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__ . '/html/customerDevelopment.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'marketing-merchandising' ] = [
            "title" => "marketing merchandising",
            "identifier" => "marketing-merchandising",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/marketingMerchandising.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'section-collapsible-8' ] = [
            "title" => "section collapsible 8",
            "identifier" => "section-collapsible-8",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/sectionCollapsible8.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'customer-support' ] = [
            "title" => "customer support",
            "identifier" => "customer-support",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/customerSupport.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'section-collapse' ] = [
            "title" => "section collapse",
            "identifier" => "section-collapse",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/sectionCollapse.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'agile-development' ] = [
            "title" => "agile development",
            "identifier" => "agile-development",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/agileDevelopment.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'integrations-content' ] = [
            "title" => "integrations content",
            "identifier" => "integrations-content",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/integrationsContent.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'container-heading-wlt' ] = [
            "title" => "container heading wlt",
            "identifier" => "container-heading-wlt",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/containerHeadingWlt.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'awesome-extensions' ] = [
            "title" => "awesome extensions",
            "identifier" => "awesome-extensions",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/awesomeExtensions.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'heading-title-awards' ] = [
            "title" => "heading title awards",
            "identifier" => "heading-title-awards",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/heading-title-awards.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'post-list' ] = [
            "title" => "post list",
            "identifier" => "post-list",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/postList.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"
        ];
        $data[ 'parter-Container' ] = [
            "title" => "parter Container",
            "identifier" => "parter-Container",
            "store_id" => "3",
            "content" => file_get_contents(__DIR__.'/html/parterContainer.html'),
            "is_active" => "1",
            "offert_end_message" => "null",
            "offert_timmer_css"	=> "null"

        ];

        foreach ( $data as $item) {

            $cmsBlockHome= $this->cmsBlock->create();

            $cmsBlockHome->addData($item);

            $this->cmsRepository->save($cmsBlockHome);

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
