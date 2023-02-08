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
use Magento\Framework\Stdlib\DateTime\Filter\Date;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\App\State;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\App\Area;

class AddBlockCmsThemesAndExtencions implements DataPatchInterface, PatchRevertableInterface 
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
        Date $dateFilter,
        TimezoneInterface $localeDate,
        ModuleDataSetupInterface $moduleDataSetup,
        State $state,
        BlockFactory $cmsBlock,
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->cmsBlock = $cmsBlock;
        $this->localeDate = $localeDate;
        $this->_dateFilter = $dateFilter;

        $this->state = $state;
        //$this->cmsRepository = $cmsRepository;
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
        $cmsBlock = $this->cmsBlock->create();
        $data = [
            "title" => "themes and extencions",
            "identifier" => "themes-and-extencions",
            "store_id" => "All Store Views",
            "content" => '<div class="thems-and-extencions" data-content-type="html" data-appearance="default" data-element="main">&lt;div class="thems-and-extencions__content"&gt;
            &lt;div class="thems-and-extencions__content--title"&gt;
                &lt;h1 class="primary__title"&gt;
                    magento  themes and extencions.
                &lt;/h1&gt;
                &lt;h3 class="secondary__title"&gt;
                    Get straight to growing your business! 
                    &lt;br&gt; 
                    From concept to launch in less than 6 weeks.
                &lt;/h3&gt;
            &lt;/div&gt;
            &lt;div class="thems-and-extencions__content--button"&gt;
                &lt;a href="#" class="button__ancla"&gt;
                    &lt;span class="button__ancla--title"&gt;Explore Our Solution&lt;/span&gt;
                    &lt;span class="button__ancla--text"&gt;Magento 2 Theme. Commerce &amp; Open Source Ready&lt;/span&gt;
                &lt;/a&gt;
            &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="thems-and-extencions__image"&gt;
            &lt;a href="/magento-2-theme-pearl" class="image__ancla"&gt;
                &lt;img src="https://www.weltpixel.com/media/wysiwyg/homepage/laptop_banner1.png" alt="laptop_banner" class="laptop_banner hidden-mobile"&gt;
                &lt;img src="https://www.weltpixel.com/media/wysiwyg/homepage-v2/hp-mob-1.png" alt="mobile_banner" class="mobile_banner vissible-mobile"&gt;
            &lt;/a&gt;
        &lt;/div&gt;</div>',
            "is_active" => "1"
        ];

        $data["from_date"] = $this->localeDate->formatDate();
        $filterValues = ["from_date" => $this->_dateFilter];

        $inputFilter = new \Zend_Filter_Input(
            $filterValues,
            [],
            $data
        );
        $data = $inputFilter->getUnescaped();
        $cmsBlock->addData($data);

        $this->state->setAreaCode(Area::AREA_ADMINHTML); // or \Magento\Framework\App\Area::AREA_FRONTEND, depending on your needs

        $cmsBlock->save();

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
        return [];
    }
    
}