@extends('admin.layout.master', ['page_slug' => "admin"])

@section('content')
<div class="container-fluid p-0">
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex justify-content-between align-items-center">
				<h4 class="card-title">{{__('Admin List')}}</h4>
				<a href="{{route('admin.create')}}" class="btn btm-sm btn-primary">{{__('Add Admin')}}</a>
			</div>

			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>{{__('SL')}}</th>
							<th>{{__('Name')}}</th>
							<th>{{__('Email')}}</th>
							<!-- <th>{{__('Status')}}</th> -->
							<th>{{__('Created At')}}</th>
							<th>{{__('Created_by')}}</th>
							<th>{{__('Active')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($admins as $admin)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$admin->name}}</td>
								<td>{{$admin->email}}</td>
								<td>{{date('d, M, Y', strtotime($admin->created_at))}}</td>
								<td>{{$admin->creater ? $admin->creater->name : 'System'}}</td>
								<td>
									<div class="btn-group d-flex align-items-center gap-3 flex-wrap">
										<a href="javascript:void(0)"
											class="btn btn-primary btn-rounded d-flex justify-content-center align-items-center p-2"
											style="max-width: 30px; max-height: 30px;" data-bs-toggle="dropdown"
											aria-expanded="true">
											<i class="icon-options-vertical"></i>

										</a>
										<ul class="dropdown-menu dropdown-menu-end">
											<li>
												<a href="{{route('admin.edit', encrypt($admin->id))}}"
													class="dropdown-item">Edit</a>
											</li>
											<li>
												<a href="javascript:void(0)" class="dropdown-item"
													onclick='document.getElementById("delete_form{{$loop->iteration}}").submit()'>Delete</a>

												<form id="delete_form{{$loop->iteration}}"
													action="{{route('admin.destroy', encrypt($admin->id))}}" method="POST"
													class="d-none">
													@csrf
													@method('DELETE')
												</form>
											</li>
										</ul>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
@endsection