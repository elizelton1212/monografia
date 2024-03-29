<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Olimpia',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>OL</b>IMPIA',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'dropdown-menu dropdown-menu-lg dropdown-menu-right',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#661-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => 'btn-flat btn-primary',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#662-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => 'brand-link',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-blue navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'blue',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
            'text'    => 'Associações',
            'icon'    => 'fas fa-university',
            'submenu' => [
                  
                 [
                    'text' => 'Cadastrar Adm Associacao',
                    'can' => 'Administrar_a_Federacao',
                    'icon' =>'fas fa-cog',
                    'url'  => 'cadastrarAdmAss',
                ],

                [
                    'text' => 'Cadastrar',
                    'icon' =>'fas fa-plus',
                    'url'  => 'cadastrarApa',
                ],
               [
                    'text' => 'Consultar Associações',
                    'icon' =>'fas fa-search',
                    'can'  =>'administrador_de_Sistema',
                    'url'  => 'consultarAssociac',
                ],
               
                
                [
                    'text' => 'Jogadores',
                    'url'  => '#',
                ],

                [
                    'text' => 'Clubes',
                    'url'  => '#',
                ],

                [
                    'text' => 'Estatistica',
                    'url'  => '#',
                ],



                
            ],
        ],

          [
            'text'    => 'Clubes',
            'icon'    => 'fas fa-flag',
            'submenu' => [
                  
                 [
                    'text' => 'Cadastrar Clube',
                    'can' => '',
                    'icon' =>'fas fa-cog',
                    'url'  => 'cadastrarClube',
                ],
                

                  [
                    'text' => 'Consultar Clube',
                    'can' => '',
                    'icon' =>'fas fa-search',
                    'url'  => 'consultarClube',
                ],

                



                
            ],
        ],
      
      
        [
            'text'    => 'Concelho Disciplinar',
            'icon'    => 'fas fa-school',
            'submenu' => [
                [
                    'text' => 'Geral',
                    'url'  => '#',
                ],
                
            ],
        ],

        [
            'text'    => 'Seleções',
            'icon'    => 'fas fa-flag',
            'submenu' => [
                [
                    'text' => 'Geral',
                    'url'  => '#',
                ],

                
                [
                    'text'=>'Categorias',

                    'submenu'=>[
                    [
                        'text' => 'Honra',
                        'url'  => '#',
                    ],
                    [
                        'text' => 'Sub-23',
                        'url'  => '#',
                    ],

                    [
                        'text' => 'Sub-20',
                        'url'  => '#',
                    ],

                    [
                        'text' => 'Sub-16',
                        'url'  => '#',
                    ],
    
    
    
    
                
                ],
            ],
                
            ],
        ],

        [
            'text'    => 'Campeonatos',
            'icon'    => 'fas fa-trophy',
            'submenu' => [
                [
                    'text' => 'Geral',
                    'url'  => '#',
                ],
                
            ],
        ],
        
        [
            'text'    => 'Estatisticas',
            'icon'    => 'fas fa-chart-pie',
            'can'     =>  '',
            'submenu' => [
                [
                    'text' => 'Geral',
                    'url'  => '#',
                ],
                
            ],
        ],
        
        
        

     /*   [
            'text'    => 'Federações',
            'icon'    => 'fas fa-filter',
            'submenu' => [
                [
                    'text' => 'Cadastrar Federação',
                    'can'  =>  'administrador_de_Sistema',
                    'url'  => 'federacao',
                ],
                
                [
                    'text' => 'Consultar federações',
                    'url'  => 'ConsultarFederacao',
                ],
                
            ],
        ], */
        
            [
            'text'    => 'Atletas',
            'icon'    => 'fas fa-filter',
            'submenu' => [
                [
                    'text' => 'Cadastrar Atleta',
                    'can'  =>  'administrador_de_Sistema',
                    'url'  => 'CadastrarAtleta',
                ],
                
                [
                    'text' => 'Consultar Consultar Atleta',
                    'url'  => '#',
                ],
                
            ],
        ], 
        
        [
            'text'  =>'Administrativo',
            'icon'  =>'fas fa-cog',
            'can'  =>'administrar_o_Sistema',
            'submenu' =>[
                [
                'text' => 'Cadastrar ADM Federação',
                'icon' => 'fas fa-user',
                'url' =>'CadastrarUser',
                ],



            ],
        ],
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],
];
