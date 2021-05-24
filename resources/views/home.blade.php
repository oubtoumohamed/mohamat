@extends('standard')

@section('content') 

<h1 class="h3 mb-3"><strong>{{ __('global.dashboard') }}</strong></h1>


<div class="row">
	@if( isGranted('ADMIN') )
	@foreach( $results as $mdl=>$total)
	<div class="col-md-2">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title mb-4">
					<i class="align-middle" data-feather="{{ $icons[$mdl] }}"></i>&nbsp;&nbsp;
					{{ __($mdl.'.module_name') }}
				</h5>
				<h1 class="text-end fw-bold mb-0 m-2">{{ $total }}</h1>
			</div>
		</div>
	</div>
	@endforeach
	@else
	
	<div class="col-md-12">		
		<div style="text-align: center;padding: 20px;">
			<img src="{{ auth()->user()->getavatarfulllink() }}" class="avatar img-fluid rounded-circle" alt="" style="background: #f1f1f1;width: 120px;height: 120px;" />
			<div class="text-dark p-3" >{{ auth()->user() }}</div>
			{{ __('global.welcomemsg') }} 
		</div>
	</div>

	@endif
</div>

@endsection