<x-app-layout>
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <!-- Column for heading -->
              <div class="col-sm-6">
                  <h1 class="m-0">Employees of <b>{{ $company->name }}</b></h1>
              </div><!-- /.col -->
  
              <!-- Column for button -->
              <div class="col-sm-6 text-right">
                  <a href="{{ route('companies.employees.create', $company->id) }}" class="btn btn-primary">+ Add Employee</a>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>

  <div class="row mt-4">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">All Employees</h3>

                  <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                          <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                  <i class="fas fa-search"></i>
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
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
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </div>
  </div>
</x-app-layout>