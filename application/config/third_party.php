<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This file contains package definition for third party libraries.
 * Defining them here allows for easy inclusion in views.
 */
return array(
    'jquery' => array(
        'baseUrl' => 'third_party/jquery/',
        'js' => array(
            'jquery-1.9.1.min.js'
        )
    ),
    'jqgrid' => array(
        'baseUrl' => 'third_party/jqgrid/',
        'js' => array(
            'js/jquery.jqGrid.min.js',
            'js/i18n/grid.locale-en.js',
            'plugins/jquery.searchFilter.js'
        ),
        'css' => array(
            'css/ui.jqgrid.css'
        ),
        'depends' => array(
            'jquery'
        )

    ),
    'jquery-notify' => array(
        'baseUrl' => 'third_party/jquery-notify',
        'js' => array(
            'src/jquery.notify.min.js'
        ),
        'css' => array(
            'ui.notify.css'
        ),
        'depends' => array(
            'jqueryui'
        )
        
    ),
    'jqueryui' => array(
        'baseUrl' => 'third_party/jqueryui/',
        'js' => array(
            'js/jquery-ui-1.10.0.custom.min.js'
        ),
        'css' => array(
            //'css/smoothness/jquery-ui-1.10.0.custom.min.css'
        ),
        'depends' => array(
            'jquery'
        )
    ),
    'jquery-cookie' => array(
        'baseUrl' => 'third_party/jquery-cookie',
        'js' => array(
            'jquery.cookie.js'
        ),
        'depends' => array(
            'jquery'
        )
    ),
    'jquery-superfish' => array(
        'baseUrl' => 'third_party/jquery-superfish',
        'js' => array(
            'js/superfish.js',
            'js/hoverIntent.js'
        ),
        'css' => array(
            'css/superfish.css'
        ),
        'depends' => array(
            'jquery'
        )
        
    ),
    'jquery-json' => array(
        'baseUrl' => 'third_party/jquery-json',
        'js' => array(
            'jquery.json-2.4.min.js'
        ),
        'depends' => array(
            'jquery'
        )
    ),
    
    'qTip2' => array(
        'baseUrl' => 'third_party/qTip2',
        'js' => array(
            'dist/jquery.qtip.min.js'
        ),
        'css' => array(
            'dist/jquery.qtip.min.css'
        ),
        'depends' => array(
            'jquery'
        )
        
    ),
    'jquery-tablesorter' => array(
        'baseUrl' => 'third_party/jquery-tablesorter',
        'js' => array(
            'jquery.tablesorter.min.js'
        ),
        'depends' => array(
            'jquery'
        )
    ),
    'jquery-nestedSortable' => array(
        'baseUrl' => 'third_party/jquery-nestedSortable',
        'js' => array(
            'jquery.mjs.nestedSortable.js'
        ),
        'depends' => array(
            'jqueryui'
        )
    ),
    'jquery-multiselect' => array(
        'baseUrl' => 'third_party/jquery-multiselect',
        'js' => array(
            'src/jquery.multiselect.min.js',
            'src/jquery.multiselect.filter.min.js'
        ),
        'css' => array(
            'jquery.multiselect.css',
            'jquery.multiselect.filter.css'
        ),
        'depends' => array(
            'jquery'
        )
    ),
    'ace' => array(
        'baseUrl' => 'third_party/ace',
        'js' => array(
            'ace.js'
        ),
        'depends' => array(
            'jquery-ace'
        )
    ),
     'jquery-ace' => array(
        'baseUrl' => 'third_party/jquery-ace',
        'js' => array(
            'jquery.ace.js',
        ),
        'depends' => array(
            'jquery',
        )
    ),
    'jquery-selectboxes' => array(
        'baseUrl' => 'third_party/jquery-selectboxes/selectboxes',
        'js' => array(
            'jquery.selectboxes.js'
        ),
        'depends' => array(
            'jquery'
        )
    ),
);
