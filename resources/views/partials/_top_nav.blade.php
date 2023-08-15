<nav class="navbar navbar-light">
    <div class="navbar-left">
        <div class="logo-area">
            {{-- <a class="navbar-brand" href="{{ route('dashboard.demo_one',app()->getLocale()) }}"> --}}
            <img class="dark h-8" src="{{ asset('assets/img/logo-dark.svg') }}" alt="svg">
            {{-- <img class="light h-8" src="{{ asset('assets/img/logo-white.svg') }}" alt="img"> --}}
            </a>
            {{-- <a href="#" class="sidebar-toggle">
                <img class="svg" src="{{ asset('assets/img/svg/align-center-alt.svg') }}" alt="img"></a> --}}
        </div>

        <div class="top-menu">
            <div class="hexadash-top-menu position-relative">
                <ul>
                    <li class="has-subMenu">
                        <a href="#"
                            class="{{ Request::is(app()->getLocale() . '/dashboards/*') ? 'active' : '' }}">Dashboard</a>
                    </li>
                    <li class="has-subMenu">
                        <a href="#"
                            class="{{ Request::is(app()->getLocale() . '/customer/*') ? 'active' : '' }}">Crud</a>
                        <ul class="subMenu">
                            <li class="has-subMenu-left">
                                <a href="#"
                                    class="{{ Request::is(app()->getLocale() . '/customer/*') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-database"></span>
                                    <span class="menu-text">{{ trans('menu.customer-crud-menu-title') }}</span>
                                </a>
                                <ul class="subMenu">
                                    <li><a class="{{ Request::is(app()->getLocale() . '/customer/list') ? 'active' : '' }}"
                                            href="{{ route('customer.list', app()->getLocale()) }}">{{ trans('menu.customer-view-all') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/customer/create') ? 'active' : '' }}"
                                            href="{{ route('customer.create', app()->getLocale()) }}">{{ trans('menu.customer-add-new') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-subMenu">
                        <a href="#"
                            class="{{ Request::is(app()->getLocale() . '/wizard/*') || Request::is(app()->getLocale() . '/widget/*') || Request::is(app()->getLocale() . '/map/*') || Request::is(app()->getLocale() . '/form/*') || Request::is(app()->getLocale() . '/chart/*') || Request::is(app()->getLocale() . '/editor') || Request::is(app()->getLocale() . '/icon/*') ? 'active' : '' }}">Features</a>
                        <ul class="subMenu">
                            <li>
                                <a href="{{ route('editor', app()->getLocale()) }}"
                                    class="{{ Request::is(app()->getLocale() . '/editor') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-edit"></span>
                                    <span class="menu-text">{{ trans('menu.editor-menu-title') }}</span>
                                </a>
                            </li>
                            <li class="has-subMenu-left">
                                <a href="#"
                                    class="{{ Request::is(app()->getLocale() . '/icon/*') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-grid"></span>
                                    <span class="menu-text">{{ trans('menu.icon-menu-title') }}</span>
                                </a>
                                <ul class="subMenu">
                                    <li><a href="{{ route('icon.unicon', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/icon/unicon') ? 'active' : '' }}">{{ trans('menu.icon-unicon') }}</a>
                                    </li>
                                    <li><a href="{{ route('icon.awesome', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/icon/awesome') ? 'active' : '' }}">{{ trans('menu.icon-awesome') }}</a>
                                    </li>
                                    <li><a href="{{ route('icon.lineawesome', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/icon/lineawesome') ? 'active' : '' }}">{{ trans('menu.icon-line') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu-left">
                                <a href="#"
                                    class="{{ Request::is(app()->getLocale() . '/chart/*') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-chart"></span>
                                    <span class="menu-text">{{ trans('menu.chart-menu-title') }}</span>
                                </a>
                                <ul class="subMenu">
                                    <li><a class="{{ Request::is(app()->getLocale() . '/chart/chartjs') ? 'active' : '' }}"
                                            href="{{ route('chart.chartjs', app()->getLocale()) }}">{{ trans('menu.chart-js') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/chart/google') ? 'active' : '' }}"
                                            href="{{ route('chart.google', app()->getLocale()) }}">{{ trans('menu.chart-google') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/chart/peity') ? 'active' : '' }}"
                                            href="{{ route('chart.peity', app()->getLocale()) }}">{{ trans('menu.chart-peity') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu-left">
                                <a href="#"
                                    class="{{ Request::is(app()->getLocale() . '/form/*') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-keyhole-circle"></span>
                                    <span class="menu-text">{{ trans('menu.form-menu-title') }}</span>
                                </a>
                                <ul class="subMenu">
                                    <li><a class="{{ Request::is(app()->getLocale() . '/form/basic') ? 'active' : '' }}"
                                            href="{{ route('form.basic', app()->getLocale()) }}">{{ trans('menu.form-basic') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/form/layout') ? 'active' : '' }}"
                                            href="{{ route('form.layout', app()->getLocale()) }}">{{ trans('menu.form-layout') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/form/element') ? 'active' : '' }}"
                                            href="{{ route('form.element', app()->getLocale()) }}">{{ trans('menu.form-element') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/form/component') ? 'active' : '' }}"
                                            href="{{ route('form.component', app()->getLocale()) }}">{{ trans('menu.form-component') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/form/validation') ? 'active' : '' }}"
                                            href="{{ route('form.validation', app()->getLocale()) }}">{{ trans('menu.form-validation') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu-left">
                                <a href="#" class="{{ Request::is(app()->getLocale() . '/map/*') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-map"></span>
                                    <span class="menu-text">{{ trans('menu.map-menu-title') }}</span>
                                </a>
                                <ul class="subMenu">
                                    <li><a href="{{ route('map.google', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/map/google') ? 'active' : '' }}">{{ trans('menu.map-google') }}</a>
                                    </li>
                                    <li><a href="{{ route('map.leaflet', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/map/leaflet') ? 'active' : '' }}">{{ trans('menu.map-leaflet') }}</a>
                                    </li>
                                    <li><a href="{{ route('map.vector', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/map/vector') ? 'active' : '' }}">{{ trans('menu.map-vector') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu-left">
                                <a href="#"
                                    class="{{ Request::is(app()->getLocale() . '/widget/*') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-server"></span>
                                    <span class="menu-text">{{ trans('menu.widget-menu-title') }}</span>
                                </a>
                                <ul class="subMenu">
                                    <li><a class="{{ Request::is(app()->getLocale() . '/widget/chart') ? 'active' : '' }}"
                                            href="{{ route('widget.chart', app()->getLocale()) }}">{{ trans('menu.widget-chart') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/widget/mixed') ? 'active' : '' }}"
                                            href="{{ route('widget.mixed', app()->getLocale()) }}">{{ trans('menu.widget-mixed') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/widget/card') ? 'active' : '' }}"
                                            href="{{ route('widget.card', app()->getLocale()) }}">{{ trans('menu.widget-card') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu-left">
                                <a href="#"
                                    class="{{ Request::is(app()->getLocale() . '/wizard/*') ? 'active' : '' }}">
                                    <span class="nav-icon uil uil-square"></span>
                                    <span class="menu-text">{{ trans('menu.wizard-menu-title') }}</span>
                                </a>
                                <ul class="subMenu">
                                    <li><a href="{{ route('wizard.one', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/wizard/one') ? 'active' : '' }}">{{ trans('menu.wizard-one') }}</a>
                                    </li>
                                    <li><a href="{{ route('wizard.two', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/wizard/two') ? 'active' : '' }}">{{ trans('menu.wizard-two') }}</a>
                                    </li>
                                    <li><a href="{{ route('wizard.three', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/wizard/three') ? 'active' : '' }}">{{ trans('menu.wizard-three') }}</a>
                                    </li>
                                    <li><a href="{{ route('wizard.four', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/wizard/four') ? 'active' : '' }}">{{ trans('menu.wizard-four') }}</a>
                                    </li>
                                    <li><a href="{{ route('wizard.five', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/wizard/five') ? 'active' : '' }}">{{ trans('menu.wizard-five') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-item has-subMenu">
                        <a href="#"
                            class="{{ Request::is(app()->getLocale() . '/pages/pricing') || Request::is(app()->getLocale() . '/pages/gallery/*') || Request::is(app()->getLocale() . '/changelog') ? 'active' : '' }}">Pages</a>
                        <ul class="megaMenu-wrapper megaMenu-small">
                            <li>
                                <ul>
                                    <li>
                                        <a href="{{ route('changelog', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/changelog') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-arrow-growth"></span>
                                            <span class="menu-text">{{ trans('menu.changelog-menu-title') }}</span>
                                            <span class="badge badge-info-10 menuItem rounded-pill">1.0.1</span>
                                        </a>
                                    </li>
                                    <li><a href="{{ route('pages.gallery1', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/gallery/gallery1') ? 'active' : '' }}">{{ trans('menu.gallery-one') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.gallery2', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/gallery/gallery2') ? 'active' : '' }}">{{ trans('menu.gallery-two') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.pricing', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/pricing') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-bill"></span>
                                            <span class="menu-text">{{ trans('menu.pricing-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.banner', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/banner') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-thumbs-up"></span>
                                            <span class="menu-text">{{ trans('menu.banner-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.testimonial', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/testimonial') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-book-open"></span>
                                            <span class="menu-text">{{ trans('menu.testimonial-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.faq', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/faq') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-question-circle"></span>
                                            <span class="menu-text">{{ trans('menu.faq-menu-title') }}</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('pages.search_result', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/search/result') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-credit-card-search"></span>
                                            <span class="menu-text">{{ trans('menu.search-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.blank', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/blank') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-circle"></span>
                                            <span class="menu-text">{{ trans('menu.blank-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/pages/knowledge/base') ? 'active' : '' }}"
                                            href="{{ route('pages.knowledge_base', app()->getLocale()) }}">{{ trans('menu.knowledge-base') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/pages/knowledge/all-articles') ? 'active' : '' }}"
                                            href="{{ route('pages.all_articles', app()->getLocale()) }}">{{ trans('menu.knowledge-all-article') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/pages/knowledge/article') ? 'active' : '' }}"
                                            href="{{ route('pages.article', app()->getLocale()) }}">{{ trans('menu.knowledge-single-article') }}</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li>
                                        <a href="{{ route('pages.support', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/support/center') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-headphones"></span>
                                            <span class="menu-text">{{ trans('menu.support-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li><a href="{{ route('pages.blog.one', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/blog/one') ? 'active' : '' }}">{{ trans('menu.blog-style-one') }}</a>
                                    </li>
                                    <li><a href="{{ route('pages.blog.two', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/blog/two') ? 'active' : '' }}">{{ trans('menu.blog-style-two') }}</a>
                                    </li>
                                    <li><a href="{{ route('pages.blog.three', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/blog/three') ? 'active' : '' }}">{{ trans('menu.blog-style-three') }}</a>
                                    </li>
                                    <li><a href="{{ route('pages.blog.detail', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/blog/detail') ? 'active' : '' }}">{{ trans('menu.blog-detail') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.terms', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/terms-and-condition') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-question-circle"></span>
                                            <span class="menu-text">{{ trans('menu.terms-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.maintenance', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/maintenance') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-airplay"></span>
                                            <span class="menu-text">{{ trans('menu.maintenance-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.404', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/404') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-exclamation-triangle"></span>
                                            <span class="menu-text">{{ trans('menu.not-found-menu-title') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.coming_soon', app()->getLocale()) }}"
                                            class="{{ Request::is(app()->getLocale() . '/pages/coming-soon') ? 'active' : '' }}">
                                            <span class="nav-icon uil uil-sync"></span>
                                            <span class="menu-text">{{ trans('menu.coming-soon-menu-title') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="mega-item has-subMenu">
                        <a href="#"
                            class="{{ Request::is(app()->getLocale() . '/ui/*') ? 'active' : '' }}">Components</a>
                        <ul class="megaMenu-wrapper megaMenu-wide">
                            <li>
                                <span class="mega-title">Components</span>
                                <ul>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/alert') ? 'active' : '' }}"
                                            href="{{ route('ui.alert', app()->getLocale()) }}">{{ trans('menu.ui-alert') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/avatar') ? 'active' : '' }}"
                                            href="{{ route('ui.avatar', app()->getLocale()) }}">{{ trans('menu.ui-avatar') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/badge') ? 'active' : '' }}"
                                            href="{{ route('ui.badge', app()->getLocale()) }}">{{ trans('menu.ui-badge') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/breadcrumps') ? 'active' : '' }}"
                                            href="{{ route('ui.breadcrumps', app()->getLocale()) }}">{{ trans('menu.ui-breadcrumb') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/button') ? 'active' : '' }}"
                                            href="{{ route('ui.button', app()->getLocale()) }}">{{ trans('menu.ui-button') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/card') ? 'active' : '' }}"
                                            href="{{ route('ui.card', app()->getLocale()) }}">{{ trans('menu.ui-card') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/carousel') ? 'active' : '' }}"
                                            href="{{ route('ui.carousel', app()->getLocale()) }}">{{ trans('menu.ui-carousel') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/checkbox') ? 'active' : '' }}"
                                            href="{{ route('ui.checkbox', app()->getLocale()) }}">{{ trans('menu.ui-checkbox') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/collapse') ? 'active' : '' }}"
                                            href="{{ route('ui.collapse', app()->getLocale()) }}">{{ trans('menu.ui-collapse') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/comments') ? 'active' : '' }}"
                                            href="{{ route('ui.comments', app()->getLocale()) }}">{{ trans('menu.ui-comment') }}</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <span class="mega-title">Components</span>
                                <ul>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/dashboard-base') ? 'active' : '' }}"
                                            href="{{ route('ui.dashboard_base', app()->getLocale()) }}">{{ trans('menu.ui-dashboard-base') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/datepicker') ? 'active' : '' }}"
                                            href="{{ route('ui.datepicker', app()->getLocale()) }}">{{ trans('menu.ui-date-picker') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/drawer') ? 'active' : '' }}"
                                            href="{{ route('ui.drawer', app()->getLocale()) }}">{{ trans('menu.ui-drawer') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/drag-drop') ? 'active' : '' }}"
                                            href="{{ route('ui.drag_drop', app()->getLocale()) }}">{{ trans('menu.ui-drag-drop') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/dropdown') ? 'active' : '' }}"
                                            href="{{ route('ui.dropdown', app()->getLocale()) }}">{{ trans('menu.ui-dropdown') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/empty') ? 'active' : '' }}"
                                            href="{{ route('ui.empty', app()->getLocale()) }}">{{ trans('menu.ui-empty') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/grid') ? 'active' : '' }}"
                                            href="{{ route('ui.grid', app()->getLocale()) }}">{{ trans('menu.ui-grid') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/input') ? 'active' : '' }}"
                                            href="{{ route('ui.input', app()->getLocale()) }}">{{ trans('menu.ui-input') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/list') ? 'active' : '' }}"
                                            href="{{ route('ui.list', app()->getLocale()) }}">{{ trans('menu.ui-list') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/menu') ? 'active' : '' }}"
                                            href="{{ route('ui.menu', app()->getLocale()) }}">{{ trans('menu.ui-menu') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/message') ? 'active' : '' }}"
                                            href="{{ route('ui.message', app()->getLocale()) }}">{{ trans('menu.ui-message') }}</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <span class="mega-title">Components</span>
                                <ul>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/modals') ? 'active' : '' }}"
                                            href="{{ route('ui.modals', app()->getLocale()) }}">{{ trans('menu.ui-modal') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/notification') ? 'active' : '' }}"
                                            href="{{ route('ui.notification', app()->getLocale()) }}">{{ trans('menu.ui-notification') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/page-header') ? 'active' : '' }}"
                                            href="{{ route('ui.page_header', app()->getLocale()) }}">{{ trans('menu.ui-page-header') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/pagination') ? 'active' : '' }}"
                                            href="{{ route('ui.pagination', app()->getLocale()) }}">{{ trans('menu.ui-pagination') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/progress') ? 'active' : '' }}"
                                            href="{{ route('ui.progress', app()->getLocale()) }}">{{ trans('menu.ui-progress') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/radio') ? 'active' : '' }}"
                                            href="{{ route('ui.radio', app()->getLocale()) }}">{{ trans('menu.ui-radio') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/rate') ? 'active' : '' }}"
                                            href="{{ route('ui.rate', app()->getLocale()) }}">{{ trans('menu.ui-rate') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/result') ? 'active' : '' }}"
                                            href="{{ route('ui.result', app()->getLocale()) }}">{{ trans('menu.ui-result') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/select') ? 'active' : '' }}"
                                            href="{{ route('ui.select', app()->getLocale()) }}">{{ trans('menu.ui-select') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/skeleton') ? 'active' : '' }}"
                                            href="{{ route('ui.skeleton', app()->getLocale()) }}">{{ trans('menu.ui-skeleton') }}</a>
                                    </li>

                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/timepicker') ? 'active' : '' }}"
                                            href="{{ route('ui.timepicker', app()->getLocale()) }}">{{ trans('menu.ui-time-picker') }}</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <span class="mega-title">Components</span>
                                <ul>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/slider') ? 'active' : '' }}"
                                            href="{{ route('ui.slider', app()->getLocale()) }}">{{ trans('menu.ui-slider') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/spinner') ? 'active' : '' }}"
                                            href="{{ route('ui.spinner', app()->getLocale()) }}">{{ trans('menu.ui-spinner') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/statistic') ? 'active' : '' }}"
                                            href="{{ route('ui.statistic', app()->getLocale()) }}">{{ trans('menu.ui-statistic') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/steps') ? 'active' : '' }}"
                                            href="{{ route('ui.steps', app()->getLocale()) }}">{{ trans('menu.ui-step') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/switch') ? 'active' : '' }}"
                                            href="{{ route('ui.switch', app()->getLocale()) }}">{{ trans('menu.ui-switch') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/tab') ? 'active' : '' }}"
                                            href="{{ route('ui.tab', app()->getLocale()) }}">{{ trans('menu.ui-tab') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/tags') ? 'active' : '' }}"
                                            href="{{ route('ui.tags', app()->getLocale()) }}">{{ trans('menu.ui-tag') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/timeline') ? 'active' : '' }}"
                                            href="{{ route('ui.timeline', app()->getLocale()) }}">{{ trans('menu.ui-timeline') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/timeline2') ? 'active' : '' }}"
                                            href="{{ route('ui.timeline2', app()->getLocale()) }}">{{ trans('menu.ui-timeline2') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/timeline3') ? 'active' : '' }}"
                                            href="{{ route('ui.timeline3', app()->getLocale()) }}">{{ trans('menu.ui-timeline3') }}</a>
                                    </li>
                                    <li><a class="{{ Request::is(app()->getLocale() . '/ui/uploads') ? 'active' : '' }}"
                                            href="{{ route('ui.uploads', app()->getLocale()) }}">{{ trans('menu.ui-upload') }}</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="navbar-right">
        <ul class="navbar-right__menu">
            <li class="nav-search">
                <a href="#" class="search-toggle">
                    <i class="uil uil-search"></i>
                    <i class="uil uil-times"></i>
                </a>
                <form action="/" class="search-form-topMenu">
                    <span class="search-icon uil uil-search"></span>
                    <input class="form-control me-sm-2 box-shadow-none" type="search" placeholder="Search..."
                        aria-label="Search">
                </form>
            </li>

            <li class="nav-author">
                <div class="dropdown-custom">
                    <a href="javascript:;" class="nav-item-toggle"><img
                            src="{{ asset('assets/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                        @if (Auth::check())
                            <span class="nav-item__title">{{ Auth::user()->name }}<i
                                    class="las la-angle-down nav-item__arrow"></i></span>
                        @endif
                    </a>
                    <div class="dropdown-wrapper">
                        <div class="nav-author__info">
                            <div class="author-img">
                                <img src="{{ asset('assets/img/author-nav.jpg') }}" alt=""
                                    class="rounded-circle">
                            </div>
                            <div>
                                @if (Auth::check())
                                    <h6 class="text-capitalize">{{ Auth::user()->name }}</h6>
                                @endif
                                <span>UI Designer</span>
                            </div>
                        </div>
                        <div class="nav-author__options">
                            <ul>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/user.svg') }}" alt="user"
                                            class="svg"> Profile</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/settings.svg') }}" alt="settings"
                                            class="svg"> Settings</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/key.svg') }}" alt="key"
                                            class="svg"> Billing</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/users.svg') }}" alt="users"
                                            class="svg"> Activity</a>
                                </li>
                                <li>
                                    <a href="">
                                        <img src="{{ asset('assets/img/svg/bell.svg') }}" alt="bell"
                                            class="svg"> Help</a>
                                </li>
                            </ul>
                            <a href="" class="nav-author__signout"
                                onclick="event.preventDefault();document.getElementById('logout').submit();">
                                <img src="{{ asset('assets/img/svg/log-out.svg') }}" alt="log-out" class="svg">
                                Sign Out</a>
                            <form style="display:none;" id="logout" action="{{ route('logout') }}"
                                method="POST">
                                @csrf
                                @method('post')
                            </form>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="navbar-right__mobileAction d-md-none">
            <a href="#" class="btn-search">
                <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg feather-search">
                <img src="{{ asset('assets/img/svg/x.svg') }}" alt="x" class="svg feather-x">
            </a>
            <a href="#" class="btn-author-action">
                <img src="{{ asset('assets/img/svg/more-vertical.svg') }}" alt="more-vertical" class="svg"></a>
        </div>
    </div>
</nav>
