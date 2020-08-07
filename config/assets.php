<?php

return [
    'offline' => env('ASSETS_OFFLINE', true),
    'enable_version' => env('ASSETS_ENABLE_VERSION', false),
    'version' => env('ASSETS_VERSION', time()),
    'styles' => [
        'animate',
        'bootstrap',
        'jquery-ui',
        'fontawesome',
    ],
    'scripts' => [
        'jquery',
        'jquery-migrate',
        'jquery-ui',
        'bootstrap',
        'sweetalert2',
    ],
    'resources' => [
        'styles' => [
            'animate' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/animate.css/animate.min.css',
                ],
            ],
            'bootstrap' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/bootstrap/css/bootstrap.min.css',
                ],
            ],
            'slick' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/slick/slick.css',
                ],
            ],
            'slick-theme' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/slick/slick-theme.css',
                ],
            ],
            'owlcarousel' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/owlcarousel/css/owl.carousel.min.css',
                ],
            ],
            'owlcarousel-theme' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/owlcarousel/css/owl.theme.default.min.css',
                ],
            ],
            'fontawesome' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/fontawesome/css/all.min.css',
                ],
            ],
            'jquery-ui' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/jquery-ui/jquery-ui.min.css',
                ],
            ],
            'nice-select' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/css/nice-select.css',
                ],
            ],
            'select2' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/select2/css/select2.min.css',
                ],
            ],
            'select2-bootstrap4' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
                ],
            ],
            'font-roboto-quicksand' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/css/Roboto_Quicksand.css',
                ],
            ],
            'custom-style' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/css/style.css',
                ],
            ],
            'custom-responsive' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/css/responsive.css',
                ],
            ],
            // ADMIN
            'ionicons' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/plugins/ionicons/css/ionicons.min.css',
                ],
            ],
            'font-sourcesanspro' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/css/SourceSansPro.css',
                ],
            ],
            'tempusdominus-bootstrap4' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
            ],
            'icheck-bootstrap' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
                ],
            ],
            'jqvmap' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/jqvmap/jqvmap.min.css',
                ],
            ],
            'overlayscrollbars' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
                ],
            ],
            'daterangepicker' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/daterangepicker/daterangepicker.css',
                ],
            ],
            'summernote' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/summernote/summernote-bs4.css',
                ],
            ],
            'datatables-bs4' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                ],
            ],
            'adminlte' => [
                'use_cdn' => false,
                'location' => 'header',
                'src' => [
                    'local' => 'assets/css/adminlte.min.css',
                ],
            ],
        ],
        'scripts' => [
            'jquery' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/jquery/jquery.min.js',
                ],
            ],
            'jquery-migrate' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/jquery/jquery-migrate.min.js',
                ],
            ],
            'jquery-ui' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/jquery-ui/jquery-ui.min.js',
                ],
            ],
            'bootstrap' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
                ],
            ],
            'owlcarousel' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/owlcarousel/js/owl.carousel.min.js',
                ],
            ],
            'slick' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/slick/slick.min.js',
                ],
            ],
            'wowjs' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/wowjs/wow.min.js',
                ],
            ],
            'nice-select' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/jquery.nice-select.min.js',
                ],
            ],
            'select2' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/select2/js/select2.full.min.js',
                ],
            ],
            'jquery-scrollup' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/scrollup/jquery.scrollUp.min.js',
                ],
            ],
            'custom-niceselect' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom-niceselect.js',
                ],
            ],
            'custom-owlcarousel' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom-owlcarousel.js',
                ],
            ],
            'custom-jqueryui' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom-jqueryui.js',
                ],
            ],
            'custom-scrollup' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom-scrollup.js',
                ],
            ],
            'custom-select2' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom-select2.js',
                ],
            ],
            'custom-slick' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom-slick.js',
                ],
            ],
            'custom-wow' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom-wow.js',
                ],
            ],
            'custom' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/custom.js',
                ],
            ],
            // ADMIN
            'chart' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/chart.js/Chart.min.js',
                ],
            ],
            'sparklines' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/sparklines/sparkline.js',
                ],
            ],
            'jqvmap' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/jqvmap/jquery.vmap.min.js',
                ],
            ],
            'jqvmap-usa' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/jqvmap/maps/jquery.vmap.usa.js',
                ],
            ],
            'jquery-knob' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/jquery-knob/jquery.knob.min.js',
                ],
            ],
            'moment' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/moment/moment.min.js',
                ],
            ],
            'daterangepicker' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/daterangepicker/daterangepicker.js',
                ],
            ],
            'tempusdominus-bootstrap4' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
            ],
            'summernote' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/summernote/summernote-bs4.min.js',
                ],
            ],
            'overlayscrollbars' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
                ],
            ],
            'datatables' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/datatables/jquery.dataTables.min.js',
                ],
            ],
            'datatables-bs4' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
                ],
            ],
            'datatables-responsive' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/datatables-responsive/js/dataTables.responsive.min.js',
                ],
            ],
            'datatables-responsive-bs4' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
                ],
            ],
            'sweetalert2' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/plugins/sweetalert2/sweetalert2.all.min.js',
                ],
            ],
            'stand-alone-button' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'vendor/laravel-filemanager/js/stand-alone-button.js',
                ],
            ],
            'dashboard' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/pages/dashboard.js',
                ],
            ],
            'adminlte' => [
                'use_cdn'  => false,
                'location' => 'footer',
                'src' => [
                    'local' => 'assets/js/adminlte.min.js',
                ],
            ],
        ],
    ],
];
