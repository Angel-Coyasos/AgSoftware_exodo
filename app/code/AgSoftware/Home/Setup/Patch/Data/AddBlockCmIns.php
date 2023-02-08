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

class AddBlockCmIns implements DataPatchInterface, PatchRevertableInterface 
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
            // "block_id" => "hola",
            "title" => "overflowauto",
            "identifier" => "overflowauto--2",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=LONHSQA],#html-body [data-pb-style=PQ031WU]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=PQ031WU]{align-self:stretch}#html-body [data-pb-style=LONHSQA]{justify-content:flex-start;display:flex;flex-direction:column}#html-body [data-pb-style=QTON678]{display:flex;width:100%}#html-body [data-pb-style=AYREVWT],#html-body [data-pb-style=S3NI3J4]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:50%;align-self:stretch}#html-body [data-pb-style=YG35X8U]{border-style:none}#html-body [data-pb-style=D9TH3IG],#html-body [data-pb-style=N3WV4CC]{max-width:100%;height:auto}@media only screen and (max-width: 768px) { #html-body [data-pb-style=YG35X8U]{border-style:none} }</style><div class="pagebuilder-column-group overflowauto" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="PQ031WU"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="QTON678"><div class="pagebuilder-column overflowauto__col-1" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="S3NI3J4"><h2 class="title-h2" data-content-type="heading" data-appearance="default" data-element="main">Stack. Magento 2 Extension Bundle.</h2><h3 class="text-description" data-content-type="heading" data-appearance="default" data-element="main">A revolutionary, extension based solution for</h3><h3 class="text-description margin" data-content-type="heading" data-appearance="default" data-element="main">faster, more stable development.</h3><div data-content-type="html" data-appearance="default" data-element="main">&lt;div class="margin-mob-btn"&gt;
            &lt;a href="https://www.weltpixel.com/stack-magento-framework-extension-pack"
                class="wp-button wp-button-desc wp-button-hp"&gt;
                &lt;div class="btn-hp"&gt;
                    Explore Stack. Framework
                    &lt;span&gt;Magento 2 Framework. Commerce &amp;amp; Open Source Ready&lt;/span&gt;
                &lt;/div&gt;
            &lt;/a&gt;
        &lt;/div&gt;</div></div><div class="pagebuilder-column overflowauto__col-2" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="AYREVWT"><figure data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="YG35X8U"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Promo-Stack-3.png}}" alt="" title="" data-element="desktop_image" data-pb-style="D9TH3IG"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Promo-Stack-3.png}}" alt="" title="" data-element="mobile_image" data-pb-style="N3WV4CC"></figure></div></div></div><div data-content-type="row" data-appearance="contained" data-element="main"><div data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="LONHSQA"></div></div>',
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
        return [
           /*  \AgSoftware\Home\Setup\Patch\Data\AddBlockCmsThemesAndExtencions::class */
        ];
    }
    
}