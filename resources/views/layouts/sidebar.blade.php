<!-- Left Sidebar -->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('home') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @canany([
                'permission.show',
                'roles.show',
                'user.show'
            ])
            <li class=" nav-item">
                <a href="#!">
                    <i class="fas fa-users-cog"></i>
                    <span class="menu-title" data-i18n="userManagement" style="white-space: break-spaces;">@lang('cruds.userManagement.title')</span>
                </a>
                <ul class="menu-content">
                    @can('permission.show')
                        <li class="{{ Request::is('permission*') ? 'active' :'' }}">
                            <a href="{{ route('permissionIndex') }}">
                                <i class="fas fa-key"></i>
                                <span class="menu-item" data-i18n="user">@lang('cruds.permission.title_singular')</span>
                            </a>
                        </li>
                    @endcan
                    @can('roles.show')
                        <li class="{{ Request::is('role*') ? 'active' :'' }}">
                            <a href="{{ route('roleIndex') }}">
                                <i class="fas fa-user-lock"></i>
                                <span class="menu-item" data-i18n="roles">@lang('cruds.role.fields.roles')</span>
                            </a>
                        </li>
                    @endcan
                    @can('user.show')
                        <li class="{{ Request::is('user*') ? 'active':'' }}">
                            <a href="{{ route('userIndex') }}">
                                <i class="fas fa-user-friends"></i>
                                <span class="menu-item" data-i18n="user">@lang('cruds.user.title')</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            <li class=" navigation-header"><span>API Users</span>
            </li>
            @can('api-user.view')
                <li class="nav-item {{ Request::is('api-user*') ? 'active':'' }}">
                    <a href="{{ route('api-userIndex') }}">
                        <i class="fas fa-cog mr-0"></i>
                        <sub><i class="fas fa-child"></i></sub>
                        <span class="menu-item" data-i18n="APIUsers">API Users</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</div>
<!-- <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
            <a href="" class="nav-link">
            <i class="fas fa-palette"></i>
            <p>
                @lang('global.theme')
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
            <ul class="nav nav-treeview" style="display: none">
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'default']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-info"></i>
                        <p class="text">Default {{ auth()->user()->theme == 'default' ? '✅':'' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'light']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-white"></i>
                        <p>Light {{ auth()->user()->theme == 'light' ? '✅':'' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme',[auth()->id(),'theme' => 'dark']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-gray"></i>
                        <p>Dark {{ auth()->user()->theme == 'dark' ? '✅':'' }}</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav> -->
