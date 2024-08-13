<!-- resources/views/companies/employees/edit.blade.php -->
<x-app-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Employee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('companies.employees.index', $company->id) }}">Employees</a></li>
                        <li class="breadcrumb-item active">Edit Employee</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary" style="height: 80vh">
                        <div class="card-header">
                            <h3 class="card-title">Update Employee Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('companies.employees.update', [$company->id, $employee->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row m-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="firstName" value="{{ old('first_name', $employee->first_name) }}" placeholder="First name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="lastName" value="{{ old('last_name', $employee->last_name) }}" placeholder="Last name" required>
                                </div>
                            </div>
                            
                            <div class="m-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $employee->email) }}" placeholder="employee@example.com" required>
                            </div>
                            <div class="m-3">
                                <label for="phone" class="form-label">Phone #</label>
                                <input type="tel" name="phone" class="form-control" id="phone" value="{{ old('phone', $employee->phone) }}" placeholder="0302-2222333" required>
                            </div>
                         
                            <button type="submit" class="btn btn-primary ms-4 pl-4 pr-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</x-app-layout>
