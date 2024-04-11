<!doctype html>
<html lang="en">

<?= view('Admin/chop/head') ?>

<body>
    <?= view('Admin/chop/header') ?>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                <div class="position-sticky py-4 px-3 sidebar-sticky">
                    <ul class="nav flex-column h-100">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/AdDash">
                                <i class="bi-house-fill me-2"></i>
                                Overview
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/usermanagement">
                                <i class="fa fa-user me-2"></i>
                                User Management
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/Forms">
                                <i class="bi bi-file-earmark-slides me-2"></i>
                                Forms
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/promotion">
                                <i class="fa fa-user me-2"></i>
                                Promotion
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/confirmation">
                                <i class="bi bi-check-lg me-2"></i>
                                Confirmation
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/ManageAgent">
                                <i class="fas fa-user-tie me-2"></i>
                                Agents
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="/ManageApplicant">
                                <i class="fa fa-users me-2"></i>
                                Applicants
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/AdHelp">
                                <i class="fas fa-hands-helping me-2"></i>
                                Help Center
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link active" href="/AdHelp">
                                <i class="bi bi-hospital me-2"></i>
                                Plans
                            </a>
                        </li>

                        <li class="nav-item border-top mt-auto pt-2">
                            <a class="nav-link" href="/logout">
                                <i class="bi-box-arrow-left me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                <div class="title-group mb-3">
                    <h1 class="h2 mb-0">Plans</h1>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="row">


                                    <div class="col-lg-3 col-4 me-2">
                                        <div class="card justify-content-center text-center">
                                            <div class="card-body">
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    <i class="bi bi-plus-square fs-1"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                    <?php foreach ($plan as $plans): ?>
                                        <div class="col-lg-3 me-2">
                                        <div class="card justify-content-center text-center">
                                            <div class="card-body">
                                                <img src="uploads/forms/life_changer.png" class="card-img img-fluid"
                                                    alt="Card Image">
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>

                                    <div class="modal fade" id="myModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add new Plan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <!-- Your registration form goes here -->
                                                    <form action="/newplan" method="post" role="form">
                                                        <div class="mb-1">
                                                            <label for="plan_name" class="form-label">Plan Name</label>
                                                            <input type="text" class="form-control" id="plan_name"
                                                                name="plan_name" required>
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="brief_description" class="form-label">Brief
                                                                Description</label>
                                                            <input type="brief_description" class="form-control"
                                                                id="brief_description" name="brief_description"
                                                                required>
                                                        </div>

                                                        <div class="col-lg-12"></div>

                                                        <div class="mb-1">
                                                            <label for="price" class="form-label">Price</label>
                                                            <input type="number" class="form-control" id="price"
                                                                name="price" required>
                                                        </div>

                                                        <div class="mb-1">
                                                            <label for="com_percentage" class="form-label">Commision
                                                                Percentage</label>
                                                            <input type="number" class="form-control"
                                                                id="com_percentage" name="com_percentage" required>
                                                        </div>


                                                        <div class="mb-1">
                                                            <label for="description"
                                                                class="form-label">Description</label>
                                                            <textarea class="form-control" id="description"
                                                                name="description" rows="2" required></textarea>
                                                        </div>

                                                        <div class="mb-1">
                                                            <label for="image" class="form-label">Image</label>
                                                            <input type="file" class="form-control" id="image"
                                                                name="image" accept="image/*" required
                                                                onchange="previewImage(event)">
                                                        </div>
                                                        <div class="col-lg-12 p-2 justify-content-center text-center">
                                                            <!-- Image preview -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-1 me-3">
                                                                        <img class="img-fluid" id="imagePreview" src="#"
                                                                            alt="Image Preview"
                                                                            style="max-width: 100%; max-height: 200px;">
                                                                    </div>
                                                                    <!-- End Image preview -->
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

    <?= view('Admin/chop/js'); ?>
</body>

</html>