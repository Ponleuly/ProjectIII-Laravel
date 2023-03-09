    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="{{url('admin/dashboard')}}">
                <h3 class="text-primary fw-bold">15Steps</h3>
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item {{Request::is('admin/dashboard')? 'active':''}}">
                    <a href="{{url('admin/dashboard')}}">
                        <span class="icon">
                            <span class="material-icons-round">dashboard</span>
                        </span>
                        <span class="text"><strong>Dashboard</strong></span>
                    </a>
                </li>

                <li class="nav-item nav-item-has-children
                    {{Request::is('admin/product-detail*')? 'active':''}}||
                    {{Request::is('admin/product-group*')? 'active':''}}||
                    {{Request::is('admin/product-category*')? 'active':''}}||
                    {{Request::is('admin/product-size*')? 'active':''}}
                    ">
                    <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_1"
                        aria-controls="ddmenu_1"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        >
                        <span class="icon">
                            <span class="material-icons-round">inventory_2</span>
                        </span>
                        <span class="text"><strong>Products</strong></span>
                    </a>
                    <ul id="ddmenu_1" class="collapse dropdown-nav">
                        <li>
                            <a
                                href="{{url('admin/product-detail-list')}}"
                                class="{{Request::is('admin/product-detail-list')? 'active':''}}"
                                >
                                Product List
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/product-detail-add')}}"
                                class="{{Request::is('admin/product-detail-add')? 'active':''}}"
                                >
                                Product Add
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/product-group-list')}}"
                                class="{{Request::is('admin/product-group-list')? 'active':''}}"
                                >
                                Product Group List
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/product-group-add')}}"
                                class="{{Request::is('admin/product-group-add')? 'active':''}}"
                                >
                                Product Group Add
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/product-size-list')}}"
                                class="{{Request::is('admin/product-size-list')? 'active':''}}"
                                >
                                Product Size List
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/product-size-add')}}"
                                class="{{Request::is('admin/product-size-add')? 'active':''}}"
                                >
                                Product Size Add
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/delivery-list')}}"
                                class="{{Request::is('admin/delivery-list')? 'active':''}}"
                                >
                                Delivery List
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/delivery-add')}}"
                                class="{{Request::is('admin/delivery-add')? 'active':''}}"
                                >
                                Delivery Add
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item nav-item-has-children
                    {{Request::is('admin/product-category*')? 'active':''}}"
                    >
                    <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_2"
                        aria-controls="ddmenu_2"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        >
                        <span class="icon">
                            <span class="material-icons-round">category</span>
                        </span>
                        <span class="text"><strong>Categories</strong></span>
                    </a>
                    <ul id="ddmenu_2" class="collapse dropdown-nav">
                        <li>
                            <a
                                href="{{url('admin/product-category-list')}}"
                                class="{{Request::is('admin/product-category-list')? 'active':''}}"
                                >
                                Category List
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/product-category-add')}}"
                                class="{{Request::is('admin/product-category-add')? 'active':''}}"
                                >
                                Category Add</a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/product-category-sub-list')}}"
                                class="{{Request::is('admin/product-category-sub-list')? 'active':''}}"
                                >
                                Subcategory List</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-has-children">
                    <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_3"
                        aria-controls="ddmenu_3"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        >
                        <span class="icon">
                            <span class="material-icons-round">shopping_cart</span>
                        </span>
                        <span class="text"><strong>Orders</strong></span>
                    </a>
                    <ul id="ddmenu_3" class="collapse dropdown-nav">
                        <li>
                            <a href="{{url('admin/order-list')}}">Order List</a>
                        </li>
                        <li>
                            <a href="{{url('admin/order-status-option')}}">Order Status Option</a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item nav-item-has-children">
                    <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_4"
                        aria-controls="ddmenu_4"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        >
                        <span class="icon">
                            <span class="material-icons-round">card_giftcard</span>
                        </span>
                        <span class="text"><strong>Coupons</strong></span>
                    </a>
                    <ul id="ddmenu_4" class="collapse dropdown-nav">
                        <li>
                            <a
                                href="{{url('admin/coupon-list')}}"
                                class="{{Request::is('admin/coupon-list')? 'active':''}}"
                                >
                                Coupon List
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/coupon-add')}}"
                                class="{{Request::is('admin/coupon-add')? 'active':''}}"
                                >Coupon Add
                            </a>
                        </li>
                    </ul>
                </li>
                 <li
                    class="nav-item nav-item-has-children
                    {{Request::is('admin/customer*')? 'active':''}}"
                    >
                    <a
                        href="#0"
                        class="collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#ddmenu_5"
                        aria-controls="ddmenu_5"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                        >
                        <span class="icon">
                            <span class="material-icons-round">group</span>
                        </span>
                        <span class="text"><strong>Customers</strong></span>
                    </a>
                    <ul id="ddmenu_5" class="collapse dropdown-nav">
                        <li>
                            <a
                                href="{{url('admin/customer-member-list')}}"
                                class="{{Request::is('admin/customer-member-list')? 'active':''}}"
                                >
                                Members List
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{url('admin/customer-list')}}"
                                class="{{Request::is('admin/customer-list')? 'active':''}}"
                                >
                                Customers List</a>
                        </li>
                    </ul>
                </li>

                 <li class="nav-item nav-item-has-children">
                    <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_6"
                    aria-controls="ddmenu_6"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                        <span class="icon">
                            <span class="material-icons-round">description</span>
                        </span>
                        <span class="text"><strong>News</strong></span>
                    </a>
                    <ul id="ddmenu_6" class="collapse dropdown-nav">
                        <li>
                            <a href="{{url('admin/news-list')}}">
                                News & Introducing List
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/news-add')}}">
                                News & Introducing Add
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item nav-item-has-children">
                    <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_7"
                    aria-controls="ddmenu_7"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                        <span class="icon">
                            <span class="material-icons-round">settings</span>
                        </span>
                        <span class="text"><strong>Settings</strong></span>
                    </a>
                    <ul id="ddmenu_7" class="collapse dropdown-nav">
                        <li>
                            <a href="{{url('admin/general-setting')}}">
                                General Setting
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/general-setting-edit')}}">
                                General Setting Edit
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/general-layout')}}">
                                Layout View
                            </a>
                        </li>
                        <li>
                            <a href="{{url('admin/contact-list')}}">
                                Contacts
                            </a>
                        </li>
                    </ul>
                </li>
                <span class="divider"><hr /></span>
            </ul>
        </nav>
        <div class="promo-box">
            <h3 class="mb-3">15Steps Admin</h3>
            <a href="{{url('admin/logout')}}"
               class="main-btn primary-btn btn-hover"
                >
                Log Out
            </a>
        </div>
    </aside>