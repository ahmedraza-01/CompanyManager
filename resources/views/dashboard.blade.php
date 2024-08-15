<x-app-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @if (auth()->user()->hasRole('admin'))
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>2</h3>

                                <p>Total Managers</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <a href="{{ route('users.create') }}" class="small-box-footer">Add Manager <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalCompanies }}</h3>

                                <p>Total Companies</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <a href="{{ route('companies.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $totalEmployees }}<sup style="font-size: 20px"></sup></h3>

                                <p>Total Employees</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @else
                @php
                // Get the company of the logged-in user
                $company = auth()->user()->company;
                $employees = $company ? $company->employees : collect();
            @endphp
                <div class="card-body table-responsive p-0">
                  <h1><b></b></h1>
                  <table class="table table-hover text-nowrap">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Actions</th> <!-- New Action column -->
                          </tr>
                      </thead>
                      <tbody>
                          @if ($employees->isEmpty())
                              <tr>
                                  <td colspan="6">No employees yet</td>
                              </tr>
                          @else
                              @foreach ($employees as $employee)
                                  <tr>
                                      <td>{{ $employee->id }}</td>
                                      <td>{{ $employee->first_name }}</td>
                                      <td>{{ $employee->last_name }}</td>
                                      <td>{{ $employee->email }}</td>
                                      <td>{{ $employee->phone }}</td>
                                      <td>
                                          <!-- Edit Button -->
                                          <a href="{{ route('companies.employees.edit', [$company->id, $employee->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                          
                                          <!-- Delete Button -->
                                          <form action="{{ route('companies.employees.destroy', [$company->id, $employee->id]) }}" method="POST" style="display:inline;">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                          @endif
                      </tbody>
                  </table>
              </div>
                                          
            @endif
            <!-- ./col -->

            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->

    </section>
</x-app-layout>
