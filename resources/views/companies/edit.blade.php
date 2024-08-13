<x-app-layout>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Company</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company</li>
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
                    <div class="card card-primary" style="height: 100vh">
                        <div class="card-header">
                            <h3 class="card-title">Edit Company Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') 
                            <div class="m-3">
                                <label for="companyName" class="form-label">Name of Company</label>
                                <input type="text" name="name" class="form-control" id="companyName" value="{{ $company->name }}" required>
                            </div>
                            <div class="m-3">
                                <label for="companyEmail" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="companyEmail" value="{{ $company->email }}" required>
                            </div>
                            <div class="m-3">
                                <label for="companyWebsite" class="form-label">Company Website</label>
                                <input type="text" name="website" class="form-control" id="companyWebsite" value="{{ $company->website }}" required>
                            </div>
                    


                            <div class="m-3">
                                <label for="companyLogo" class="form-label">Upload Logo</label>
                                <input type="file" class="form-control" id="image" name="logo">
                                @if ($company->logo)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/logos/' . $company->logo) }}" alt="Current Logo" width="100px" height="100px">
                                    </div>
                                @endif
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
