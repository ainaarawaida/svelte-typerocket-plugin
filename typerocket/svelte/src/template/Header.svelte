<script>
import HeaderScript from "./HeaderScript.svelte";

</script>

<HeaderScript />

<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row m-0">
            <div class="main-header-left">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{baseurl}/images/logo/logo.png" alt=""></a></div>
                <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid" src="{baseurl}/images/logo/dark-logo.png" alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
            </div>
            <div class="left-menu-header col">
                <ul>
                    <li>
                        <form class="form-inline search-form">
                            <div class="search-bg"><i class="fa fa-search"></i>
                                <input class="form-control-plaintext" placeholder="Search here.....">
                            </div>
                        </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                    </li>
                </ul>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>

                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light" type="button"><a href="{logoutURL}"><i data-feather="log-out"></i>Log out</a></button>
                    </li>
                </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
            <div class="sidebar-user text-center"><Link class="setting-primary" to="/myaccount/users/edit/{currentUser.ID}"><i data-feather="settings"></i></Link><img class="img-90 rounded-circle" src="{gravatar_url}" alt="">
                <div class="badge-bottom"></div><Link to="/myaccount/users/edit/{currentUser.ID}">
                    <h6 class="mt-3 f-14 f-w-600">{currentUser.data.display_name} </h6></Link>
                <p class="mb-0 font-roboto">{currentUser.roles[0]}</p>
            </div>
            <nav>
                <div class="main-navbar">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="mainnav">
                        <ul class="nav-menu custom-scrollbar">
                            <li class="back-btn">
                                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                            </li>
                            <li><Link class="nav-link menu-title link-nav {curLoc.indexOf('myaccount') == 1 && curLoc.length == 2 ? 'active' : ''}" to="/myaccount"><i data-feather="headphones"></i><span>Dashboard</span></Link></li>
                            <li class="dropdown">
                                <a class="nav-link menu-title {curLoc.indexOf('invoices') == 2 || curLoc.indexOf('invoice_items') == 2  ? 'active' : ''}" href="#"
                                    ><i data-feather="command" /><span>Invoices</span></a
                                >
                                <ul class="nav-submenu menu-content">
                                    <li><Link class=" {curLoc.indexOf('invoices') == 2 ? 'active' : ''}" to="/myaccount/invoices"><i data-feather="headphones"></i><span>Invoices</span></Link></li>
                                    <!-- <li><Link class=" {curLoc.indexOf('invoice_items') == 2 ? 'active' : ''}" to="/myaccount/invoice_items"><i data-feather="headphones"></i><span>Invoice Items</span></Link></li> -->
                                </ul>
                            </li>
                          
                            <li><Link class="nav-link menu-title link-nav {curLoc.indexOf('attachments') == 2 ? 'active' : ''}" to="/myaccount/attachments"><i data-feather="headphones"></i><span>Attachments</span></Link></li>
                            <li><Link class="nav-link menu-title link-nav {curLoc.indexOf('notes') == 2 ? 'active' : ''}" to="/myaccount/notes"><i data-feather="headphones"></i><span>Notes</span></Link></li>
                            <li><Link class="nav-link menu-title link-nav {curLoc.indexOf('products') == 2 ? 'active' : ''}" to="/myaccount/products"><i data-feather="headphones"></i><span>Products</span></Link></li>
                          
                            <li class="dropdown">
                                <a class="nav-link menu-title {curLoc.indexOf('recurring_invoices') == 2 || curLoc.indexOf('invoice_frequencies') == 2  ? 'active' : ''}" href="#"
                                    ><i data-feather="command" /><span>Recurring Invoices</span></a
                                >
                                <ul class="nav-submenu menu-content">
                                    <li><Link class=" {curLoc.indexOf('recurring_invoices') == 2 ? 'active' : ''}" to="/myaccount/recurring_invoices"><i data-feather="headphones"></i><span>Recurring Invoices</span></Link></li>
                                    <!-- <li><Link class=" {curLoc.indexOf('invoice_frequencies') == 2 ? 'active' : ''}" to="/myaccount/invoice_frequencies"><i data-feather="headphones"></i><span>Invoice Frequencies</span></Link></li> -->
                                </ul>
                            </li>
                            <li><Link class="nav-link menu-title link-nav {curLoc.indexOf('payments') == 2  ? 'active' : ''}" to="/myaccount/payments"><i data-feather="headphones"></i><span>Payments</span></Link></li>
                            <li class="dropdown">
                                <a class="nav-link menu-title {curLoc.indexOf('users') == 2 || curLoc.indexOf('user_details') == 2  ? 'active' : ''}" href="#"
                                  ><i data-feather="command" /><span>Users</span></a
                                >
                                <ul class="nav-submenu menu-content">
                                  <li><Link class=" {curLoc.indexOf('users') == 2 ? 'active' : ''}" to="/myaccount/users"><i data-feather="headphones"></i><span>Users</span></Link></li>
                                  <!-- <li><Link class=" {curLoc.indexOf('user_details') == 2 ? 'active' : ''}" to="/myaccount/user_details"><i data-feather="headphones"></i><span>User Details</span></Link></li> -->
                                </ul>
                              </li>
                            <!-- <li><Link class="nav-link menu-title link-nav {curLoc.indexOf('samples') == 2  ? 'active' : ''}" to="/samples"><i data-feather="headphones"></i><span>samples</span></Link></li> -->
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </div>
            </nav>
        </header>