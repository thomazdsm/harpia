<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="{{ asset('img/modules.svg') }}" class="" alt="User Image">
    </div>
    <div class="info">
        <span class="d-block text-harpia-primary" style="font-weight: bold; text-transform: uppercase;">
            {{ $root->getName() }}
        </span>
    </div>
</div>

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if($root->hasChildren())
            @foreach($root->getChilds() as $child)
                @if($child->hasChildren())
                    @foreach($child->getChilds() as $grandchild)
                        @include('Seguranca::mastermenu.node', ['node' => $grandchild])
                    @endforeach
                @else
                    @include('Seguranca::mastermenu.node', ['node' => $child])
                @endif
            @endforeach
        @endif
    </ul>
</nav>