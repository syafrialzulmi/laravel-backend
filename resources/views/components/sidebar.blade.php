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
                <a href="{{route('home.index')}}"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{route('user.index')}}"
                    class="nav-link"><i class="fas fa-person"></i><span>Users</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{route('question.index')}}"
                    class="nav-link"><i class="fas fa-question"></i><span>Questions</span></a>
            </li>
        </ul>
    </aside>
</div>
