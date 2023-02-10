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
            "content" => '<style>#html-body [data-pb-style=R42VBCV]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=CRWC442]{display:flex;width:100%}#html-body [data-pb-style=DECSX8G],#html-body [data-pb-style=GUARQWQ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=YEB0UBS]{border-style:none}#html-body [data-pb-style=L664E3U],#html-body [data-pb-style=POYMJM7]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=YEB0UBS]{border-style:none} }</style><div class="pagebuilder-column-group themes-and-extencions" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="R42VBCV"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="CRWC442"><div class="pagebuilder-column themes-and-extencions__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="GUARQWQ"><div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="themes-and-extencions__content--title"&gt;
            &lt;h1 class="primary__title"&gt;
                magento  themes and extencions.
            &lt;/h1&gt;
            &lt;h3 class="secondary__title"&gt;
                Get straight to growing your business! 
                &lt;br&gt; 
                From concept to launch in less than 6 weeks.
            &lt;/h3&gt;
        &lt;/div&gt;
        &lt;div class="themes-and-extencions__content--button"&gt;
            &lt;a href="#" class="button__ancla"&gt;
                &lt;span class="button__ancla--title"&gt;Explore Our Solution&lt;/span&gt;
                &lt;span class="button__ancla--text"&gt;Magento 2 Theme. Commerce &amp; Open Source Ready&lt;/span&gt;
            &lt;/a&gt;
        &lt;/div&gt;</div></div><div class="pagebuilder-column" data-content-type="column" data-appearance="full-height" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/laptop_banner1_1.png}}\&quot;,\&quot;mobile_image\&quot;:\&quot;{{media url=wysiwyg/hp-mob-1_1.png}}\&quot;}" data-element="main" data-pb-style="DECSX8G"><figure class="themes-and-extencions__image" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="YEB0UBS"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/laptop_banner1_4.png}}" alt="" title="" data-element="desktop_image" data-pb-style="L664E3U"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/hp-mob-1_2.png}}" alt="" title="" data-element="mobile_image" data-pb-style="POYMJM7"></figure></div></div></div>',
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