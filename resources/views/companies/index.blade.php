<x-app-layout>
  <style>
    .btn-purplee {
    background-color: #405cf5;
    color: white;
}
  </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- Column for heading -->
                <div class="col-sm-6">
                    <h1 class="m-0">Companies</h1>
                </div><!-- /.col -->
    
                <!-- Column for button -->
                <div class="col-sm-6 text-right">
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">+ Add Company</a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    
    
    
      
      <div class="row mt-4">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Companies</h3>

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
                          <th>Logo</th>
                          <th>Name of Company</th>
                          <th>Email</th>
                          <th>Website</th> 
                          <th>Actions</th> <!-- New Action column -->
                      </tr>
                  </thead>
                  <tbody>
                      @if ($companies->isEmpty())
                          <tr>
                              <td colspan="6">No companies yet</td>
                          </tr>
                      @else
                          @foreach ($companies as $company)
                          <tr>
                            <td>{{ $company->id }}</td>
                            <td>
                                @if ($company->logo)
                                    <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="logo" width="40px" height="40px">
                                @else
                                    <span>No logo available</span>
                                @endif
                            </td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                                <!-- Delete Button -->
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">Delete</button>
                                </form>
                                
                                <!-- Employees Button -->
                                <a href="{{ route('companies.employees.index', $company->id) }}" class="btn btn-sm btn-info">Employees</a>
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