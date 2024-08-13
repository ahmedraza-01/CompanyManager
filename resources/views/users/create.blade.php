<x-app-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Manager</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12" style="height: 100vh">
                    <!-- jquery validation -->
                    <div class="card card-primary" style="height: 80vh">
                        <div class="card-header">
                            <h3 class="card-title">Enter Details of Manager</h3>
                        </div>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                          
                            <div class="m-3">
                                <label for="companyName" class="form-label">Name of Manager</label>
                                <input type="text" name="name" class="form-control" placeholder="Manager Name" required>
                            </div>
                            <div class="m-3">
                                <label for="companyEmail" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="manager@example.com" required>
                            </div>
                            <div class="form-group m-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control"  placeholder="*********" name="password" required>
                            </div>
                            <div class="form-group m-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>
                            <div class="form-group m-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="manager" selected>Manager</option>
                                    <!-- Remove other roles if you don't need them for this form -->
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="company_id" class="form-label">Category</label>
                                <select name="company_id" id="company_id" class="form-control" required>
                                    <option value="">Select a company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 ms-4 pl-4 pr-4">Save Manager</button>
                        </form>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

</x-app-layout>
