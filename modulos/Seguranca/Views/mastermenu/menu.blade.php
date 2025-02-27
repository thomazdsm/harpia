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