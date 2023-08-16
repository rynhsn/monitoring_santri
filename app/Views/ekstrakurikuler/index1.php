<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>

    <div class="card card-flush card-p-0 bg-transparent border-0 ">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Nav-->
            <ul class="nav nav-pills d-flex  nav-pills-custom gap-3 mb-6" role="tablist">

                <!--begin::Item-->
                <li class="nav-item mb-3 me-0" role="presentation">
                    <!--begin::Nav link-->
                    <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show" href="#kt_pos_food_content_1" style="width: 138px;height: 180px" tabindex="-1">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::Food icon-->
                            <img src="<?= base_url() ?>/media/svg/food-icons/spaghetti.svg" class="w-50px"
                                 alt="">
                            <!--end::Food icon-->
                        </div>
                        <!--end::Icon-->

                        <!--begin::Info-->
                        <div class="">
                            <span class="text-gray-800 fw-bold fs-2 d-block">Input</span>
                            <span class="text-gray-400 fw-semibold fs-7">Absensi</span>
                        </div>
                        <!--end::Info-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Item-->

                <!--begin::Item-->
                <li class="nav-item mb-3 me-0" role="presentation">
                    <!--begin::Nav link-->
                    <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg" href="kt_pos_food_content_2" style="width: 138px;height: 180px" tabindex="-1">
                        <!--begin::Icon-->
                        <div class="nav-icon mb-3">
                            <!--begin::Food icon-->
                            <img src="<?= base_url() ?>/media/svg/food-icons/salad.svg" class="w-50px" alt="">
                            <!--end::Food icon-->
                        </div>
                        <!--end::Icon-->

                        <!--begin::Info-->
                        <div class="">
                            <span class="text-gray-800 fw-bold fs-2 d-block">Riwayat</span>
                            <span class="text-gray-400 fw-semibold fs-7">Absensi</span>
                        </div>
                        <!--end::Info-->
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Item-->

            </ul>
            <!--end::Nav-->
        </div>
        <!--end: Card Body-->
    </div>

    <?= $this->endSection(); ?>