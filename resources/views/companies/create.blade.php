<x-app-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Companies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Companies</li>
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
                            <h3 class="card-title">Enter Details of Company</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="m-3">
                                <label for="companyName" class="form-label">Name of Company</label>
                                <input type="text" name="name" class="form-control" id="companyName" placeholder="glowlogix" required>
                            </div>
                            <div class="m-3">
                                <label for="companyEmail" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="companyEmail" placeholder="company@example.com" required>
                            </div>
                            <div class="m-3">
                                <label for="companyWebsite" class="form-label">Company Website</label>
                                <input type="text" name="website" class="form-control" id="companyWebsite" placeholder="companyname.com" required>
                            </div>
                            <div class="m-3">
                                <label for="companyLogo" class="form-label">Upload Logo</label>
                                <input type="file" class="form-control" id="companyLogo" name="logo" required>
                            </div>
                            <button type="submit" class="btn btn-primary ms-4 pl-4 pr-4">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

</x-app-layout>
