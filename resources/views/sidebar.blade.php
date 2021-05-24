
<nav id="sidebar" class="sidebar">
  <div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="{{ route('home') }}" style="background: rgba(0, 0, 0, 0.2);">
      <span class="align-middle">{{ config('app.name') }}</span>
    </a>
                
    <ul class="sidebar-nav">

      <li class="sidebar-header">
        {{ __('global.dashboard') }}
      </li>

      <li class="sidebar-item home">
        <a class="sidebar-link" href="{{ route('home') }}">
          <i class="align-middle" data-feather="sliders"></i> 
          <span class="align-middle">{{ __('global.dashboard') }}</span>
        </a>
      </li>
      <li class="sidebar-item userprofile">
        <a class="sidebar-link" href="{{ route('userprofile') }}">
          <i class="align-middle" data-feather="user"></i> <span class="align-middle">{{ __('user.profile') }}</span>
        </a>
      </li>

      <li class="sidebar-header">
        @if( isGranted('CONTACT') ) {{ __('contact.menu') }} / @endif 
        @if( isGranted('CLIENT') ) {{ __('client.menu') }} @endif
      </li>

      @if( isGranted('CONTACT') )
      <li class="sidebar-item parent contact contactcategorie">
        <a data-bs-target="#contact" data-bs-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">{{ __('contact.menu') }}</span>
        </a>
        <ul id="contact" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
          <li class="sidebar-item contact"><a class="sidebar-link" href="{{ route('contact') }}">{{ __('contact.module_name') }}</a></li>
          <li class="sidebar-item contactcategorie"><a class="sidebar-link" href="{{ route('contactcategorie') }}">{{ __('contactcategorie.module_name') }}</a></li>
        </ul>
      </li>
      @endif

      @if( isGranted('CLIENT') )
      <li class="sidebar-item parent client clientcategorie">
        <a data-bs-target="#client" data-bs-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">{{ __('client.menu') }}</span>
        </a>
        <ul id="client" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
          <li class="sidebar-item client"><a class="sidebar-link" href="{{ route('client') }}">{{ __('client.module_name') }}</a></li>
          <li class="sidebar-item clientcategorie"><a class="sidebar-link" href="{{ route('clientcategorie') }}">{{ __('clientcategorie.module_name') }}</a></li>
        </ul>
      </li>
      @endif


      <li class="sidebar-header">
        @if( isGranted('CASE') ) {{ __('casee.menu') }} / @endif 
        @if( isGranted('COURT') ) {{ __('court.menu') }} @endif
      </li>

      @if( isGranted('CASE') )
      <li class="sidebar-item parent casee stage act casecategorie">
        <a data-bs-target="#casee" data-bs-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="award"></i> <span class="align-middle">{{ __('casee.menu') }}</span>
        </a>
        <ul id="casee" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
          <li class="sidebar-item act"><a class="sidebar-link" href="{{ route('act') }}">{{ __('act.module_name') }}</a></li>
          <li class="sidebar-item stage"><a class="sidebar-link" href="{{ route('stage') }}">{{ __('stage.module_name') }}</a></li>
          <li class="sidebar-item casecategorie"><a class="sidebar-link" href="{{ route('casecategorie') }}">{{ __('casecategorie.module_name') }}</a></li>
          <li class="sidebar-item casee"><a class="sidebar-link" href="{{ route('casee') }}">{{ __('casee.module_name') }}</a></li>
        </ul>
      </li>
      @endif

      @if( isGranted('COURT') )
      <li class="sidebar-item parent court courtcategorie">
        <a data-bs-target="#court" data-bs-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="package"></i> <span class="align-middle">{{ __('court.menu') }}</span>
        </a>
        <ul id="court" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

          <li class="sidebar-item court"><a class="sidebar-link" href="{{ route('court') }}">{{ __('court.module_name') }}</a></li>
          <li class="sidebar-item courtcategorie"><a class="sidebar-link" href="{{ route('courtcategorie') }}">{{ __('courtcategorie.module_name') }}</a></li>

        </ul>
      </li>
      @endif

      @if( isGranted('APPOINTMENT') )
      <li class="sidebar-item appointment">
        <a class="sidebar-link" href="{{ route('appointment') }}">
          <i class="align-middle" data-feather="target"></i> 
          <span class="align-middle">{{ __('appointment.menu') }}</span>
        </a>
      </li>
      @endif

      @if( isGranted('TASK') )
      <li class="sidebar-item task">
        <a class="sidebar-link" href="{{ route('task') }}">
          <i class="align-middle" data-feather="check-square"></i> 
          <span class="align-middle">{{ __('task.menu') }}</span>
        </a>
      </li>
      @endif

      @if( isGranted('TODO') )
      <li class="sidebar-item todo">
        <a class="sidebar-link" href="{{ route('todo') }}">
          <i class="align-middle" data-feather="list"></i> 
          <span class="align-middle">{{ __('todo.menu') }}</span>
        </a>
      </li>
      @endif

      @if( isGranted('EVENT') )
      <li class="sidebar-item event">
        <a class="sidebar-link" href="{{ route('event') }}">
          <i class="align-middle" data-feather="calendar"></i> 
          <span class="align-middle">{{ __('event.menu') }}</span>
        </a>
      </li>
      @endif


      @if( isGranted('ADMIN') )

      <li class="sidebar-header">
        {{ __('user.menu') }}
      </li>

      <li class="sidebar-item user">
        <a class="sidebar-link" href="{{ route('user') }}">
          <i class="align-middle" data-feather="users"></i> <span class="align-middle">{{ __('user.module_name') }}</span>
        </a>
      </li>

      <li class="sidebar-item groupe">
        <a class="sidebar-link" href="{{ route('groupe') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('groupe.module_name') }}</span>
        </a>
      </li>

      @endif

      @if( isGranted('LEAVE') )
      <li class="sidebar-item parent leave leavetype">
        <a data-bs-target="#leave" data-bs-toggle="collapse" class="sidebar-link collapsed">
          <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">{{ __('leave.menu') }}</span>
        </a>
        <ul id="leave" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

          <li class="sidebar-item leave"><a class="sidebar-link" href="{{ route('leave') }}">{{ __('leave.module_name') }}</a></li>
          <li class="sidebar-item leavetype"><a class="sidebar-link" href="{{ route('leavetype') }}">{{ __('leavetype.module_name') }}</a></li>

        </ul>
      </li>
      @endif

      @if( isGranted('LAWYER') )
      <li class="sidebar-item lawyer">
        <a class="sidebar-link" href="{{ route('lawyer') }}">
          <i class="align-middle" data-feather="flag"></i> <span class="align-middle">{{ __('lawyer.module_name') }}</span>
        </a>
      </li>
      @endif

      @if( isGranted('ADMIN') )

      <li class="sidebar-header">
        {{ __('front.menu') }}
      </li>

      <li class="sidebar-item article">
        <a class="sidebar-link" href="{{ route('article') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('article.module_name') }}</span>
        </a>
      </li>
      <li class="sidebar-item categorie">
        <a class="sidebar-link" href="{{ route('categorie') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('categorie.module_name') }}</span>
        </a>
      </li>
      <li class="sidebar-item page">
        <a class="sidebar-link" href="{{ route('page') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('page.module_name') }}</span>
        </a>
      </li>
      <li class="sidebar-item slider">
        <a class="sidebar-link" href="{{ route('slider') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('slider.module_name') }}</span>
        </a>
      </li>
      <li class="sidebar-item service">
        <a class="sidebar-link" href="{{ route('service') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('service.module_name') }}</span>
        </a>
      </li>
      <li class="sidebar-item team">
        <a class="sidebar-link" href="{{ route('team') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('team.module_name') }}</span>
        </a>
      </li>
      <li class="sidebar-item front">
        <a class="sidebar-link" href="{{ route('front_setting') }}">
          <i class="align-middle" data-feather="book"></i> <span class="align-middle">{{ __('front.module_name') }}</span>
        </a>
      </li>

      @endif

    </ul>

    <div style="margin-top: 50px; padding: 15px;color: #c4c4c4;text-align: center; border-top: solid 1px #414c58;font-weight: bold;">{{ __('global.copyright') }} &copy; {{ date('Y') }} </div>

  </div>
</nav>

<script type="text/javascript">
  $(document).ready(function(){
    $('.sidebar-item.{{ explode('_',\Request::route()->getName())[0] }}').addClass('active');
    $('.sidebar-item.{{ explode('_',\Request::route()->getName())[0] }} .sidebar-dropdown').addClass('show');
  })
</script>