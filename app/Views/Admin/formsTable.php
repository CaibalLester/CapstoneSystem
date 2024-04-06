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
                            <a class="nav-link active" aria-current="page" href="/Forms">
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
                    <h1 class="h2 mb-0">
                        <?php
                        if ($link == 'ViewAppForm') {
                            echo 'Life Changer';
                        } elseif ($link == 'ViewAppForm2') {
                            echo 'APPLICATION FOR INSURANCE AGENT’S LICENSE';
                        } elseif ($link == 'ViewAppForm3') {
                            echo 'Group Life Insurance';
                        } elseif ($link == 'ViewAppForm4') {
                            echo 'Affidavit of Non-Filing';
                        } elseif ($link == 'ViewAppForm5') {
                            echo 'Statement of Undertaking';
                        }
                        ?>
                    </h1>
                </div>

                <div class="row">
                    <!-- left side columns -->
                    <div class="col-lg-12">
                        <div class="row">
                            <!-- Table Applicants -->
                            <div class="col-12 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if (session()->getFlashdata('error')): ?>
                                            <div class="alert alert-danger mt-3 text-center" role="alert">
                                                <?= session()->getFlashdata('error') ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('success')): ?>
                                            <div class="alert alert-success mt-3 text-center" role="alert">
                                                <?= session()->getFlashdata('success') ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="col-lg-7 col-md-8 col-12">
                                                <form class="custom-form search-form"
                                                    action="<?php echo base_url() . 'formsTable/' . $link ?>"
                                                    method="post" role="form">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-8">
                                                            <input class="form-control mb-lg-0 mb-md-0"
                                                                name="searchusers" type="text"
                                                                placeholder="Search by username" aria-label="Search"
                                                                required>
                                                        </div>
                                                        <div class="col-lg-2 col-4">
                                                            <button type="submit" class="form-control">
                                                                <i class="bi bi-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Table with hoverable rows -->
                                    <div class="table-responsive mx-3">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">User Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">view</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($user as $us): ?>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <?= $us['username'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $us['email'] ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url() . $link . '/' . $us['token']; ?>"
                                                                class="btn btn-secondary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php endforeach; ?>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?= view('Admin/chop/js'); ?>

</body>

</html>