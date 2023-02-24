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

class AddBlockCmsBuildGrowth implements DataPatchInterface, PatchRevertableInterface 
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
            "title" => "build growth",
            "identifier" => "build-growth",
            "store_id" => "All Store Views",
            "content" => '<style>#html-body [data-pb-style=JKGIHCH]{justify-content:flex-start;display:flex;flex-direction:column;background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=K149SYC]{text-align:center}#html-body [data-pb-style=U2L1A7O]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll;align-self:stretch}#html-body [data-pb-style=JJ9YGID]{display:flex;width:100%}#html-body [data-pb-style=W4EQIGW]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=QQ6EDTQ],#html-body [data-pb-style=W4EQIGW]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=JGOSF0K]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=ICJHEP4]{text-align:center}#html-body [data-pb-style=HEH9FFB]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=GJ3W8QE],#html-body [data-pb-style=HEH9FFB]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=H10I2CP]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=KBQ6MI8]{text-align:center}#html-body [data-pb-style=IL4GHEO]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=DAGVUVJ],#html-body [data-pb-style=IL4GHEO]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=F92GJO2]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=U3H5NY9]{text-align:center}#html-body [data-pb-style=CARMYV6]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=CARMYV6],#html-body [data-pb-style=M4FM51N]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=QBHUTX4]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=JLTAGL2]{text-align:center}#html-body [data-pb-style=QH59YBS]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=A5F10FB],#html-body [data-pb-style=QH59YBS]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=I5N3PPC]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=M6ED79U]{text-align:center}#html-body [data-pb-style=KW8JJ00]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=KW8JJ00],#html-body [data-pb-style=SG3WOIU]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=BY2D0W8]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=DOQ72BO]{text-align:center}#html-body [data-pb-style=G2UD51Y]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=G2UD51Y],#html-body [data-pb-style=K7HUDN0]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=WKD8MWB]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=L092XY2]{text-align:center}#html-body [data-pb-style=TTEJCI7]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=QBODJDR],#html-body [data-pb-style=TTEJCI7]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=XY0XSRX]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=WU2ER6K]{text-align:center}#html-body [data-pb-style=PN9OLMF]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=PN7J7D7],#html-body [data-pb-style=PN9OLMF]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=OQ9AAC3]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=VYWU17Q]{text-align:center}#html-body [data-pb-style=MIKPJ52]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=HH4JV63],#html-body [data-pb-style=MIKPJ52]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=VK6H7QL]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=EN9X05N]{text-align:center}#html-body [data-pb-style=PA0FVJN]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=ITVNH1Y],#html-body [data-pb-style=PA0FVJN]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=K8I1VXC]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=V5UJVVE]{text-align:center}#html-body [data-pb-style=KUCEDT9]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=KUCEDT9],#html-body [data-pb-style=YOKPT5K]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=ET9EQ96]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=XMU2W13]{text-align:center}#html-body [data-pb-style=Y1LUM3W]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=ACYNDJM],#html-body [data-pb-style=Y1LUM3W]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=SUA6NWU]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=DJQGW7R]{text-align:center}#html-body [data-pb-style=BOXY1BK]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=BOXY1BK],#html-body [data-pb-style=C5AOY1Q]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=QUAQ416]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=B3B2NOJ]{text-align:center}#html-body [data-pb-style=O3WWB5S]{justify-content:flex-start;display:flex;flex-direction:column;width:6.66667%;align-self:stretch}#html-body [data-pb-style=HG921RK],#html-body [data-pb-style=O3WWB5S]{background-position:left top;background-size:cover;background-repeat:no-repeat;background-attachment:scroll}#html-body [data-pb-style=LDL0F1B]{border-radius:0;min-height:300px;background-color:transparent}#html-body [data-pb-style=ILHSSGW]{text-align:center}</style><div data-content-type="row" data-appearance="contained" data-element="main"><div class="build-growth" data-enable-parallax="0" data-parallax-speed="0.5" data-background-images="{}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="inner" data-pb-style="JKGIHCH"><div class="build-growth__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="K149SYC">&lt;h2 class="wrapper--title"&gt;
   PEARL. THEME FOR MAGENTO 2
&lt;/h2&gt;

&lt;h2 class="wrapper--rewrite"&gt;
   BUILT FOR GROWTH.
&lt;/h2&gt;

&lt;p class="wrapper--text wrapper--text-pd"&gt;
   The Most Popular Magento 2 Theme fully compatible with Magento 2 Open Source. Commerce Cloud. B2B.
&lt;/p&gt;
&lt;p class="wrapper--text wrapper--text-pm"&gt;
   Power your business with the only platform that lets you create, manage, and grow your store in a beautiful way.
&lt;/p&gt;
&lt;p class="wrapper--text wrapper--text-pb"&gt;
   Choose your template to get started.
&lt;/p&gt;</div><div class="pagebuilder-column-group build-growth__gallery-banners gallery-banners" data-background-images="{}" data-content-type="column-group" data-appearance="default" data-grid-size="15" data-element="main" data-pb-style="U2L1A7O"><div class="pagebuilder-column-line" data-content-type="column-line" data-element="main" data-pb-style="JJ9YGID"><div class="pagebuilder-column gallery-banners__item item__cosmetic items--margin-bottom" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="W4EQIGW"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/1_1.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="QQ6EDTQ"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="JGOSF0K"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="ICJHEP4">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V15 | COSMETICS.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__apartment" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="HEH9FFB"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/2_1.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="GJ3W8QE"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="H10I2CP"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="KBQ6MI8">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V14 | APARTMENT.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__demo items--margin-bottom items--bg-contain" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="IL4GHEO"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/3.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="DAGVUVJ"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="F92GJO2"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="U3H5NY9">&lt;a class="wrapper--ancla" href="#"&gt; 
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL | DEMO.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item-glasses" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="CARMYV6"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/15.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="M4FM51N"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="QBHUTX4"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="JLTAGL2">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V12 | GLASSES.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__single-product items--margin-bottom items--bg-contain" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="QH59YBS"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/12.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="A5F10FB"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="I5N3PPC"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="M6ED79U">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V11 | SINGLE PRODUCT.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__accesories items--bg-contain" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="KW8JJ00"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/14.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="SG3WOIU"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="BY2D0W8"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="DOQ72BO">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V10 | ACCESORIES.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__furniture items--margin-bottom" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="G2UD51Y"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/13.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="K7HUDN0"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="WKD8MWB"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="L092XY2">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V9 | FURNITURE.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-clean items--bg-contain" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="TTEJCI7"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/11.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="QBODJDR"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="XY0XSRX"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="WU2ER6K">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V8 | FASHION CLEAN.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-classy items--margin-bottom items--bg-contain" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="PN9OLMF"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/10.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="PN7J7D7"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="OQ9AAC3"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="VYWU17Q">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V7 | FASHION CLASSY.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-parallax-scroll items--bg-contain" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="MIKPJ52"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/9.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="HH4JV63"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="VK6H7QL"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="EN9X05N">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V6 | FASHION PARALLAX SCROLL.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-full-page items--margin-bottom" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="PA0FVJN"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/8.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="ITVNH1Y"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="K8I1VXC"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="V5UJVVE">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V5 | FASHION FULL PAGE.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-company" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="KUCEDT9"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/6.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="YOKPT5K"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="ET9EQ96"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="XMU2W13">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V4 | FASHION COMPANY.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-look-book-style items--margin-bottom" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="Y1LUM3W"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/7.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="ACYNDJM"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="SUA6NWU"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="DJQGW7R">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V3 | FASHION LOOK-BOOK STYLE.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-parallax-hero" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="BOXY1BK"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/4.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="C5AOY1Q"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="QUAQ416"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="B3B2NOJ">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V2 | FASHION PARALLAX HERO.&lt;/span&gt;
&lt;/a&gt;</div></div><div class="pagebuilder-column gallery-banners__item item__fashion-slider items--margin-bottom items--bg-contain" data-content-type="column" data-appearance="full-height" data-background-images="{}" data-element="main" data-pb-style="O3WWB5S"><div data-content-type="banner" data-appearance="poster" data-show-button="never" data-show-overlay="never" data-element="main" class="gallery-banners__banner banner-lazy"><a href="#" target="" data-link-type="default" title="" data-element="link"><div class="pagebuilder-banner-wrapper" data-background-images="{\&quot;desktop_image\&quot;:\&quot;{{media url=wysiwyg/5.png}}\&quot;}" data-background-type="image" data-video-loop="true" data-video-play-only-visible="true" data-video-lazy-load="true" data-video-fallback-src="" data-element="wrapper" data-pb-style="HG921RK"><div class="pagebuilder-overlay pagebuilder-poster-overlay" data-overlay-color="" aria-label="" title="" data-element="overlay" data-pb-style="LDL0F1B"><div class="pagebuilder-poster-content"><div data-element="content"></div></div></div></div></a></div><div class="gallery-banners__wrapper" data-content-type="html" data-appearance="default" data-element="main" data-pb-style="ILHSSGW">&lt;a class="wrapper--ancla" href="#"&gt;
&lt;span class="wrapper--magento2"&gt;MAGENTO 2&lt;/span&gt;
&lt;span class="wrapper--category"&gt;PEARL V1 | FASHION SLIDER.&lt;/span&gt;
&lt;/a&gt;</div></div></div></div></div></div>',
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