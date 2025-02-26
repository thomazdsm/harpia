@if($node->hasChildren())
    <li class="nav-item menu-open">
        <a href="#" class="nav-link @if(MasterMenu::checkLeafIsActive($node)) active @endif">
            <i class="{{$node->getData()->mit_icone}}"></i>
            <p>
                {{$node->getData()->mit_nome}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @foreach($node->getChilds() as $leaf)
                @include('Seguranca::mastermenu.node', ['node' => $leaf])
            @endforeach
        </ul>
    </li>
@else
    <li class="nav-item">
        <a href="{{route($node->getData()->mit_rota)}}" class="nav-link @if(MasterMenu::checkLeafIsActive($node)) active @endif">
            <i class="{{$node->getData()->mit_icone}}"></i>
            @if($node->getData()->mit_item_pai)
                {{$node->getData()->mit_nome}}
            @else
                <p>
                    {{$node->getData()->mit_nome}}
                    <span class="right badge badge-danger">New</span>
                </p>
            @endif
        </a>
    </li>
@endif