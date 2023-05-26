<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
    <a href="{{ route('ComplexityItem.index') }}" class="nav-link {{ Request::is('ComplexityItem') ? 'active' : '' }}">
        <i class="nav-icon fas fa-square"></i>
        <p>Points de complexités</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('projects.index') }}" class="nav-link {{ Request::is('projects') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Projects</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('optionsttm.index') }}" class="nav-link {{ Request::is('optionsttm') ? 'active' : '' }}">
        <i class="nav-icon fas fa-columns"></i>
        <p>Option Ttm</p>
    </a>
</li>