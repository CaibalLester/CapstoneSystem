<!doctype html>
<html lang="en">
<?= view('Admin/chop/head') ?>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

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
                    <h1 class="h2 mb-0">Profile</h1>
                </div>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                <img src="<?= isset ($admin['adminProfile']) ? base_url('/uploads/' . $admin['adminProfile']) : '' ?>"
                                    alt="Profile" class="rounded-circle"
                                    style="width: 150px; height: 150px; cursor: pointer;" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Click to see QR code">
                                <h5>
                                    <?= $admin['username'] ?>
                                </h5>
                                <div class="social-links mt-2">
                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="profileModal" tabindex="-1">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="qr-code-container mt-3 mb-3" id="qrCodeContainer"></div>
                                        <button type="button" class="btn btn-dark" id="downloadButton"><i
                                                class="bi bi-download"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body pt-3">
                                <h1 class="h2 mb-0">About</h1>
                                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam
                                    maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor.
                                    Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi
                                    sed ea saepe at unde.</p>
                                <h5 class="card-title">Profile Details</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-8 col-md-8">
                                        <?php if (isset ($admin['lastname']) && isset ($admin['firstname']) && isset ($admin['middlename'])): ?>
                                            <?= $admin['lastname'] ?>,
                                            <?= $admin['firstname'] ?>
                                            <?= $admin['middlename'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-8 col-md-8">
                                        <?php echo isset ($admin['username']) ? $admin['username'] : '' ?>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-8 col-md-8">
                                        <?php echo isset ($admin['email']) ? $admin['email'] : '' ?>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-8 col-md-8">
                                        <?php echo isset ($admin['number']) ? $admin['number'] : '' ?>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label">Birthday</div>
                                    <div class="col-lg-8 col-md-8">
                                        <?php echo isset ($admin['birthday']) ? date('M j, Y', strtotime($admin['birthday'])) : ''; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-3 col-md-4 label">Adress</div>
                                    <div class="col-lg-8 col-md-8">
                                        <?= isset ($admin['province']) ? $admin['province'] : '' ?>,
                                        <?= isset ($admin['city']) ? $admin['city'] : '' ?>,
                                        <?= isset ($admin['barangay']) ? $admin['barangay'] : '' ?>,
                                        <?= isset ($admin['street']) ? $admin['street'] : '' ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
                <footer class="site-footer">
                    <div class="container">
                        <div class="row">

                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <?= view('Admin/chop/js') ?>
    <script>
        // I-create ang QR code gamit ang actual na data
        var profileData = JSON.stringify({
            role: "<?= $user['role'] ?>",
            username: "<?= $admin['username'] ?>",
            fullname: "<?= $admin['Adminfullname'] ?>",
            email: "<?= $admin['email'] ?>",
            number: "<?= $admin['number'] ?>",
            division: "<?= $admin['division'] ?>",
            code: "<?= $admin['adminCode'] ?>",
            birthday: "<?= date('M j, Y', strtotime($admin['birthday'])); ?>"
        });

        // Set ang data ng QR code container gamit ang profileData
        var qrCodeContainer = document.getElementById("qrCodeContainer");

        new QRCode(qrCodeContainer, {
            text: profileData,

        });

        // Kung gusto mo i-download ang QR code
        var downloadButton = document.getElementById("downloadButton");
        downloadButton.addEventListener("click", function () {
            // Kunin ang data URL ng QR code at gawing anchor link
            var dataURL = qrCodeContainer.querySelector("img").src;
            var downloadLink = document.createElement("a");
            downloadLink.href = dataURL;
            downloadLink.download = "profile_qr_code_" + "<?= $admin['username'] ?>.png";
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });

        // JavaScript code to show the modal when the profile image is clicked
        $(document).ready(function () {
            $('.profile-card img').on('click', function () {
                $('#profileModal').modal('show');
            });
        });
    </script>
</body>

</html>