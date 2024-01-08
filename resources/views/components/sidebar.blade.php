<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">BACKEND</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BCK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="{{route('home')}}"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Back End CBT TPA</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"
                    data-toggle="dropdown"><i class="fas fa-columns"></i> <span>CBT TPA</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{route('homecbt.index')}}"
                            class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{route('user.index')}}"
                            class="nav-link"><i class="fas fa-person"></i><span>All Users</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{route('question.index')}}"
                            class="nav-link"><i class="fas fa-question"></i><span>All Questions</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
