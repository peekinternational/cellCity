========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{url('admin')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>

                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/addCustomer')}}">Add Customer</a></li>
                        <li><a href="{{url('admin/customers')}}">Customers List</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Technicians</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/addTechnician')}}">Add Technician</a></li>
                        <li><a href="{{url('admin/technicians')}}">Technicians List</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Repair</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/repairOrders')}}">Orders</a></li>
                        <li><a href="{{url('admin/brands/create')}}">Add Brand</a></li>
                        <li><a href="{{url('admin/brands')}}">Brands List</a></li>
                        <li><a href="{{url('admin/models/create')}}">Add Model</a></li>
                        <li><a href="{{url('admin/models')}}">Model List</a></li>
                        <li><a href="{{url('admin/repairTypes/create')}}">Add Repair Types</a></li>
                        <li><a href="{{url('admin/repairTypes')}}">Repair Types List</a></li>
                        <li><a href="{{url('admin/repair-steps')}}">Create Repair Order</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="ecommerce-products">Products</a></li>
                        <li><a href="ecommerce-product-detail">Product Detail</a></li>
                        <li><a href="ecommerce-orders">Orders</a></li>
                        <li><a href="ecommerce-customers">Customers</a></li>
                        <li><a href="ecommerce-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout">Checkout</a></li>
                        <li><a href="ecommerce-shops">Shops</a></li>
                        <li><a href="ecommerce-add-product">Add Product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>Zip Code Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/zipCode/create')}}">Add Zip Code</a></li>
                        <li><a href="{{url('admin/zipCode')}}">Zip Code List</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End
