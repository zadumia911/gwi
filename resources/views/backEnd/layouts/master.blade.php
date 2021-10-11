<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GWI::@yield('title','Dashboard')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- Theme style -->

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
    <!-- DataTables end -->

    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/dist/css/toastr.min.css" />
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/dist/css/custom.css" />
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
              <img src="https://priyomach.com/public/uploads/avatar/avatar.png" style="width: 40px; height: 40px; margin-top: -8px;" alt="" /> <i class="fa fa-align-left"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
              <a href="{{route('superadmin.dashboard')}}" class="dropdown-item"> <i class="fa fa-home"></i> Dashboard </a>
              <div class="dropdown-divider"></div>
              <a href="{{url('password/change')}}" class="dropdown-item"> <i class="fa fa-key"></i> Change Password </a>
              <div class="dropdown-divider"></div>
              <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
                <i class="fa fa-sign-out-alt"></i>
                Logout
                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">@csrf</form>
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('superadmin.dashboard')}}" class="brand-link">
          <img src="{{asset('public/backEnd/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
          <span class="brand-text font-weight-light">GWI-Admin Panel</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item"></li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-cog"></i>
                  <p>
                    Setting
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('superadmin/companyinfo/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Company Info</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('superadmin/user/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('superadmin/user/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage User</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-user-tie"></i>
                  <p>
                    Salary Payment
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/employee/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Employee</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/employee/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Employee</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/salaryhead/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Salary Head</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/salaryhead/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Salary Head</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/salary/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Salary</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/salary/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Salary</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/employee-payment/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Payment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/employee-payment/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Payment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/employee-salary/report')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Salary Report</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-university"></i>
                  <p>
                    Bank Ledger
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/bank/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Bank</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/bank/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Bank</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/withdraw/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Bank Withdraw</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/withdraw/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Bank Withdraw</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/deposit/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Bank Deposit</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/deposit/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Bank Deposit</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fab fa-product-hunt"></i>
                  <p>
                    Product Information
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/category/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/category/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Category</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/brand/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Brand</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/brand/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Brand</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/product/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/product/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Product</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fab fa-product-hunt"></i>
                  <p>
                    Import
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/cnf/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add C & F</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/cnf/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage C & F</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcosthead/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Local Cost Head</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcosthead/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Head</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcost/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Local Cost</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcost/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Local Cost</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/product/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Local Cost Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/import/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Import</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/import/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Import</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/product/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Import Report</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa-cart-plus fas"></i>
                  <p>
                    Purchase & Supplier
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/supplier/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Supplier</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/supplier/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Supplier</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/purchase/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Purchase</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/purchase/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Purchase</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcost/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Purchase Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcost/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Supplier Ledger</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/product/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Supplier Due List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>
                    Sale & Customer
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/customer/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Customer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/customer/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Customer</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/sale/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sale</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/sale/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Sale</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcost/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Sale Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcost/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Customer Ledger</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/product/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Customer Due List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-gift"></i>
                  <p>
                    Customer Collection
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/customer/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Collection</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/customer/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Collection</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcosthead/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Collection Report</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa-paypal fab nav-icon"></i>
                  <p>
                    Supplier Payment
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/payment/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Payment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/payment/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Payment</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/localcosthead/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Payment Report</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>
                    Stock Ledger
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/customer/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Stock Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/customer/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Item Wise Stock Ledger</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-dollar-sign"></i>
                  <p>
                    Expense Entry
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/expensehead/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Add Head</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/expensehead/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Head</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/dailyexpense/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Daily Expense</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/dailyexpense/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Daily Expense</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-dollar-sign"></i>
                  <p>
                    Account Reports
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/expensehead/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Expense Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/expensehead/manage')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Income Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('editor/dailyexpense/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Bank Statement</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-dollar-sign"></i>
                  <p>
                    Cash Book
                    <i class="fas fa-caret-right right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('editor/expensehead/add')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Cash Book</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- nav-item end -->
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Green World International
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; @php echo date('Y') @endphp All rights reserved by GWI. Developed By <a href="https://websolutionit.com" target="_blank">Websolution IT</a>.</strong>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('public/backEnd/admin')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('public/backEnd/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/backEnd/admin')}}/dist/js/adminlte.min.js"></script>
    <script src="{{asset('public/backEnd/admin')}}/dist/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
    <script src="{{asset('public/backEnd/admin')}}/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
      //DataTables
      $(function () {
        $("#example1")
          .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print"],
          })
          .buttons()
          .container()
          .appendTo("#example1_wrapper .col-md-6:eq(0)");
      });
      // Select2
      $(".select2").select2();
      flatpickr(".myDate");
    </script>

    <script>
      $(function () {
        $(".fileupload").change(function () {
          $(".dvPreview").html("");
          var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
          if (regex.test($(this).val().toLowerCase())) {
            if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
              $(".dvPreview").show();
              $(".dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
            } else {
              if (typeof FileReader != "undefined") {
                $(".dvPreview").show();
                $(".dvPreview").append("<img />");
                var reader = new FileReader();
                reader.onload = function (e) {
                  $(".dvPreview img").attr("src", e.target.result);
                };
                reader.readAsDataURL($(this)[0].files[0]);
              } else {
                alert("This browser does not support FileReader.");
              }
            }
          } else {
            alert("Please upload a valid image file.");
          }
        });
      });
    </script>
  </body>
</html>
