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

class AddBlockCmsOverflowhidden implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "overflow hidden",
            "identifier" => "overflow-hidden",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=A7L3SHP],#html-body [data-pb-style=IG4ESBR]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=IG4ESBR]{justify-content:flex-start;display:flex;flex-direction:column}#html-body [data-pb-style=A7L3SHP]{align-self:stretch}#html-body [data-pb-style=NGIIXT5]{display:flex;width:100%}#html-body [data-pb-style=HHQ1258]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:33.3333%;align-self:stretch}#html-body [data-pb-style=RXW30LP]{text-align:center;border-style:none}#html-body [data-pb-style=M5NWKMA],#html-body [data-pb-style=OF832FS]{max-width:100%;height:auto}#html-body [data-pb-style=IQHE1A9],#html-body [data-pb-style=NX8UPNS]{text-align:center}#html-body [data-pb-style=B2JCB23]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:33.3333%;align-self:stretch}#html-body [data-pb-style=EDVOITX]{text-align:center;border-style:none}#html-body [data-pb-style=QLBJ3VR],#html-body [data-pb-style=SGT0V3B]{max-width:100%;height:auto}#html-body [data-pb-style=THKT6DL]{text-align:center}#html-body [data-pb-style=EUAOGT7]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:33.3333%;align-self:stretch}#html-body [data-pb-style=TPEY7WG]{text-align:center;border-style:none}#html-body [data-pb-style=I2UMBLQ],#html-body [data-pb-style=PNOKEXO]{max-width:100%;height:auto}#html-body [data-pb-style=EVBPBXG]{text-align:center}#html-body [data-pb-style=VTL715D]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=XWHCV3R]{display:flex;width:100%}#html-body [data-pb-style=WXTOBKQ]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;width:100%;align-self:stretch}#html-body [data-pb-style=IS7FX4T]{text-align:center}@media only screen and (max-width: 768px) { #html-body [data-pb-style=EDVOITX],#html-body [data-pb-style=RXW30LP],#html-body [data-pb-style=TPEY7WG]{border-style:none} }</style><div data-content-type="row" data-appearance="contained" data-element="main"><div class="overflowhidden" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="IG4ESBR"><div class="pagebuilder-column-group overflowhidden__list" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="A7L3SHP"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="NGIIXT5"><div class="pagebuilder-column most-popular item-list" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="HHQ1258"><figure class="most-popular--image item-list--image" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="RXW30LP"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Icon-03.png}}" alt="" title="" data-element="desktop_image" data-pb-style="M5NWKMA"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Icon-03.png}}" alt="" title="" data-element="mobile_image" data-pb-style="OF832FS"></figure><h2 class="most-popular--title item-list--title" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="NX8UPNS">PEARL. MOST POPULAR </h2><h2 class="most-popular--subtitle item-list--subtitle" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="IQHE1A9">MAGENTO 2 THEME</h2><div class="most-popular--text item-list--text" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;">According to Magento&nbsp;</p>
<p style="text-align: center;">Marketplace</p></div></div><div class="pagebuilder-column premium-soluctions item-list" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="B2JCB23"><figure class="premium-soluctions--image item-list--image" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="EDVOITX"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Icon-04.png}}" alt="" title="" data-element="desktop_image" data-pb-style="QLBJ3VR"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Icon-04.png}}" alt="" title="" data-element="mobile_image" data-pb-style="SGT0V3B"></figure><h2 class="premium-soluctions--title item-list--title" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="THKT6DL">PREMIUM MAGENTO SOLUTIONS.</h2><div class="premium-soluctions--span item-list--span" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;"><span style="font-size: 34px;"><strong>65000+</strong></span></p></div><div class="premium-soluctions--text item-list--text" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;">Happy Customers using&nbsp;</p>
<p style="text-align: center;">WeltPixel Products.</p></div></div><div class="pagebuilder-column magento-2-extencions item-list" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="EUAOGT7"><figure class="magento-2-extencions--image item-list--image" data-content-type="image" data-appearance="full-width" data-element="main" data-pb-style="TPEY7WG"><img class="pagebuilder-mobile-hidden" src="{{media url=wysiwyg/Icon-05.png}}" alt="" title="" data-element="desktop_image" data-pb-style="I2UMBLQ"><img class="pagebuilder-mobile-only" src="{{media url=wysiwyg/Icon-05.png}}" alt="" title="" data-element="mobile_image" data-pb-style="PNOKEXO"></figure><h2 class="magento-2-extencions--title item-list--title" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="EVBPBXG">MAGENTO 2 EXTENSIONS.</h2><div class="magento-2-extencions--span item-list--span" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;"><span style="font-size: 34px;"><strong>28+</strong></span></p></div><div class="magento-2-extencions--text item-list--text" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;"><span style="color: #000000;">Compatibility maintained</span></p>
<p style="text-align: center;"><span style="color: #000000;">with each Magento release.</span></p></div></div></div></div><div class="pagebuilder-column-group overflowhidden__glad-solutions" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="12" data-element="main" data-pb-style="VTL715D"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="XWHCV3R"><div class="pagebuilder-column glad-solutions__content" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="WXTOBKQ"><h3 class="glad-solutions--title" data-content-type="heading" data-appearance="default" data-element="main" data-pb-style="IS7FX4T">GLAD THAT I FOUND THIS SOLUTION</h3><div class="glad-solutions--review-title" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;"><strong>&nbsp;Pearl Theme for Magento 2.&nbsp;</strong></p></div><div class="glad-solutions--text" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;">Great value pack, appreciate multiple extensions that are included with Pearl Theme. Saves a lot of time and money as they are already compatible with each other. Also it&lsquo;s great that WeltPixel keeps improving the theme with each month, adding new extensions and features to the pack. It&lsquo;s nice to see that this product in continuously improved and compatibility maintained with each Magento release. Gives me great confidence to use Pearl also for other stores.&nbsp;</p></div><div class="glad-solutions--name-author" data-content-type="text" data-appearance="default" data-element="main"><p style="text-align: center;"><span style="font-size: 16px;">MARK KINGSLEY</span></p></div></div></div></div></div></div>',
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