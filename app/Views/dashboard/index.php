<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xxl">
            <!--begin::Engage widget 10-->
            <div class="card card-flush h-md-100">
                <!--begin::Body-->
                <div
                    class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                    style="background-position: 100% 50%; background-image:url('/media/stock/900x600/42.png')">
                    <!--begin::Wrapper-->
                    <div class="mb-10">
                        <!--begin::Title-->
                        <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                            <span class="me-2">Welcome to SIMONTRI
                                <br/>
                                <span class="position-relative d-inline-block text-success">
                                    <p class="text-success opacity-75-hover">Sistem Monitoring Santri</p>
                                    <!--begin::Separator-->
                                    <span
                                        class="position-absolute opacity-15 bottom-0 start-0 border-4 border-success border-bottom w-100"></span>
                                    <!--end::Separator-->
                                </span>
                            </span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--begin::Wrapper-->

                </div>
                <!--end::Body-->
            </div>
            <!--end::Engage widget 10-->
        </div>
        <!--end::Col-->
    </div>

<?= $this->endSection(); ?>