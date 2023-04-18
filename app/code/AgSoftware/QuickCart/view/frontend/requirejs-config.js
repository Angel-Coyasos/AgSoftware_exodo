/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

var config = {
    map: {
        '*': {
            'Magento_Checkout/template/minicart/item/default.html': 'AgSoftware_QuickCart/template/minicart/item/default.html',
            'Magento_Checkout/template/minicart/content.html': 'AgSoftware_QuickCart/template/minicart/content.html',
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/view/cart-item-renderer': {
                'AgSoftware_QuickCart/js/view/cart-item-renderer-mixins':true
            }
        }
    }
};

